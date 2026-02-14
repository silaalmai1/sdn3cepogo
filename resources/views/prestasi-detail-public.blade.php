@extends('layouts.app')

@section('content')
    <section class="container py-5">
        <a href="/prestasi" class="btn btn-secondary mb-4">
            ← Kembali ke Prestasi
        </a>

        <div class="row">
            <div class="col-md-6">
                <img src="{{ $prestasi->gambar ? asset('storage/' . $prestasi->gambar) : asset('images/placeholder.jpg') }}"
                    class="img-fluid rounded">
            </div>

            <div class="col-md-6">
                <h1 class="fw-bold detail-title">{{ $prestasi->judul }}</h1>
                <p class="text-muted detail-subtitle">{{ $prestasi->tingkat }} - {{ $prestasi->tahun }}</p>
                <p class="detail-text">
                    {!! nl2br(e($prestasi->deskripsi_lengkap)) !!}
                    <br><br>
                </p>
            </div>
        </div>
    </section>
@endsection
