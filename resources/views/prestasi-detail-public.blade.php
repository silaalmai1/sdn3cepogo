@extends('layouts.app')

@section('content')
    <section class="container py-5">
        <a href="/prestasi" class="btn btn-outline-secondary mb-4">
            <i class="bi bi-arrow-left"></i> Kembali ke Prestasi
        </a>

        <div class="row g-4">
            <div class="col-md-5">
                <img src="{{ $prestasi->gambar ? asset('storage/' . $prestasi->gambar) : asset('images/placeholder.jpg') }}"
                    class="img-fluid rounded shadow-sm" style="width: 100%; object-fit: cover;">
            </div>

            <div class="col-md-7">
                <div class="mb-3">
                    <span class="badge bg-primary" style="font-size: 12px;">{{ $prestasi->tingkat }}</span>
                    <span class="badge bg-secondary ms-2" style="font-size: 12px;">
                        <i class="bi bi-calendar-event"></i> {{ $prestasi->tahun }}
                    </span>
                </div>
                <h1 class="fw-bold mb-4" style="font-size: 32px; line-height: 1.3; color: #2c3e50;">{{ $prestasi->judul }}
                </h1>
                <div class="detail-text" style="font-size: 16px; line-height: 1.8; color: #444; text-align: justify;">
                    {!! nl2br(e($prestasi->deskripsi_lengkap)) !!}
                </div>
            </div>
        </div>
    </section>
@endsection
