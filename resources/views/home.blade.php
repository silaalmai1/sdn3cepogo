@extends('layouts.app')

@php
    $schoolName = App\Models\Setting::get('school_name', 'SD Negeri 1-3 Cepogo');
    $heroHomeTitle = App\Models\Setting::get('hero_home_title', $schoolName);
    $schoolAddressRaw = App\Models\Setting::get(
        'school_address',
        "Desa Cepogo RT. 04 RW. 10\nKec. Kembang\nKab. Jepara\nProv. Jawa Tengah",
    );
    $schoolAddressInline = collect(preg_split('/\r\n|\r|\n/', (string) $schoolAddressRaw))
        ->map(fn($item) => trim($item))
        ->filter()
        ->implode(', ');

    $welcomeSd1Name = App\Models\Setting::get('welcome_sd1_name', 'Nama Kepala SD 1');
    $welcomeSd1Title = App\Models\Setting::get('welcome_sd1_title', 'Kepala SD Negeri 1 Cepogo');
    $welcomeSd1Message = App\Models\Setting::get(
        'welcome_sd1_message',
        'Puji syukur kepada Tuhan Yang Maha Esa, website sekolah ini hadir sebagai sarana informasi bagi masyarakat. Kami berkomitmen membentuk siswa yang berprestasi, berkarakter, dan siap menghadapi masa depan.',
    );
    $welcomeSd1Photo = App\Models\Setting::get('welcome_sd1_photo', 'images/kepsek1.jpg');
    $welcomeSd1PhotoFit = App\Models\Setting::get('welcome_sd1_photo_fit', 'cover');
    $welcomeSd1PhotoUrl = str_starts_with($welcomeSd1Photo, 'images/')
        ? asset($welcomeSd1Photo)
        : asset('storage/' . $welcomeSd1Photo);

    $welcomeSd3Name = App\Models\Setting::get('welcome_sd3_name', 'Nama Kepala SD 3');
    $welcomeSd3Title = App\Models\Setting::get('welcome_sd3_title', 'Kepala SD Negeri 3 Cepogo');
    $welcomeSd3Message = App\Models\Setting::get(
        'welcome_sd3_message',
        'Kami berharap website ini menjadi jembatan komunikasi antara sekolah dan masyarakat. Semoga sekolah kita terus berkembang dan menghasilkan generasi yang unggul.',
    );
    $welcomeSd3Photo = App\Models\Setting::get('welcome_sd3_photo', 'images/kepsek2.jpg');
    $welcomeSd3PhotoFit = App\Models\Setting::get('welcome_sd3_photo_fit', 'cover');
    $welcomeSd3PhotoUrl = str_starts_with($welcomeSd3Photo, 'images/')
        ? asset($welcomeSd3Photo)
        : asset('storage/' . $welcomeSd3Photo);

    $totalActiveStudents = App\Models\Setting::get('total_active_students', 63);
@endphp

