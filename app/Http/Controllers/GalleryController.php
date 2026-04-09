<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Gallery::query();

        // Fitur pencarian
        if ($request->has('search') && !empty($request->search)) {
            $query->search($request->search);
        }

        // Filter berdasarkan kategori
        if ($request->has('kategori') && !empty($request->kategori)) {
            $query->kategori($request->kategori);
        }

        // Filter berdasarkan status
        if ($request->has('status') && $request->status !== '') {
            $query->where('is_active', $request->status == 'aktif');
        }

      $galleries = $query->orderBy('urut', 'asc')
                   ->orderBy('created_at', 'desc')
                   ->paginate(12)
                   ->withQueryString();

return view('admin.data-master.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.data-master.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // 5MB
            'kategori' => 'required|in:kegiatan,prestasi,umum',
            'tanggal_kegiatan' => 'nullable|date',
            'is_active' => 'boolean',
            'urut' => 'nullable|integer'
        ]);

        $data = $request->except('gambar');

        // Upload gambar
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('galleries', 'public');
            $data['gambar'] = $gambarPath;
        }

        // Set default values
        $data['is_active'] = $request->has('is_active') ? true : false;
        $data['urut'] = $request->urut ?? Gallery::max('urut') + 1;

        Gallery::create($data);

        return redirect()->route('admin.data-master.gallery.index')
                         ->with('success', 'Gallery berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        return view('admin.data-master.gallery.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.data-master.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'kategori' => 'required|in:kegiatan,prestasi,umum',
            'tanggal_kegiatan' => 'nullable|date',
            'is_active' => 'boolean',
            'urut' => 'nullable|integer'
        ]);

        $data = $request->except('gambar');

        // Upload gambar baru jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($gallery->gambar) {
                Storage::disk('public')->delete($gallery->gambar);
            }

            $gambarPath = $request->file('gambar')->store('galleries', 'public');
            $data['gambar'] = $gambarPath;
        }

        $data['is_active'] = $request->has('is_active') ? true : false;

        $gallery->update($data);

        return redirect()->route('admin.data-master.gallery.index')
                         ->with('success', 'Gallery berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        // Hapus gambar
        if ($gallery->gambar) {
            Storage::disk('public')->delete($gallery->gambar);
        }

        $gallery->delete();

        return redirect()->route('admin.data-master.gallery.index')
                         ->with('success', 'Gallery berhasil dihapus.');
    }

    /**
     * Update urutan gallery (drag & drop)
     */
    public function updateOrder(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:galleries,id',
            'items.*.urut' => 'required|integer'
        ]);

        foreach ($request->items as $item) {
            Gallery::where('id', $item['id'])->update(['urut' => $item['urut']]);
        }

        return response()->json(['success' => true]);
    }

    /**
     * Toggle status aktif/non-aktif
     */
    public function toggleStatus(Gallery $gallery)
    {
        $gallery->is_active = !$gallery->is_active;
        $gallery->save();

        return redirect()->back()
                         ->with('success', 'Status gallery berhasil diubah.');
    }
}
