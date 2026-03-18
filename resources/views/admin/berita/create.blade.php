@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')
    <a href="/admin/berita" class="btn btn-secondary mb-4">Kembali</a>

    <div class="card p-4">
        <h2 class="fw-bold mb-4">Tambah Poster Berita</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/admin/berita/store" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-bold">Upload Poster</label>
                <input type="file" class="form-control" name="gambar" accept="image/*" required>
                <small class="text-muted">Upload file poster bulletin. Format: JPG, PNG, GIF, WEBP (Max: 4MB)</small>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Poster</button>
        </form>
    </div>
@endsection
