<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Fasilitas::query();

        // Fitur pencarian
        if ($request->has('search') && !empty($request->search)) {
            $query->search($request->search);
        }

        // Filter berdasarkan kondisi
        if ($request->has('kondisi') && !empty($request->kondisi)) {
            $query->kondisi($request->kondisi);
        }

        // Filter berdasarkan kategori
        if ($request->has('kategori') && !empty($request->kategori)) {
            $query->where('kategori', $request->kategori);
        }

        $fasilitas = $query->latest()->paginate(10)->withQueryString();

        // Ambil daftar kategori unik untuk filter
        $kategoriList = Fasilitas::select('kategori')
                                 ->whereNotNull('kategori')
                                 ->distinct()
                                 ->pluck('kategori');

        return view('admin.data-master.fasilitas.index', compact('fasilitas', 'kategoriList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.data-master.fasilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:100',
            'jumlah' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'lokasi' => 'nullable|string|max:255',
            'tanggal_pengadaan' => 'nullable|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'keterangan' => 'nullable|string',
        ]);

        $data = $request->except('foto');

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('fasilitas', 'public');
            $data['foto'] = $fotoPath;
        }

        Fasilitas::create($data);

        return redirect()->route('admin.data-master.fasilitas.index')
                         ->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
   public function show($id)
    {
         $fasilitas = Fasilitas::findOrFail($id);
        return view('admin.data-master.fasilitas.show', compact('fasilitas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        return view('admin.data-master.fasilitas.edit', compact('fasilitas'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
{
    $request->validate([
        'nama_fasilitas' => 'required|string|max:255',
        'kategori' => 'nullable|string|max:100',
        'jumlah' => 'required|integer|min:0',
        'deskripsi' => 'nullable|string',
        'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
        'lokasi' => 'nullable|string|max:255',
        'tanggal_pengadaan' => 'nullable|date',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'keterangan' => 'nullable|string',
    ]);

    // Cari data berdasarkan ID
    $fasilitas = Fasilitas::findOrFail($id);

    $data = $request->except('foto');

    // Upload foto baru jika ada
    if ($request->hasFile('foto')) {
        // Hapus foto lama
        if ($fasilitas->foto) {
            Storage::disk('public')->delete($fasilitas->foto);
        }

        $fotoPath = $request->file('foto')->store('fasilitas', 'public');
        $data['foto'] = $fotoPath;
    }

    $fasilitas->update($data);

    return redirect()->route('admin.data-master.fasilitas.index')
                     ->with('success', 'Fasilitas berhasil diperbarui.');
}


    /**
     * Remove the specified resource from storage.
     */
  public function destroy($id)
{
    $fasilitas = Fasilitas::findOrFail($id);

    if ($fasilitas->foto) {
        Storage::disk('public')->delete($fasilitas->foto);
    }

    $fasilitas->delete();

    return redirect()->route('admin.data-master.fasilitas.index')
                     ->with('success', 'Fasilitas berhasil dihapus.');
}
}
