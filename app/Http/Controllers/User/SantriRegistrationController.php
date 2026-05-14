<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\SantriRegistration;
use App\Models\RegistrationWave;

class SantriRegistrationController extends Controller
{
    public function store(Request $request)
    {
        // Cek apakah user login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Cek gelombang aktif
        $activeWave = RegistrationWave::where('is_active', true)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->first();

        if (!$activeWave) {
            return redirect()->route('user.pendaftaran.index')
                ->with('error', 'Tidak ada gelombang pendaftaran yang aktif.');
        }

        $validated = $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'jenis_kelamin'  => 'required|in:Laki-laki,Perempuan',
            'nisn'           => 'nullable|string|max:50|unique:santri_registrations,nisn',
            'asal_sekolah'   => 'required|string|max:255',
            'tempat_lahir'   => 'nullable|string|max:100',
            'tanggal_lahir'  => 'nullable|date',
            'alamat'         => 'nullable|string',
            'email'          => 'nullable|email|max:255|unique:santri_registrations,email',
            'no_wali'        => 'required|string|max:20',
            'nama_wali'      => 'required|string|max:255',
            'pekerjaan_wali' => 'nullable|string|max:100',
            'foto'           => 'nullable|file|mimes:jpg,jpeg,png|max:2048',  // 2MB untuk foto
            'kk'             => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480', // 20MB untuk KK
        ]);

        $data = $validated;
        $data['wave_id'] = $activeWave->id;
        $data['user_id'] = Auth::id();
        $data['status'] = 'pending';
        $data['acceptance_status'] = 'pending';

        // Set angkatan default dari tahun sekarang
        $data['angkatan'] = date('Y');

        // Hapus file dari array data
        unset($data['foto'], $data['kk']);

        // Upload KK
        if ($request->hasFile('kk')) {
            $data['kk'] = $request->file('kk')->store('santri/kk', 'public');
        }

        // Upload Foto
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('santri/foto', 'public');
        }

        // Increment registered count di wave
        $activeWave->increment('registered_count');

        // Simpan data
        $registration = SantriRegistration::create($data);

        // Debug log
        \Log::info('Pendaftaran baru', [
            'id' => $registration->id,
            'nama' => $registration->nama_lengkap,
            'jenis_kelamin' => $registration->jenis_kelamin,
            'angkatan' => $registration->angkatan,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('user.pendaftaran.status', $registration->id)
            ->with('success', 'Pendaftaran berhasil! Silakan cek status pendaftaran Anda.');
    }

    public function status($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $registration = SantriRegistration::with('wave')->findOrFail($id);

        // Pastikan user hanya bisa melihat pendaftarannya sendiri
        if (Auth::user()->role !== 'admin' && Auth::user()->role !== 'superadmin') {
            if ($registration->user_id !== Auth::id()) {
                abort(403, 'Anda tidak memiliki akses ke data ini.');
            }
        }

        return view('user.pendaftaran.status', compact('registration'));
    }
}
