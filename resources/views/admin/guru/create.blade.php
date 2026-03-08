@extends('layouts.admin')

@section('title', 'Tambah Guru')

@section('content')
    <a href="/admin/guru" class="btn btn-secondary mb-4">← Kembali</a>

    <div class="card p-4">
        <h2 class="fw-bold mb-4">Tambah Guru Baru</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/admin/guru/store" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-bold">Nama Guru</label>
                <input type="text" class="form-control" name="nama" value="{{ old('nama') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Foto</label>
                <input type="file" class="form-control" name="foto" accept="image/*">
                <small class="text-muted">Format: JPG, PNG, GIF (Max: 2MB)</small>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Guru</button>
        </form>
    </div>
@endsection
