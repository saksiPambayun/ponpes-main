<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\RegistrationWave;
use App\Models\SantriRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;  // ✅ This is correct

class PendaftaranController extends Controller
{
    // Halaman pendaftaran untuk user
    public function index()
    {
        $activeWave = RegistrationWave::where('is_active', true)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->first();

        $allWaves = RegistrationWave::orderBy('start_date', 'desc')->get();

        return view('user.pendaftaran.index', compact('activeWave', 'allWaves'));
    }

    // Form pendaftaran
    public function form()
    {
        $activeWave = RegistrationWave::where('is_active', true)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->first();

        if (!$activeWave) {
            return redirect()->route('user.pendaftaran.index')
                ->with('error', 'Tidak ada gelombang pendaftaran yang aktif.');
        }

        return view('user.pendaftaran.form', compact('activeWave'));
    }

    // Proses simpan pendaftaran
    public function store(Request $request)
    {
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
        $registration = SantriRegistration::with('wave')->findOrFail($id);
        return view('user.pendaftaran.status', compact('registration'));
    }

    // CETAK STATUS PENDAFTARAN (TAMBAHKAN INI)
    public function cetak($id)
    {
        $registration = SantriRegistration::with('wave')->findOrFail($id);
        return view('user.pendaftaran.cetak', compact('registration'));
    }

    // Form cek status
    public function cekStatusForm()
    {
        return view('user.pendaftaran.cek-status');
    }

    // Proses cek status
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
    try {
        // Ambil data pendaftaran
        $registration = SantriRegistration::with('wave')->findOrFail($id);
        
        // Load view PDF (path yang benar)
        $pdf = Pdf::loadView('user.pendaftaran.pdf', compact('registration'));
        
        // Set ukuran kertas
        $pdf->setPaper('A4', 'portrait');
        
        // Download file
        return $pdf->download('Status_Pendaftaran_' . $registration->nama_lengkap . '.pdf');
        
    } catch (\Exception $e) {
        // Log error
        \Log::error('PDF Error: ' . $e->getMessage());
        
        // Kembali dengan pesan error
        return back()->with('error', 'Gagal membuat PDF. Error: ' . $e->getMessage());
    }
}

}
