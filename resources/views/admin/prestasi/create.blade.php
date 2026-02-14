@extends('layouts.admin')

@section('title', 'Tambah Prestasi')

@section('content')
    <a href="/admin/prestasi" class="btn btn-secondary mb-4">← Kembali</a>

    <div class="card p-4">
        <h2 class="fw-bold mb-4">Tambah Prestasi Baru</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/admin/prestasi/store" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-bold">Judul Prestasi</label>
                <input type="text" class="form-control" name="judul" value="{{ old('judul') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Tingkat</label>
                <input type="text" class="form-control" name="tingkat" placeholder="Contoh: Tingkat Kabupaten"
                    value="{{ old('tingkat') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Tahun</label>
                <input type="number" class="form-control" name="tahun" min="2000" max="2099"
                    value="{{ old('tahun', date('Y')) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Deskripsi Singkat</label>
                <textarea class="form-control" name="deskripsi_singkat" rows="2" required>{{ old('deskripsi_singkat') }}</textarea>
                <small class="text-muted">Deskripsi yang ditampilkan di kartu prestasi</small>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Deskripsi Lengkap</label>
                <textarea class="form-control" name="deskripsi_lengkap" rows="6" required>{{ old('deskripsi_lengkap') }}</textarea>
                <small class="text-muted">Deskripsi detail untuk halaman detail prestasi</small>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Upload Gambar</label>
                <input type="file" class="form-control" name="gambar" accept="image/*">
                <small class="text-muted">Format: JPG, PNG, GIF (Max: 2MB)</small>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Prestasi</button>
        </form>
    </div>
@endsection
