<?php

namespace App\Http\Controllers;

use App\Models\ProfilYayasan;
use App\Models\StrukturOrganisasi;
use App\Models\Fasilitas;
use App\Models\Gallery;
use App\Models\Program;
use Illuminate\Http\Request;

class DataMasterController extends Controller
{
    /**
     * Tampilkan halaman utama data master
     */
    public function index()
    {
        $data = [
            'title' => 'Data Master',
            'active' => 'data-master'
        ];
        return view('data-master.index', $data);
    }

    /**
     * Profil Yayasan
     */
    /**
 * Profil Yayasan
 */
public function profilYayasan()
{
    // Gunakan firstOrNew agar tidak error jika tabel kosong
    $profil = ProfilYayasan::firstOrNew([]);
    
    $data = [
        'title' => 'Profil Yayasan',
        'active' => 'data-master',
        'profil' => $profil
    ];
    return view('data-master.profil-yayasan', $data);
}

    public function profilYayasanStore(Request $request)
    {
        $request->validate([
            'nama_yayasan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'website' => 'nullable|url|max:255',
            'nib' => 'nullable|string|max:50',
            'npwp' => 'nullable|string|max:50'
        ]);

        ProfilYayasan::updateOrCreate(
            ['id' => 1],
            $request->all()
        );

        return redirect()->route('data-master.profil-yayasan')
            ->with('success', 'Profil yayasan berhasil disimpan');
    }

    /**
     * Struktur Organisasi
     */

public function strukturOrganisasi()
{
    $anggota = StrukturOrganisasi::orderBy('urutan')->paginate(10);

    $stats = [
        'total' => StrukturOrganisasi::count(),
        'aktif' => StrukturOrganisasi::where('status', 'aktif')->count(),
        'pengurus' => StrukturOrganisasi::where('divisi', 'pengurus')->count(),
        'pengawas' => StrukturOrganisasi::where('divisi', 'pengawas')->count(),
    ];

    $divisiOptions = [
        'pengurus' => 'Pengurus',
        'pengawas' => 'Pengawas',
        'sekretariat' => 'Sekretariat',
        'bendahara' => 'Bendahara'
    ];

    return view('admin.data-master.struktur-organisasi.index', [
        'anggota' => $anggota,
        'stats' => $stats,
        'divisiOptions' => $divisiOptions
    ]);
}
    public function strukturOrganisasiStore(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'nama_pejabat' => 'required|string|max:255',
            'urutan' => 'required|integer|min:1'
        ]);

        StrukturOrganisasi::create($request->all());

        return redirect()->route('admin.data-master.struktur-organisasi')
            ->with('success', 'Data struktur organisasi berhasil ditambahkan');
    }

    public function strukturOrganisasiUpdate(Request $request, $id)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'nama_pejabat' => 'required|string|max:255',
            'urutan' => 'required|integer|min:1'
        ]);

        $struktur = StrukturOrganisasi::findOrFail($id);
        $struktur->update($request->all());

        return redirect()->route('data-master.struktur-organisasi')
            ->with('success', 'Data struktur organisasi berhasil diperbarui');
    }

    public function strukturOrganisasiDestroy($id)
    {
        StrukturOrganisasi::findOrFail($id)->delete();
        return redirect()->route('admin.data-master.struktur-organisasi')
            ->with('success', 'Data struktur organisasi berhasil dihapus');
    }

    /**
     * Fasilitas
     */
   public function fasilitas()
{
    $fasilitas = Fasilitas::orderBy('created_at','desc')->paginate(10);

    $data = [
        'title' => 'Fasilitas',
        'active' => 'data-master',
        'fasilitas' => $fasilitas
    ];

    return view('data-master.fasilitas.index', $data);
}

    public function fasilitasStore(Request $request)
    {
        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'jumlah' => 'required|integer|min:1',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat'
        ]);

        Fasilitas::create($request->all());

        return redirect()->route('admin.data-master.fasilitas')
            ->with('success', 'Data fasilitas berhasil ditambahkan');
    }

    public function fasilitasUpdate(Request $request, $id)
    {
        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'jumlah' => 'required|integer|min:1',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat'
        ]);

        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->update($request->all());

        return redirect()->route('admin.data-master.fasilitas')
            ->with('success', 'Data fasilitas berhasil diperbarui');
    }

    public function fasilitasDestroy($id)
    {
        Fasilitas::findOrFail($id)->delete();
        return redirect()->route('admin.data-master.fasilitas')
            ->with('success', 'Data fasilitas berhasil dihapus');
    }

    /**
     * Gallery
     */
    public function gallery()
    {
       $galleries = Gallery::orderBy('created_at', 'desc')->paginate(10); // 10 = jumlah per halaman
        $data = [
            'title' => 'Gallery',
            'active' => 'data-master',
            'galleries' => $galleries
        ];
return view('admin.data-master.gallery.index', $data);
    }

    public function galleryStore(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'kategori' => 'required|in:kegiatan,prestasi,umum',
            'tanggal_kegiatan' => 'nullable|date'
        ]);

       $data = $request->all();

$data['is_active'] = isset($data['is_active']) ? 1 : 0;

if ($request->hasFile('gambar')) {
    $file = $request->file('gambar');
    $filename = time() . '_' . $file->getClientOriginalName();
    $file->move(public_path('uploads/gallery'), $filename);
    $data['gambar'] = 'uploads/gallery/' . $filename;
}


        Gallery::create($data);

        return redirect()->route('admin.data-master.gallery.index')
            ->with('success', 'Galeri berhasil ditambahkan');
    }

    public function galleryDestroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        
        // Hapus file gambar
        if ($gallery->gambar && file_exists(public_path($gallery->gambar))) {
            unlink(public_path($gallery->gambar));
        }
        
        $gallery->delete();

        return redirect()->route('admin.data-master.gallery')
            ->with('success', 'Galeri berhasil dihapus');
    }

    /**
     * Program
     */
    public function program()
    {
        $programs = Program::orderBy('created_at', 'desc')->get();
        $data = [
            'title' => 'Program',
            'active' => 'data-master',
            'programs' => $programs
        ];
        return view('admin.data-master.program', $data);
    }

    public function programStore(Request $request)
    {
        $request->validate([
            'nama_program' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|in:pendidikan,sosial,keagamaan,kesehatan',
            'status' => 'required|in:aktif,selesai,dinunda',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai'
        ]);

        Program::create($request->all());

        return redirect()->route('admin.data-master.program')
            ->with('success', 'Program berhasil ditambahkan');
    }

    public function programUpdate(Request $request, $id)
    {
        $request->validate([
            'nama_program' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|in:pendidikan,sosial,keagamaan,kesehatan',
            'status' => 'required|in:aktif,selesai,dinunda',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai'
        ]);

        $program = Program::findOrFail($id);
        $program->update($request->all());

        return redirect()->route('admin.data-master.program')
            ->with('success', 'Program berhasil diperbarui');
    }

    public function programDestroy($id)
    {
        Program::findOrFail($id)->delete();
        return redirect()->route('admin.data-master.program')
            ->with('success', 'Program berhasil dihapus');
    }
}