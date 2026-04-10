@extends('layouts.app')

@section('content')
    <!-- GLightbox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />

    <style>
        .gallery-item {
            display: block;
            position: relative;
            overflow: hidden;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            aspect-ratio: 1 / 1;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .gallery-item:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .gallery-item img,
        .gallery-item video {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 6px;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
        }

        @media (min-width: 768px) {
            .gallery-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        @media (min-width: 1024px) {
            .gallery-grid {
                grid-template-columns: repeat(4, 1fr);
                gap: 10px;
            }
        }
    </style>

    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5 mt-3">
                <h2 class="guru-section-title">Galeri Sekolah</h2>
                <p class="guru-section-subtitle">Kumpulan momen terbaik SD Negeri 1-3 Cepogo</p>
            </div>
            <div class="gallery-grid">
                @forelse($galeris as $galeri)
                    @if (($galeri->tipe ?? 'foto') === 'video')
                        @if (($galeri->video_sumber ?? 'url') === 'file' && $galeri->video_file_url)
                            <a href="{{ $galeri->video_file_url }}" class="glightbox gallery-item" data-gallery="gallery"
                                data-type="video">
                                <div class="position-relative w-100 h-100">
                                    <video class="w-100 h-100" style="background:#000;" muted>
                                        <source src="{{ $galeri->video_file_url }}">
                                    </video>
                                    <div class="position-absolute top-50 start-50 translate-middle">
                                        <i class="bi bi-play-circle-fill text-white"
                                            style="font-size: 48px; opacity: 0.9;"></i>
                                    </div>
                                </div>
                            </a>
                        @else
                            @php
                                $videoId = null;
                                if (
                                    preg_match(
                                        '/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/',
                                        $galeri->video_url ?? '',
                                        $m,
                                    )
                                ) {
                                    $videoId = $m[1];
                                }
                            @endphp
                            @if ($videoId)
                                <a href="https://www.youtube.com/watch?v={{ $videoId }}" class="glightbox gallery-item"
                                    data-gallery="gallery">
                                    <div class="position-relative w-100 h-100">
                                        <img src="https://img.youtube.com/vi/{{ $videoId }}/hqdefault.jpg"
                                            class="w-100 h-100">
                                        <div class="position-absolute top-50 start-50 translate-middle">
                                            <i class="bi bi-play-circle-fill text-white"
                                                style="font-size: 48px; opacity: 0.9;"></i>
                                        </div>
                                    </div>
                                </a>
                            @else
                                <div class="bg-dark d-flex align-items-center justify-content-center gallery-item">
                                    <a href="{{ $galeri->video_url }}" target="_blank" class="text-white">
                                        <i class="bi bi-play-circle" style="font-size:48px;"></i>
                                    </a>
                                </div>
                            @endif
                        @endif
                    @else
                        <a href="{{ $galeri->gambar_url }}" class="glightbox gallery-item" data-gallery="gallery">
                            <img src="{{ $galeri->gambar_url }}" alt="Galeri">
                        </a>
                    @endif
                @empty
                    <div style="grid-column: 1 / -1;" class="text-center py-5">
                        <p class="text-muted">Belum ada item galeri</p>
                    </div>
                @endforelse
            </div>
            <div class="mt-4">
                {{ $galeris->links() }}
            </div>
        </div>
    </section>

    <!-- GLightbox JS -->
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
    <script>
        const lightbox = GLightbox({
            touchNavigation: true,
            loop: true,
            autoplayVideos: true,
            zoomable: true,
            draggable: true,
            // Teks kontrol dalam Bahasa Indonesia
            closeButton: true,
            slideEffect: 'slide',
        });
    </script>
@endsection
