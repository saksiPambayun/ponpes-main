<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // TAMPILKAN HALAMAN REGISTER
    public function register()
    {
        return view('admin.auth.register');
    }

    // PROSES REGISTER
    public function registerProcess(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users', // ✅ WAJIB
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed', // ✅ pakai confirmed
            'phone' => 'nullable|max:20',
            'address' => 'nullable|max:255',
        ]);


        return redirect()->route('login')
            ->with('success', 'Register berhasil, silakan login');
    }
}
