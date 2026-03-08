@extends('layouts.app')

@section('content')
    {{-- DAFTAR EKSTRAKULIKULER --}}
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row g-4">

                {{-- Pramuka --}}
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm ekskul-card">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="ekskul-icon-wrap me-3">
                                    <i class="fa-solid fa-campground text-primary" style="font-size:26px;"></i>
                                </div>
                                <h5 class="mb-0 fw-semibold" style="font-size:16px;">Pramuka</h5>
                            </div>
                            <p class="text-muted" style="font-size:13px; line-height:1.7;">
                                Kegiatan kepramukaan yang melatih kedisiplinan, kemandirian, dan jiwa kepemimpinan siswa
                                melalui kegiatan di alam terbuka.
                            </p>
                            <div class="mt-3">
                                <span class="badge bg-primary-subtle text-primary" style="font-size:11px;">Wajib</span>
                                <span class="badge bg-light text-muted ms-1" style="font-size:11px;">Setiap Jumat</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Seni Tari --}}
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm ekskul-card">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="ekskul-icon-wrap me-3">
                                    <i class="fa-solid fa-music text-primary" style="font-size:26px;"></i>
                                </div>
                                <h5 class="mb-0 fw-semibold" style="font-size:16px;">Seni Tari</h5>
                            </div>
                            <p class="text-muted" style="font-size:13px; line-height:1.7;">
                                Mengembangkan bakat seni tari tradisional dan modern untuk memperkenalkan budaya lokal
                                kepada siswa sejak dini.
                            </p>
                            <div class="mt-3">
                                <span class="badge bg-success-subtle text-success" style="font-size:11px;">Pilihan</span>
                                <span class="badge bg-light text-muted ms-1" style="font-size:11px;">Setiap Rabu</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Olahraga --}}
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm ekskul-card">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="ekskul-icon-wrap me-3">
                                    <i class="fa-solid fa-futbol text-primary" style="font-size:26px;"></i>
                                </div>
                                <h5 class="mb-0 fw-semibold" style="font-size:16px;">Olahraga</h5>
                            </div>
                            <p class="text-muted" style="font-size:13px; line-height:1.7;">
                                Mendorong siswa aktif bergerak melalui berbagai cabang olahraga seperti sepak bola, bulu
                                tangkis, dan voli.
                            </p>
                            <div class="mt-3">
                                <span class="badge bg-success-subtle text-success" style="font-size:11px;">Pilihan</span>
                                <span class="badge bg-light text-muted ms-1" style="font-size:11px;">Setiap Sabtu</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Kesenian --}}
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm ekskul-card">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="ekskul-icon-wrap me-3">
                                    <i class="fa-solid fa-palette text-primary" style="font-size:26px;"></i>
                                </div>
                                <h5 class="mb-0 fw-semibold" style="font-size:16px;">Kesenian</h5>
                            </div>
                            <p class="text-muted" style="font-size:13px; line-height:1.7;">
                                Melatih kreativitas siswa melalui seni rupa, menggambar, dan kerajinan tangan yang mengasah
                                imajinasi dan ekspresi diri.
                            </p>
                            <div class="mt-3">
                                <span class="badge bg-success-subtle text-success" style="font-size:11px;">Pilihan</span>
                                <span class="badge bg-light text-muted ms-1" style="font-size:11px;">Setiap Kamis</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Komputer --}}
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm ekskul-card">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="ekskul-icon-wrap me-3">
                                    <i class="fa-solid fa-computer text-primary" style="font-size:26px;"></i>
                                </div>
                                <h5 class="mb-0 fw-semibold" style="font-size:16px;">Komputer</h5>
                            </div>
                            <p class="text-muted" style="font-size:13px; line-height:1.7;">
                                Mengenalkan teknologi informasi kepada siswa sejak dini agar siap menghadapi era digital
                                dengan kemampuan literasi komputer.
                            </p>
                            <div class="mt-3">
                                <span class="badge bg-success-subtle text-success" style="font-size:11px;">Pilihan</span>
                                <span class="badge bg-light text-muted ms-1" style="font-size:11px;">Setiap Selasa</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Drumband --}}
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm ekskul-card">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="ekskul-icon-wrap me-3">
                                    <i class="fa-solid fa-drum text-primary" style="font-size:26px;"></i>
                                </div>
                                <h5 class="mb-0 fw-semibold" style="font-size:16px;">Drumband</h5>
                            </div>
                            <p class="text-muted" style="font-size:13px; line-height:1.7;">
                                Melatih kekompakan dan rasa musikal siswa melalui kegiatan drumband yang sering tampil pada
                                acara sekolah dan daerah.
                            </p>
                            <div class="mt-3">
                                <span class="badge bg-success-subtle text-success" style="font-size:11px;">Pilihan</span>
                                <span class="badge bg-light text-muted ms-1" style="font-size:11px;">Setiap Senin</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
