<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login'); // pastikan view ini ada
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect('/home');
        }

        return back()->with('error', 'Login gagal');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}