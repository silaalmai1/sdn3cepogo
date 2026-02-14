<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GuestAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Kalau SUDAH login, jangan ke halaman login
        // Arahkan ke dashboard (/admin) saja
        if (session()->has('admin')) {
            return redirect('/admin');
        }

        // Kalau BELUM login, tampilkan halaman login
        return $next($request);
    }
}
