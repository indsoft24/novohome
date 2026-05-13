@extends('layouts.app')

@section('content')

<style>

/* 🔥 MAIN COLLECTION SECTION (background + spacing) */
.collection {
  background: #f5f1ea;
  padding: 50px 20px;  /* 👈 side padding kam */
}

/* 🔥 HEADER (title + icon row) */
.collection-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: #ebe6de;
  padding: 30px 40px;
  border-radius: 15px;
  margin-bottom: 40px;
}

@media (max-width: 768px) {

  .collection-header {
    flex-direction: column;   /* 👈 vertical ho jayega */
    text-align: center;
    gap: 15px;
    padding: 20px;
  }

}

/* LEFT TITLE */
.collection-header h2 {
  color: #8b5e3c;
  letter-spacing: 2px;
}

/* SUBTITLE */
.collection-header h3 {
  font-family: cursive;
  color: #555;
}

/* RIGHT SIDE ICON STYLE */
.collection-header img {
  background: #fff;
  padding: 10px;
  border-radius: 12px;
  transition: 0.3s;
}

/* ICON HOVER EFFECT */
.collection-header img:hover {
  transform: scale(1.1);
}

/* 🔥 PRODUCT GRID (cards container) */
.collection-cards {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 30px;
}

@media (max-width: 768px) {
  .collection-cards {
    grid-template-columns: 1fr;  /* 👈 1 column */
  }
}

/* CATEGORY ICON FIX */
.collection-header img {
    width: 50px;      /* 👈 size control */
    height: 50px;
    object-fit: contain;
    padding: 8px;
    background: #fff;
    border-radius: 10px;
}

/* 🔥 PREMIUM PRODUCT CARD */
.card {
    background: rgba(255,255,255,0.75);
    backdrop-filter: blur(14px);

    border-radius: 24px;
    overflow: hidden;

    padding: 16px;

    border: 1px solid rgba(139,94,60,0.08);

    box-shadow:
        0 10px 30px rgba(0,0,0,0.05),
        0 2px 10px rgba(139,94,60,0.04);

    transition: all 0.4s ease;

    cursor: pointer;
    position: relative;
    width: 100%;
}

/* 🔥 MOBILE FIX */
@media (max-width: 768px) {

    .card {
        padding: 14px;
        border-radius: 20px;
    }

}

/* 🔥 TOP GLOW */
.card::before{
    content:"";
    position:absolute;
    top:-60px;
    right:-60px;

    width:140px;
    height:140px;

    background:rgba(196,154,108,0.08);
    border-radius:50%;
}

/* 🔥 CARD HOVER */
.card:hover {
    transform: translateY(-12px);

    box-shadow:
        0 25px 50px rgba(0,0,0,0.08),
        0 10px 25px rgba(139,94,60,0.12);
}

/* 🔥 IMAGE */
.card img {
    width: 100%;
    height: 270px;

    object-fit: cover;
    border-radius: 18px;

    transition: 0.5s ease;
}

/* 🔥 MOBILE IMAGE */
@media (max-width: 768px) {

    .card img {
        height: 220px;
        border-radius: 16px;
    }

}

/* 🔥 IMAGE ZOOM */
.card:hover img {
    transform: scale(1.06);
}

/* 🔥 PRODUCT INFO */
.card-info {
    margin-top: 22px;
    text-align: left;
}

/* 🔥 CATEGORY TAG */
.product-tag{
    display:inline-block;

    background:#f3e6d8;
    color:#8b5e3c;

    padding:6px 14px;
    border-radius:30px;

    font-size:11px;
    font-weight:700;
    letter-spacing:1px;

    margin-bottom:12px;
}

/* 🔥 PRODUCT NAME */
.card-info h4 {
    color: #3e2c23;
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 12px;
    line-height: 1.3;
}

/* 🔥 MOBILE TITLE */
@media (max-width: 768px) {

    .card-info h4 {
        font-size: 20px;
    }

}

/* 🔥 DESCRIPTION */
.product-desc{
    color:#7a6d63;
    font-size:14px;
    line-height:1.8;

    margin-bottom:18px;
}

/* 🔥 PRICE + BUTTON */
.card-bottom{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:15px;
}

/* 🔥 MOBILE PRICE/BUTTON */
@media (max-width: 576px) {

    .card-bottom{
        flex-direction:column;
        align-items:flex-start;
    }

}

/* 🔥 PRICE */
.product-price{
    font-size:22px;
    font-weight:700;
    color:#8b5e3c;
}

/* 🔥 BUTTON */
.view-btn{
    background:#8b5e3c;
    color:#fff;

    border:none;
    padding:10px 18px;

    border-radius:12px;

    font-size:13px;
    font-weight:600;

    transition:0.3s;
}

