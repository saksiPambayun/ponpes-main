<?php
// app/Http/Middleware/AdminMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        Log::info('AdminMiddleware - Start', [
            'url' => $request->fullUrl(),
            'user_id' => auth()->id(),
            'role' => auth()->user()->role ?? 'guest'
        ]);

        if (!auth()->check()) {
            Log::warning('AdminMiddleware - User not authenticated, redirect to login');
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = auth()->user();

        // Admin atau superadmin diperbolehkan
        if ($user->role === 'admin' || $user->role === 'superadmin') {
            Log::info('AdminMiddleware - Access granted for role: ' . $user->role);
            return $next($request);
        }

        // User biasa ditolak
        Log::warning('AdminMiddleware - Access denied for role: ' . $user->role);
        if ($request->ajax() || $request->expectsJson()) {
            return response()->json(['error' => 'Unauthorized - Admin only'], 403);
        }

        return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman administrator.');
    }
}