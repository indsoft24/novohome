@extends('layouts.app')

@section('content')

<style>

/* 🔥 BODY */
body {
    background: #f5f2ed;
    font-family: 'Segoe UI', sans-serif;
}

/* 🔥 HERO */
.hero-section {
    padding: 30px 0;
}


.hero-section .row {
    align-items: center;
}

.hero-img {
    width: 100%;
    max-width: 480px;   /* 👈 control size */
    height: 410px;      /* 👈 fix height */
    object-fit: cover;  /* 👈 perfect fit */
    
    border-radius: 25px;
    
    box-shadow: 0 20px 50px rgba(0,0,0,0.15);
    
    transition: 0.4s;
}


/* BUTTON */
.hero-btn {
    background: #2f3e46;
    color: #fff;
    border: none;
    padding: 10px 22px;
    border-radius: 8px;
    font-weight: 600;
    transition: 0.3s;
}

/* 🔥 hover effect */
.hero-img:hover {
    background: #1b262c;
    transform: scale(1.05);
}


/* 🔥 SLIDER */
.slider-wrapper {
    overflow-x: auto;
    scrollbar-width: none;
}

.slider-wrapper::-webkit-scrollbar {
    display: none;
}

.slider {
    display: flex;
    gap: 15px;
}

/* CARD */
.slide-card {
    width: 350px;          /* 👈 FIX WIDTH */
    height: 280px;         /* 👈 FIX HEIGHT */
    border-radius: 15px;
    overflow: hidden;
    position: relative;
    flex-shrink: 0;
    background: #fff;
    transition: 0.3s;
}

.slide-card img {
    width: 100%;
    height: 100%;
    object-fit: cover; 
}

.slide-card:hover {
    transform: scale(1.05);
}

/* BADGE */
.badge-new {
    position: absolute;
    top: 8px;
    left: 8px;
    background: #9c6b4f;
    color: #fff;
    padding: 4px 8px;
    border-radius: 6px;
    font-size: 11px;
}

/* 🔥 ALL CATEGORY */
#sliderWrapper {
    padding: 10px 0;
}

/* 🔥 CATEGORY SECTION */
.category-section {
    padding: 40px 0;
}

.category-box {
    background: #fff;
    padding: 25px;
    border-radius: 20px;
}

.small-title {
    font-size: 12px;
    letter-spacing: 2px;
    color: #777;
}

.main-title {
    color: #9c6b4f;
    font-weight: bold;
}

/* CATEGORY CARD */
.cat-card {
    background: #f5f2ed;
    border-radius: 12px;
    padding: 18px;
    text-align: center;
    transition: 0.3s;
    cursor: pointer;
}

.cat-img {
    width: 100%;
    height: 120px;       /* 👈 size control */
    object-fit: cover;   /* 👈 perfect fit */
    border-radius: 10px;
    margin-bottom: 10px;
}

/* hover effect */
.cat-card:hover .cat-img {
    transform: scale(1.05);
}

.cat-card:hover {
    background: #9c6b4f;
    color: #fff;
}

