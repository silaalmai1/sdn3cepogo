<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SD NEGERI 1-3 CEPOGO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Bootstrap + Icon --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        html, body{
        height:auto;
        overflow-x:hidden;
        }
        .header-fixed{
         position:sticky;
         top:0;
         left:0;
         width:100%;
         z-index:999;
        }
         body{
         padding-top:0;
        }
        .topbar{
            background:#ffffff;
            font-size:14px;
        }
        .navbar-main{
            background:white;
            box-shadow:none !important;
            border:none !important;
        }
        .nav-link{
            font-weight:500;
            font-size:20px;
            letter-spacing:0.5px;
        }
        .nav-link.active{
            color:#0d6efd !important;
            border-bottom:3px solid #0d6efd;
        }
        .social-icon i{
            font-size:18px;
            margin-left:12px;
            cursor:pointer;
        }
        /*DARK MODE*/
        .dark-mode{
             background:#121212; 
             color:#ffffff;
        }     
        .dark-mode .navbar-main{
            background:#1f1f1f !important;
        }
        .dark-mode .topbar{
            background:#1f1f1f !important;
        }
        .dark-mode .nav-link{
            color:#ffffff !important;
        }
        .dark-mode .container{
            color:#ffffff;
        }
         #darkToggle{
            border:none;
            background:transparent;
         }
          #darkToggle:focus{
            outline:none !important;
            box-shadow:none !important; 
        }
        /*icon tidak biru*/
        .social-icon a,
        .social-icon a:visited{
            color:black !important;
            text-decoration:none !important;
        }
        .dark-mode .social-icon a,
        .dark-mode .social-icon a:visited,
        .dark-mode .social-icon a:active{
            color:white !important;
        }
        .social-icon a:hover{
            color:#0d6efd !important;
        }
    </style>
    <style>
        .hero-section{
            position:relative;
            min-height:100vh;
            padding-top:80px;
            padding-bottom:120px;
            width:100%;
            background:url('/images/hero.jpg')center/cover no-repeat;
            background-size:cover;
            background-position:center;
            background-repeat:no-repeat;
        }
         /*overlay biru gelap transparan*/
         .hero-overlay{
            position:absolute;
            width:100%;
            height:100%;
            background:rgba(0, 60, 120, 0.55);
            top:0;
            left:0;
         }
         /*isi text*/
         .hero-content{
            position: relative;
            z-index:2;
         }
         .hero-subtitle{
            font-size:28px;
         }
         .hero-title{
            font-size:70px;
            font-weight:800;
         }
         .hero-address{
            font-size:20px;
            margin-top:10px;
        }
        /*stat card*/
        .stats{
            margin-top:-120px; 
            position:relative;
            z-index:10;
        }
        .stat-card{
            padding:30px 20px;
            border-radius:18px;
            text-align:center;
            color:white;
            background:linear-gradient(180deg,#1f7a6e,#2fa18e);
            box-shadow:0 20px 30px rgba(0,0,0,0.15);
            transition:0.3s;
            position:relative;  
            overflow:hidden; 
        }
        .stat-card:hover{
            transform:translateY(-8px);
        }
        .stat-card h2{
            font-size:40px;
            font-weight:800;
            margin-bottom:5px;
        }
        .stat-card p{
            font-size:16px;
            opacity:0.9;
        }
        /*border green*/
        .stat-card{
            padding:30px 20px;
            border-radius:18px;
            text-align:center;
            color:white;

       /*  background transparan */
           background: rgba(255,255,255,0.18);
           backdrop-filter: blur(12px);
           -webkit-backdrop-filter: blur(12px);
           border:1px solid rgba(255,255,255,0.35);
           box-shadow:0 20px 30px rgba(0,0,0,0.25);
           transition:0.3s;
           position:relative;  
           overflow:hidden; 
        }
        /* ===== SAMBUTAN KEPALA SEKOLAH ===== */

        .card-sambutan{
            background:#ffffff;
            border-radius:18px;
            box-shadow:0 10px 25px rgba(0,0,0,0.12);
            border:none;
       }
       .sambutan-title{
           font-size:34px;
           font-weight:800;
      } 
       .sambutan-sub{
           font-size:18px;
     }
       .sambutan-text{
           font-size:17px;
           line-height:1.8;
            text-align:justify;
     }
/* ===== WRAPPER DETAIL ===== */
.detail-wrapper{
    background:white;
    padding:50px;
    border-radius:25px;
    box-shadow:0 20px 40px rgba(0,0,0,0.08);
}

/* gambar */
.detail-img{
    border-radius:20px;
    box-shadow:0 15px 30px rgba(0,0,0,0.15);
    transition:0.4s;
}
.detail-img:hover{
    transform:scale(1.03);
}

/* judul */
.detail-title{
    font-size:48px;
    font-weight:800;
    margin-bottom:10px;
}

/* subtitle */
.detail-subtitle{
    font-size:22px;
    color:#0d6efd;
    font-weight:600;
    margin-bottom:25px;
}

/* isi teks */
.detail-text{
    font-size:20px;
    line-height:2;
    text-align:justify;
    color:#444;
}

/* tombol kembali */
.btn-back{
    background:#f1f3f5;
    border:none;
    padding:10px 22px;
    border-radius:12px;
    font-weight:600;
    transition:0.3s;
}
.btn-back:hover{
    background:#0d6efd;
    color:white;
}

/* garis pemisah */
.detail-divider{
    height:4px;
    width:80px;
    background:#0d6efd;
    border-radius:10px

        
</style>
</head>
<body>

    @include('partials.header')


    @yield('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>
<script>
    const toggleBtn = document.getElementById('darkToggle');
    const icon = document.getElementById('darkIcon');

    // cek mode tersimpan
    if(localStorage.getItem('theme') === 'dark'){
        document.body.classList.add('dark-mode');
        icon.classList.replace('fa-moon','fa-sun');
    }

    toggleBtn.onclick = () => {
        document.body.classList.toggle('dark-mode');

        if(document.body.classList.contains('dark-mode')){
            localStorage.setItem('theme','dark');
            icon.classList.replace('fa-moon','fa-sun');
        }else{
            localStorage.setItem('theme','light');
            icon.classList.replace('fa-sun','fa-moon');
        }
    }
</script>
</body>
</html>
