<?php
// app/Http/Middleware/AdminMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = auth()->user();

        // Admin atau superadmin diperbolehkan
        if ($user->role === 'admin' || $user->role === 'superadmin') {
            return $next($request);
        }

        // User biasa ditolak
        if ($request->ajax() || $request->expectsJson()) {
            return response()->json(['error' => 'Unauthorized - Admin only'], 403);
        }

        return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman administrator.');
    }
}