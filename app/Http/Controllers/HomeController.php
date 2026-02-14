<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use App\Models\Guru;

class HomeController extends Controller
{
    public function index()
    {
        $prestasiTerbaru = Prestasi::latest('tahun')->take(3)->get();
        $totalGuru = Guru::count();
        $totalPrestasi = Prestasi::count();
        
        return view('home', compact('prestasiTerbaru', 'totalGuru', 'totalPrestasi'));
    }
}
