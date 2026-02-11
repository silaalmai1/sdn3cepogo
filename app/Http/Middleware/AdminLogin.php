<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminLogin
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('admin')) {
            return redirect('/login');
        }

        return $next($request);
    }
}
