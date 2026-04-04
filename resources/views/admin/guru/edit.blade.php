@extends('layouts.admin')

@section('title', 'Edit Guru')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css">
    <style>
        .guru-cropper-modal {
            position: fixed;
            inset: 0;
            z-index: 9999;
            background: rgba(17, 24, 39, 0.92);
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .guru-cropper-modal.show {
            display: flex;
        }

        .cropper-modal-card {
            width: min(900px, 100%);
            max-height: 92vh;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.28);
            display: flex;
            flex-direction: column;
        }

        .cropper-modal-body {
            padding: 12px;
            background: #f7f8fa;
            min-height: 380px;
            max-height: 65vh;
            overflow: auto;
        }

        .cropper-container,
        .cropper-wrap-box,
        .cropper-canvas {
            background: #ffffff !important;
        }

        .guru-cropper-modal .cropper-face {
            background-color: rgba(255, 255, 255, 0.08) !important;
        }

        .cropper-modal-body img {
            max-width: 100%;
            display: block;
        }

        .guru-preview-wrap {
            min-height: 230px;
        }

        #guru-foto-preview {
            width: 220px;
            height: 220px;
            object-fit: cover;
            border: 3px solid #e0e0e0;
        }

        @media (max-width: 576px) {
            .cropper-modal-footer {
                flex-direction: column;
                align-items: stretch !important;
                gap: 10px;
            }

            .cropper-modal-footer .d-flex {
                justify-content: center;
                flex-wrap: wrap;
            }
        }
    </style>

    <a href="/admin/guru" class="btn btn-secondary mb-4">Kembali</a>

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
                    <div
                        class="mb-2 border rounded p-2 text-center bg-light guru-preview-wrap d-flex align-items-center justify-content-center flex-column">
                        <img src="{{ asset('storage/' . $guru->foto) }}" alt="Preview" id="guru-foto-preview"
                            class="img-fluid rounded" style="display: inline-block;">
                        <p id="guru-foto-empty" class="text-muted mb-0" style="display: none;">Belum ada foto</p>
                    </div>
                </div>
            @else
                <div class="mb-3">
                    <label class="form-label fw-bold">Foto Saat Ini</label>
                    <div
                        class="mb-2 border rounded p-2 text-center bg-light guru-preview-wrap d-flex align-items-center justify-content-center flex-column">
                        <img id="guru-foto-preview" src="" alt="Preview" style="display: none;"
                            class="img-fluid rounded">
                        <p id="guru-foto-empty" class="text-muted mb-0">Belum ada foto</p>
                    </div>
                </div>
            @endif

            <div class="mb-3">
                <label class="form-label fw-bold">Upload Foto Baru</label>
                <input type="file" class="form-control" name="foto" id="guru_foto_input" accept="image/*"
                    onchange="openGuruCropper(event)">
                <small class="text-muted">Format: JPG, PNG, GIF (Max: 2MB) - Abaikan jika tidak ingin mengganti</small>
            </div>

            <button type="submit" class="btn btn-primary">Update Guru</button>
        </form>
    </div>

    <div id="cropperModal" class="guru-cropper-modal" aria-hidden="true">
        <div class="cropper-modal-card">
            <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
                <h6 class="mb-0">Sesuaikan Foto Guru</h6>
                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="cancelGuruCropper()">Tutup</button>
            </div>
            <div class="cropper-modal-body">
                <img id="cropperImage" src="" alt="Crop preview">
            </div>
            <div class="d-flex justify-content-between align-items-center p-3 border-top cropper-modal-footer">
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-outline-secondary btn-sm" onclick="rotateGuruCropper(-90)">Putar
                        Kiri</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm" onclick="rotateGuruCropper(90)">Putar
                        Kanan</button>
                </div>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-light btn-sm" onclick="cancelGuruCropper()">Batal</button>
                    <button type="button" class="btn btn-primary btn-sm" onclick="applyGuruCroppedImage()">Gunakan Foto
                        Ini</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.js"></script>
    <script>
        let guruCropper = null;
        let originalGuruFileType = 'image/jpeg';

        function openGuruCropper(event) {
            const input = event.target;
            const file = input.files && input.files[0] ? input.files[0] : null;
            if (!file) {
                return;
            }

            originalGuruFileType = file.type || 'image/jpeg';

            const modal = document.getElementById('cropperModal');
            const image = document.getElementById('cropperImage');
            image.src = URL.createObjectURL(file);

            modal.classList.add('show');
            modal.setAttribute('aria-hidden', 'false');

            if (guruCropper) {
                guruCropper.destroy();
            }

            guruCropper = new Cropper(image, {
                viewMode: 1,
                dragMode: 'move',
                autoCropArea: 1,
                responsive: true,
                background: true,
                modal: false,
                highlight: false
            });
        }

        function rotateGuruCropper(deg) {
            if (guruCropper) {
                guruCropper.rotate(deg);
            }
        }

        function cancelGuruCropper() {
            const modal = document.getElementById('cropperModal');
            modal.classList.remove('show');
            modal.setAttribute('aria-hidden', 'true');

            const input = document.getElementById('guru_foto_input');
            if (input) {
                input.value = '';
            }

            if (guruCropper) {
                guruCropper.destroy();
                guruCropper = null;
            }
        }

        function applyGuruCroppedImage() {
            if (!guruCropper) {
                return;
            }

            const outputType = originalGuruFileType === 'image/png' ? 'image/png' : 'image/jpeg';
            const canvas = guruCropper.getCroppedCanvas({
                maxWidth: 1800,
                maxHeight: 1800,
                imageSmoothingQuality: 'high'
            });

            canvas.toBlob(function(blob) {
                if (!blob) {
                    return;
                }

                const extension = outputType === 'image/png' ? 'png' : 'jpg';
                const croppedFile = new File([blob], `guru-${Date.now()}.${extension}`, {
                    type: outputType
                });

                const input = document.getElementById('guru_foto_input');
                const preview = document.getElementById('guru-foto-preview');
                const emptyText = document.getElementById('guru-foto-empty');

                if (input) {
                    const dt = new DataTransfer();
                    dt.items.add(croppedFile);
                    input.files = dt.files;
                }

                if (preview) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = 'inline-block';
                        if (emptyText) {
                            emptyText.style.display = 'none';
                        }
                    };
                    reader.readAsDataURL(croppedFile);
                }

                const modal = document.getElementById('cropperModal');
                modal.classList.remove('show');
                modal.setAttribute('aria-hidden', 'true');

                guruCropper.destroy();
                guruCropper = null;
            }, outputType, 0.92);
        }
    </script>
@endsection
