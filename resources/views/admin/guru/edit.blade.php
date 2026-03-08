@extends('layouts.admin')

@section('title', 'Edit Guru')

@section('content')
    <a href="/admin/guru" class="btn btn-secondary mb-4">← Kembali</a>

    <div class="card p-4">
        <h2 class="fw-bold mb-4">Edit Guru</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/admin/guru/{{ $guru->id }}/update" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-bold">Nama Guru</label>
                <input type="text" class="form-control" name="nama" value="{{ $guru->nama }}" required>
            </div>

            @if ($guru->foto)
                <div class="mb-3">
                    <label class="form-label fw-bold">Foto Saat Ini</label>
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $guru->foto) }}" alt="Preview"
                            style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%; border: 3px solid #e0e0e0;">
                    </div>
                </div>
            @endif

            <div class="mb-3">
                <label class="form-label fw-bold">Upload Foto Baru</label>
                <input type="file" class="form-control" name="foto" accept="image/*">
                <small class="text-muted">Format: JPG, PNG, GIF (Max: 2MB) - Abaikan jika tidak ingin mengganti</small>
            </div>

            <button type="submit" class="btn btn-primary">Update Guru</button>
        </form>
    </div>
@endsection
