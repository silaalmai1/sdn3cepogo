<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $user = DB::table('users')
            ->where('email', $request->email)
            ->first();

            if($user && Hash::check($request->password, $user->password)){
                session(['admin' => $user->email]);
                return redirect('/admin');
            }
            return back()->with('error', 'Email atau password salah');
            }
            public function logout()
            {
                session()->forget('admin');
                return redirect('/login');
            }
}

