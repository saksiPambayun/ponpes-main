<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = Auth::user();

        // Hanya admin dan superadmin yang bisa akses
        if ($user->role === 'admin' || $user->role === 'superadmin') {
            return $next($request);
        }

        // User biasa (role user) - TOLAK akses dan redirect ke home
        return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman administrator.');
    }
}
