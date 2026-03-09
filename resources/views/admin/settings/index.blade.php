@extends('layouts.admin')

@section('title', 'Pengaturan Website')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-admin">
                <div class="card-body">
                    <h4 class="card-title mb-4">Pengaturan Website</h4>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ url('/admin/settings/update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Logo Section -->
                        <div class="mb-4">
                            <h5 class="mb-3">Logo Sekolah</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Preview Logo Saat Ini</label>
                                        <div class="border rounded p-3 text-center bg-light">
                                            @php
                                                $currentLogo = App\Models\Setting::get('site_logo', 'images/logo.png');
                                                $logoUrl = str_starts_with($currentLogo, 'images/')
                                                    ? asset($currentLogo)
                                                    : asset('storage/' . $currentLogo);
                                            @endphp
                                            <img src="{{ $logoUrl }}" alt="Logo" class="img-fluid"
                                                style="max-height: 150px;" id="logo-preview">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="site_logo" class="form-label">Upload Logo Baru
                                            <small class="text-muted">(opsional)</small>
                                        </label>
                                        <input type="file" class="form-control @error('site_logo') is-invalid @enderror"
                                            id="site_logo" name="site_logo" accept="image/*" onchange="previewImage(event)">
                                        <small class="text-muted">Format: JPEG, PNG, JPG, GIF. Maksimal 2MB</small>
                                        @error('site_logo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- School Info Section -->
                        <div class="mb-4">
                            <h5 class="mb-3">Informasi Sekolah</h5>

                            <div class="mb-3">
                                <label for="school_name" class="form-label">Nama Sekolah <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('school_name') is-invalid @enderror"
                                    id="school_name" name="school_name"
                                    value="{{ old('school_name', App\Models\Setting::get('school_name', 'SDN 1 Cepogo')) }}"
                                    required>
                                @error('school_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="school_address" class="form-label">Alamat Lengkap <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control @error('school_address') is-invalid @enderror" id="school_address" name="school_address"
                                    rows="4" required>{{ old('school_address', App\Models\Setting::get('school_address', '')) }}</textarea>
                                <small class="text-muted">Pisahkan setiap baris dengan Enter (contoh: desa, kecamatan,
                                    kabupaten, provinsi)</small>
                                @error('school_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="school_phone" class="form-label">Nomor Telepon</label>
                                        <input type="text"
                                            class="form-control @error('school_phone') is-invalid @enderror"
                                            id="school_phone" name="school_phone"
                                            value="{{ old('school_phone', App\Models\Setting::get('school_phone', '')) }}"
                                            placeholder="(0291) 123456">
                                        @error('school_phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="school_email" class="form-label">Email</label>
                                        <input type="email"
                                            class="form-control @error('school_email') is-invalid @enderror"
                                            id="school_email" name="school_email"
                                            value="{{ old('school_email', App\Models\Setting::get('school_email', '')) }}"
                                            placeholder="info@sdn1cepogo.sch.id">
                                        @error('school_email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Simpan Pengaturan
                            </button>
                            <a href="{{ url('/admin') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('logo-preview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
