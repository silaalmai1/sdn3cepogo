@extends('layouts.app')

@php
    $schoolName = App\Models\Setting::get('school_name', 'SD Negeri 1-3 Cepogo');

    $aboutSchoolContent = App\Models\Setting::get(
        'about_school_content',
        'SD Negeri 1-3 Cepogo merupakan sekolah dasar yang berlokasi di Desa Cepogo, Kecamatan Kembang, Kabupaten Jepara, Provinsi Jawa Tengah.

Sekolah kami berkomitmen menciptakan lingkungan belajar yang nyaman, kreatif, dan berprestasi untuk membentuk generasi yang cerdas, berakhlak, dan berkarakter.

Dengan dukungan tenaga pendidik profesional dan fasilitas yang memadai, SD Negeri 1-3 Cepogo terus berkembang untuk memberikan pendidikan terbaik bagi siswa.',
    );

    $aboutSchoolParagraphs = collect(preg_split('/\r\n|\r|\n/', (string) $aboutSchoolContent))
        ->map(fn($item) => trim($item))
        ->filter()
        ->values();

    $visionText = App\Models\Setting::get(
        'vision_text',
        'Mewujudkan peserta didik unggul dalam prestasi yang berprofil pelajar pancasila serta peduli terhadap lingkungan.',
    );

    $missionText = App\Models\Setting::get(
        'mission_text',
        "Meningkatkan keimanan dan ketaqwaan kepada Tuhan YME melalui penanaman budi pekerti dan program kegiatan keagamaan\nMewujudkan pengembangan kurikulum yang meliputi 8 standar pendidikan\nMewujudkan pelaksanaan pembelajaran aktif, inovatif, kreatif, efektif dan menyenangkan sesuai dengan kebutuhan peserta didik\nMeningkatkan prestasi akademik dan non akademik sesuai bakat dan minat\nMeningkatkan sikap jujur, disiplin, peduli, santun, percaya diri, semangat kolaborasi dalam berinteraksi dengan lingkungan sosial dan alam",
    );

    $missionItems = collect(preg_split('/\r\n|\r|\n/', (string) $missionText))
        ->map(fn($item) => trim($item))
        ->filter()
        ->values();
@endphp

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <p class="text-primary fw-semibold text-uppercase mb-2" style="letter-spacing: 1px; font-size: 13px;">Profil
                    Sekolah</p>
                <h1 class="fw-bold mb-2" style="font-size: clamp(1.8rem, 2.8vw, 2.4rem);">Tentang {{ $schoolName }}</h1>
                <p class="text-muted mb-0" style="max-width: 680px; margin: 0 auto;">Mengenal lingkungan sekolah, komitmen
                    pendidikan, dan arah pengembangan karakter peserta didik.</p>
            </div>

            <div class="row g-4 align-items-stretch">
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100 overflow-hidden">
                        <img src="{{ asset('images/sekolah.jpg') }}" class="img-fluid w-100 h-100"
                            alt="Foto SD Negeri 1-3 Cepogo" style="min-height: 320px; object-fit: cover;">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4 p-md-5">
                            <h2 class="fw-bold mb-3">{{ $schoolName }}</h2>
                            @forelse ($aboutSchoolParagraphs as $paragraph)
                                <p class="text-muted {{ $loop->last ? 'mb-0' : 'mb-3' }}" style="line-height: 1.8;">
                                    {{ $paragraph }}
                                </p>
                            @empty
                                <p class="text-muted mb-0" style="line-height: 1.8;">
                                    Konten tentang sekolah belum diatur.
                                </p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-3 mt-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <h3 class="h5 fw-semibold mb-2">Lingkungan Nyaman</h3>
                            <p class="text-muted mb-0">Suasana belajar kondusif yang mendukung tumbuh kembang akademik dan
                                karakter siswa.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <h3 class="h5 fw-semibold mb-2">Guru Profesional</h3>
                            <p class="text-muted mb-0">Tenaga pendidik berdedikasi yang aktif membimbing proses belajar
                                secara menyeluruh.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <h3 class="h5 fw-semibold mb-2">Berkarakter</h3>
                            <p class="text-muted mb-0">Pembelajaran menekankan nilai akhlak, kedisiplinan, dan semangat
                                gotong royong.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION VISI MISI --}}
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-2">Visi & Misi Sekolah</h2>
                <p class="text-muted mb-0">Arah utama pengembangan pendidikan SD Negeri 1-3 Cepogo.</p>
            </div>

            <div class="row g-4 justify-content-center">
                {{-- VISI --}}
                <div class="col-lg-5">
                    <div class="card visi-misi-card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-wrapper bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                                    <i class="bi bi-eye-fill text-primary fs-4"></i>
                                </div>
                                <h3 class="mb-0 fw-bold h4">Visi</h3>
                            </div>
                            <p class="text-muted lh-lg mb-0" style="font-size: 15px;">
                                {{ $visionText }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- MISI --}}
                <div class="col-lg-7">
                    <div class="card visi-misi-card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-wrapper bg-success bg-opacity-10 p-3 rounded-circle me-3">
                                    <i class="bi bi-bullseye text-success fs-4"></i>
                                </div>
                                <h3 class="mb-0 fw-bold h4">Misi</h3>
                            </div>
                            <ul class="text-muted lh-lg mb-0 ps-3" style="font-size: 15px;">
                                @forelse ($missionItems as $mission)
                                    <li>{{ $mission }}</li>
                                @empty
                                    <li>Konten misi sekolah belum diatur.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
