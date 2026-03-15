@extends('layouts.app')

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
                                <a href="tel:{{ $settings['school_phone'] }}" class="text-decoration-none text-dark">
                                    {{ $settings['school_phone'] }}
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
                                <a href="mailto:{{ $settings['school_email'] }}" class="text-decoration-none text-dark">
                                    {{ $settings['school_email'] }}
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
                                {!! nl2br(e($settings['school_address'])) !!}
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
                                    <p class="mb-2"><strong>Senin - Sabtu</strong></p>
                                    <p class="text-muted">07:00 - 13:00 WIB</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-2"><strong>Hari Libur</strong></p>
                                    <p class="text-muted">Tutup</p>
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
                                <a href="#"
                                    class="btn btn-outline-primary btn-sm rounded-circle d-inline-flex align-items-center justify-content-center"
                                    style="width: 45px; height: 45px;">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                                <a href="https://www.youtube.com/@sdn1-3cepogo26" target="_blank"
                                    class="btn btn-outline-danger btn-sm rounded-circle d-inline-flex align-items-center justify-content-center"
                                    style="width: 45px; height: 45px;">
                                    <i class="fa-brands fa-youtube"></i>
                                </a>
                                <a href="#"
                                    class="btn btn-outline-dark btn-sm rounded-circle d-inline-flex align-items-center justify-content-center"
                                    style="width: 45px; height: 45px;">
                                    <i class="fa-brands fa-tiktok"></i>
                                </a>
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
                        <iframe
                            src="https://maps.google.com/maps?q=SD%20Negeri%201%203%20Cepogo%2C%20Jepara&t=&z=17&ie=UTF8&iwloc=&output=embed"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
