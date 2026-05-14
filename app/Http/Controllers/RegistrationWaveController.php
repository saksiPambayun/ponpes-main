<?php
// app/Http/Controllers/Admin/RegistrationWaveController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RegistrationWave;
use App\Models\SantriRegistration;
use Illuminate\Http\Request;

class RegistrationWaveController extends Controller
{
    public function index()
    {
        $waves = RegistrationWave::withCount('registrations')->latest()->paginate(10);
        $activeWaves = RegistrationWave::where('is_active', true)->count();

        return view('admin.pendaftaran.waves.index', compact('waves', 'activeWaves'));
    }

    public function create()
    {
        return view('admin.pendaftaran.waves.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'is_active' => 'boolean',
            'description' => 'nullable|string',
            'quota' => 'nullable|integer|min:1',
        ]);

        RegistrationWave::create($validated);

        return redirect()->route('admin.pendaftaran.waves.index')
            ->with('success', 'Gelombang pendaftaran berhasil ditambahkan.');
    }

    public function edit(RegistrationWave $wave)
    {
        return view('admin.pendaftaran.waves.edit', compact('wave'));
    }

    public function update(Request $request, RegistrationWave $wave)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'is_active' => 'boolean',
            'description' => 'nullable|string',
            'quota' => 'nullable|integer|min:1',
        ]);

        $wave->update($validated);

        return redirect()->route('admin.pendaftaran.waves.index')
            ->with('success', 'Gelombang pendaftaran berhasil diupdate.');
    }

    public function destroy(RegistrationWave $wave)
    {
        // Cek apakah ada pendaftaran yang terkait
        if ($wave->registrations()->count() > 0) {
            return back()->with('error', 'Tidak dapat menghapus gelombang yang sudah memiliki pendaftaran.');
        }

        $wave->delete();
        return redirect()->route('admin.pendaftaran.waves.index')
            ->with('success', 'Gelombang pendaftaran berhasil dihapus.');
    }

    public function toggleActive(RegistrationWave $wave)
    {
        // Jika ingin mengaktifkan, nonaktifkan yang lain dulu
        if (!$wave->is_active) {
            RegistrationWave::where('is_active', true)->update(['is_active' => false]);
        }

        $wave->update(['is_active' => !$wave->is_active]);

        $status = $wave->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return back()->with('success', "Gelombang pendaftaran berhasil {$status}.");
    }

    public function processAcceptance(Request $request, $id)
    {
        $santri = SantriRegistration::findOrFail($id);

        $request->validate([
            'acceptance_status' => 'required|in:accepted,rejected,waiting_list',
            'acceptance_note' => 'nullable|string',
            'announcement_date' => 'nullable|date'
        ]);

        $santri->update([
            'acceptance_status' => $request->acceptance_status,
            'acceptance_note' => $request->acceptance_note,
            'announcement_date' => $request->announcement_date ?? now(),
            'status' => $request->acceptance_status === 'accepted' ? 'diterima' :
                       ($request->acceptance_status === 'rejected' ? 'ditolak' : 'pending')
        ]);

        return redirect()->route('admin.santri.show', $santri->id)
            ->with('success', 'Status penerimaan santri berhasil diupdate.');
    }

    public function bulkAcceptance(Request $request)
    {
        $request->validate([
            'santri_ids' => 'required|array',
            'santri_ids.*' => 'exists:santri_registrations,id',
            'acceptance_status' => 'required|in:accepted,rejected,waiting_list'
        ]);

        $count = SantriRegistration::whereIn('id', $request->santri_ids)->update([
            'acceptance_status' => $request->acceptance_status,
            'announcement_date' => now(),
            'status' => $request->acceptance_status === 'accepted' ? 'diterima' :
                       ($request->acceptance_status === 'rejected' ? 'ditolak' : 'pending')
        ]);

        $statusText = [
            'accepted' => 'diterima',
            'rejected' => 'ditolak',
            'waiting_list' => 'dimasukkan ke waiting list'
        ];

        return back()->with('success', "{$count} pendaftar berhasil {$statusText[$request->acceptance_status]}.");
    }

    public function announcementIndex()
    {
        $waves = RegistrationWave::withCount('registrations')->get();
        $registrations = SantriRegistration::with('wave')
            ->whereNotNull('acceptance_status')
            ->where('acceptance_status', '!=', 'pending')
            ->latest()
            ->paginate(20);

        return view('admin.pendaftaran.announcement.index', compact('waves', 'registrations'));
    }

    public function publishAnnouncement(Request $request, RegistrationWave $wave)
    {
        $request->validate([
            'announcement_text' => 'required|string',
            'publish_date' => 'required|date'
        ]);

        // Simpan pengumuman (bisa dibuat model terpisah, atau simpan di session/cache)
        session()->put('announcement_' . $wave->id, [
            'text' => $request->announcement_text,
            'date' => $request->publish_date
        ]);

        return redirect()->route('admin.pendaftaran.announcement.index')
            ->with('success', 'Pengumuman berhasil dipublikasikan.');
    }
}
