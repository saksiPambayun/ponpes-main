<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\SkData;
use App\Models\AktaYayasan;
use App\Models\AktaWakaf;

class UserController extends Controller
{
    // ==================== HOME ====================

    public function home()
    {
        $stats = [
            'pegawai_aktif'      => Pegawai::where('status', 'aktif')->count(),
            'sk_total'           => SkData::count(),
            'akta_yayasan_total' => AktaYayasan::count(),
            'akta_wakaf_total'   => AktaWakaf::count(),
        ];

        // Ambil pegawai terbaru untuk ditampilkan di home
        $pegawaiTerbaru = Pegawai::where('status', 'aktif')
            ->latest()
            ->take(6)
            ->get();

        return view('user.home', compact('stats', 'pegawaiTerbaru'));
    }

    // ==================== PEGAWAI ====================

    public function pegawaiIndex(Request $request)
    {
        $query = Pegawai::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('nip', 'like', "%{$search}%")
                  ->orWhere('jabatan', 'like', "%{$search}%")
                  ->orWhere('divisi', 'like', "%{$search}%");
            });
        }

        if ($request->filled('jabatan')) {
            $query->where('jabatan', $request->jabatan);
        }

        if ($request->filled('divisi')) {
            $query->where('divisi', $request->divisi);
        }

        // User hanya bisa lihat pegawai aktif
        $query->where('status', 'aktif');

        $pegawai  = $query->latest()->paginate(12)->withQueryString();
        $jabatans = Pegawai::where('status', 'aktif')->whereNotNull('jabatan')->distinct()->pluck('jabatan');
        $divisis  = Pegawai::where('status', 'aktif')->whereNotNull('divisi')->distinct()->pluck('divisi');

        return view('user.pegawai.index', compact('pegawai', 'jabatans', 'divisis'));
    }

    public function pegawaiShow($id)
    {
        // Hanya tampilkan pegawai aktif ke user
        $pegawai = Pegawai::where('status', 'aktif')->findOrFail($id);
        return view('user.pegawai.show', compact('pegawai'));
    }

    // ==================== SK ====================

    public function skIndex(Request $request)
    {
        $query = SkData::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nomor_sk', 'like', "%{$search}%")
                  ->orWhere('tentang', 'like', "%{$search}%");
            });
        }

        $sk = $query->latest()->paginate(10)->withQueryString();

        return view('user.sk.index', compact('sk'));
    }

    public function skShow($id)
    {
        $sk = SkData::findOrFail($id);
        return view('user.sk.show', compact('sk'));
    }

    // ==================== AKTA YAYASAN ====================

    public function aktaYayasanIndex(Request $request)
    {
        $query = AktaYayasan::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nomor_akta', 'like', "%{$search}%")
                  ->orWhere('notaris', 'like', "%{$search}%");
            });
        }

        $aktaYayasan = $query->latest()->paginate(10)->withQueryString();

        return view('user.akta-yayasan.index', compact('aktaYayasan'));
    }

    public function aktaYayasanShow($id)
    {
        $aktaYayasan = AktaYayasan::findOrFail($id);
        return view('user.akta-yayasan.show', compact('aktaYayasan'));
    }

    // ==================== AKTA WAKAF ====================

    public function aktaWakafIndex(Request $request)
    {
        $query = AktaWakaf::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nomor_sertifikat', 'like', "%{$search}%")
                  ->orWhere('nazhir', 'like', "%{$search}%")
                  ->orWhere('lokasi_tanah', 'like', "%{$search}%");
            });
        }

        $aktaWakaf = $query->latest()->paginate(10)->withQueryString();

        return view('user.akta-wakaf.index', compact('aktaWakaf'));
    }

    public function aktaWakafShow($id)
    {
        $aktaWakaf = AktaWakaf::findOrFail($id);
        return view('user.akta-wakaf.show', compact('aktaWakaf'));
    }
}
