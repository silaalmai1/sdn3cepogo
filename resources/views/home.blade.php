@extends('layouts.app')

@section('content')
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="container hero-content text-center text-white">
            <p class="hero-subtitle">
                Selamat Datang di Website
            </p>
            <h1 class="hero-title">
                SD Negeri 1-3 Cepogo
            </h1>    
            <p class="hero-address">
                Desa Cepogo RT. 04 RW. 10, Kec. Kembang, Kab. Jepara, Prov. Jawa Tengah
            </p>
            <div class="mt-4">
                <a href="#" class="btn btn-primary btn-lg me-2">Informasi Selengkapnya</a>
            </div>    
            </div>
    </section>

    {{-- SECTION STAT SEKOLAH --}}
     <section class="stats">
        <div class="container">
            <div class="row justify-content-center g-4">
                <div class="col-md-3">
                    <div class="stat-card">
                        <h2>63+</h2>
                        <p>Siswa Aktif</p>
                        <span></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <h2>11</h2>
                        <p>Guru & Tendik</p>
                        <span></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <h2>55</h2>
                        <p>Alumni</p>
                        <span></span>
                    </div>
                </div>    
                <div class="col-md-3">
                    <div class="stat-card">
                        <h2>A</h2>
                        <p>Akreditasi</p>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
     </section>    
    
    @endsection            


