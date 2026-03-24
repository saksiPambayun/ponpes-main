<?php
// app/Http/Middleware/AdminMiddleware.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'admin' && Auth::user()->status === 'active') {
            return $next($request);
        }

        return redirect()->route('login')->with('error', 'Unauthorized access.');
    }
}