<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        // Hanya admin dan superadmin yang bisa akses
        if ($user->role === 'admin' || $user->role === 'superadmin') {
            return $next($request);
        }

        // User biasa tidak bisa akses halaman admin
        abort(403, 'Akses ditolak. Halaman ini hanya untuk administrator.');
    }
}
