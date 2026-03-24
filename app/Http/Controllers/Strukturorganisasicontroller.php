<?php

namespace App\Http\Controllers;

use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasiController extends Controller
{
    public function index(Request $request)
    {
        $query = StrukturOrganisasi::query();

        if ($request->filled('divisi')) {
            $query->where('divisi', $request->divisi);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('jabatan', 'like', '%' . $request->search . '%');
            });
        }

        $anggota = $query->orderBy('divisi')
                         ->orderBy('urutan')
                         ->orderBy('nama')
                         ->paginate(10)
                         ->withQueryString();

        $stats = [
            'total'     => StrukturOrganisasi::count(),
            'aktif'     => StrukturOrganisasi::where('status', 'aktif')->count(),
            'pengurus'  => StrukturOrganisasi::where('divisi', 'pengurus')->count(),
            'pengawas'  => StrukturOrganisasi::where('divisi', 'pengawas')->count(),
            'pelaksana' => StrukturOrganisasi::where('divisi', 'pelaksana')->count(),
        ];

        return view('data-master.struktur-organisasi.index', [
            'title'         => 'Struktur Organisasi',
            'active'        => 'data-master',
            'anggota'       => $anggota,
            'stats'         => $stats,
            'divisiOptions' => StrukturOrganisasi::divisiOptions(),
        ]);
    }

    public function create()
    {
        return view('data-master.struktur-organisasi.create', [
            'title'         => 'Tambah Anggota Organisasi',
            'active'        => 'data-master',
            'divisiOptions' => StrukturOrganisasi::divisiOptions(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'jabatan'   => 'required|string|max:255',
            'divisi'    => 'required|in:pengurus,pengawas,pelaksana,lainnya',
            'urutan'    => 'nullable|integer|min:0',
            'telepon'   => 'nullable|string|max:20',
            'email'     => 'nullable|email|max:255',
            'deskripsi' => 'nullable|string',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only([
            'nama', 'jabatan', 'divisi', 'urutan',
            'telepon', 'email', 'deskripsi', 'status',
        ]);

        $data['urutan'] = $data['urutan'] ?? 0;

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('struktur-organisasi', 'public');
        }

        StrukturOrganisasi::create($data);

        return redirect()->route('data-master.struktur-organisasi')
            ->with('success', 'Anggota organisasi berhasil ditambahkan!');
    }

    public function show(StrukturOrganisasi $strukturOrganisasi)
    {
        return view('data-master.struktur-organisasi.show', [
            'title'   => 'Detail Anggota',
            'active'  => 'data-master',
            'anggota' => $strukturOrganisasi,
        ]);
    }

    public function edit(StrukturOrganisasi $strukturOrganisasi)
    {
        return view('data-master.struktur-organisasi.edit', [
            'title'         => 'Edit Anggota Organisasi',
            'active'        => 'data-master',
            'anggota'       => $strukturOrganisasi,
            'divisiOptions' => StrukturOrganisasi::divisiOptions(),
        ]);
    }

    public function update(Request $request, StrukturOrganisasi $strukturOrganisasi)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'jabatan'   => 'required|string|max:255',
            'divisi'    => 'required|in:pengurus,pengawas,pelaksana,lainnya',
            'urutan'    => 'nullable|integer|min:0',
            'telepon'   => 'nullable|string|max:20',
            'email'     => 'nullable|email|max:255',
            'deskripsi' => 'nullable|string',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only([
            'nama', 'jabatan', 'divisi', 'urutan',
            'telepon', 'email', 'deskripsi', 'status',
        ]);

        $data['urutan'] = $data['urutan'] ?? 0;

        if ($request->hasFile('foto')) {
            if ($strukturOrganisasi->foto) {
                Storage::disk('public')->delete($strukturOrganisasi->foto);
            }
            $data['foto'] = $request->file('foto')->store('struktur-organisasi', 'public');
        }

        if ($request->has('hapus_foto') && $request->hapus_foto == '1') {
            if ($strukturOrganisasi->foto) {
                Storage::disk('public')->delete($strukturOrganisasi->foto);
            }
            $data['foto'] = null;
        }

        $strukturOrganisasi->update($data);

        return redirect()->route('admin.data-master.struktur-organisasi')
            ->with('success', 'Anggota organisasi berhasil diperbarui!');
    }

    public function destroy(StrukturOrganisasi $strukturOrganisasi)
    {
        if ($strukturOrganisasi->foto) {
            Storage::disk('public')->delete($strukturOrganisasi->foto);
        }

        $strukturOrganisasi->delete();

        return redirect()->route('admin.data-master.struktur-organisasi')
            ->with('success', 'Anggota organisasi berhasil dihapus!');
    }
}