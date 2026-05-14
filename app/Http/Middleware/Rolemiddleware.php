<?php
// app/Http/Middleware/RoleMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle request dengan multiple role
     * Usage: ->middleware('role:admin|superadmin')
     */
    public function handle(Request $request, Closure $next, string $roles)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $allowedRoles = explode('|', $roles);

        if (in_array(auth()->user()->role, $allowedRoles)) {
            return $next($request);
        }

        abort(403, 'Akses ditolak. Anda tidak memiliki role yang diperlukan.');
    }
}
