<?php
    // app/Http/Controllers/Auth/LoginController.php

    namespace App\Http\Controllers\Auth;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use App\Models\User;
    use App\Services\OtpService;
    use Illuminate\Support\Facades\Session;

    class LoginController extends Controller
    {
        protected $otpService;

        public function __construct(OtpService $otpService)
        {
            $this->otpService = $otpService;
        }

        public function showLoginForm()
        {
            if (Auth::check()) {
                $user = Auth::user();
                if ($user->role === 'admin' || $user->role === 'superadmin') {
                    return redirect()->route('admin.dashboard');
                }
                // User biasa diarahkan ke HOME (halaman publik)
                return redirect()->route('home');
            }

            return view('auth.login');
        }

        public function login(Request $request)
        {
            $request->validate([
                'email'    => 'required|email',
                'password' => 'required',
            ]);

            $credentials = $request->only('email', 'password');
            $remember    = $request->boolean('remember');

            if (Auth::attempt($credentials, $remember)) {
                $request->session()->regenerate();

                $user = Auth::user();

                // Cek status user
                if ($user->status === 'inactive') {
                    Auth::logout();
                    return back()->withErrors([
                        'email' => 'Akun Anda tidak aktif. Hubungi administrator.',
                    ])->onlyInput('email');
                }

                // Jika user belum verifikasi OTP
              // ========== OTP HANYA UNTUK USER (BUKAN ADMIN/SUPERADMIN) ==========
// Superadmin dan admin LANGSUNG login, TANPA OTP
if ($user->role === 'user' && !$user->is_verified) {
    Session::put('temp_user_id', $user->id);
    Auth::logout();

    // Kirim OTP verifikasi
    $otp = $this->otpService->generateOtp();
    $identifier = $user->email;
    $type = 'email';

    // Cek apakah user punya WhatsApp number
    if ($user->whatsapp_number) {
        $this->otpService->sendViaWhatsApp($user->whatsapp_number, $otp, 'verify');
        $identifier = $user->whatsapp_number;
        $type = 'whatsapp';
    } else {
        $this->otpService->sendViaBrevo($identifier, $otp, 'verify');
    }

    return redirect()->route('otp.verify.form', [
        'purpose' => 'verify',
        'identifier' => $identifier,
        'type' => $type
    ])->with('warning', 'Akun Anda belum diverifikasi. Silakan verifikasi terlebih dahulu.');
}
// ========== END OTP KHUSUS USER ==========

                // Redirect berdasarkan role
                if ($user->role === 'admin' || $user->role === 'superadmin') {
                    return redirect()->intended(route('admin.dashboard'));
                }

                // USER BIASA: redirect ke HOME (halaman publik)
                return redirect()->intended(route('home'));
            }

            return back()->withErrors([
                'email' => 'Email atau password yang Anda masukkan salah.',
            ])->onlyInput('email');
        }

        public function showOtpForm(Request $request, $purpose)
        {
            $identifier = $request->query('identifier');
            $type = $request->query('type', 'email');

            return view('auth.otp-verify', compact('purpose', 'identifier', 'type'));
        }

       public function sendOtp(Request $request)
{
    $request->validate([
        'identifier' => 'required',
        'type' => 'required|in:email,whatsapp',
        'purpose' => 'required|in:login,register,verify',
    ]);

    $otp = $this->otpService->generateOtp();

    if ($request->type === 'email') {
        // Ganti sendViaEmail dengan sendViaBrevo
        $success = $this->otpService->sendViaBrevo($request->identifier, $otp, $request->purpose);
        $message = 'Kode OTP telah dikirim ke email Anda.';
    } else {
        $success = $this->otpService->sendViaWhatsApp($request->identifier, $otp, $request->purpose);
        $message = 'Kode OTP telah dikirim ke WhatsApp Anda.';
    }

    if ($success) {
        Session::put('otp_identifier', $request->identifier);
        Session::put('otp_purpose', $request->purpose);
        return response()->json(['success' => true, 'message' => $message]);
    }

    return response()->json(['success' => false, 'message' => 'Gagal mengirim OTP. Silakan coba lagi.'], 500);
}
        public function checkOtp(Request $request)
    {
        $request->validate([
            'identifier' => 'required',
            'otp' => 'required',
            'purpose' => 'required',
        ]);

        $status = $this->otpService->checkOtpStatus(
            $request->identifier,
            $request->otp,
            $request->purpose
        );

        return response()->json($status);
    }

    public function verifyOtp(Request $request)
    {
        \Log::info('========== OTP VERIFICATION ATTEMPT ==========');
        \Log::info('Request data:', $request->all());

        $request->validate([
            'otp' => 'required|string|size:6',
            'identifier' => 'required',
            'purpose' => 'required|in:login,register,verify',
        ]);

        // Normalisasi identifier untuk nomor WhatsApp
        $identifier = $request->identifier;
        if ($request->purpose === 'register' && preg_match('/^0[0-9]{10,12}$/', $identifier)) {
            // Ubah 082245102915 menjadi 6282245102915
            $identifier = '62' . substr($identifier, 1);
            \Log::info('Identifier normalized from ' . $request->identifier . ' to ' . $identifier);
        }

        $verified = $this->otpService->verifyOtp(
            $identifier,
            $request->otp,
            $request->purpose
        );

        \Log::info('Verification result: ' . ($verified ? 'SUCCESS' : 'FAILED'));

        if ($verified) {
            if ($request->purpose === 'register') {
                $userData = Session::get('pending_registration');
                if ($userData) {
                    $user = User::create($userData);
                    Session::forget('pending_registration');
                    Auth::login($user);

                    return response()->json([
                        'success' => true,
                        'redirect' => route('home'),
                        'message' => 'Registrasi berhasil!'
                    ]);
                }
            } elseif ($request->purpose === 'verify') {
                $tempUserId = Session::get('temp_user_id');
                if ($tempUserId) {
                    $user = User::find($tempUserId);
                    if ($user) {
                        $user->update([
                            'is_verified' => true,
                            'verified_at' => now(),
                        ]);
                        Session::forget('temp_user_id');
                        Auth::login($user);

                        $redirect = ($user->role === 'admin' || $user->role === 'superadmin')
                            ? route('admin.dashboard')
                            : route('home');

                        return response()->json([
                            'success' => true,
                            'redirect' => $redirect,
                            'message' => 'Verifikasi berhasil!'
                        ]);
                    }
                }
            }
        }

        return response()->json([
            'success' => false,
            'message' => 'Kode OTP tidak valid atau sudah kadaluarsa.'
        ], 422);
    }


        public function logout(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('home');
        }
    }
