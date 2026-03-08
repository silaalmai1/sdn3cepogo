@extends('layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">

            <h2 class="text-center mb-5 fw-semibold">Tentang Sekolah</h2>

            <div class="row align-items-center">

                <div class="col-md-6">
                    <img src="{{ asset('images/sekolah.jpg') }}" class="img-fluid rounded shadow">
                </div>

                <div class="col-md-6">
                    <h3>SD Negeri 1-3 Cepogo</h3>
                    <p>
                        SD Negeri 1-3 Cepogo merupakan sekolah dasar yang
                        berlokasi di Desa Cepogo, Kecamatan Kembang,
                        Kabupaten Jepara, Provinsi Jawa Tengah.
                    </p>

                    <p>
                        Sekolah kami berkomitmen menciptakan lingkungan belajar
                        yang nyaman, kreatif, dan berprestasi untuk membentuk
                        generasi yang cerdas, berakhlak, dan berkarakter.
                    </p>

                    <p>
                        Dengan dukungan tenaga pendidik profesional dan fasilitas
                        yang memadai, SD Negeri 1-3 Cepogo terus berkembang
                        untuk memberikan pendidikan terbaik bagi siswa.
                    </p>
                </div>

            </div>

        </div>
    </section>

    {{-- SECTION VISI MISI --}}
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5 fw-semibold">Visi & Misi Sekolah</h2>

            <div class="row g-4 justify-content-center">
                {{-- VISI --}}
                <div class="col-md-5">
                    <div class="card visi-misi-card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-wrapper bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                                    <i class="bi bi-eye-fill text-primary fs-4"></i>
                                </div>
                                <h3 class="mb-0 fw-bold">Visi</h3>
                            </div>
                            <p class="text-muted lh-lg mb-0" style="font-size: 15px;">
                                Mewujudkan peserta didik unggul dalam prestasi yang berprofil pelajar
                                pancasila serta peduli terhadap lingkungan.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- MISI --}}
                <div class="col-md-7">
                    <div class="card visi-misi-card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-wrapper bg-success bg-opacity-10 p-3 rounded-circle me-3">
                                    <i class="bi bi-bullseye text-success fs-4"></i>
                                </div>
                                <h3 class="mb-0 fw-bold">Misi</h3>
                            </div>
                            <ul class="text-muted lh-lg mb-0 ps-3" style="font-size: 15px;">
                                <li>Meningkatkan keimanan dan ketaqwaan kepada Tuhan YME melalui penanaman budi pekerti dan
                                    program kegiatan keagamaan</li>
                                <li>Mewujudkan pengembangan kurikulum yang meliputi 8 standar pendidikan</li>
                                <li>Mewujudkan pelaksanaan pembelajaran aktif, inovatif, kreatif ,efektif dan menyenangkan
                                    sesuai dengan kebutuhan peserta didik</li>
                                <li>Meningkatkan prestasi akademik dan non akademik sesuai bakat dan minat</li>
                                <li>Meningkatkan sikap jujur, disiplin, peduli, santun, percaya diri, semangat kolaborasi
                                    dalam berinteraksi dengan lingkungan sosial dan alam</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
