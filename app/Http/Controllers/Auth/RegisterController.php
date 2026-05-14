<?php
// app/Http/Controllers/Auth/RegisterController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\OtpService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    protected $otpService;

    public function __construct(OtpService $otpService)
    {
        $this->otpService = $otpService;
    }

    public function showRegister()
    {
        // Jika sudah login, redirect ke home
        if (auth()->check()) {
            $user = Auth::user();
            if ($user->role === 'admin' || $user->role === 'superadmin') {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('home');
        }
        return view('auth.register');
    }

   public function register(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
        'phone' => 'nullable|string|max:20',
        'whatsapp_number' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:500',
        'otp_method' => 'required|in:email,whatsapp',
    ]);

    // Hanya role 'user' yang bisa register via form
    // Admin dan superadmin hanya dibuat oleh superadmin melalui dashboard

    $userData = [
        'name' => $validated['name'],
        'username' => $validated['username'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'role' => 'user', // HARUS user, BUKAN admin/superadmin!
        'status' => 'active',
        'phone' => $request->phone,
        'whatsapp_number' => $request->whatsapp_number,
        'address' => $request->address,
        'is_verified' => false, // user perlu verifikasi OTP
    ];

    // Kirim OTP hanya untuk user
    $otp = $this->otpService->generateOtp();
    $identifier = $request->otp_method === 'email' ? $request->email : $request->whatsapp_number;

    if ($request->otp_method === 'email') {
        $success = $this->otpService->sendViaBrevo($identifier, $otp, 'register');
    } else {
        $success = $this->otpService->sendViaWhatsApp($identifier, $otp, 'register');
    }


        if ($success) {
            // Store user data temporarily
            Session::put('pending_registration', $userData);
            Session::put('otp_identifier', $identifier);
            Session::put('otp_purpose', 'register');

            return redirect()->route('otp.verify.form', [
                'purpose' => 'register',
                'identifier' => $identifier,
                'type' => $request->otp_method
            ])->with('success', 'Kode OTP telah dikirim ke ' . ($request->otp_method === 'email' ? 'email' : 'WhatsApp') . ' Anda. Silakan verifikasi.');
        }

        return back()->withErrors(['otp_method' => 'Gagal mengirim OTP. Silakan coba lagi.']);
    }
}
