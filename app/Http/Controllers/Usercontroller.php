<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SantriRegistration;
use App\Models\AktaWakaf;
use App\Models\Gallery;
use App\Models\Fasilitas;
use App\Models\Notification;

class UserController extends Controller
{

    public function dashboard()
    {

        $user = Auth::user();

        $santri = SantriRegistration::where('user_id',$user->id)->first();

        return view('user.dashboard',[
            'santri'=>$santri
        ]);
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function updateProfile(Request $request)
    {

        $user = Auth::user();

        $validated = $request->validate([
            'name'=>'required',
            'email'=>'required|email'
        ]);

        $user->update($validated);

        return back()->with('success','Profile berhasil diupdate');
    }


    public function santriIndex()
    {

        $santri = SantriRegistration::where('user_id',Auth::id())->get();

        return view('user.santri.index',compact('santri'));
    }

    public function santriCreate()
    {
        return view('user.santri.create');
    }

    public function santriStore(Request $request)
    {

        $validated = $request->validate([
            'nama_lengkap'=>'required',
            'asal_sekolah'=>'required',
            'no_wali'=>'required'
        ]);

        $validated['user_id'] = Auth::id();
        $validated['status'] = 'pending';

        SantriRegistration::create($validated);

        return redirect()->route('user.santri.index')
        ->with('success','Pendaftaran berhasil menunggu verifikasi admin');
    }

    public function santriEdit($id)
    {

        $santri = SantriRegistration::where('user_id',Auth::id())
        ->findOrFail($id);

        return view('user.santri.edit',compact('santri'));
    }

    public function santriUpdate(Request $request,$id)
    {

        $santri = SantriRegistration::where('user_id',Auth::id())
        ->findOrFail($id);

        $santri->update($request->all());

        return redirect()->route('user.santri.index')
        ->with('success','Data berhasil diupdate');
    }

    public function santriDestroy($id)
    {

        $santri = SantriRegistration::where('user_id',Auth::id())
        ->findOrFail($id);

        $santri->delete();

        return back()->with('success','Data dihapus');
    }
    public function notifications()
{

    $notifications = Notification::where('user_id',Auth::id())
    ->latest()
    ->get();

    return view('user.notifications.index',compact('notifications'));
}

    public function galleryIndex()
    {
        $gallery = Gallery::latest()->get();

        return view('user.gallery.index',compact('gallery'));
    }

    public function fasilitasIndex()
    {
        $fasilitas = Fasilitas::latest()->get();

        return view('user.fasilitas.index',compact('fasilitas'));
    }

    public function aktaWakafIndex()
    {
        $akta = AktaWakaf::latest()->get();

        return view('user.akta.index',compact('akta'));
    }
}
