<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\DB;      
use Illuminate\Support\Facades\Hash;

Route::get('/', function () {
    return view('home'); 
});
 Route::get('/tentang', function () {
    return view('tentang');
});
Route::get('/prestasi', function () {
    return view('prestasi');
});
Route::get('/prestasi-detail', function () {
    return view('prestasi-detail');
});



Route::middleware('guestAdmin')->group(function () {
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);

});

Route::get('/logout', [LoginController::class, 'logout']);
Route::middleware('adminLogin')->group(function () {
Route::get('/admin', function () {
        return view('admin.dashboard');
    });
    
   

});
