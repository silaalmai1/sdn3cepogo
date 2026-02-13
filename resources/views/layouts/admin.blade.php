<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{background:#f5f7fb;}
        .sidebar{
            width:220px;
            height:100vh;
            position:fixed;
            background:#1e293b;
            color:white;
            padding:20px;
        }
        .sidebar a{
            color:white;
            text-decoration:none;
            display:block;
            margin:15px 0;
        }
        .content{
            margin-left:240px;
            padding:30px;
        }
        .card-admin{
            border-radius:15px;
            box-shadow:0 5px 15px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>

<div class="sidebar">
    <h4>ADMIN</h4>
    <hr>
    <a href="/admin">Dashboard</a>
    <a href="#">Berita</a>
    <a href="#">Guru</a>
    <a href="#">Galeri</a>
    <div class="ms-auto">
    <a href="/logout" class="btn btn-danger btn-sm">Logout</a>
</div>
</div>

<div class="content">
    <h3 class="mb-4">@yield('title')</h3>
    @yield('content')
</div>

</body>
</html>