@section('content')
    <section class="hero-section">
        <div class="hero-slideshow">
            <div class="hero-slide" style="background-image: url('/images/hero.jpg')"></div>
            <div class="hero-slide" style="background-image: url('/images/hero2.jpg')"></div>
            <div class="hero-slide" style="background-image: url('/images/hero3.jpg')"></div>
        </div>
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <div class="row align-items-center">
                {{-- KIRI: Teks --}}
                <div class="col-md-8 col-lg-6 text-white">
                    <div class="hero-badge mb-3">
                        <i class="bi bi-star-fill me-2"></i>Selamat Datang di Website
                    </div>
                    <h1 class="hero-title">{{ $heroHomeTitle }}</h1>
                    <div class="hero-divider my-3"></div>
                    <p class="hero-address">
                        <i class="bi bi-geo-alt-fill me-1"></i>
                        {{ $schoolAddressInline }}
                    </p>
                    <div class="mt-4">
                        <a href="/tentang" class="btn btn-hero-primary me-2">Informasi Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION STAT SEKOLAH --}}
    <section class="stats">
        <div class="container">
            <div class="row justify-content-center g-4">
                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <h2>{{ $totalActiveStudents }}+</h2>
                        <p>Siswa Aktif</p>
                        <span></span>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <h2>{{ $totalGuru }}</h2>
                        <p>Guru & Tendik</p>
                        <span></span>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <h2>{{ $totalPrestasi }}</h2>
                        <p>Prestasi</p>
                        <span></span>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <h2>A</h2>
                        <p>Akreditasi</p>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-5 pb-3 bg-white">
        <div class="container">
            <div class="text-center mb-3">
                <h2 class="text-center fw-semibold mb-2" style="font-size:28px;">Sambutan Kepala Sekolah</h2>
                <p class="text-center text-muted" style="font-size:13px;">{{ $schoolName }}</p>
                <div class="row justify-content-center">
                    <!-- KEPSEK SD 1 -->
                    <div class="col-12 col-lg-10 mb-4">
                        <div class="card card-sambutan p-4 p-md-5 h-100 shadow-sm">
                            <div class="row sambutan-layout g-3 g-md-4">
                                <div class="col-8 text-start order-2 order-md-1">
                                    <h5 class="mb-1 sambutan-name">{{ $welcomeSd1Name }}
                                    </h5>
                                    <small class="text-muted d-block sambutan-role">{{ $welcomeSd1Title }}</small>
                                    <p class="mt-2 mt-md-3 sambutan-text d-none d-md-block"
                                        style="font-size:clamp(14px, 1.9vw, 18px); line-height:1.75;">
                                        {{ $welcomeSd1Message }}
                                    </p>
                                    <p class="mt-2 sambutan-text d-md-none" style="font-size:14px; line-height:1.65;">
                                        {{ Str::limit($welcomeSd1Message, 120) }}
                                    </p>
                                    <div class="collapse d-md-none" id="welcomeSd1FullText">
                                        <p class="sambutan-text mb-2" style="font-size:14px; line-height:1.65;">
                                            {{ $welcomeSd1Message }}
                                        </p>
                                    </div>
                                    @if (Str::length($welcomeSd1Message) > 120)
                                        <a class="d-md-none small" data-bs-toggle="collapse" href="#welcomeSd1FullText"
                                            role="button" aria-expanded="false" aria-controls="welcomeSd1FullText">
                                            Baca Selengkapnya / Baca Ringkas
                                        </a>
                                    @endif
                                </div>
                                <div class="col-4 text-center order-1 order-md-2">
                                    <img src="{{ $welcomeSd1PhotoUrl }}" class="img-fluid sambutan-photo"
                                        style="object-fit: {{ $welcomeSd1PhotoFit }};" alt="{{ $welcomeSd1Name }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- KEPSEK SD 3 -->
                    <div class="col-12 col-lg-10 mb-4">
                        <div class="card card-sambutan p-4 p-md-5 h-100 shadow-sm">
                            <div class="row sambutan-layout g-3 g-md-4">
                                <div class="col-4 text-center">
                                    <img src="{{ $welcomeSd3PhotoUrl }}" class="img-fluid sambutan-photo"
                                        style="object-fit: {{ $welcomeSd3PhotoFit }};" alt="{{ $welcomeSd3Name }}">
                                </div>
                                <div class="col-8 text-start">
                                    <h5 class="mb-1 sambutan-name">{{ $welcomeSd3Name }}
                                    </h5>
                                    <small class="text-muted d-block sambutan-role">{{ $welcomeSd3Title }}</small>
                                    <p class="mt-2 mt-md-3 sambutan-text d-none d-md-block"
                                        style="font-size:clamp(14px, 1.9vw, 18px); line-height:1.75;">
                                        {{ $welcomeSd3Message }}
                                    </p>
                                    <p class="mt-2 sambutan-text d-md-none" style="font-size:14px; line-height:1.65;">
                                        {{ Str::limit($welcomeSd3Message, 120) }}
                                    </p>
                                    <div class="collapse d-md-none" id="welcomeSd3FullText">
                                        <p class="sambutan-text mb-2" style="font-size:14px; line-height:1.65;">
                                            {{ $welcomeSd3Message }}
                                        </p>
                                    </div>
                                    @if (Str::length($welcomeSd3Message) > 120)
                                        <a class="d-md-none small" data-bs-toggle="collapse" href="#welcomeSd3FullText"
                                            role="button" aria-expanded="false" aria-controls="welcomeSd3FullText">
                                            Baca Selengkapnya / Baca Ringkas
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION PRESTASI TERBARU --}}
    <section class="py-3 bg-white">
        <div class="container">
            <div class="text-center mb-2">
                <h2 class="fw-semibold mb-1" style="font-size:22px;">Prestasi Terbaru</h2>
                <p class="text-muted" style="font-size:12px;">Pencapaian gemilang siswa kami</p>
            </div>

            <div class="row g-3">
                @if ($prestasiTerbaru->count() > 0)
                    @foreach ($prestasiTerbaru as $prestasi)
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="card h-100 shadow-sm prestasi-card">
                                @if ($prestasi->gambar)
                                    <img src="{{ asset('storage/' . $prestasi->gambar) }}" class="card-img-top"
                                        alt="{{ $prestasi->judul }}" style="height: 150px; object-fit: cover;">
                                @else
                                    <div class="card-img-top bg-secondary text-white d-flex align-items-center justify-content-center"
                                        style="height: 150px;">
                                        <span style="font-size: 13px;">Foto Prestasi</span>
                                    </div>
                                @endif
                                <div class="card-body d-flex flex-column p-3">
                                    <span class="badge bg-primary mb-2 align-self-start"
                                        style="font-size: 11px;">{{ $prestasi->tingkat }}</span>
                                    <h5 class="card-title" style="font-size: 16px;">{{ $prestasi->judul }}</h5>
                                    <p class="card-text text-muted flex-grow-1" style="font-size: 13px;">
                                        {{ Str::limit($prestasi->deskripsi_singkat, 80) }}</p>
                                    <small class="text-muted d-block mb-2" style="font-size: 11px;">Tahun
                                        {{ $prestasi->tahun }}</small>
                                    <a href="{{ route('prestasi.detail', $prestasi->slug) }}"
                                        class="btn btn-sm btn-outline-primary"
                                        style="padding: 4px 12px; font-size: 12px;">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center text-muted py-5">
                        <p>Belum ada prestasi yang ditampilkan</p>
                    </div>
                @endif
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('prestasi') }}" class="btn btn-primary btn-sm px-4">Lihat Semua Prestasi</a>
            </div>
        </div>
    </section>

    {{-- SECTION BERITA TERBARU --}}
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="fw-semibold mb-2" style="font-size:28px;">Poster Berita Terbaru</h2>
                <p class="text-muted" style="font-size:14px;">Informasi sekolah dalam bentuk poster bulletin</p>
            </div>

            <div class="row g-4">
                @if ($beritaTerbaru->count() > 0)
                    @foreach ($beritaTerbaru as $berita)
                        @php
                            $posterUrl = asset('storage/' . $berita->gambar);
                        @endphp
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="card berita-card h-100 border-0 shadow-sm">
                                @if ($berita->gambar)
                                    <a href="#" class="home-poster-trigger" data-bs-toggle="modal"
                                        data-bs-target="#homePosterPreviewModal" data-poster-src="{{ $posterUrl }}"
                                        data-poster-alt="Poster berita {{ $loop->iteration }}">
                                        <img src="{{ asset('storage/' . $berita->gambar) }}" class="berita-card-image"
                                            alt="Poster berita {{ $loop->iteration }}">
                                    </a>
                                @else
                                    <div
                                        class="berita-card-image d-flex align-items-center justify-content-center text-muted">
                                        Poster tidak tersedia
                                    </div>
                                @endif
                                <div class="card-body p-3">
                                    <p class="mb-2 fw-semibold" style="font-size:16px;">Poster Bulletin Sekolah</p>
                                    <small class="text-muted d-block mb-3" style="font-size:12px;">
                                        Diunggah {{ $berita->created_at ? $berita->created_at->format('d M Y') : '-' }}
                                    </small>
                                    @if ($berita->gambar)
                                        <a href="#" class="btn btn-sm btn-outline-primary home-poster-trigger"
                                            data-bs-toggle="modal" data-bs-target="#homePosterPreviewModal"
                                            data-poster-src="{{ $posterUrl }}"
                                            data-poster-alt="Poster berita {{ $loop->iteration }}">Lihat Poster</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center text-muted py-5">
                        <p>Belum ada poster berita yang ditampilkan</p>
                    </div>
                @endif
            </div>

            @if ($beritaTerbaru->count() > 0)
                <div class="text-center mt-4">
                    <a href="{{ route('berita') }}" class="btn btn-primary btn-sm px-4">Lihat Semua Poster</a>
                </div>
            @endif
        </div>
    </section>

    <div class="modal fade" id="homePosterPreviewModal" tabindex="-1" aria-labelledby="homePosterPreviewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow">
                <div class="modal-header">
                    <h5 class="modal-title" id="homePosterPreviewModalLabel">Preview Poster Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-2 p-md-3">
                    <img id="homePosterPreviewImage" src="" alt="Preview poster"
                        class="img-fluid w-100 rounded-2">
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const triggers = document.querySelectorAll('.home-poster-trigger');
            const previewImage = document.getElementById('homePosterPreviewImage');

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

    {{-- SECTION EKSTRAKULIKULER --}}
    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="fw-semibold mb-2" style="font-size:30px;">Ekstrakulikuler</h2>
                <p class="text-muted" style="font-size:16px;">Kegiatan pengembangan bakat dan minat siswa</p>
            </div>
            <div class="row g-3 justify-content-center">
                @forelse ($extracurricularItems as $item)
                    <div class="col-6 col-md">
                        <div class="card text-center p-4 h-100 border-0 shadow-sm ekskul-card">
                            <div class="ekskul-icon-wrap mx-auto mb-3">
                                @include('partials.extracurricular-icon', ['item' => $item])
                            </div>
                            <p class="mb-0 fw-semibold" style="font-size:16px;">{{ $item['name'] }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted py-4">
                        <p class="mb-0">Belum ada ekstrakurikuler yang ditampilkan</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

@endsection