.view-btn:hover{
    background:#6f4526;
}

/* 🔥 FOLLOW */
.follow-section {
    background: #f6f1eb;
    padding: 90px 0;
}

/* MAIN BOX */
.follow-container {
    background: rgba(255,255,255,0.55);
    backdrop-filter: blur(10px);
    border-radius: 35px;
    padding: 60px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 70px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.06);
    overflow: hidden;
    position: relative;
}

/* TAG */
.follow-tag{
    display: inline-block;
    padding: 8px 18px;
    border-radius: 30px;
    background: #eadbc8;
    color: #7a5230;
    font-size: 13px;
    letter-spacing: 2px;
    font-weight: 600;
    margin-bottom: 22px;
}

/* TEXT */
.follow-text {
    max-width: 560px;
}

.follow-text h2 {
    font-size: 58px;
    line-height: 1.1;
    font-weight: 700;
    color: #3e2c23;
    margin-bottom: 22px;
}

.follow-text h2 span{
    color:  #3e2c23;
}

.follow-text p {
    font-size: 18px;
    line-height: 1.9;
    color: #6f6258;
    margin-bottom: 35px;
}

/* BUTTON AREA */
.follow-buttons{
    display: flex;
    align-items: center;
    gap: 25px;
    flex-wrap: wrap;
}

/* BUTTON */
.follow-text button {
    background: #25D366;
    color: #fff;
    border: none;
    padding: 17px 34px;
    cursor: pointer;
    border-radius: 14px;
    font-size: 15px;
    font-weight: 700;
    transition: 0.3s;
    box-shadow: 0 12px 30px rgba(37,211,102,0.25);
}

.follow-text button:hover {
    background: #1fb857;
    transform: translateY(-4px);
}

/* MINI TEXT */
.follow-mini{
    color: #777;
    font-size: 15px;
    font-weight: 500;
}

/* IMAGE */
.follow-image img {
    width: 430px;
    height: 320px;
    object-fit: cover;
    border-radius: 28px;
    box-shadow: 0 20px 50px rgba(0,0,0,0.12);
    transition: 0.4s;
}

.follow-image img:hover{
    transform: scale(1.03);
}

/* 🔥 RESPONSIVE */
@media (max-width: 992px) {

    .follow-container{
        flex-direction: column;
        text-align: center;
        padding: 40px 25px;
    }

    .follow-buttons{
        justify-content: center;
    }

    .follow-text h2{
        font-size: 42px;
    }

    .follow-image img{
        width: 100%;
        height: auto;
    }
}

