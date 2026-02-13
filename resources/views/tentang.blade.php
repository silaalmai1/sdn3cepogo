@extends('layouts.app')

@section('content')

<section class="py-5">
    <div class="container">

        <h2 class="text-center mb-5 fw-bold">Tentang Sekolah</h2>

        <div class="row align-items-center">
            
            <div class="col-md-6">
                <img src="{{ asset('images/sekolah.jpg') }}" 
                     class="img-fluid rounded shadow">
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

@endsection
