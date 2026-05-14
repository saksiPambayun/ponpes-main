<?php
// app/Http/Middleware/UserMiddleware.php

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
        $allowedRoles = ['user', 'admin', 'superadmin']; // SEMUA ROLE diizinkan

        if (in_array($user->role, $allowedRoles)) {
            return $next($request);
        }

        abort(403, 'Akses ditolak.');
    }
}