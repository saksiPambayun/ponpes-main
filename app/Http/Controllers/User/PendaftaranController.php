<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\RegistrationWave;
use App\Models\SantriRegistration;
use App\Models\BiayaPendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class PendaftaranController extends Controller
{
    // HAPUS method __construct() seluruhnya!
    // Jangan pakai $this->middleware() di constructor
    
    // Halaman pendaftaran untuk user
    public function index()
    {
        // Cek apakah user login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu untuk mengakses pendaftaran.');
        }

        // Ambil data pendaftaran milik user yang login
        $myRegistrations = SantriRegistration::where('user_id', Auth::id())
            ->with('wave')
            ->latest()
            ->get();

        $activeWave = RegistrationWave::where('is_active', true)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->first();

        $allWaves = RegistrationWave::orderBy('start_date', 'desc')->get();
        
        // Ambil biaya pendaftaran
        $biayaList = BiayaPendaftaran::aktif()->orderBy('urutan', 'asc')->get();
        $totalBiaya = $biayaList->sum('nominal');

        return view('user.pendaftaran.index', compact('activeWave', 'allWaves', 'myRegistrations', 'biayaList', 'totalBiaya'));
    }

    // Form pendaftaran
    public function form()
    {
        // Cek apakah user login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu untuk mengisi pendaftaran.');
        }

        // Cek apakah user sudah punya pendaftaran aktif
        $existingRegistration = SantriRegistration::where('user_id', Auth::id())
            ->whereIn('status', ['pending', 'verified'])
            ->first();

        if ($existingRegistration) {
            return redirect()->route('user.pendaftaran.status', $existingRegistration->id)
                ->with('warning', 'Anda sudah memiliki pendaftaran aktif. Silakan cek status pendaftaran Anda.');
        }

        $activeWave = RegistrationWave::where('is_active', true)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->first();

        if (!$activeWave) {
            return redirect()->route('user.pendaftaran.index')
                ->with('error', 'Tidak ada gelombang pendaftaran yang aktif.');
        }
        
        // Ambil biaya pendaftaran
        $biayaList = BiayaPendaftaran::aktif()->orderBy('urutan', 'asc')->get();
        $totalBiaya = $biayaList->sum('nominal');

        return view('user.pendaftaran.form', compact('activeWave', 'biayaList', 'totalBiaya'));
    }

    // Proses simpan pendaftaran
    public function store(Request $request)
    {
        // Cek apakah user login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Cek apakah user sudah punya pendaftaran
        $existingRegistration = SantriRegistration::where('user_id', Auth::id())
            ->whereIn('status', ['pending', 'verified'])
            ->first();

        if ($existingRegistration) {
            return back()->with('error', 'Anda sudah memiliki pendaftaran yang sedang diproses.');
        }

        $activeWave = RegistrationWave::where('is_active', true)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->first();

        if (!$activeWave) {
            return back()->with('error', 'Tidak ada gelombang pendaftaran yang aktif.');
        }

        $validated = $request->validate([
            'nama_lengkap'    => 'required|string|max:255',
            'nisn'            => 'nullable|string|max:50',
            'asal_sekolah'    => 'required|string|max:255',
            'tempat_lahir'    => 'nullable|string|max:100',
            'tanggal_lahir'   => 'nullable|date',
            'jenis_kelamin'   => 'nullable|in:Laki-laki,Perempuan',
            'alamat'          => 'nullable|string',
            'email'           => 'nullable|email|max:255',
            'no_wali'         => 'required|string|max:20',
            'nama_wali'       => 'required|string|max:255',
            'pekerjaan_wali'  => 'nullable|string|max:100',
            'foto'            => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',
            'kk'              => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',
        ]);

        $data = $validated;
        $data['wave_id'] = $activeWave->id;
        $data['user_id'] = Auth::id();
        $data['status'] = 'pending';
        $data['acceptance_status'] = 'pending';

        unset($data['foto'], $data['kk']);

        if ($request->hasFile('kk')) {
            $data['kk'] = $request->file('kk')->store('santri/kk', 'public');
        }

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('santri/foto', 'public');
        }

        $activeWave->increment('registered_count');

        $registration = SantriRegistration::create($data);

        return redirect()->route('user.pendaftaran.status', $registration->id)
            ->with('success', 'Pendaftaran berhasil! Silakan cek status pendaftaran Anda.');
    }

    // Detail status pendaftaran
    public function status($id)
    {
        // Cek apakah user login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $registration = SantriRegistration::with('wave')->findOrFail($id);

        // Pastikan user hanya bisa melihat pendaftarannya sendiri ATAU admin
        if (Auth::user()->role !== 'admin' && Auth::user()->role !== 'superadmin') {
            if ($registration->user_id !== Auth::id()) {
                abort(403, 'Anda tidak memiliki akses ke data ini.');
            }
        }

        return view('user.pendaftaran.status', compact('registration'));
    }

    // CETAK STATUS PENDAFTARAN
    public function cetak($id)
    {
        // Cek apakah user login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $registration = SantriRegistration::with('wave')->findOrFail($id);

        // Pastikan user hanya bisa mencetak pendaftarannya sendiri
        if (Auth::user()->role !== 'admin' && Auth::user()->role !== 'superadmin') {
            if ($registration->user_id !== Auth::id()) {
                abort(403, 'Anda tidak memiliki akses ke data ini.');
            }
        }

        return view('user.pendaftaran.cetak', compact('registration'));
    }

    // Form cek status (PUBLIK - tidak perlu login)
    public function cekStatusForm()
    {
        return view('user.pendaftaran.cek-status');
    }

    // Proses cek status (PUBLIK - tidak perlu login)
    public function cekStatus(Request $request)
    {
        $request->validate([
            'search_type' => 'required|in:nama,email,no_wali,nisn',
            'search_value' => 'required|string'
        ]);

        $query = SantriRegistration::with('wave');

        $searchType = $request->search_type;
        $searchValue = $request->search_value;

        if ($searchType == 'nama') {
            $query->where('nama_lengkap', 'like', '%' . $searchValue . '%');
        } elseif ($searchType == 'email') {
            $query->where('email', $searchValue);
        } elseif ($searchType == 'no_wali') {
            $query->where('no_wali', $searchValue);
        } elseif ($searchType == 'nisn') {
            $query->where('nisn', $searchValue);
        }

        $registrations = $query->latest()->get();

        if ($registrations->isEmpty()) {
            return back()->with('error', 'Data pendaftaran tidak ditemukan.');
        }

        if ($registrations->count() == 1) {
            return redirect()->route('user.pendaftaran.status', $registrations->first()->id);
        }

        return view('user.pendaftaran.hasil-cek', compact('registrations'));
    }

    public function downloadPDF($id)
    {
        // Cek apakah user login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        try {
            $registration = SantriRegistration::with('wave')->findOrFail($id);

            // Pastikan user hanya bisa download pendaftarannya sendiri
            if (Auth::user()->role !== 'admin' && Auth::user()->role !== 'superadmin') {
                if ($registration->user_id !== Auth::id()) {
                    abort(403, 'Anda tidak memiliki akses ke data ini.');
                }
            }

            $pdf = Pdf::loadView('user.pendaftaran.pdf', compact('registration'));
            $pdf->setPaper('A4', 'portrait');

            return $pdf->download('Status_Pendaftaran_' . $registration->nama_lengkap . '.pdf');

        } catch (\Exception $e) {
            \Log::error('PDF Error: ' . $e->getMessage());
            return back()->with('error', 'Gagal membuat PDF. Error: ' . $e->getMessage());
        }
    }
}