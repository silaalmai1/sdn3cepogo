@extends('layouts.app')

@section('content')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h1 class="fw-bold mb-2" style="font-size: 32px;">Poster Berita Sekolah</h1>
                <p class="text-muted mb-0" style="font-size: 15px;">Kumpulan poster bulletin dan informasi terbaru dari
                    sekolah</p>
            </div>

            <div class="row g-4">
                @forelse ($beritas as $berita)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card berita-card h-100 border-0 shadow-sm">
                            @if ($berita->gambar)
                                <a href="{{ asset('storage/' . $berita->gambar) }}" target="_blank"
                                    rel="noopener noreferrer">
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" class="berita-card-image"
                                        alt="Poster berita {{ $loop->iteration }}">
                                </a>
                            @else
                                <div class="berita-card-image d-flex align-items-center justify-content-center text-muted">
                                    Poster tidak tersedia
                                </div>
                            @endif

                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between align-items-center gap-2 flex-wrap">
                                    <span class="fw-semibold" style="font-size: 15px;">Poster Bulletin</span>
                                    <small class="text-muted">
                                        {{ $berita->created_at ? $berita->created_at->format('d M Y') : '-' }}
                                    </small>
                                </div>
                                @if ($berita->gambar)
                                    <a href="{{ asset('storage/' . $berita->gambar) }}" target="_blank"
                                        rel="noopener noreferrer" class="btn btn-outline-primary btn-sm mt-3">Buka
                                        Poster</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted py-5">
                        <p class="mb-0">Belum ada poster berita yang dipublikasikan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
