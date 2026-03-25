<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(Auth::attempt($credentials)){

            $request->session()->regenerate();

            $user = Auth::user();

            if($user->role == 'superadmin' || $user->role == 'admin'){
                return redirect()->route('admin.dashboard');
            }

            if($user->role == 'user'){
                return redirect()->route('user.dashboard');
            }
        }

        return back()->withErrors([
            'email'=>'Email atau password salah'
        ]);
    }

    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
