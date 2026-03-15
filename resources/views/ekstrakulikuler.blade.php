@extends('layouts.app')

@section('content')
    {{-- DAFTAR EKSTRAKULIKULER --}}
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row g-4">
                @forelse ($extracurricularItems as $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm ekskul-card">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="ekskul-icon-wrap me-3">
                                        <i class="fa-solid {{ $item['icon'] }} text-primary" style="font-size:26px;"></i>
                                    </div>
                                    <h5 class="mb-0 fw-semibold" style="font-size:16px;">{{ $item['name'] }}</h5>
                                </div>
                                <p class="text-muted" style="font-size:13px; line-height:1.7;">
                                    {{ $item['description'] }}
                                </p>
                                <div class="mt-3">
                                    <span class="badge {{ $item['type_class'] }}"
                                        style="font-size:11px;">{{ $item['type'] }}</span>
                                    <span class="badge bg-light text-muted ms-1"
                                        style="font-size:11px;">{{ $item['schedule'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted py-5">
                        <p class="mb-0">Belum ada ekstrakurikuler yang ditampilkan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
