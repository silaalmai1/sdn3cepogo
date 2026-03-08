@extends('layouts.admin')

@section('title', 'Kelola Guru')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Kelola Guru & Tenaga Pendidik</h1>
        <a href="/admin/guru/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Guru
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($gurus as $guru)
                    <tr>
                        <td>
                            @if ($guru->foto)
                                <img src="{{ asset('storage/' . $guru->foto) }}" width="60" height="60"
                                    class="rounded-circle object-fit-cover" style="object-fit: cover;">
                            @else
                                <div class="rounded-circle bg-secondary d-inline-flex align-items-center justify-content-center"
                                    style="width: 60px; height: 60px;">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <strong>{{ $guru->nama }}</strong>
                        </td>
                        <td>
                            <a href="/admin/guru/{{ $guru->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                            <form action="/admin/guru/{{ $guru->id }}/delete" method="POST" style="display:inline;"
                                onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4">Belum ada guru</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
