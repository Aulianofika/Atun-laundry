<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsCustomer
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'customer') {
            return $next($request);
        }
        return redirect()->route('login')->with('error', 'Akses ditolak!');
    }
}
