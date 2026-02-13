@extends('layouts.app')

@section('content')

<section class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold">Prestasi Sekolah</h1>
        <p>Daftar prestasi siswa SD Negeri 1-3 Cepogo</p>
    </div>

    <div class="row g-4">

        <!-- Card Prestasi -->
        <div class="col-md-4">
            <div class="card prestasi-card h-100">
                <img src="/images/lombafls3n.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="fw-bold">Juara 1 Menyanyi Solo</h5>
                    <p class="text-muted">Tingkat Kabupaten - 2025</p>
                    <p>Siswa berhasil meraih juara 1 dalam lomba pramuka tingkat kecamatan.</p>
                    <a href="/prestasi-detail" class="btn btn-primary mt-3">Lihat Selengkapnya</a>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card prestasi-card h-100">
                <img src="/images/prestasi2.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="fw-bold">Juara 2 Olimpiade Matematika</h5>
                    <p class="text-muted">Tingkat Kabupaten - 2023</p>
                    <p>Prestasi membanggakan di bidang akademik matematika.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card prestasi-card h-100">
                <img src="/images/prestasi3.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="fw-bold">Juara 3 Lomba Tari</h5>
                    <p class="text-muted">Tingkat Provinsi - 2023</p>
                    <p>Siswa menunjukkan bakat luar biasa di bidang seni tari.</p>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