/* 🔥 PREMIUM MARQUEE SECTION */
.marquee-wrapper {
    overflow: hidden;
    background: linear-gradient(to right, #f8f3ee, #f3ece4);
    margin-top: 50px;
    border-radius: 28px;
    padding: 22px 0;
    position: relative;
    box-shadow: 0 15px 40px rgba(92,59,30,0.08);
    border: 1px solid rgba(107,68,35,0.08);
    width: 100%;
}

/* 🔥 soft luxury glow */
.marquee-wrapper::before{
    content: "";
    position: absolute;
    top: -60px;
    left: -60px;
    width: 180px;
    height: 180px;
    background: rgba(196,154,108,0.08);
    border-radius: 50%;
}

.marquee-wrapper::after{
    content: "";
    position: absolute;
    bottom: -60px;
    right: -60px;
    width: 180px;
    height: 180px;
    background: rgba(107,68,35,0.05);
    border-radius: 50%;
}

/* 🔥 TRACK */
.marquee-track {
    display: flex;
    width: max-content;
    animation: marqueeScroll 20s linear infinite;
}

/* 🔥 CONTENT */
.marquee-content {
    display: flex;
    align-items: center;
    gap: 40px;
    white-space: nowrap;
    padding-right: 40px;
    flex-shrink: 0;
}

/* 🔥 LINK ITEMS */
.marquee-content a {
    background: rgba(255,255,255,0.75);
    backdrop-filter: blur(10px);

    padding: 14px 26px;
    border-radius: 50px;

    font-size: 15px;
    font-weight: 600;
    letter-spacing: 1px;

    color: #6b4423;
    text-decoration: none;

    border: 1px solid rgba(107,68,35,0.08);

    box-shadow: 0 8px 20px rgba(92,59,30,0.06);

    transition: 0.3s;
    cursor: pointer;

    white-space: nowrap;
    display: inline-flex;
    align-items: center;
}

/* 🔥 HOVER */
.marquee-content a:hover{
    background: #6b4423;
    color: #fff;
    transform: translateY(-4px);
    box-shadow: 0 12px 30px rgba(107,68,35,0.22);
}

/* 🔥 INFINITE ANIMATION */
@keyframes marqueeScroll {
    from {
        transform: translateX(0);
    }

    to {
        transform: translateX(-50%);
    }
}

</style>


{{-- 🔥 CATEGORY HEADER (TOP PART) --}}
<section class="collection">

<div class="collection-header">

  <!-- LEFT: Category Name -->
  <div>
    <h2>{{ strtoupper($category->name) }}</h2>
    <h3>Category Collection</h3>
  </div>

  <!-- RIGHT: Category Icon -->
  <div>
    <img src="{{ asset('icons/' . $category->icon) }}">
  </div>

</div>


{{-- 🔥 MAIN PRODUCTS --}}
<div class="collection-cards">

@foreach($products as $product)

<!-- SINGLE PRODUCT CARD -->
<div class="card"
     onclick="window.location.href='/product/{{ $product->id }}'">

    <!-- IMAGE -->
    <img src="{{ asset('images/' . $product->image) }}">

    <!-- INFO -->
    <div class="card-info">

        <span class="product-tag">
            PREMIUM COLLECTION
        </span>

        <h4>{{ $product->name }}</h4>

        <p class="product-desc">
            {{ \Illuminate\Support\Str::limit($product->description, 90) }}
        </p>

        <div class="card-bottom">

            <div class="product-price">
                ₹ {{ $product->price }}
            </div>

            <button class="view-btn">
                View Details
            </button>

        </div>

    </div>

</div>

@endforeach

</div>

</section>


{{-- 🔥 RELATED PRODUCTS --}}
<section class="collection">

<div class="collection-header">
  <div>
    <h2>Related Collections</h2>
    <h3>Explore More</h3>
  </div>
</div>

<div class="collection-cards">

@foreach($relatedProducts as $product)

<!-- 🔥 PREMIUM CARD -->
<div class="card"
     onclick="window.location.href='/product/{{ $product->id }}'">

    <!-- PRODUCT IMAGE -->
    <img src="{{ asset('images/' . $product->image) }}">

    <!-- PRODUCT INFO -->
    <div class="card-info">

        <!-- TAG -->
        <span class="product-tag">
            PREMIUM COLLECTION
        </span>

        <!-- NAME -->
        <h4>{{ $product->name }}</h4>

        <!-- DESCRIPTION -->
        <p class="product-desc">
            {{ \Illuminate\Support\Str::limit($product->description, 90) }}
        </p>

        <!-- PRICE + BUTTON -->
        <div class="card-bottom">

            <div class="product-price">
                ₹ {{ $product->price }}
            </div>

            <button class="view-btn">
                View Details
            </button>

        </div>

    </div>

</div>

@endforeach

</div>

</section>

<!-- 🔥 FOLLOW SECTION -->
<section class="follow-section">
    <div class="container">

        <div class="follow-container">

            <!-- LEFT CONTENT -->
            <div class="follow-text">

                <span class="follow-tag">
                    STAY CONNECTED
                </span>

                <h2>
                    Follow Us on <span>WhatsApp</span>
                </h2>

                <p>
                    Get the latest furniture collections, exclusive offers,
                    interior inspiration, and design updates directly on WhatsApp.
                </p>

                <div class="follow-buttons">
                    <button onclick="window.location='{{ $whatsapp->whatsapp_link ?? '#' }}'">
                        {{ $whatsapp->button_text ?? 'JOIN NOW' }}
                    </button>

                    <div class="follow-mini">
                        10k+ subscribers already joined
                    </div>
                </div>

            </div>

            <!-- RIGHT IMAGE -->
            <div class="follow-image">
                <img src="{{ asset('images/phone.jpg') }}">
            </div>

        </div>

    </div>
</section>



{{-- 🔥 MARQUEE TEXT --}}
<!-- @php
$items = explode('|', $whatsapp->marquee_text ?? '');
@endphp -->

<div class="marquee-wrapper">
    <div class="marquee-track">

        <div class="marquee-content">
                @foreach($items as $item)
                    @if(trim($item) != '')

                        <a href="{{ $whatsapp->marquee_link ?? '#' }}"
                           target="_blank"
                           style="text-decoration:none; color:inherit;">

                            {{ trim($item) }}

                        </a>

                    @endif
                @endforeach
            </div>

        <div class="marquee-content">
                @foreach($items as $item)
                    @if(trim($item) != '')

                        <a href="{{ $whatsapp->marquee_link ?? '#' }}"
                           target="_blank"
                           style="text-decoration:none; color:inherit;">

                            {{ trim($item) }}

                        </a>

                    @endif
                @endforeach
            </div>

    </div>
</div>
</div>

</section>

@endsection