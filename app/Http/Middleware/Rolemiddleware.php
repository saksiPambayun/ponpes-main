<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $userRole = auth()->user()->role;
        $allowedRoles = explode('|', $role); // support multiple roles: 'admin|superadmin'

        // Jika user memiliki role yang diizinkan
        if (in_array($userRole, $allowedRoles)) {
            return $next($request);
        }

        // Jika tidak memiliki akses, redirect berdasarkan role
        if ($userRole === 'admin' || $userRole === 'superadmin') {
            return redirect()->route('admin.dashboard')
                ->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
        }

        // User biasa
        return redirect()->route('home')
            ->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
    }
}
