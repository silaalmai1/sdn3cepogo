@extends('layouts.app')

@section('content')
    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <p class="text-primary fw-semibold text-uppercase mb-2" style="letter-spacing: 1px; font-size: 13px;">
                    Profil Pengajar</p>
                <h1 class="fw-bold mb-2" style="font-size: clamp(1.8rem, 2.8vw, 2.4rem);">Daftar Guru & Tenaga Pendidik
                </h1>
                <p class="text-muted mb-0" style="max-width: 680px; margin: 0 auto;">{{ $gurus->count() }} tenaga pendidik
                    profesional yang mendampingi proses belajar siswa setiap hari.</p>
            </div>

            <div class="row g-4 justify-content-center">
                @if ($gurus->count() > 0)
                    @foreach ($gurus as $guru)
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card border-0 shadow-sm h-100 text-center">
                                <div class="card-body p-4">
                                    @if ($guru->foto)
                                        <div class="mb-3">
                                            <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama }}"
                                                style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%; border: 4px solid #e0e0e0;">
                                        </div>
                                    @else
                                        <div class="mb-3 mx-auto bg-secondary text-white d-flex align-items-center justify-content-center"
                                            style="width: 150px; height: 150px; border-radius: 50%; border: 4px solid #e0e0e0;">
                                            <i class="bi bi-person-fill" style="font-size: 60px;"></i>
                                        </div>
                                    @endif
                                    <h2 class="h6 fw-bold mb-1">{{ $guru->nama }}</h2>
                                    <p class="text-muted mb-0" style="font-size: 13px;">Tenaga Pendidik</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <div class="card border-0 shadow-sm text-center py-5">
                            <p class="text-muted mb-0" style="font-size: 18px;">Belum ada data guru yang ditampilkan</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
