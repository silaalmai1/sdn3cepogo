<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\DB;      
use Illuminate\Support\Facades\Hash;

Route::get('/', [HomeController::class, 'index']);
 Route::get('/tentang', function () {
    return view('tentang');
});
Route::get('/guru', [GuruController::class, 'showPublic'])->name('guru');
Route::get('/prestasi', [PrestasiController::class, 'showPublic'])->name('prestasi');

Route::get('/prestasi/{slug}', [PrestasiController::class, 'showDetail'])->name('prestasi.detail');
// Galeri public
Route::get('/galeri', [\App\Http\Controllers\GaleriController::class, 'showPublic'])->name('galeri');



Route::middleware('guestAdmin')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [LoginController::class, 'registerIndex'])->name('register');
    Route::post('/register', [LoginController::class, 'register']);
});

Route::get('/logout', [LoginController::class, 'logout']);

// Admin Routes (Protected)
Route::middleware('adminLogin')->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard', [
            'totalPrestasi' => \App\Models\Prestasi::count(),
            'totalGuru' => \App\Models\Guru::count(),
            'totalUsers' => \Illuminate\Support\Facades\DB::table('users')->count(),
        ]);
    });

    // Admin Prestasi Routes
    Route::get('/admin/prestasi', [PrestasiController::class, 'index']);
    Route::get('/admin/prestasi/create', [PrestasiController::class, 'create']);
    Route::post('/admin/prestasi/store', [PrestasiController::class, 'store']);
    Route::get('/admin/prestasi/{id}/edit', [PrestasiController::class, 'edit']);
    Route::post('/admin/prestasi/{id}/update', [PrestasiController::class, 'update']);
    Route::post('/admin/prestasi/{id}/delete', [PrestasiController::class, 'destroy']);

    // Admin Galeri Routes
    Route::get('/admin/galeri', [\App\Http\Controllers\GaleriController::class, 'index']);
    Route::get('/admin/galeri/create', [\App\Http\Controllers\GaleriController::class, 'create']);
    Route::post('/admin/galeri/store', [\App\Http\Controllers\GaleriController::class, 'store']);
    Route::get('/admin/galeri/{id}/edit', [\App\Http\Controllers\GaleriController::class, 'edit']);
    Route::post('/admin/galeri/{id}/update', [\App\Http\Controllers\GaleriController::class, 'update']);
    Route::post('/admin/galeri/{id}/delete', [\App\Http\Controllers\GaleriController::class, 'destroy']);

    // Admin Guru Routes
    Route::get('/admin/guru', [GuruController::class, 'index']);
    Route::get('/admin/guru/create', [GuruController::class, 'create']);
    Route::post('/admin/guru/store', [GuruController::class, 'store']);
    Route::get('/admin/guru/{id}/edit', [GuruController::class, 'edit']);
    Route::post('/admin/guru/{id}/update', [GuruController::class, 'update']);
    Route::post('/admin/guru/{id}/delete', [GuruController::class, 'destroy']);
});


