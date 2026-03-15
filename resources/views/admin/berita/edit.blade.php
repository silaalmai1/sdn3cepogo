@extends('layouts.admin')

@section('title', 'Edit Poster Berita')

@section('content')
    <a href="/admin/berita" class="btn btn-secondary mb-4">← Kembali</a>

    <div class="card p-4">
        <h2 class="fw-bold mb-4">Edit Poster Berita</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/admin/berita/{{ $berita->id }}/update" method="POST" enctype="multipart/form-data">
            @csrf

            @if ($berita->gambar)
                <div class="mb-3">
                    <label class="form-label fw-bold">Poster Saat Ini</label>
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Preview poster"
                            style="max-width: 280px; border-radius: 6px; border: 1px solid #e5e7eb;">
                    </div>
                </div>
            @endif

            <div class="mb-3">
                <label class="form-label fw-bold">Ganti Poster</label>
                <input type="file" class="form-control" name="gambar" accept="image/*">
                <small class="text-muted">Format: JPG, PNG, GIF, WEBP (Max: 4MB) - Abaikan jika tidak ingin
                    mengganti</small>
            </div>

            <button type="submit" class="btn btn-primary">Update Poster</button>
        </form>
    </div>
@endsection
