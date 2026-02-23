@extends('layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Hubungi Kami</h2>

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
                                <a href="tel:081390788465" class="text-decoration-none text-dark">
                                    081390788465
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
                                <a href="mailto:sdn3cepogo@gmail.com" class="text-decoration-none text-dark">
                                    sdn1.3cepogo@gmail.com
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
                                Desa Cepogo RT. 04 RW. 10<br>
                                Kec. Kembang<br>
                                Kab. Jepara<br>
                                Prov. Jawa Tengah
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
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.5784571649753!2d110.7034!3d-6.8951!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e771b7c7c7c7c7d%3A0x7c7c7c7c7c7c7c7c!2sCepogo%2C%20Jepara!5e0!3m2!1sid!2sid!4v1234567890"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
