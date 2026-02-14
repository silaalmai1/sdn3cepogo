@extends('layouts.app')

@section('content')
    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5 mt-3">
                <h2 class="guru-section-title">Daftar Guru & Tenaga Pendidik</h2>
                <p class="guru-section-subtitle">{{ $gurus->count() }} Tenaga Pendidik Profesional</p>
            </div>

            <div class="row g-4">
                @if ($gurus->count() > 0)
                    @foreach ($gurus as $guru)
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 guru-card">
                                @if ($guru->foto)
                                    <img src="{{ asset('storage/' . $guru->foto) }}" class="card-img-top"
                                        alt="{{ $guru->nama }}" style="height: 280px; object-fit: cover;">
                                @else
                                    <div class="card-img-top bg-secondary text-white d-flex align-items-center justify-content-center"
                                        style="height: 280px;">
                                        <i class="bi bi-person-fill" style="font-size: 80px;"></i>
                                    </div>
                                @endif
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $guru->nama }}</h5>
                                    <p class="card-text mb-2">
                                        <span class="badge">{{ $guru->posisi }}</span>
                                    </p>
                                    @if ($guru->mata_pelajaran)
                                        <p class="card-text mb-3">
                                            <strong>{{ $guru->mata_pelajaran }}</strong>
                                        </p>
                                    @endif
                                    @if ($guru->bio)
                                        <p class="card-text flex-grow-1" style="font-size: 14px; line-height: 1.5;">
                                            {{ Str::limit($guru->bio, 120) }}
                                        </p>
                                    @endif
                                    <div class="mt-auto pt-3 border-top">
                                        @if ($guru->email)
                                            <div class="guru-info-item">
                                                <i class="bi bi-envelope"></i>
                                                <span>{{ $guru->email }}</span>
                                            </div>
                                        @endif
                                        @if ($guru->no_telepon)
                                            <div class="guru-info-item">
                                                <i class="bi bi-telephone"></i>
                                                <span>{{ $guru->no_telepon }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center py-5">
                        <p class="text-muted" style="font-size: 18px;">Belum ada data guru yang ditampilkan</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
