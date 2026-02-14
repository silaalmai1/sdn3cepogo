<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminLogin
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user sudah login (ada session admin)
        if (!session()->has('admin')) {
            // Jika belum login, redirect ke halaman login
            return redirect('/login');
        }

        return $next($request);
    }
}
