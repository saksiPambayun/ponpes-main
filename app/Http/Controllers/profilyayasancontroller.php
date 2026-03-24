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

        return view('data-master.profil-yayasan.index', [
            'title'  => 'Profil Yayasan',
            'active' => 'data-master',
            'profil' => $profil,
        ]);
    }

    /**
     * Tampilkan form tambah profil.
     */
    public function create()
    {
        return view('data-master.profil-yayasan.create', [
            'title'  => 'Tambah Profil Yayasan',
            'active' => 'data-master',
        ]);
    }

    /**
     * Simpan profil baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_yayasan'       => 'required|string|max:255',
            'singkatan'          => 'nullable|string|max:50',
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
            'no_akta'            => 'nullable|string|max:100',
            'no_sk_kemenkumham'  => 'nullable|string|max:100',
            'npwp'               => 'nullable|string|max:30',
            'logo'               => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'foto_gedung'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
        ]);

        $data = $request->only([
            'nama_yayasan', 'singkatan', 'deskripsi', 'visi', 'misi',
            'alamat', 'kota', 'provinsi', 'kode_pos', 'telepon', 'email',
            'website', 'instagram', 'facebook', 'youtube',
            'tahun_berdiri', 'no_akta', 'no_sk_kemenkumham', 'npwp',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('profil-yayasan', 'public');
        }

        if ($request->hasFile('foto_gedung')) {
            $data['foto_gedung'] = $request->file('foto_gedung')->store('profil-yayasan', 'public');
        }

        ProfilYayasan::create($data);

        return redirect()->route('profil-yayasan.index')
            ->with('success', 'Profil yayasan berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit profil.
     */
    public function edit()
    {
        $profil = ProfilYayasan::getProfil();

        return view('data-master.profil-yayasan.edit', [
            'title'  => 'Edit Profil Yayasan',
            'active' => 'data-master',
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
            'singkatan'          => 'nullable|string|max:50',
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
            'no_akta'            => 'nullable|string|max:100',
            'no_sk_kemenkumham'  => 'nullable|string|max:100',
            'npwp'               => 'nullable|string|max:30',
            'logo'               => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'foto_gedung'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
        ]);

        $profil = ProfilYayasan::getProfil();

        $data = $request->only([
            'nama_yayasan', 'singkatan', 'deskripsi', 'visi', 'misi',
            'alamat', 'kota', 'provinsi', 'kode_pos', 'telepon', 'email',
            'website', 'instagram', 'facebook', 'youtube',
            'tahun_berdiri', 'no_akta', 'no_sk_kemenkumham', 'npwp',
        ]);

        // Upload logo
        if ($request->hasFile('logo')) {
            if ($profil->logo) {
                Storage::disk('public')->delete($profil->logo);
            }
            $data['logo'] = $request->file('logo')->store('profil-yayasan', 'public');
        }

        // Upload foto gedung
        if ($request->hasFile('foto_gedung')) {
            if ($profil->foto_gedung) {
                Storage::disk('public')->delete($profil->foto_gedung);
            }
            $data['foto_gedung'] = $request->file('foto_gedung')->store('profil-yayasan', 'public');
        }

        // Hapus logo jika diminta
        if ($request->has('hapus_logo') && $request->hapus_logo == '1') {
            if ($profil->logo) {
                Storage::disk('public')->delete($profil->logo);
            }
            $data['logo'] = null;
        }

        // Hapus foto gedung jika diminta
        if ($request->has('hapus_foto_gedung') && $request->hapus_foto_gedung == '1') {
            if ($profil->foto_gedung) {
                Storage::disk('public')->delete($profil->foto_gedung);
            }
            $data['foto_gedung'] = null;
        }

        $profil->update($data);

        return redirect()->route('admin.profil-yayasan.index')
            ->with('success', 'Profil yayasan berhasil diperbarui!');
    }
}