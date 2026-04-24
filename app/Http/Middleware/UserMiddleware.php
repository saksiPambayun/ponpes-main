<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        // Jika admin/superadmin coba akses user area, redirect ke admin dashboard
        if ($user->role === 'admin' || $user->role === 'superadmin') {
            return redirect()->route('admin.dashboard')
                ->with('error', 'Anda adalah admin, tidak bisa mengakses halaman user.');
        }

        // Jika role user, lanjutkan
        if ($user->role === 'user') {
            return $next($request);
        }

        // Role tidak dikenal
        abort(403, 'Akses ditolak.');
    }
}
