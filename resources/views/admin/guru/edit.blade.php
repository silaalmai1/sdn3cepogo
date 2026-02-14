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

            <div class="mb-3">
                <label class="form-label fw-bold">NIP (Nomor Induk Pegawai)</label>
                <input type="text" class="form-control" name="nip" value="{{ $guru->nip }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Posisi</label>
                <input type="text" class="form-control" name="posisi" value="{{ $guru->posisi }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Mata Pelajaran (Opsional)</label>
                <input type="text" class="form-control" name="mata_pelajaran" value="{{ $guru->mata_pelajaran }}">
            </div>

            @if ($guru->foto)
                <div class="mb-3">
                    <label class="form-label fw-bold">Foto Saat Ini</label>
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $guru->foto) }}" alt="Preview"
                            style="max-width: 200px; border-radius: 5px;">
                    </div>
                </div>
            @endif

            <div class="mb-3">
                <label class="form-label fw-bold">Upload Foto Baru</label>
                <input type="file" class="form-control" name="foto" accept="image/*">
                <small class="text-muted">Format: JPG, PNG, GIF (Max: 2MB) - Abaikan jika tidak ingin mengganti</small>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Email (Opsional)</label>
                <input type="email" class="form-control" name="email" value="{{ $guru->email }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">No. Telepon (Opsional)</label>
                <input type="text" class="form-control" name="no_telepon" value="{{ $guru->no_telepon }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Biografi (Opsional)</label>
                <textarea class="form-control" name="bio" rows="4">{{ $guru->bio }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Guru</button>
        </form>
    </div>
@endsection
