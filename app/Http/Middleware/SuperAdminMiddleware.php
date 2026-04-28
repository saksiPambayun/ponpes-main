<?php
// app/Http/Middleware/SuperAdminMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SuperAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        if (auth()->user()->role !== 'superadmin') {
            if ($request->ajax() || $request->expectsJson()) {
                return response()->json(['error' => 'Unauthorized - Super Admin only'], 403);
            }
            return redirect()->route('admin.dashboard')->with('error', 'Hanya Super Admin yang memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
