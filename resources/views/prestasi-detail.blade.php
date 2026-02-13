@extends('layouts.app')

@section('content')

<section class="container py-5">
    <a href="/prestasi" class="btn btn-secondary mb-4">
        ← Kembali ke Prestasi
    </a>

    <div class="row">
        <div class="col-md-6">
            <img src="/images/lombafls3n.jpg" class="img-fluid rounded">
        </div>

        <div class="col-md-6">
            <h1 class="fw-bold detail-title">Juara 1 Menyanyi Solo</h1>
            <p class="text-muted detail-subtitle">Tingkat Kabupaten - 2025</p>
            <p class="detail-text">
                Selamat dan sukses atas keberhasilan ananda [Nama Anak] yang telah berhasil meraih 
                Juara 1 Lomba Menyanyi Solo dalam ajang FLS3N (Festival dan Lomba Seni Siswa Nasional) Tingkat Kabupaten Jepara Tahun 2025.
                Penyerahan penghargaan dilakukan langsung oleh Kepala Dinas Dikpora Kabupaten Jepara, Bapak Ali Hidayat, S.Pd., M.Pd. 
                Prestasi ini merupakan buah dari kerja keras, latihan konsisten, dan bakat yang luar biasa. Semoga kemenangan ini menjadi motivasi untuk terus 
                berkarya dan melaju ke tingkat selanjutnya dengan semangat "Merdeka Berprestasi, Talenta Seni Menginspirasi".
                <br><br>
            </p>
        </div>
    </div>
</section>

@endsection
