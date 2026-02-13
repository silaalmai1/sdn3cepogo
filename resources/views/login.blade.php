<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body{
            height:100vh;
            background: linear-gradient(135deg,#f0f1f3,#224abe);
            display:flex;
            justify-content:center;
            align-items:center;
            font-family: 'Segoe UI', sans-serif;
        }
        .login-card{
            width:380px;
            border-radius:18px;
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border:1px solid rgba(255,255,255,0.3);
            box-shadow:0 15px 35px rgba(0,0,0,0.25);
        }
        .login-title{
            font-weight:700;
            color:#4e73df;
        }

        .btn-login{
            background:#4e73df;
            border:none;
        }

        .btn-login:hover{
            background:#2e59d9;
        }

        .form-control{
            border-radius:10px;
        }
        .prestasi-card{
            border:none;
            border-radius:18px;
            overflow:hidden;
            box-shadow:0 10px 25px rgba(0,0,0,0.1);
            transition:0.3s;
       }
       .prestasi-card:hover{
            transform:translateY(-8px);
       }
       .prestasi-card img{
            height:220px;
            object-fit:cover;
       }

    </style>
</head>
<body>

<div class="card login-card p-4">
    
    <div class="text-center mb-3">
        <h3 class="login-title">Admin Login</h3>
        <small class="text-muted">Silakan login untuk masuk dashboard</small>
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

    {{-- Error Login --}}
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="/login" method="POST" autocomplete="off">
        @csrf

        <div class="mb-3">
            <label>Email</label>
            <input type="text" name="email" class="form-control" 
                   placeholder="Masukkan email"
                   autocomplete="new-email">
        </div>

        <div class="mb-3">
            <label>Password</label>
            <div class="input-group">
            <input type="password" name="password" id="password"
                class="form-control" 
                placeholder="Masukkan password"
                autocomplete="new-password">

            <span class="input-group-text" onclick="togglePassword()" style="cursor:pointer">
        <i class="bi bi-eye" id="eyeIcon"></i>
           </span>
        </div>
     </div>
            <button class="btn btn-login w-100 text-white">Login</button>
    </form>

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
</script>

</body>
</html>
