@extends('layouts.admin')

@section('title', 'Tambah Galeri')

@section('content')
    <div class="container">
        <h3 class="mb-4">Tambah Foto Galeri</h3>
        <form action="/admin/galeri/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <input type="text" name="kategori" class="form-control" value="Umum">
            </div>
            <div class="mb-3">
                <label class="form-label">Gambar</label>
                <input type="file" name="gambar" class="form-control" required accept="image/*">
            </div>
            <button class="btn btn-primary">Simpan</button>
            <a href="/admin/galeri" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
