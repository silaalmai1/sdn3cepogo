@extends('layouts.app')

@section('content')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <p class="text-primary fw-semibold text-uppercase mb-2" style="letter-spacing: 1px; font-size: 13px;">
                    Informasi Terbaru</p>
                <h1 class="fw-bold mb-2" style="font-size: clamp(1.8rem, 2.8vw, 2.4rem);">Poster Berita Sekolah</h1>
                <p class="text-muted mb-0" style="max-width: 680px; margin: 0 auto;">Kumpulan poster bulletin dan
                    informasi terbaru dari sekolah.</p>
            </div>

            <div class="row g-4">
                @forelse ($beritas as $berita)
                    @php
                        $posterUrl = asset('storage/' . $berita->gambar);
                    @endphp
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card berita-card h-100 border-0 shadow-sm">
                            @if ($berita->gambar)
                                <a href="#" class="poster-trigger" data-bs-toggle="modal"
                                    data-bs-target="#posterPreviewModal" data-poster-src="{{ $posterUrl }}"
                                    data-poster-alt="Poster berita {{ $loop->iteration }}">
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" class="berita-card-image"
                                        alt="Poster berita {{ $loop->iteration }}">
                                </a>
                            @else
                                <div class="berita-card-image d-flex align-items-center justify-content-center text-muted">
                                    Poster tidak tersedia
                                </div>
                            @endif

                            <div class="card-body p-3 p-md-4">
                                <div class="d-flex justify-content-between align-items-center gap-2 flex-wrap">
                                    <span class="fw-semibold" style="font-size: 15px;">Poster Bulletin</span>
                                    <small class="text-muted">
                                        {{ $berita->created_at ? $berita->created_at->format('d M Y') : '-' }}
                                    </small>
                                </div>
                                @if ($berita->gambar)
                                    <a href="#" class="btn btn-outline-primary btn-sm mt-3 poster-trigger"
                                        data-bs-toggle="modal" data-bs-target="#posterPreviewModal"
                                        data-poster-src="{{ $posterUrl }}"
                                        data-poster-alt="Poster berita {{ $loop->iteration }}">Buka Poster</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="card border-0 shadow-sm text-center text-muted py-5">
                            <p class="mb-0">Belum ada poster berita yang dipublikasikan.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <div class="modal fade" id="posterPreviewModal" tabindex="-1" aria-labelledby="posterPreviewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow">
                <div class="modal-header">
                    <h5 class="modal-title" id="posterPreviewModalLabel">Preview Poster Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-2 p-md-3">
                    <img id="posterPreviewImage" src="" alt="Preview poster" class="img-fluid w-100 rounded-2">
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const triggers = document.querySelectorAll('.poster-trigger');
            const previewImage = document.getElementById('posterPreviewImage');

            triggers.forEach((trigger) => {
                trigger.addEventListener('click', function(event) {
                    event.preventDefault();

                    const posterSrc = this.dataset.posterSrc;
                    const posterAlt = this.dataset.posterAlt || 'Preview poster';

                    if (previewImage && posterSrc) {
                        previewImage.src = posterSrc;
                        previewImage.alt = posterAlt;
                    }
                });
            });
        });
    </script>
@endsection
