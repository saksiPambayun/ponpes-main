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

    // Home - dengan conditional tampilan (hanya tampil jika data cukup)// Home
public function home()
{
    $program = Program::latest()->take(3)->get();
    $fasilitas = Fasilitas::latest()->get();
    $galeri = Gallery::latest()->get();
    $profil = ProfilYayasan::first();

    return view('home_user', compact('program', 'fasilitas', 'galeri', 'profil'));
}

    // HAPUS METHOD legalitas() karena halaman legalitas dihapus dari user
    // public function legalitas() - HAPUS

    // Tentang - HAPUS bagian legalitas
    public function tentang()
    {
        $profil = ProfilYayasan::first();
        return view('public.tentang', compact('profil'));
    }

    // Galeri
// Gallery untuk user (user section)

public function galleryIndex()
{
    $galeri = Gallery::latest()->paginate(12);
    // dd($galeri->first());
    return view('user.gallery.index', compact('galeri'));
}
// Alias dari galleryIndex untuk kompatibilitas route
public function galeri()
{
    return $this->galleryIndex();
}

public function galleryShow($id)
{
    $gallery = Gallery::findOrFail($id);
    return view('user.gallery.show', compact('gallery'));
}   


    // Fasilitas
    public function fasilitas()
    {
        $fasilitas = Fasilitas::all();
        return view('public.fasilitas', compact('fasilitas'));
    }

    // Profil Yayasan
    public function profilYayasanIndex()
    {
        $profil = ProfilYayasan::first();
        return view('public.tentang', compact('profil'));
    }

   public function hubungi()
{
    // Ambil data profil, jika tidak ada berikan data default
    $profil = ProfilYayasan::first();

    // Jika $profil null, buat objek kosong dengan property default
    if (!$profil) {
        $profil = new \stdClass();
        $profil->telepon = 'Belum diisi';
        $profil->email = 'Belum diisi';
        $profil->alamat = 'Belum diisi';
    }

    return view('public.hubungi', compact('profil'));
}

    // Struktur
    public function strukturIndex()
    {
        $struktur = StrukturOrganisasi::all();
        return view('public.struktur', compact('struktur'));
    }
}
