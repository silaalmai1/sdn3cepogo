@extends('layouts.admin')

@section('title', 'Edit Galeri')

@section('content')
    <div class="container">
        <h3 class="mb-4">Edit Foto Galeri</h3>
        <form action="/admin/galeri/{{ $galeri->id }}/update" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ $galeri->judul }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control">{{ $galeri->deskripsi }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <input type="text" name="kategori" class="form-control" value="{{ $galeri->kategori }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Gambar</label>
                <input type="file" name="gambar" class="form-control" accept="image/*">
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $galeri->gambar) }}" width="120">
                </div>
            </div>
            <button class="btn btn-primary">Update</button>
            <a href="/admin/galeri" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
