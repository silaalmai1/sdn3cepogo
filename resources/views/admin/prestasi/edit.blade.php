@extends('layouts.admin')

@section('title', 'Edit Prestasi')

@section('content')
    <a href="/admin/prestasi" class="btn btn-secondary mb-4">← Kembali</a>

    <div class="card p-4">
        <h2 class="fw-bold mb-4">Edit Prestasi</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/admin/prestasi/{{ $prestasi->id }}/update" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-bold">Judul Prestasi</label>
                <input type="text" class="form-control" name="judul" value="{{ $prestasi->judul }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Tingkat</label>
                <input type="text" class="form-control" name="tingkat" value="{{ $prestasi->tingkat }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Tahun</label>
                <input type="number" class="form-control" name="tahun" min="2000" max="2099"
                    value="{{ $prestasi->tahun }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Deskripsi Singkat</label>
                <textarea class="form-control" name="deskripsi_singkat" rows="2" required>{{ $prestasi->deskripsi_singkat }}</textarea>
                <small class="text-muted">Deskripsi yang ditampilkan di kartu prestasi</small>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Deskripsi Lengkap</label>
                <textarea class="form-control" name="deskripsi_lengkap" rows="6" required>{{ $prestasi->deskripsi_lengkap }}</textarea>
                <small class="text-muted">Deskripsi detail untuk halaman detail prestasi</small>
            </div>

            @if ($prestasi->gambar)
                <div class="mb-3">
                    <label class="form-label fw-bold">Gambar Saat Ini</label>
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $prestasi->gambar) }}" alt="Preview"
                            style="max-width: 200px; border-radius: 5px;">
                    </div>
                </div>
            @endif

            <div class="mb-3">
                <label class="form-label fw-bold">Upload Gambar Baru</label>
                <input type="file" class="form-control" name="gambar" accept="image/*">
                <small class="text-muted">Format: JPG, PNG, GIF (Max: 2MB) - Abaikan jika tidak ingin mengganti</small>
            </div>

            <button type="submit" class="btn btn-primary">Update Prestasi</button>
        </form>
    </div>
@endsection
