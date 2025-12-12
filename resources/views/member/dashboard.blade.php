@extends('layouts.member')

@push('styles')
<style>
    /* Section Kategori */
    .kategori-produk h2 {
        font-weight: 700;
        color: #A4133C;
        margin-bottom: 25px;
        text-align: center;
    }
    .kategori-container {
        display: flex;
        justify-content: center;
        gap: 25px;
        flex-wrap: wrap;
    }
    .kategori-item {
        text-align: center;
        padding: 10px 15px;
        background: #FFF0F3;
        border-radius: 10px;
        width: 150px;
        transition: 0.3s;
        cursor: pointer;
    }
    .kategori-item:hover {
        background: #A4133C;
        color: white;
        transform: translateY(-3px);
    }
    /* Jarak judul kategori */
.kategori-produk h2 {
    font-weight: 700;
    color: #A4133C;
    margin-bottom: 35px;
    margin-top: 60px; /* tambah jarak dari greeting card */
}

/* Container kategori */
.kategori-container {
    display: flex;
    justify-content: center;
    gap: 40px; /* jarak antar card kategori */
    flex-wrap: wrap;
}

/* Card kategori */
.kategori-item {
    background-color: #A4133C;       /* warna maroon */
    color: white;                    /* tulisan putih */
    padding: 15px 35px;
    border-radius: 20px;             /* lebih tumpul */
    font-size: 16px;
    font-weight: 600;
    box-shadow: 0 4px 10px rgba(0,0,0,0.08);
    transition: 0.2s;
    min-width: 150px;     /* biar muat 1 baris */
    padding: 12px 20px;   /* lebih besar & rapi */
    text-align: center;
}

.kategori-item p {
    white-space: nowrap;  /* cegah teks turun baris */
}

/* Hover effect */
.kategori-item:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 15px rgba(0,0,0,0.12);
}

/* --- BUTTON DETAIL --- */
.detail-btn {
    background-color: #A4133C !important;
    color: white !important;
    border: none;
    font-weight: 600;
    border-radius: 14px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    padding: 10px;
    width: 100%;
    text-align: center;
    display: block;
}

.detail-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(164, 19, 60, 0.3);
}

/* --- CARD PRODUCT WRAPPER --- */
.product-card {
    background: #FFE6EC;
    border: 2px solid #A4133C;
    border-radius: 16px;
    overflow: hidden;
    height: 420px; 
    display: flex;
    flex-direction: column;
}

/* --- GAMBAR PRODUK --- */
.product-card img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    object-position: center;
}


/* --- BODY CARD --- */
.product-card .p-3 {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    flex: 1;
}

/* --- CATEGORY --- */
.product-category, 
.product-card small {
    font-size: 14px;
    font-weight: 500;
    color: #A4133C !important;
    margin-bottom: 5px;
    display: block;
}

/* --- JUDUL PRODUK --- */
.product-card h5,
.product-card .card-title {
    min-height: 48px;
    font-size: 14px;
    line-height: 1.3;
}

/* --- HARGA PRODUK --- */
.product-price,
.product-card p {
    font-size: 15px;
    font-weight: 700;
    color: #333;
    margin-bottom: 12px;
}
    .footer-ethereal {
    background-color: #FFF0F3;
    padding: 40px 0;
    border-top: 2px solid #f5d7dd;
    margin-top: 60px;
}

.footer-text {
    color: #A4133C;
    font-size: 14px;
    margin-top: 10px;
}

.footer-links {
    margin: 18px 0;
}


.footer-copy {
    color: #8f8f8f;
    font-size: 13px;
    margin-top: 10px;
}
</style>
@endpush


@section('content')

{{-- GREETING CARD --}}
<div class="container mt-4">
    <div class="card shadow-sm border-0"
         style="border-radius: 15px; background-color:#FFF0F3;">
        <div class="card-body py-4 px-4">
            <h3 class="fw-bold mb-1" style="color:#A4133C;">
                Selamat Datang, {{ Auth::user()->name }}!
            </h3>
            <p class="text-muted mb-0" style="font-size: 15px;">
                Senang bertemu kembali ✨ Yuk lihat produk terbaik untuk kamu!
            </p>
        </div>
    </div>
</div>

{{-- KATEGORI --}}
<section class="kategori-produk container">
    <h2>Kategori Produk</h2>

    <div class="kategori-container">
        @foreach($categories as $cat)
            <div class="kategori-item">
                {{ $cat->name }}
            </div>
        @endforeach
    </div>
</section>


{{-- PRODUK --}}
<section class="container my-5">
    <h3 class="fw-bold text-center mb-4" style="color:#A4133C">Produk Terbaru</h3>

    <div class="row g-4">
        @foreach($products as $p)
        <div class="col-6 col-md-3">
            <div class="product-card">
                @php
    $thumb = \App\Models\ProductImage::where('product_id', $p->id)
                ->where('is_thumbnail', true)
                ->first();
@endphp

<img 
    src="{{ $thumb ? asset($thumb->image) : '/no-image.png' }}" 
    alt="{{ $p->name }}"
    class="img-fluid"
>

                <div class="p-3">
                    <small class="text-danger fw-bold">{{ $p->productCategory->name ?? 'Tanpa Kategori' }}</small>
                    <h5 class="mt-2">{{ $p->name }}</h5>

                    <p class="fw-bold mb-2">
                        Rp {{ number_format($p->price, 0, ',', '.') }}
                    </p>

                    <a href="{{ route('member.products.show', $p->id) }}" class="detail-btn">
    Detail
</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>


<!-- FOOTER -->
<footer class="footer-ethereal mt-5">
    <div class="container text-center">

        <img src="{{ asset('assets/images/logo.png') }}" 
             alt="Ethereal Logo" 
             style="width: 80px; margin-bottom: 10px;">

        <p class="footer-text">
            Ethereal Stationery — Temukan alat tulis terbaik untuk kebutuhanmu.
        </p>

        <p class="footer-copy">© 2025 Ethereal Stationery. All rights reserved.</p>
    </div>
</footer>

@endsection