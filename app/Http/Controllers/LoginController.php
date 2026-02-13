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
        // 🔒 validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // cek user di database
        $user = DB::table('users')
            ->where('email', $request->email)
            ->first();

        // cek password hash
        if ($user && Hash::check($request->password, $user->password)) {

            // 🔒 keamanan session
            $request->session()->regenerate();

            // simpan session login
            session([
                'admin' => true,
                'email' => $user->email
            ]);

            return redirect('/admin');
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function logout()
    {
        session()->flush(); // hapus semua session
        return redirect('/login');
    }
}
