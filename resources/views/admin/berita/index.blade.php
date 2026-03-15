@extends('layouts.admin')

@section('title', 'Kelola Berita')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Kelola Poster Berita</h1>
        <a href="/admin/berita/create" class="btn btn-primary">+ Tambah Poster</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Poster</th>
                    <th>Nama File</th>
                    <th>Diunggah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($beritas as $index => $berita)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            @if ($berita->gambar)
                                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Poster berita"
                                    style="width: 110px; height: 140px; object-fit: cover; border-radius: 8px; border: 1px solid #e5e7eb;">
                            @else
                                <span class="text-muted">Tidak ada gambar</span>
                            @endif
                        </td>
                        <td>{{ $berita->gambar ? basename($berita->gambar) : '-' }}</td>
                        <td>{{ $berita->created_at ? $berita->created_at->format('d M Y H:i') : '-' }}</td>
                        <td>
                            <a href="/admin/berita/{{ $berita->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                            <form action="/admin/berita/{{ $berita->id }}/delete" method="POST" style="display:inline;"
                                onsubmit="return confirm('Yakin ingin menghapus poster ini?')">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">Belum ada poster berita</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