/* 🔥 PROMO */
.promo-box {
    background: linear-gradient(rgba(156,107,79,0.7), rgba(156,107,79,0.7)),
                url('/images/chair3.jpg');
    background-size: cover;
    background-position: center;
    border-radius: 20px;
    color: #fff;
    padding: 30px;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.promo-small {
    font-size: 12px;
    letter-spacing: 2px;
}

.arrow-btn {
    margin-top: 15px;
    display: inline-block;
    background: #fff;
    color: #9c6b4f;
    padding: 8px 12px;
    border-radius: 50%;
    text-decoration: none;
}

/* 🔥 BRAND */
.brand-section {
    padding: 40px 0;
}

.highlight-box {
    background: linear-gradient(rgba(47,62,70,0.8), rgba(47,62,70,0.8)),
                url('/images/chair3.jpg');
    background-size: cover;
    background-position: center;
    border-radius: 20px;
    color: #fff;
    padding: 30px;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.small-text {
    font-size: 12px;
    letter-spacing: 2px;
    color: #ddd;
}

.main-heading {
    color: #9c6b4f;
    font-weight: bold;
}

.brand-box {
    background: #fff;
    padding: 25px;
    border-radius: 20px;
    height: 100%;
}

/* BRAND CARD */
.brand-card {
    background: #f5f2ed;
    border-radius: 12px;
    padding: 20px;
    text-align: center;
    font-weight: 600;
    color: #555;
    transition: 0.3s;
}

.brand-card:hover {
    background: #9c6b4f;
    color: #fff;
}

.circle-btn {
    margin-top: 15px;
    display: inline-block;
    background: #fff;
    color: #2f3e46;
    padding: 8px 12px;
    border-radius: 50%;
}

/* 🔥 FOLLOW */
.follow-section {
    background: #f6f2ec;
    padding: 60px 0;
}

.follow-container {
    max-width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 40px;
    flex-wrap: wrap;
}

.follow-text {
    max-width: 400px;
}

.small-line {
    width: 30px;
    height: 2px;
    background: #c49a6c;
    margin-bottom: 10px;
}

.follow-text h2 {
    font-size: 22px;
}

.follow-text p {
    font-size: 14px;
    color: #666;
}

.follow-text button {
    background: #c49a6c;
    color: #fff;
    border: none;
    padding: 10px 16px;
    cursor: pointer;
    border-radius: 6px;
}

.follow-image img {
    width: 350px;
    border-radius: 15px;
}

/* 🔥 RESPONSIVE */
@media (max-width: 768px) {

    .hero-section .row {
        flex-direction: column;
        text-align: center;
    }

    .follow-container {
        flex-direction: column;
        text-align: center;
    }

    .follow-image img {
        width: 100%;
    }
}

.marquee-wrapper {
    overflow: hidden;
    background: #fff;
    margin-top: 40px;
    width: 100%;
}

.marquee-track {
    display: flex;
    width: max-content;
    animation: marqueeScroll 15s linear infinite;
}

.marquee-content {
    display: flex;
    gap: 60px;              /* 👈 space increase */
    white-space: nowrap;
    padding-right: 80px;

    font-size: 18px;        /* 👈 TEXT SIZE BIG */
    font-weight: 600;
    color: #9c6b4f;
}

.marquee-content span {
    display: inline-block;
    letter-spacing: 1px;    /* 👈 premium feel */
}



/* 🔥 animation */
@keyframes marqueeScroll {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-50%);
    }
}

/* 🔥 TESTIMONIAL CARD */
.review-card {
    background: #fff;
    border-radius: 15px;
    overflow: hidden;
    transition: 0.3s;
    height: 100%;
}

.review-card:hover {
    transform: translateY(-5px);
}

/* 🔥 IMAGE FIX */
.review-img {
    width: 100%;
    height: 200px;   /* 👈 FIX HEIGHT */
    object-fit: cover; /* 👈 IMPORTANT */
}

/* 🔥 CONTENT */
.review-content {
    padding: 15px;
    text-align: center;
}

.review-content p {
    font-size: 14px;
    color: #555;
}

.review-content b {
    display: block;
    margin-top: 10px;
    color: #9c6b4f;
}

</style>

<!-- 🔥 HERO SECTION -->
<div class="hero-section">
    <div class="container">
        <div class="row align-items-center">

            <!-- LEFT CONTENT -->
            <div class="col-md-6">

                <h1 class="hero-title">
                    {{ $hero->title ?? 'Luxury Living Starts Here' }}
                </h1>

                <p class="hero-text">
                    {{ $hero->subtitle ?? 'Handpicked Furniture Designed to Bring Style, Comfort, and Sophistication into Your Space' }}
                </p>

                <div class="d-flex align-items-center mt-4 flex-wrap">

                    <button class="hero-btn"
                        onclick="window.location='{{ $hero->button_link ?? '/collection' }}'">
                        {{ $hero->button_text ?? 'EXPLORE COLLECTION' }}
                    </button>

                </div>

                <p class="hero-text">
                     {{ $hero->extra_text ?? 'Over 700+ thoughtfully crafted pieces for modern homes.' }}
                </p>

            </div>

            <!-- RIGHT IMAGE -->
            <div class="col-md-6 text-center">
                <img src="{{ asset('images/' . ($hero->image ?? 'chair3.jpg')) }}" class="hero-img">
            </div>

        </div>
    </div>
