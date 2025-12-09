<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ethereal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #FFFFFF;
            font-family: 'Poppins', sans-serif;
        }
        .navbar {
            background-color: #FFFFFF;
        }
        .navbar-brand, .nav-link {
            color: #A4133C !important;
            font-weight: 600;
        }
        .category-card {
            background-color: #FFF0F3;
            border-radius: 10px;
            padding: 20px;
            transition: 0.3s;
            cursor: pointer;
            border: 1px solid #f5d7dd;
        }
        .category-card:hover {
            background-color: #A4133C;
            color: white;
            transform: translateY(-5px);
        }
        .product-card {
            background-color: #FFF0F3;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .btn-primary {
            background-color: #A4133C !important;
            border: none;
        }


.btn-ethereal {
    padding: .20rem .6rem;
    border-radius: 5px;
    font-weight: 600;
    transition: background-color .2s ease, color .2s ease, transform .15s ease;
}

/* LOGIN = outline */
.btn-login {
    background: #A4133C;
    color: white;
    border: 2px solid #A4133C;
}
.btn-login:hover {
    background: #A4133C;
    color: white;
    transform: translateY(-2px);
}

/* LOGIN = outline */
.btn-register {
    background: #A4133C;
    color: white;
    border: 2px solid #A4133C;
}
.btn-register:hover {
    background: #A4133C;
    color: white;
    transform: translateY(-2px);
}

    </style>
</head>

<body>

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg shadow-sm px-4">
    <div class="container-fluid">

        <!-- Logo kiri -->
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('assets/images/logo.png') }}" 
                 alt="Ethereal Stationery" 
                 style="width: 70px; height: auto;">
        </a>


        <!-- Isi navbar -->
        <div class="collapse navbar-collapse" id="navMenu">
            <!-- Pendorong agar tombol pindah ke kanan -->
            <div class="ms-auto d-flex gap-2">

                <a href="{{ route('login') }}" 
                   class="btn btn-ethereal btn-login">
                    Login
                </a>

                <a href="{{ route('register') }}" 
                   class="btn btn-ethereal btn-register">
                    Register
                </a>

            </div>
        </div>

    </div>
</nav>


<!-- Banner Slider -->
<div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
    
    <!-- TITIK INDICATOR -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="2"></button>
    </div>

    <!-- SLIDES -->
    <div class="carousel-inner">

        <!-- SLIDE 1 -->
        <div class="carousel-item active">
            <img src="{{ asset('assets/images/banner 1.png') }}" class="d-block w-100" style="max-height: 480px; object-fit: cover;">
            <div class="carousel-caption d-none d-md-block text-start"></div>
        </div>

        <!-- SLIDE 2 -->
<div class="carousel-item active">

    <!-- GAMBAR SLIDER -->
    <img src="{{ asset('assets/images/banner 2.png') }}" 
         class="d-block w-100"
         height="450"
         style="object-fit: cover;">

    <!-- TEKS SLIDER -->
    <div class="carousel-caption d-none d-md-block text-start">

        <h2 class="fw-bold" style="
            color: #A4133C;
            text-shadow: 0 3px 8px #FFFFFF;
        ">
            Stationery Terlengkap
        </h2>

        <p class="fw-semibold mt-2" style="
            color: #fff;
            text-shadow: 0 3px 8px rgba(0,0,0,0.7);
        ">
            Temukan alat tulis terbaik dengan harga terjangkau.
        </p>

    </div>

</div>


        <!-- SLIDE 3 -->
        <div class="carousel-item active">

    <!-- GAMBAR SLIDER -->
    <img src="{{ asset('assets/images/banner 3.png') }}" 
         class="d-block w-100"
         height="450"
         style="object-fit: cover;">

    <!-- TEKS SLIDER -->
    <div class="carousel-caption d-none d-md-block text-start">

        <h2 class="fw-bold" style="
            color: #A4133C;
            text-shadow: 0 3px 8px #FFFFFF;
        ">
            Stationery Terlengkap
        </h2>

        <p class="fw-semibold mt-2" style="
            color: #fff;
            text-shadow: 0 3px 8px rgba(0,0,0,0.7);
        ">
            Temukan alat tulis terbaik dengan harga terjangkau.
        </p>

    </div>

</div>

    <!-- PANAH KIRI -->
    <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" style="filter: invert(20%) sepia(80%) saturate(500%) hue-rotate(330deg);"></span>
    </button>

    <!-- PANAH KANAN -->
    <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" style="filter: invert(20%) sepia(80%) saturate(500%) hue-rotate(330deg);"></span>
    </button>

</div>


{{-- KATEGORI --}}
<section class="container my-5">
    <h3 class="fw-bold text-center mb-4" style="color: #A4133C;">Kategori Produk</h3>
    <div class="row text-center">

        <div class="col-md-2">
            <div class="category-card">Pena</div>
        </div>
        <div class="col-md-2">
            <div class="category-card">Pensil</div>
        </div>
        <div class="col-md-2">
            <div class="category-card">Buku</div>
        </div>
        <div class="col-md-2">
            <div class="category-card">Highlighter</div>
        </div>
        <div class="col-md-2">
            <div class="category-card">Washi Tape</div>
        </div>

    </div>
</section>

{{-- PRODUK DUMMY --}}
<section class="container my-5">
    <h3 class="fw-bold text-center mb-4" style="color: #A4133C;">Produk Terbaru</h3>

    <div class="row g-4">

        <div class="col-md-3">
            <div class="card product-card">
                <img src="https://images.unsplash.com/photo-1588421357574-87938a86fa28" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Pena Gel Premium</h5>
                    <p class="card-text">Rp 12.000</p>
                    <a class="btn btn-primary w-100">Detail</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card product-card">
                <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Buku Catatan A5</h5>
                    <p class="card-text">Rp 18.000</p>
                    <a class="btn btn-primary w-100">Detail</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card product-card">
                <img src="https://images.unsplash.com/photo-1616627451205-cb3d47ad1e9d" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Highlighter Pastel</h5>
                    <p class="card-text">Rp 15.000</p>
                    <a class="btn btn-primary w-100">Detail</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card product-card">
                <img src="https://images.unsplash.com/photo-1610395219791-cf1e16f7aa57" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Washi Tape Motif</h5>
                    <p class="card-text">Rp 10.000</p>
                    <a class="btn btn-primary w-100">Detail</a>
                </div>
            </div>
        </div>

    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
