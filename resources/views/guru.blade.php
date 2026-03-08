@extends('layouts.app')

@section('content')
    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5 mt-3">
                <h2 class="guru-section-title">Daftar Guru & Tenaga Pendidik</h2>
                <p class="guru-section-subtitle">{{ $gurus->count() }} Tenaga Pendidik Profesional</p>
            </div>

            <div class="row g-4 justify-content-center">
                @if ($gurus->count() > 0)
                    @foreach ($gurus as $guru)
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="text-center">
                                @if ($guru->foto)
                                    <div class="mb-3">
                                        <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama }}"
                                            style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%; border: 4px solid #e0e0e0;">
                                    </div>
                                @else
                                    <div class="mb-3 mx-auto bg-secondary text-white d-flex align-items-center justify-content-center"
                                        style="width: 150px; height: 150px; border-radius: 50%; border: 4px solid #e0e0e0;">
                                        <i class="bi bi-person-fill" style="font-size: 60px;"></i>
                                    </div>
                                @endif
                                <h6 class="fw-bold mb-1" style="font-size: 14px;">{{ $guru->nama }}</h6>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center py-5">
                        <p class="text-muted" style="font-size: 18px;">Belum ada data guru yang ditampilkan</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
