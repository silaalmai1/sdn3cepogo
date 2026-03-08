@extends('layouts.admin')

@section('title', 'Tambah Galeri')

@section('content')
    <div class="container">
        <h3 class="mb-4">Tambah Galeri</h3>
        <form action="/admin/galeri/store" method="POST" enctype="multipart/form-data" id="galeriForm">
            @csrf
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <input type="text" name="kategori" class="form-control" value="{{ old('kategori', 'Umum') }}">
            </div>

            {{-- TIPE --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Tipe Konten</label>
                <div class="d-flex gap-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipe" id="tipeFoto" value="foto" checked
                            onchange="toggleTipe()">
                        <label class="form-check-label" for="tipeFoto"><i class="bi bi-image"></i> Foto</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipe" id="tipeVideo" value="video"
                            onchange="toggleTipe()">
                        <label class="form-check-label" for="tipeVideo"><i class="bi bi-play-circle"></i> Video</label>
                    </div>
                </div>
            </div>

            {{-- UPLOAD FOTO --}}
            <div class="mb-3" id="inputFoto">
                <label class="form-label">Upload Foto</label>
                <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror"
                    accept="image/*">
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- URL / FILE VIDEO --}}
            <div class="mb-3 d-none" id="inputVideo">
                <label class="form-label fw-semibold">Sumber Video</label>
                <div class="d-flex gap-3 mb-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="video_sumber" id="sumberUrl" value="url"
                            checked onchange="toggleVideoSumber()">
                        <label class="form-check-label" for="sumberUrl"><i class="bi bi-link-45deg"></i> URL YouTube</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="video_sumber" id="sumberFile" value="file"
                            onchange="toggleVideoSumber()">
                        <label class="form-check-label" for="sumberFile"><i class="bi bi-upload"></i> Upload File</label>
                    </div>
                </div>
                <div id="inputVideoUrl">
                    <input type="url" name="video_url" class="form-control @error('video_url') is-invalid @enderror"
                        value="{{ old('video_url') }}" placeholder="https://www.youtube.com/watch?v=...">
                    @error('video_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div id="inputVideoFile" class="d-none">
                    <input type="file" name="video_file" class="form-control @error('video_file') is-invalid @enderror"
                        accept="video/mp4,video/mov,video/avi,video/mkv,video/webm">
                    <small class="text-muted">Format: MP4, MOV, AVI, MKV, WEBM. Maks 500MB.</small>
                    @error('video_file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="/admin/galeri" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <script>
        function toggleTipe() {
            const isFoto = document.getElementById('tipeFoto').checked;
            document.getElementById('inputFoto').classList.toggle('d-none', !isFoto);
            document.getElementById('inputVideo').classList.toggle('d-none', isFoto);
        }

        function toggleVideoSumber() {
            const isFile = document.getElementById('sumberFile').checked;
            document.getElementById('inputVideoUrl').classList.toggle('d-none', isFile);
            document.getElementById('inputVideoFile').classList.toggle('d-none', !isFile);
        }
        window.addEventListener('DOMContentLoaded', function() {
            const tipe = document.querySelector('input[name="tipe"]:checked');
            if (tipe && tipe.value === 'video') toggleTipe();
            const sumber = document.querySelector('input[name="video_sumber"]:checked');
            if (sumber && sumber.value === 'file') toggleVideoSumber();
        });
    </script>
@endsection
