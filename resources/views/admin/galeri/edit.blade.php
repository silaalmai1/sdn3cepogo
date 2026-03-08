@extends('layouts.admin')

@section('title', 'Edit Galeri')

@section('content')
    <div class="container">
        <h3 class="mb-4">Edit Galeri</h3>
        <form action="/admin/galeri/{{ $galeri->id }}/update" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <input type="text" name="kategori" class="form-control" value="{{ old('kategori', $galeri->kategori) }}">
            </div>

            {{-- TIPE --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Tipe Konten</label>
                <div class="d-flex gap-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipe" id="tipeFoto" value="foto"
                            {{ ($galeri->tipe ?? 'foto') === 'foto' ? 'checked' : '' }} onchange="toggleTipe()">
                        <label class="form-check-label" for="tipeFoto"><i class="bi bi-image"></i> Foto</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipe" id="tipeVideo" value="video"
                            {{ ($galeri->tipe ?? 'foto') === 'video' ? 'checked' : '' }} onchange="toggleTipe()">
                        <label class="form-check-label" for="tipeVideo"><i class="bi bi-play-circle"></i> Video</label>
                    </div>
                </div>
            </div>

            {{-- UPLOAD FOTO --}}
            <div class="mb-3" id="inputFoto" {{ ($galeri->tipe ?? 'foto') === 'video' ? 'style=display:none' : '' }}>
                <label class="form-label">Ganti Foto <small class="text-muted">(kosongkan jika tidak
                        diganti)</small></label>
                <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror"
                    accept="image/*">
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @if ($galeri->gambar)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $galeri->gambar) }}" width="120" class="rounded">
                    </div>
                @endif
            </div>

            {{-- URL VIDEO --}}
            <div class="mb-3" id="inputVideo" {{ ($galeri->tipe ?? 'foto') !== 'video' ? 'style=display:none' : '' }}>
                <label class="form-label">URL Video <small class="text-muted">(YouTube, dll.)</small></label>
                <input type="url" name="video_url" class="form-control @error('video_url') is-invalid @enderror"
                    value="{{ old('video_url', $galeri->video_url) }}" placeholder="https://www.youtube.com/watch?v=...">
                @error('video_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="/admin/galeri" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <script>
        function toggleTipe() {
            const isFoto = document.getElementById('tipeFoto').checked;
            document.getElementById('inputFoto').style.display = isFoto ? '' : 'none';
            document.getElementById('inputVideo').style.display = isFoto ? 'none' : '';
        }

        function toggleVideoSumber() {
            const isFile = document.getElementById('sumberFile').checked;
            document.getElementById('inputVideoUrl').style.display = isFile ? 'none' : '';
            document.getElementById('inputVideoFile').style.display = isFile ? '' : 'none';
        }
    </script>
@endsection
