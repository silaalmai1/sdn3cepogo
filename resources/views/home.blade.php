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

     <section class="py-5 bg-white">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="text-center fw-bold mb-2" style="font-size:40px;">Sambutan Kepala Sekolah</h2>
            <p class="text-center text-muted" style="font-size:18px;">SD Negeri 1 & 3 Cepogo</p>
        <div class="row">
           <!-- KEPSEK SD 1 -->
            <div class="col-md-6 mb-4">
                <div class="card card-sambutan p-4 h-100">
                    <div class="text-center">
                        <img src="/images/kepsek1.jpg"
                             class="rounded-circle mb-3"
                             width="170">
                        <h5 class="mb-0">Nama Kepala SD 1</h5>
                        <small class="text-muted">Kepala SD Negeri 1 Cepogo</small>
                    </div>

                    <p class="mt-3 sambutan-text">
                        Puji syukur kepada Tuhan Yang Maha Esa, website sekolah ini 
                        hadir sebagai sarana informasi bagi masyarakat. 
                        Kami berkomitmen membentuk siswa yang berprestasi, 
                        berkarakter, dan siap menghadapi masa depan.
                    </p>
                </div>
            </div>

            <!-- KEPSEK SD 3 -->
            <div class="col-md-6 mb-4">
                <div class="card card-sambutan p-4 h-100">
                    <div class="text-center">
                        <img src="/images/kepsek2.jpg"
                             class="rounded-circle mb-3"
                             width="170">
                        <h5 class="mb-0">Nama Kepala SD 3</h5>
                        <small class="text-muted">Kepala SD Negeri 3 Cepogo</small>
                    </div>

                    <p class="mt-3 sambutan-text">
                        Kami berharap website ini menjadi jembatan komunikasi 
                        antara sekolah dan masyarakat. Semoga sekolah kita 
                        terus berkembang dan menghasilkan generasi yang unggul.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

    
    @endsection            


