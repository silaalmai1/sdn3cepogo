@extends('layouts.app')

@php
    $contactPhone = trim((string) ($settings['school_phone'] ?? '')) ?: '(0291) 123456';
    $contactEmail = trim((string) ($settings['school_email'] ?? '')) ?: 'info@sdn1cepogo.sch.id';
    $operationalDays = trim((string) ($settings['operational_days'] ?? '')) ?: 'Senin - Sabtu';
    $operationalHours = trim((string) ($settings['operational_hours'] ?? '')) ?: '07:00 - 13:00 WIB';
    $operationalHoliday = trim((string) ($settings['operational_holiday'] ?? '')) ?: 'Tutup';
    $socialFacebook = trim((string) ($settings['social_facebook_url'] ?? ''));
    $socialInstagram = trim((string) ($settings['social_instagram_url'] ?? ''));
    $socialYoutube = trim((string) ($settings['social_youtube_url'] ?? ''));
    $socialTiktok = trim((string) ($settings['social_tiktok_url'] ?? ''));
    $mapEmbedUrl =
        trim((string) ($settings['map_embed_url'] ?? '')) ?:
        'https://maps.google.com/maps?q=SD%20Negeri%201%203%20Cepogo%2C%20Jepara&t=&z=17&ie=UTF8&iwloc=&output=embed';
    $contactAddress =
        trim((string) ($settings['school_address'] ?? '')) ?:
        "Desa Cepogo RT. 04 RW. 10\nKec. Kembang\nKab. Jepara\nProv. Jawa Tengah";
@endphp

@section('content')
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-semibold">Hubungi Kami</h2>

            <div class="row g-4">
                <!-- Informasi Kontak -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="rounded-circle bg-primary d-inline-flex align-items-center justify-content-center"
                                    style="width: 50px; height: 50px;">
                                    <i class="fa-solid fa-phone text-white" style="font-size: 24px;"></i>
                                </div>
                            </div>
                            <h5 class="card-title fw-bold mb-3">Telepon</h5>
                            <p class="card-text text-muted">
                                <a href="tel:{{ preg_replace('/\s+/', '', $contactPhone) }}"
                                    class="text-decoration-none text-dark">
                                    {{ $contactPhone }}
                                </a>
                            </p>
                            <p class="card-text text-muted small">Hubungi kami melalui telepon untuk pertanyaan atau
                                informasi urgent.</p>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="rounded-circle bg-primary d-inline-flex align-items-center justify-content-center"
                                    style="width: 50px; height: 50px;">
                                    <i class="fa-solid fa-envelope text-white" style="font-size: 24px;"></i>
                                </div>
                            </div>
                            <h5 class="card-title fw-bold mb-3">Email</h5>
                            <p class="card-text text-muted">
                                <a href="mailto:{{ $contactEmail }}" class="text-decoration-none text-dark">
                                    {{ $contactEmail }}
                                </a>
                            </p>
                            <p class="card-text text-muted small">Kirimkan email untuk pertanyaan atau masukan.</p>
                        </div>
                    </div>
                </div>

                <!-- Alamat -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="rounded-circle bg-primary d-inline-flex align-items-center justify-content-center"
                                    style="width: 50px; height: 50px;">
                                    <i class="fa-solid fa-location-dot text-white" style="font-size: 24px;"></i>
                                </div>
                            </div>
                            <h5 class="card-title fw-bold mb-3">Alamat</h5>
                            <p class="card-text text-muted">
                                {!! nl2br(e($contactAddress)) !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jam Operasional -->
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-4">
                                <i class="fa-solid fa-clock text-primary me-2"></i>Jam Operasional
                            </h5>
                            <div class="row">
                                <div class="col-6">
                                    <p class="mb-2"><strong>{{ $operationalDays }}</strong></p>
                                    <p class="text-muted">{{ $operationalHours }}</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-2"><strong>Hari Libur</strong></p>
                                    <p class="text-muted">{{ $operationalHoliday }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Media Sosial -->
                <div class="col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-4">
                                <i class="fa-solid fa-share-nodes text-primary me-2"></i>Ikuti Kami
                            </h5>
                            <div class="d-flex gap-3">
                                @if ($socialFacebook !== '')
                                    <a href="{{ $socialFacebook }}" target="_blank" rel="noopener noreferrer"
                                        class="btn btn-outline-primary btn-sm rounded-circle d-inline-flex align-items-center justify-content-center"
                                        style="width: 45px; height: 45px;" aria-label="Facebook">
                                        <i class="fa-brands fa-facebook"></i>
                                    </a>
                                @endif
                                @if ($socialInstagram !== '')
                                    <a href="{{ $socialInstagram }}" target="_blank" rel="noopener noreferrer"
                                        class="btn btn-outline-primary btn-sm rounded-circle d-inline-flex align-items-center justify-content-center"
                                        style="width: 45px; height: 45px;" aria-label="Instagram">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                @endif
                                @if ($socialYoutube !== '')
                                    <a href="{{ $socialYoutube }}" target="_blank" rel="noopener noreferrer"
                                        class="btn btn-outline-danger btn-sm rounded-circle d-inline-flex align-items-center justify-content-center"
                                        style="width: 45px; height: 45px;" aria-label="YouTube">
                                        <i class="fa-brands fa-youtube"></i>
                                    </a>
                                @endif
                                @if ($socialTiktok !== '')
                                    <a href="{{ $socialTiktok }}" target="_blank" rel="noopener noreferrer"
                                        class="btn btn-outline-dark btn-sm rounded-circle d-inline-flex align-items-center justify-content-center"
                                        style="width: 45px; height: 45px;" aria-label="TikTok">
                                        <i class="fa-brands fa-tiktok"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Peta Lokasi -->
            <div class="row mt-5">
                <div class="col-md-12">
                    <h5 class="fw-bold mb-4">
                        <i class="fa-solid fa-map text-primary me-2"></i>Lokasi Kami
                    </h5>
                    <div class="ratio ratio-16x9 rounded overflow-hidden shadow-sm">
                        <iframe src="{{ $mapEmbedUrl }}" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
