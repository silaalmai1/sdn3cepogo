<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Account</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            background: linear-gradient(135deg, #f0f1f3, #224abe);
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .register-card {
            width: 420px;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
        }

        .register-title {
            font-weight: 700;
            color: #4e73df;
        }

        .btn-register {
            background: #4e73df;
            border: none;
        }

        .btn-register:hover {
            background: #2e59d9;
        }

        .form-control {
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <div class="card register-card p-4">

        <div class="text-center mb-3">
            <h3 class="register-title">Buat Akun Admin</h3>
            <small class="text-muted">Daftar untuk mengakses dashboard</small>
        </div>

        {{-- Error Validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="/register" method="POST" autocomplete="off">
            @csrf

            <div class="mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="name" class="form-control" placeholder="Masukkan nama"
                    value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan email"
                    value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control"
                        placeholder="Masukkan password" required>
                    <span class="input-group-text" onclick="togglePassword()" style="cursor:pointer">
                        <i class="bi bi-eye" id="eyeIcon"></i>
                    </span>
                </div>
            </div>

            <div class="mb-3">
                <label>Konfirmasi Password</label>
                <div class="input-group">
                    <input type="password" name="password_confirmation" id="passwordConfirm" class="form-control"
                        placeholder="Ulangi password" required>
                    <span class="input-group-text" onclick="togglePasswordConfirm()" style="cursor:pointer">
                        <i class="bi bi-eye" id="eyeIconConfirm"></i>
                    </span>
                </div>
            </div>

            <button class="btn btn-register w-100 text-white">Daftar</button>
        </form>

        <hr>
        <div class="text-center">
            <small class="text-muted">Sudah punya akun? <a href="/login" class="text-primary fw-bold">Login di
                    sini</a></small>
        </div>

    </div>

    <script>
        function togglePassword() {
            const password = document.getElementById("password");
            const eye = document.getElementById("eyeIcon");
            if (password.type === "password") {
                password.type = "text";
                eye.classList.remove("bi-eye");
                eye.classList.add("bi-eye-slash");
            } else {
                password.type = "password";
                eye.classList.remove("bi-eye-slash");
                eye.classList.add("bi-eye");
            }
        }

        function togglePasswordConfirm() {
            const password = document.getElementById("passwordConfirm");
            const eye = document.getElementById("eyeIconConfirm");
            if (password.type === "password") {
                password.type = "text";
                eye.classList.remove("bi-eye");
                eye.classList.add("bi-eye-slash");
            } else {
                password.type = "password";
                eye.classList.remove("bi-eye-slash");
                eye.classList.add("bi-eye");
            }
        }
    </script>

</body>

</html>
