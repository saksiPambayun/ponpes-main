<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\AktaWakaf;
use App\Models\AktaYayasan;
use App\Models\Fasilitas;
use App\Models\Gallery;
use App\Models\ProfilYayasan;
use App\Models\Program;
use App\Models\SantriRegistration;
use App\Models\SkData;
use App\Models\StrukturOrganisasi;
use App\Models\Notification;
use App\Traits\NotifiableTrait;

class UserController extends Controller
{
    // Dashboard
    public function dashboard()
    {
        $user = Auth::user();
        $pendingSantri = SantriRegistration::where('user_id', $user->id)->where('status', 'pending')->count();
        $acceptedSantri = SantriRegistration::where('user_id', $user->id)->where('status', 'diterima')->count();
        $rejectedSantri = SantriRegistration::where('user_id', $user->id)->where('status', 'ditolak')->count();
        $recentSantri = SantriRegistration::where('user_id', $user->id)->latest()->limit(5)->get();

        return view('user.dashboard', compact('user', 'pendingSantri', 'acceptedSantri', 'rejectedSantri', 'recentSantri'));
    }

    // Profile
    public function profile()
    {
        $user = Auth::user();
        return view('user.profil.index', compact('user'));
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('user.profil.edit', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
        ]);

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('user.profile')->with('success', 'Profil berhasil diupdate!');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Password saat ini salah!');
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password berhasil diubah!');
    }

    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            if ($user->avatar && file_exists(storage_path('app/public/' . $user->avatar))) {
                unlink(storage_path('app/public/' . $user->avatar));
            }

            $file = $request->file('avatar');
            $filename = time() . '_' . $user->id . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('avatars', $filename, 'public');
            $user->update(['avatar' => $path]);
        }

        return back()->with('success', 'Avatar berhasil diupload!');
    }

    // Home

    public function home()
    {
        $program = Program::latest()->take(3)->get(); // ✅ HARUS get()
        $fasilitas = Fasilitas::latest()->take(6)->get();
        $galeri = Gallery::latest()->take(3)->get();

        return view('public.home_user', compact('program', 'fasilitas', 'galeri'));
    }

    // Legalitas
    public function legalitas()
    {
        $aktaYayasan = AktaYayasan::latest()->first();
        $aktaWakaf = AktaWakaf::latest()->first();
        $sk = SkData::latest()->first();

        return view('public.legalitas', compact('aktaYayasan', 'aktaWakaf', 'sk'));
    }

    // Tentang
    public function tentang()
    {
        $aktaYayasan = AktaYayasan::latest()->first();
        $aktaWakaf = AktaWakaf::latest()->first();
        $sk = SkData::latest()->first();

        return view('public.tentang', compact('aktaYayasan', 'aktaWakaf', 'sk'));
    }

    // Santri
    public function santriIndex()
    {
        $santri = SantriRegistration::where('user_id', Auth::id())->latest()->paginate(10);
        return view('user.santri.index', compact('santri'));
    }

    public function santriCreate()
    {
        return view('user.santri.create');
    }

    // public function santriStore(Request $request)
    // {
    //     $request->validate([
    //         'nama_lengkap' => 'required|string|max:255',
    //         'nisn' => 'nullable|string|max:50',
    //         'asal_sekolah' => 'nullable|string|max:255',
    //         'tanggal_lahir' => 'nullable|date',
    //         'alamat' => 'nullable|string',
    //         'email' => 'nullable|email',
    //         'no_wali' => 'nullable|string|max:20',
    //     ]);

    //     SantriRegistration::create([
    //         'user_id' => Auth::id(),
    //         'nama_lengkap' => $request->nama_lengkap,
    //         'nisn' => $request->nisn,
    //         'asal_sekolah' => $request->asal_sekolah,
    //         'tanggal_lahir' => $request->tanggal_lahir,
    //         'alamat' => $request->alamat,
    //         'email' => $request->email,
    //         'no_wali' => $request->no_wali,
    //         'status' => 'pending',
    //     ]);

    //     return redirect()->route('user.santri.index')->with('success', 'Pendaftaran santri berhasil!');
    // }

    public function store(Request $request)
    {
        // upload file
        $kk = $request->file('kk')?->store('kk', 'public');
        $foto = $request->file('foto')?->store('foto', 'public');

        \App\Models\Santri::create([
            'nama_lengkap' => $request->nama_lengkap,
            'asal_sekolah' => $request->asal_sekolah,
            'nisn' => $request->nisn,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,

            'nama_wali' => $request->nama_wali,
            'no_wali' => $request->no_wali,
            'email' => $request->email,

            'kk' => $kk,
            'foto' => $foto,
        ]);

        return back()->with('success', 'Pendaftaran berhasil!');
    }

    public function santriShow($id)
    {
        $santri = SantriRegistration::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('user.santri.show', compact('santri'));
    }

    public function santriEdit($id)
    {
        $santri = SantriRegistration::where('id', $id)->where('user_id', Auth::id())->where('status', 'pending')->firstOrFail();
        return view('user.santri.edit', compact('santri'));
    }

    public function santriUpdate(Request $request, $id)
    {
        $santri = SantriRegistration::where('id', $id)->where('user_id', Auth::id())->where('status', 'pending')->firstOrFail();
        $santri->update($request->all());
        return redirect()->route('user.santri.index')->with('success', 'Data santri berhasil diupdate!');
    }

    public function santriDestroy($id)
    {
        $santri = SantriRegistration::where('id', $id)->where('user_id', Auth::id())->where('status', 'pending')->firstOrFail();
        $santri->delete();
        return redirect()->route('user.santri.index')->with('success', 'Data santri berhasil dihapus!');
    }

    // Gallery
    // public function galleryIndex()
    // {
    //     $galleries = Gallery::latest()->paginate(12);
    //     return view('user.gallery.index', compact('galleries'));
    // }

    // public function galleryShow($id)
    // {
    //     $gallery = Gallery::findOrFail($id);
    //     return view('user.gallery.show', compact('gallery'));
    // }

    // Galeri
    public function galeri()
    {
        $galeri = Gallery::first()->get();
        return view('public.galeri', compact('galeri'));
    }


    // Fasilitas
    public function fasilitas()
    {
        $fasilitas = Fasilitas::first()->get();

        return view('public.fasilitas', compact('fasilitas'));
    }

    // Profil Yayasan
    public function profilYayasanIndex()
    {
        $profil = ProfilYayasan::first();
        $aktaYayasan = AktaYayasan::first();
        $aktaWakaf = AktaWakaf::first();
        $sk = SkData::latest()->first();

        return view('public.tentang', compact('profil', 'aktaYayasan', 'aktaWakaf', 'sk'));
    }


    //     // Program
    //     public function programIndex()
    //     {
    //         $programs = Program::latest()->paginate(10);
    //         return view('user.program.index', compact('programs'));
    //     }

    //     public function programShow($id)
    //     {
    //         $program = Program::findOrFail($id);
    //         return view('user.program.show', compact('program'));
    //     }

    //     // Struktur Organisasi
    //     public function strukturIndex()
    //     {
    //         $struktur = StrukturOrganisasi::latest()->get();
    //         return view('user.struktur.index', compact('struktur'));
    //     }

    //     public function strukturShow($id)
    //     {
    //         $struktur = StrukturOrganisasi::findOrFail($id);
    //         return view('user.struktur.show', compact('struktur'));
    //     }



    //     public function profilYayasanShow($id)
    //     {
    //         $profil = ProfilYayasan::findOrFail($id);
    //         return view('user.profil-yayasan.show', compact('profil'));
    //     }

    //     // Akta Yayasan
    //     public function aktaYayasanIndex()
    //     {
    //         $akta = AktaYayasan::latest()->paginate(10);
    //         return view('user.akta-yayasan.index', compact('akta'));
    //     }

    //     public function aktaYayasanShow($id)
    //     {
    //         $akta = AktaYayasan::findOrFail($id);
    //         return view('user.akta-yayasan.show', compact('akta'));
    //     }

    //     // Akta Wakaf
    //     public function aktaWakafIndex()
    //     {
    //         $akta = AktaWakaf::latest()->paginate(10);
    //         return view('user.akta-wakaf.index', compact('akta'));
    //     }

    //     public function aktaWakafShow($id)
    //     {
    //         $akta = AktaWakaf::findOrFail($id);
    //         return view('user.akta-wakaf.show', compact('akta'));
    //     }

    //     public function notifications()
    //     {
    //         $notifications = Notification::where('user_id', Auth::id())
    //             ->latest()
    //             ->paginate(10);

    //         // Tandai semua sebagai sudah dibaca
    //         Notification::where('user_id', Auth::id())
    //             ->whereNull('read_at')
    //             ->update(['read_at' => now()]);

    //         return view('user.notification.index', compact('notifications'));
    //     }

    //     public function getUnreadNotifications()
    //     {
    //         $unreadCount = Notification::where('user_id', Auth::id())
    //             ->whereNull('read_at')
    //             ->count();

    //         $unreadNotifications = Notification::where('user_id', Auth::id())
    //             ->whereNull('read_at')
    //             ->latest()
    //             ->take(5)
    //             ->get();

    //         return response()->json([
    //             'count' => $unreadCount,
    //             'notifications' => $unreadNotifications
    //         ]);
    //     }

    //     public function markAsRead($id)
    //     {
    //         $notification = Notification::where('id', $id)
    //             ->where('user_id', Auth::id())
    //             ->firstOrFail();

    //         $notification->update(['read_at' => now()]);

    //         return response()->json(['success' => true]);
    //     }

    //     public function markAllRead()
    //     {
    //         Notification::where('user_id', Auth::id())
    //             ->whereNull('read_at')
    //             ->update(['read_at' => now()]);

    //         return back()->with('success', 'Semua notifikasi telah ditandai dibaca');
    //     }
    // }
}
