<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Santri;

class SantriController extends Controller
{
    public function store(Request $request)
    {
        $kk = $request->file('kk')?->store('kk', 'public');
        $foto = $request->file('foto')?->store('foto', 'public');

        \App\Models\Santri::create([
            'nama_lengkap' => $request->nama_lengkap,
            'asal_sekolah' => $request->asal_sekolah,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'nama_wali' => $request->nama_wali,
            'pekerjaan_wali' => $request->pekerjaan_wali,
            'no_wali' => $request->no_wali,
            'kk' => $kk,
            'foto' => $foto,
        ]);

        return back()->with('success', 'Pendaftaran berhasil!');
    }
}
