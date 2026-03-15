<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Prestasi;
use App\Models\Guru;

class HomeController extends Controller
{
    public function index()
    {
        $beritaTerbaru = Berita::where('is_published', true)
            ->orderByDesc('tanggal_publikasi')
            ->latest()
            ->take(3)
            ->get();
        $prestasiTerbaru = Prestasi::latest('tahun')->take(3)->get();
        $totalGuru = Guru::count();
        $totalPrestasi = Prestasi::count();
        
        return view('home', compact('beritaTerbaru', 'prestasiTerbaru', 'totalGuru', 'totalPrestasi'));
    }
}
