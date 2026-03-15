@extends('layouts.app')

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
                    <h1 class="hero-title">SD Negeri 1-3 Cepogo</h1>
                    <div class="hero-divider my-3"></div>
                    <p class="hero-address">
                        <i class="bi bi-geo-alt-fill me-1"></i>
                        Desa Cepogo RT. 04 RW. 10, Kec. Kembang, Kab. Jepara, Prov. Jawa Tengah
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
                        <h2>63+</h2>
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
                <p class="text-center text-muted" style="font-size:13px;">SD Negeri 1 & 3 Cepogo</p>
                <div class="row">
                    <!-- KEPSEK SD 1 -->
                    <div class="col-md-6 mb-4">
                        <div class="card card-sambutan p-3 h-100">
                            <div class="text-center">
                                <img src="/images/kepsek1.jpg" class="rounded-circle mb-2" width="110">
                                <h5 class="mb-0" style="font-size:14px;">Nama Kepala SD 1</h5>
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
                        <div class="card card-sambutan p-3 h-100">
                            <div class="text-center">
                                <img src="/images/kepsek2.jpg" class="rounded-circle mb-2" width="110">
                                <h5 class="mb-0" style="font-size:14px;">Nama Kepala SD 3</h5>
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
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="card berita-card h-100 border-0 shadow-sm">
                                @if ($berita->gambar)
                                    <a href="{{ asset('storage/' . $berita->gambar) }}" target="_blank"
                                        rel="noopener noreferrer">
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
                                        <a href="{{ asset('storage/' . $berita->gambar) }}" target="_blank"
                                            rel="noopener noreferrer" class="btn btn-sm btn-outline-primary">Lihat
                                            Poster</a>
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
                            <i class="fa-solid {{ $item['icon'] }} text-primary mb-2" style="font-size:34px;"></i>
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
