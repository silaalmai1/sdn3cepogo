@extends('layouts.admin')

@section('title', 'Galeri')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0">Galeri</h3>
            <a href="/admin/galeri/create" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah Foto</a>
        </div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
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
                            <div class="d-flex justify-content-between mt-3">
                                <a href="/admin/galeri/{{ $galeri->id }}/edit" class="btn btn-sm btn-warning"><i
                                        class="bi bi-pencil"></i></a>
                                <form action="/admin/galeri/{{ $galeri->id }}/delete" method="POST"
                                    onsubmit="return confirm('Yakin hapus?')">
                                    @csrf
                                    <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
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
@endsection
