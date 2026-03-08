@extends('layouts.admin')

@section('title', 'Galeri')

@section('content')
    <style>
        .admin-gallery-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        @media (min-width: 768px) {
            .admin-gallery-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        @media (min-width: 1024px) {
            .admin-gallery-grid {
                grid-template-columns: repeat(5, 1fr);
                gap: 15px;
            }
        }

        .admin-gallery-item {
            position: relative;
            aspect-ratio: 1 / 1;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .admin-gallery-item:hover {
            transform: scale(1.02);
        }

        .admin-gallery-item img,
        .admin-gallery-item .video-placeholder {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .admin-gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
            padding: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0">Galeri</h3>
            <a href="/admin/galeri/create" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah</a>
        </div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="admin-gallery-grid">
            @forelse($galeris as $galeri)
                <div class="admin-gallery-item">
                    @if (($galeri->tipe ?? 'foto') === 'video')
                        <div class="video-placeholder bg-dark d-flex align-items-center justify-content-center">
                            <i class="bi bi-play-circle text-white" style="font-size:48px;"></i>
                        </div>
                        <span class="badge bg-danger position-absolute top-0 end-0 m-2">
                            <i class="bi bi-camera-video"></i> Video
                        </span>
                    @else
                        <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="Galeri">
                    @endif

                    <div class="admin-gallery-overlay">
                        <span class="badge bg-secondary">{{ $galeri->kategori }}</span>
                        <div class="d-flex gap-1">
                            <a href="/admin/galeri/{{ $galeri->id }}/edit" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="/admin/galeri/{{ $galeri->id }}/delete" method="POST"
                                onsubmit="return confirm('Yakin hapus?')" style="display:inline;">
                                @csrf
                                <button class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1 / -1;" class="text-center py-5">
                    <p class="text-muted">Belum ada item galeri</p>
                </div>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $galeris->links() }}
        </div>
    </div>
@endsection
