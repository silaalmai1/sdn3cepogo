@extends('layouts.app')

@section('content')
    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5 mt-3">
                <h2 class="guru-section-title">Daftar Prestasi Terbaru</h2>
                <p class="guru-section-subtitle">{{ $prestasis->count() }} Pencapaian Gemilang</p>
            </div>

            <div class="row g-4">
                @forelse($prestasis as $prestasi)
                    <div class="col-md-6 col-lg-4">
                        <div class="card prestasi-card h-100 shadow-sm">
                            <img src="{{ $prestasi->gambar ? asset('storage/' . $prestasi->gambar) : asset('images/placeholder.jpg') }}"
                                class="card-img-top" style="height: 240px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <div class="mb-2">
                                    <span class="badge bg-primary mb-2"
                                        style="font-size: 11px;">{{ $prestasi->tingkat }}</span>
                                </div>
                                <h5 class="card-title fw-bold" style="font-size: 18px; line-height: 1.4; color: #2c3e50;">
                                    {{ $prestasi->judul }}</h5>
                                <p class="text-muted mb-3" style="font-size: 13px;">
                                    <i class="bi bi-calendar-event"></i> Tahun {{ $prestasi->tahun }}
                                </p>
                                <p class="card-text flex-grow-1" style="font-size: 14px; line-height: 1.6; color: #555;">
                                    {{ Str::limit($prestasi->deskripsi_lengkap, 120) }}
                                </p>
                                <a href="/prestasi/{{ $prestasi->slug }}" class="btn btn-primary btn-sm mt-auto">
                                    <i class="bi bi-arrow-right"></i> Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted" style="font-size: 18px;">Belum ada prestasi yang ditampilkan</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
