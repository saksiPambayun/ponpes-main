<?php

namespace App\Http\Controllers;

use App\Models\ProfilYayasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilYayasanController extends Controller
{
    /**
     * Tampilkan detail profil yayasan.
     */
    public function index()
    {
        $profil = ProfilYayasan::getProfil();

        return view('admin.data-master.profil-yayasan.index', [
            'title'  => 'Profil Yayasan',
            'profil' => $profil,
        ]);
    }

    /**
     * Tampilkan form edit profil.
     */
    public function edit()
    {
        $profil = ProfilYayasan::getProfil();

        return view('admin.data-master.profil-yayasan.edit', [
            'title'  => 'Edit Profil Yayasan',
            'profil' => $profil,
        ]);
    }

    /**
     * Simpan perubahan profil yayasan.
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama_yayasan'       => 'required|string|max:255',
            'deskripsi'          => 'nullable|string',
            'visi'               => 'nullable|string',
            'misi'               => 'nullable|string',
            'alamat'             => 'nullable|string|max:500',
            'kota'               => 'nullable|string|max:100',
            'provinsi'           => 'nullable|string|max:100',
            'kode_pos'           => 'nullable|string|max:10',
            'telepon'            => 'nullable|string|max:20',
            'email'              => 'nullable|email|max:255',
            'website'            => 'nullable|url|max:255',
            'instagram'          => 'nullable|string|max:255',
            'facebook'           => 'nullable|string|max:255',
            'youtube'            => 'nullable|string|max:255',
            'tahun_berdiri'      => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
            'logo'               => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ]);

        $profil = ProfilYayasan::getProfil();

        $data = $request->only([
            'nama_yayasan', 'deskripsi', 'visi', 'misi',
            'alamat', 'kota', 'provinsi', 'kode_pos', 'telepon', 'email',
            'website', 'instagram', 'facebook', 'youtube', 'tahun_berdiri',
        ]);

        // Upload logo
        if ($request->hasFile('logo')) {
            if ($profil->logo) {
                Storage::disk('public')->delete($profil->logo);
            }
            $data['logo'] = $request->file('logo')->store('profil-yayasan', 'public');
        }

        $profil->update($data);

        return redirect()->route('admin.profil-yayasan.index')
            ->with('success', 'Profil yayasan berhasil diperbarui!');
    }
}
