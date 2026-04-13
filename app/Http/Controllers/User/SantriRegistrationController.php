<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SantriRegistration;

class SantriRegistrationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap'  => 'required|string|max:255',
            'nisn'          => 'nullable|string|max:50',
            'asal_sekolah'  => 'required|string|max:255',
            'tempat_lahir'  => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'alamat'        => 'nullable|string',
            'email'         => 'nullable|email|max:255',
            'no_wali'       => 'required|string|max:20',
            'nama_wali'     => 'required|string|max:255',
            'pekerjaan_wali' => 'nullable|string|max:100',
            'foto'          => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',
            'kk'            => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',
        ]);

        $data = $validated;
        unset($data['foto'], $data['kk']);

        if ($request->hasFile('kk')) {
            $data['kk'] = $request->file('kk')->store('santri/kk', 'public');
        }

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('santri/foto', 'public');
        }

        $data['status'] = 'pending';

        SantriRegistration::create($data);

        return redirect()->route('pendaftaran')->with('success', 'Pendaftaran berhasil! Data akan segera diverifikasi.');
    }
}
