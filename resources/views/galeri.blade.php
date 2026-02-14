@extends('layouts.app')

@section('content')
    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5 mt-3">
                <h2 class="guru-section-title">Galeri Sekolah</h2>
                <p class="guru-section-subtitle">Kumpulan momen terbaik SD Negeri 1-3 Cepogo</p>
            </div>
            <div class="row g-4">
                @forelse($galeris as $galeri)
                    <div class="col-md-4 col-lg-3">
                        <div class="card h-100">
                            <img src="{{ asset('storage/' . $galeri->gambar) }}" class="card-img-top"
                                style="height:180px;object-fit:cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $galeri->judul }}</h5>
                                <p class="card-text text-muted mb-2">{{ $galeri->kategori }}</p>
                                <p class="card-text">{{ Str::limit($galeri->deskripsi, 60) }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">Belum ada foto galeri</p>
                    </div>
                @endforelse
            </div>
            <div class="mt-4">
                {{ $galeris->links() }}
            </div>
        </div>
    </section>
@endsection
