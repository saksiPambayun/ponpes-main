<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    /**
     * Display a listing of programs.
     */
    public function index(Request $request)
    {
        $query = Program::orderBy('created_at', 'desc');

        // Filter by kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }


        // Search
        if ($request->filled('search')) {
            $query->where('nama_program', 'like', '%' . $request->search . '%');
        }

        $programs = $query->paginate(10)->withQueryString();

        $stats = [
            'total'     => Program::count(),
            'aktif'     => Program::where('status', 'aktif')->count(),
            'selesai'   => Program::where('status', 'selesai')->count(),
            'dinunda'   => Program::where('status', 'dinunda')->count(),
        ];

        $data = [
            'title'    => 'Program',
            'active'   => 'data-master',
            'programs' => $programs,
            'stats'    => $stats,
        ];

        return view('data-master.program.index', $data);
    }

    /**
     * Show the form for creating a new program.
     */
    public function create()
    {
        $data = [
            'title'  => 'Tambah Program',
            'active' => 'data-master',
        ];

        return view('data-master.program.create', $data);
    }

    /**
     * Store a newly created program.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_program'    => 'required|string|max:255',
            'deskripsi'       => 'required|string',
            'kategori'        => 'required|in:pendidikan,sosial,keagamaan,kesehatan',
            'tanggal_mulai'   => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'gambar'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only([
            'nama_program', 'deskripsi', 'kategori',
            'status', 'tanggal_mulai', 'tanggal_selesai',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('programs', 'public');
        }

        Program::create($data);

        return redirect()->route('admin.program.index')
            ->with('success', 'Program berhasil ditambahkan!');
    }

    /**
     * Display the specified program.
     */
    public function show(Program $program)
    {
        $data = [
            'title'   => 'Detail Program',
            'active'  => 'data-master',
            'program' => $program,
        ];

        return view('data-master.program.show', $data);
    }

    /**
     * Show the form for editing the program.
     */
    public function edit(Program $program)
    {
        $data = [
            'title'   => 'Edit Program',
            'active'  => 'data-master',
            'program' => $program,
        ];

        return view('data-master.program.edit', $data);
    }

    /**
     * Update the specified program.
     */
    public function update(Request $request, Program $program)
    {
        $request->validate([
            'nama_program'    => 'required|string|max:255',
            'deskripsi'       => 'required|string',
            'kategori'        => 'required|in:pendidikan,sosial,keagamaan,kesehatan',
            
            'tanggal_mulai'   => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'gambar'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only([
            'nama_program', 'deskripsi', 'kategori',
            'status', 'tanggal_mulai', 'tanggal_selesai',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($program->gambar) {
                Storage::disk('public')->delete($program->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('programs', 'public');
        }

        $program->update($data);

        return redirect()->route('admin.program.index')
    ->with('success', 'Program berhasil diperbarui!');
    }

    /**
     * Remove the specified program.
     */
    public function destroy(Program $program)
    {
        if ($program->gambar) {
            Storage::disk('public')->delete($program->gambar);
        }

        $program->delete();

        return redirect()->route('admin.program.index')
            ->with('success', 'Program berhasil dihapus!');
    }
}