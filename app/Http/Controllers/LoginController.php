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
        return redirect('/');
    }

    public function registerIndex()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // 🔒 validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        // cek apakah email sudah terdaftar
        $existingUser = DB::table('users')
            ->where('email', $request->email)
            ->first();

        if ($existingUser) {
            return back()->with('error', 'Email sudah terdaftar');
        }

        // buat user baru
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/login')->with('success', 'Akun berhasil dibuat! Silakan login');
    }
}
