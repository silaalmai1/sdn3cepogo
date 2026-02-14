@extends('layouts.admin')

@section('title', 'Kelola Prestasi')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Kelola Prestasi</h1>
        <a href="/admin/prestasi/create" class="btn btn-primary">+ Tambah Prestasi</a>
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
                    <th>No</th>
                    <th>Judul Prestasi</th>
                    <th>Tingkat</th>
                    <th>Tahun</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($prestasis as $index => $prestasi)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $prestasi->judul }}</td>
                        <td>{{ $prestasi->tingkat }}</td>
                        <td>{{ $prestasi->tahun }}</td>
                        <td>
                            <a href="/admin/prestasi/{{ $prestasi->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                            <form action="/admin/prestasi/{{ $prestasi->id }}/delete" method="POST" style="display:inline;"
                                onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">Belum ada prestasi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    </div>
@endsection