</div>
<!-- 🔥 ALL CATEGORIES -->
<div class="container mt-5">
    <h4 class="text-center mb-3">All Categories</h4>

    <div class="slider-wrapper" id="sliderWrapper">
        <div class="slider">
            @foreach($categories as $cat)
            <div class="slide-card">
                <img src="{{ asset('images/' . ($cat->icon ?? 'default.jpg')) }}">
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- 🔥 CATEGORY SECTION -->
<div class="category-section mt-5">
    <div class="container">
        <div class="row g-4">

            <!-- LEFT -->
            <div class="col-md-8">
                <div class="category-box">
                    <p class="small-title">SHOP BY STYLE</p>
                    <h2 class="main-title">Browse Our Collections</h2>

                    <div class="row mt-4">
                        @foreach($categories->take(6) as $cat)
                        <div class="col-md-4 mt-3">
                            <div class="cat-card" onclick="window.location='{{ route('category.view', $cat->id) }}'">
                                <div class="icon">
                                    <img src="{{ asset('images/' . $cat->icon) }}" class="cat-img">
                                </div>
                                <p>{{ $cat->name }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- RIGHT -->
            <div class="col-md-4">
                <div class="promo-box">
                    <p class="promo-small">LATEST COLLECTION</p>
                    <h3>Fresh Designs 2026</h3>
                    <a href="#" class="arrow-btn">→</a>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- 🔥 BRAND SECTION -->
<div class="brand-section mt-5">
    <div class="container">
        <div class="row g-4 align-items-stretch">

            <!-- LEFT -->
            <div class="col-md-4">
                <div class="highlight-box">
                    <p class="small-text">TOP PICKS</p>
                    <h3>Exclusive Furniture Range</h3>
                    <a href="#" class="circle-btn">→</a>
                </div>
            </div>

            <!-- RIGHT -->
            <div class="col-md-8">
                <div class="brand-box">
                    <p class="small-text">SHOP BY COLLECTION</p>
                    <h2 class="main-heading">Explore Our Brands</h2>

                    <div class="row mt-4">
                        @if(isset($brands))
                            @foreach($brands as $brand)
                            <div class="col-md-4 mt-3">
                                <div class="brand-card">
                                    {{ $brand->name }}
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- 🔥 FOLLOW SECTION -->
<section class="follow-section">
  <div class="container">
    <div class="follow-container">

    <!-- TEXT -->
    <div class="follow-text">
      <p class="small-line"></p>
      <h2>FOLLOW ON WHATSAPP</h2>
      <p>Join our WhatsApp Channel and follow the latest news.</p>
      <button onclick="window.location='{{ $whatsapp->whatsapp_link ?? '#' }}'">
        {{ $whatsapp->button_text ?? 'JOIN NOW' }}
      </button>
    </div>

    <!-- IMAGE -->
    <div class="follow-image">
      <img src="{{ asset('images/phone.jpg') }}">
    </div>

  </div>
  </div>
</section>

<section>

@php
$items = explode('|', $whatsapp->marquee_text ?? '');
@endphp

<div class="marquee-wrapper">
  <div class="marquee-track">

    <div class="marquee-content">
      @foreach($items as $item)
        @if(trim($item) != '')
          <span>{{ trim($item) }}</span>
        @endif
      @endforeach
    </div>

    <div class="marquee-content">
      @foreach($items as $item)
        @if(trim($item) != '')
          <span>{{ trim($item) }}</span>
        @endif
      @endforeach
    </div>

  </div>
</div>

</section>

<div class="container mt-5">
    <h3 class="text-center">Happy Customers</h3>

    <div class="row">
        @foreach($testimonials as $item)
        <div class="col-md-4 mt-3">
            <div class="review-card text-center">
        
                <img src="{{ asset('images/' . ($item->image ?? 'default.jpg')) }}" class="review-img">
        
                <p>"{{ $item->message }}"</p>
        
                <h6>{{ $item->name }}</h6>
        
            </div>
        </div>
        @endforeach
    </div>
</div>

</section>

@php
$items = explode('|', $whatsapp->marquee_text ?? '');
@endphp

<div class="marquee-wrapper">
  <div class="marquee-track">

    <!-- FIRST -->
    <div class="marquee-content">
      @foreach($items as $item)
        @if(trim($item) != '')
          <span>{{ trim($item) }}</span>
        @endif
      @endforeach
    </div>

    <!-- DUPLICATE -->
    <div class="marquee-content">
      @foreach($items as $item)
        @if(trim($item) != '')
          <span>{{ trim($item) }}</span>
        @endif
      @endforeach
    </div>

  </div>
</div>

</section>


@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {

    const slider = document.getElementById('sliderWrapper');
    let scrollAmount = 0;

    function autoSlide() {
        if (!slider) return;

        scrollAmount += 1;
        slider.scrollLeft = scrollAmount;

        if (scrollAmount >= slider.scrollWidth - slider.clientWidth) {
            scrollAmount = 0;
        }
    }

    setInterval(autoSlide, 20);

});
</script>
@endpush

@endsection