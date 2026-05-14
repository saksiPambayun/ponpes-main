<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BiayaPendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BiayaPendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $biaya = BiayaPendaftaran::orderBy('urutan', 'asc')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.biaya-pendaftaran.index', compact('biaya'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.biaya-pendaftaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_biaya' => 'required|string|max:255',
            'nominal' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
            'urutan' => 'nullable|integer|min:0'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        BiayaPendaftaran::create([
            'nama_biaya' => $request->nama_biaya,
            'nominal' => $request->nominal,
            'keterangan' => $request->keterangan,
            'status' => $request->status,
            'urutan' => $request->urutan ?? 0
        ]);

        return redirect()->route('admin.biaya-pendaftaran.index')
            ->with('success', 'Biaya pendaftaran berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $biaya = BiayaPendaftaran::findOrFail($id);
        return view('admin.biaya-pendaftaran.show', compact('biaya'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $biaya = BiayaPendaftaran::findOrFail($id);
        return view('admin.biaya-pendaftaran.edit', compact('biaya'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_biaya' => 'required|string|max:255',
            'nominal' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
            'urutan' => 'nullable|integer|min:0'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $biaya = BiayaPendaftaran::findOrFail($id);
        $biaya->update([
            'nama_biaya' => $request->nama_biaya,
            'nominal' => $request->nominal,
            'keterangan' => $request->keterangan,
            'status' => $request->status,
            'urutan' => $request->urutan ?? 0
        ]);

        return redirect()->route('admin.biaya-pendaftaran.index')
            ->with('success', 'Biaya pendaftaran berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $biaya = BiayaPendaftaran::findOrFail($id);
            $biaya->delete();

            if (request()->ajax() || request()->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Biaya pendaftaran berhasil dihapus!'
                ]);
            }

            return redirect()->route('admin.biaya-pendaftaran.index')
                ->with('success', 'Biaya pendaftaran berhasil dihapus!');
        } catch (\Exception $e) {
            if (request()->ajax() || request()->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal menghapus biaya: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->route('admin.biaya-pendaftaran.index')
                ->with('error', 'Gagal menghapus biaya pendaftaran!');
        }
    }

    /**
     * Toggle status biaya (Support AJAX & Regular Request)
     */
    public function toggleStatus($id)
    {
        try {
            $biaya = BiayaPendaftaran::findOrFail($id);
            $oldStatus = $biaya->status;
            $newStatus = $biaya->status == 'aktif' ? 'nonaktif' : 'aktif';
            $biaya->status = $newStatus;
            $biaya->save();

            // Cek apakah request dari AJAX
            if (request()->ajax() || request()->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'new_status' => $newStatus,
                    'old_status' => $oldStatus,
                    'message' => 'Status biaya berhasil diubah menjadi ' . ($newStatus == 'aktif' ? 'Aktif' : 'Nonaktif')
                ]);
            }

            return redirect()->route('admin.biaya-pendaftaran.index')
                ->with('success', 'Status biaya pendaftaran berhasil diubah!');

        } catch (\Exception $e) {
            if (request()->ajax() || request()->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal mengubah status: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->route('admin.biaya-pendaftaran.index')
                ->with('error', 'Gagal mengubah status biaya pendaftaran!');
        }
    }
}
