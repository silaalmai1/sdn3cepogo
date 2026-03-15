<footer class="footer-main pt-5 pb-3 mt-4">
    <div class="container">
        <div class="row g-4">

            {{-- Kolom 1: Info Sekolah --}}
            <div class="col-12 col-md-4">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ $logoUrl }}" width="45" class="me-2">
                    <div>
                        <h6 class="mb-0 fw-semibold" style="font-size:14px;">{{ $settings['school_name'] }}</h6>
                        <small class="text-muted" style="font-size:11px;">Kab. Jepara, Jawa Tengah</small>
                    </div>
                </div>
                <p style="font-size:12.5px; line-height:1.7;">
                    Sekolah Dasar Negeri 1 & 3 Cepogo berkomitmen mewujudkan pendidikan berkualitas
                    untuk generasi penerus bangsa yang berkarakter dan berprestasi.
                </p>
                <div class="d-flex gap-3 mt-3">
                    <a href="#" class="footer-sosmed"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.youtube.com/@sdn1-3cepogo26" target="_blank" class="footer-sosmed"><i
                            class="fa-brands fa-youtube"></i></a>
                    <a href="#" class="footer-sosmed"><i class="fa-brands fa-tiktok"></i></a>
                </div>
            </div>

            {{-- Kolom 2: Navigasi --}}
            <div class="col-6 col-md-2">
                <h6 class="fw-semibold mb-3" style="font-size:13px;">Navigasi</h6>
                <ul class="list-unstyled" style="font-size:12.5px;">
                    <li class="mb-2"><a href="/" class="footer-link">Beranda</a></li>
                    <li class="mb-2"><a href="/tentang" class="footer-link">Tentang</a></li>
                    <li class="mb-2"><a href="/guru" class="footer-link">Guru</a></li>
                    <li class="mb-2"><a href="/berita" class="footer-link">Berita</a></li>
                    <li class="mb-2"><a href="/prestasi" class="footer-link">Prestasi</a></li>
                    <li class="mb-2"><a href="/ekstrakulikuler" class="footer-link">Ekstrakulikuler</a></li>
                    <li class="mb-2"><a href="/galeri" class="footer-link">Galeri</a></li>
                    <li class="mb-2"><a href="/kontak" class="footer-link">Kontak</a></li>
                </ul>
            </div>

            {{-- Kolom 3: Ekstrakulikuler --}}
            <div class="col-6 col-md-3">
                <h6 class="fw-semibold mb-3" style="font-size:13px;">Ekstrakulikuler</h6>
                <ul class="list-unstyled" style="font-size:12.5px;">
                    @forelse ($extracurricularItems as $item)
                        <li class="mb-2"><i class="fa-solid fa-circle-dot text-primary me-1"
                                style="font-size:9px;"></i>
                            {{ $item['name'] }}</li>
                    @empty
                        <li class="mb-2 text-muted">Belum ada ekstrakurikuler</li>
                    @endforelse
                </ul>
            </div>

            {{-- Kolom 4: Kontak --}}
            <div class="col-12 col-md-3">
                <h6 class="fw-semibold mb-3" style="font-size:13px;">Kontak Kami</h6>
                @php
                    $footerAddress = App\Models\Setting::get(
                        'school_address',
                        'Desa Cepogo RT. 04 RW. 10, Kec. Kembang, Kab. Jepara',
                    );
                    $footerPhone = App\Models\Setting::get('school_phone', '081390788465');
                    $footerEmail = App\Models\Setting::get('school_email', 'sdn1.3cepogo@gmail.com');
                @endphp
                <ul class="list-unstyled" style="font-size:12.5px; line-height:1.8;">
                    <li class="mb-2">
                        <i class="fa-solid fa-location-dot text-primary me-2"></i>
                        {{ str_replace("\n", ', ', $footerAddress) }}
                    </li>
                    <li class="mb-2">
                        <i class="fa-solid fa-phone text-primary me-2"></i>
                        {{ $footerPhone }}
                    </li>
                    <li class="mb-2">
                        <i class="fa-solid fa-envelope text-primary me-2"></i>
                        {{ $footerEmail }}
                    </li>
                </ul>
            </div>

        </div>

        <hr class="mt-4 mb-3" style="border-color: rgba(0,0,0,0.1);">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
            <small style="font-size:11.5px;" class="text-muted">
                &copy; {{ date('Y') }} Sila Almaira Riva
            </small>
        </div>
    </div>
</footer>
