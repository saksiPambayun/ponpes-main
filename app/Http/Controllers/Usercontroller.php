<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\SantriRegistration;
use App\Models\Gallery;
use App\Models\Fasilitas;
use App\Models\AktaWakaf;

class UserController extends Controller
{
    // ==================== DASHBOARD ====================
    public function dashboard()
    {
        $stats = [
            'santri_pending'  => SantriRegistration::where('status', 'pending')->count(),
            'santri_diterima' => SantriRegistration::where('status', 'diterima')->count(),
            'santri_ditolak'  => SantriRegistration::where('status', 'ditolak')->count(),
            'gallery_total'   => Gallery::where('is_active', true)->count(),
            'fasilitas_total' => Fasilitas::count(),
            'akta_wakaf_total'=> AktaWakaf::count(),
        ];

        $santriTerbaru = SantriRegistration::latest()->take(5)->get();

        return view('users.dashboard', compact('stats', 'santriTerbaru'));
    }

    // ==================== GALLERY ====================
    public function galleryIndex(Request $request)
    {
        $query = Gallery::where('is_active', true);
        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        $galleries = $query->orderBy('urut', 'asc')->paginate(12)->withQueryString();
        return view('users.gallery.index', compact('galleries'));
    }

    public function galleryShow(Gallery $gallery)
    {
        return view('users.gallery.show', compact('gallery'));
    }

    public function galleryDestroy(Gallery $gallery)
    {
        if ($gallery->gambar) {
            Storage::disk('public')->delete($gallery->gambar);
        }
        $gallery->delete();

        return redirect()->route('user.gallery.index')->with('success', 'Foto gallery berhasil dihapus.');
    }

    // ==================== FASILITAS ====================
    public function fasilitasIndex(Request $request)
    {
        $query = Fasilitas::query();
        if ($request->filled('search')) {
            $query->where('nama_fasilitas', 'like', '%' . $request->search . '%');
        }
        if ($request->filled('kondisi')) {
            $query->where('kondisi', $request->kondisi);
        }

        $fasilitas = $query->latest()->paginate(10)->withQueryString();
        $kategoriList = Fasilitas::select('kategori')->whereNotNull('kategori')->distinct()->pluck('kategori');

        return view('users.fasilitas.index', compact('fasilitas', 'kategoriList'));
    }

    public function fasilitasShow(Fasilitas $fasilitas)
    {
        return view('users.fasilitas.show', compact('fasilitas'));
    }

    // ==================== AKTA WAKAF ====================
    public function aktaWakafIndex()
    {
        $aktaWakaf = AktaWakaf::latest()->paginate(10);
        return view('users.akta-wakaf.index', compact('aktaWakaf'));
    }

    public function aktaWakafShow($id)
    {
        $aktaWakaf = AktaWakaf::findOrFail($id);
        return view('users.akta-wakaf.show', compact('aktaWakaf'));
    }

    // ==================== SANTRI (full CRUD) ====================
    public function santriIndex(Request $request)
    {
        $query = SantriRegistration::query();
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                  ->orWhere('nisn', 'like', "%{$search}%");
            });
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $santri = $query->latest()->paginate(10)->withQueryString();
        return view('users.santri.index', compact('santri'));
    }

    public function santriCreate()
    {
        return view('users.santri.create');
    }

    public function santriStore(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap'  => 'required|string|max:255',
            'nisn'          => 'nullable|string|max:50',
            'asal_sekolah'  => 'required|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'alamat'        => 'nullable|string',
            'email'         => 'nullable|email|max:255',
            'no_wali'       => 'required|string|max:20',
            'nama_wali'     => 'required|string|max:255',
            'pekerjaan'     => 'nullable|string|max:100',
            'dok_kk'        => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:20480',
            'dok_akta'      => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:20480',
        ]);

        if ($request->hasFile('dok_kk')) {
            $validated['dok_kk'] = $request->file('dok_kk')->store('santri/kk', 'public');
        }
        if ($request->hasFile('dok_akta')) {
            $validated['dok_akta'] = $request->file('dok_akta')->store('santri/akta', 'public');
        }

        $validated['status'] = 'pending';
        SantriRegistration::create($validated);

        return redirect()->route('user.santri.index')->with('success', 'Pendaftaran berhasil!');
    }

    public function santriShow($id)
    {
        $santri = SantriRegistration::findOrFail($id);
        return view('users.santri.show', compact('santri'));
    }

    public function santriEdit($id)
    {
        $santri = SantriRegistration::findOrFail($id);
        if ($santri->status !== 'pending') {
            return redirect()->route('user.santri.index')->with('error', 'Data sudah diproses.');
        }
        return view('users.santri.edit', compact('santri'));
    }

    public function santriUpdate(Request $request, $id)
    {
        $santri = SantriRegistration::findOrFail($id);
        if ($santri->status !== 'pending') {
            return redirect()->route('user.santri.index')->with('error', 'Data tidak bisa diubah.');
        }

        $validated = $request->validate([
            'nama_lengkap'  => 'required|string|max:255',
            'nisn'          => 'nullable|string|max:50',
            'asal_sekolah'  => 'required|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'alamat'        => 'nullable|string',
            'email'         => 'nullable|email|max:255',
            'no_wali'       => 'required|string|max:20',
            'nama_wali'     => 'required|string|max:255',
            'pekerjaan'     => 'nullable|string|max:100',
            'dok_kk'        => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:20480',
            'dok_akta'      => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:20480',
        ]);

        if ($request->hasFile('dok_kk')) {
            if ($santri->dok_kk) Storage::disk('public')->delete($santri->dok_kk);
            $validated['dok_kk'] = $request->file('dok_kk')->store('santri/kk', 'public');
        }
        if ($request->hasFile('dok_akta')) {
            if ($santri->dok_akta) Storage::disk('public')->delete($santri->dok_akta);
            $validated['dok_akta'] = $request->file('dok_akta')->store('santri/akta', 'public');
        }

        $santri->update($validated);
        return redirect()->route('user.santri.index')->with('success', 'Data diperbarui.');
    }

    public function santriDestroy($id)
    {
        $santri = SantriRegistration::findOrFail($id);
        if ($santri->dok_kk)   Storage::disk('public')->delete($santri->dok_kk);
        if ($santri->dok_akta) Storage::disk('public')->delete($santri->dok_akta);
        $santri->delete();

        return redirect()->route('user.santri.index')->with('success', 'Data dihapus.');
    }

    // ==================== PROFILE ====================
    public function profile()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone'   => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
        ]);

        $user->update($validated);
        return back()->with('success', 'Profil berhasil diperbarui.');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'password'         => 'required|min:6|confirmed',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->update(['password' => Hash::make($request->password)]);

        return back()->with('success', 'Password berhasil diubah.');
    }
}
