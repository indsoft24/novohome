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
    padding: 70px 0;
    background: #f6f1eb; 
}

/* LEFT CONTENT */
.hero-tag{
    display: inline-block;
    padding: 8px 18px;
    border-radius: 30px;
    background: #6b4423;
    color: #fff;
    font-size: 13px;
    letter-spacing: 2px;
    font-weight: 600;
    margin-bottom: 25px;
    transition: 0.3s ease;
    cursor: pointer;
}

/* 🔥 Hover Effect */
.hero-tag:hover{
     background: #4e3119;
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(107,68,35,0.25);
}

.hero-title {
    font-size: 64px;
    font-weight: 700;
    line-height: 1.1;
    color: #3e2c23;
    margin-bottom: 25px;
}

.hero-text {
    font-size: 19px;
    line-height: 1.9;
    color: #666;
    max-width: 620px;
}

/* BUTTON */
.hero-btn {
    background: #6b4423;
    color: #fff;
    border: none;
    padding: 16px 34px;
    border-radius: 12px;
    font-weight: 700;
    font-size: 15px;
    letter-spacing: 1px;
    transition: 0.3s;
}

/* IMAGE */
.hero-img {
    width: 100%;
    max-width: 520px;
    height: 500px;
    object-fit: cover;
    border-radius: 30px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.15);
    transition: 0.4s;
}


.hero-btn:hover {
     background: #4e3119;
    transform: translateY(-3px);
}

.hero-mini-text{
    color: #666;
    font-size: 15px;
    font-weight: 500;
}

/* BOTTOM STATS */
.hero-bottom-info{
    display: flex;
    gap: 45px;
    margin-top: 45px;
    flex-wrap: wrap;
}

.hero-bottom-info h4{
    font-size: 32px;
    font-weight: 700;
    color: #222;
    margin-bottom: 4px;
}

.hero-bottom-info span{
    color: #777;
    font-size: 15px;
}

.hero-img:hover {
    transform: scale(1.03);
}

/* 🔥 SLIDER WRAPPER */
.slider-wrapper {
    width: 100%;
    overflow: hidden;
    position: relative;
    padding: 35px 0;

    border-radius: 35px;

    background: linear-gradient(to right, #f8f3ee, #f3ece4);

    box-shadow: 0 20px 60px rgba(92,59,30,0.08);

    border: 1px solid rgba(107,68,35,0.06);
}

/* 🔥 CATEGORY HEADING */
.category-heading{
    margin-bottom: 50px;
}

.category-badge:hover{
    background: #6b4423;
    color: #fff;
    transform: translateY(-3px);
}

/* TITLE */
.category-heading h2{
    font-size: 56px;
    font-weight: 700;
    color: #3e2c23;

    margin-bottom: 18px;
}

/* DESCRIPTION */
.category-heading p{
    max-width: 700px;
    margin: auto;

    font-size: 18px;
    line-height: 1.8;

    color: #7a6a5d;
}

/* MOBILE */
@media(max-width:768px){

    .category-heading h2{
        font-size: 38px;
    }

    .category-heading p{
        font-size: 16px;
    }
}

/* luxury glow */
.slider-wrapper::before{
    content: "";
    position: absolute;
    top: -90px;
    left: -90px;

    width: 220px;
    height: 220px;

    background: rgba(234,219,200,0.35);
    border-radius: 50%;
}

.slider-wrapper::after{
    content: "";
    position: absolute;
    bottom: -90px;
    right: -90px;

    width: 220px;
    height: 220px;

    background: rgba(107,68,35,0.05);
    border-radius: 50%;
}

/* 🔥 SLIDER TRACK */
.slider {
    display: flex;
    gap: 28px;
    width: max-content;

    animation: autoScroll 35s linear infinite;
}

/* pause on hover */
.slider:hover{
    animation-play-state: paused;
}

/* 🔥 CARD */
.slide-card {
    width: 320px;
    min-width: 320px;
    height: 320px;

    border-radius: 28px;
    overflow: hidden;

    background: rgba(255,255,255,0.82);
    backdrop-filter: blur(10px);

    cursor: pointer;

    transition: 0.4s;

    border: 1px solid rgba(107,68,35,0.06);

    box-shadow: 0 12px 35px rgba(92,59,30,0.08);

    position: relative;
}

/* luxury circle effect */
.slide-card::before{
    content: "";
    position: absolute;

    top: -70px;
    right: -70px;

    width: 150px;
    height: 150px;

    background: rgba(234,219,200,0.35);
    border-radius: 50%;

    transition: 0.4s;
}

/* IMAGE */
.slide-card img {
    width: 100%;
    height: 240px;
    object-fit: cover;

    transition: 0.5s;
}

/* TEXT */
.slide-card p{
    padding: 18px;

    text-align: center;

    font-size: 18px;
    font-weight: 600;
    letter-spacing: 0.5px;

    color: #4b3527;

    position: relative;
    z-index: 2;
}

/* 🔥 HOVER */
.slide-card:hover{
    transform: translateY(-10px);

    background: #6b4423;

    box-shadow: 0 22px 50px rgba(107,68,35,0.25);
}

.slide-card:hover::before{
    background: rgba(255,255,255,0.08);
}

.slide-card:hover img{
    transform: scale(1.08);
}

.slide-card:hover p{
    color: #fff;
}

/* 🔥 AUTO ANIMATION */
@keyframes autoScroll {

    0%{
        transform: translateX(0);
    }

    100%{
        transform: translateX(-20%);
    }
}

/* 🔥 MOBILE */
@media(max-width:768px){

    .slide-card{
        width: 260px;
        min-width: 260px;
        height: 280px;
    }

    .slide-card img{
        height: 200px;
    }

    .slide-card p{
        font-size: 16px;
    }
}

.hero-section .container{
    max-width: 1400px;
}

.hero-section .row{
    align-items: center;
    justify-content: space-between;
}

.hero-section .col-md-6:last-child{
    display: flex;
    justify-content: flex-end;
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
    font-size: 25px;
    font-weight: 25px;
    letter-spacing: 2px;
    color: #6b4423;
}

.main-title {
    font-size: 25px;
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
    font-size: 25px;
    letter-spacing: 2px;
    color: #6b4423;
}

.main-heading {
    font-size: 25px;
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
/* 🔥 FOLLOW SECTION */
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

/* TRACK */
.marquee-track {
    display: flex;
    width: max-content;
    animation: marqueeScroll 24s linear infinite;
}

/* CONTENT */
.marquee-content {
    display: flex;
    align-items: center;
    gap: 28px;
    white-space: nowrap;
    padding-right: 28px;
}

/* ITEMS */
.marquee-content span {
    background: rgba(255,255,255,0.75);
    backdrop-filter: blur(10px);

    padding: 14px 26px;
    border-radius: 50px;

    font-size: 15px;
    font-weight: 600;
    letter-spacing: 1px;

    color: #6b4423;

    border: 1px solid rgba(107,68,35,0.08);

    box-shadow: 0 8px 20px rgba(92,59,30,0.06);

    transition: 0.3s;
    cursor: pointer;
}

/* 🔥 HOVER */
.marquee-content span:hover{
    background: #6b4423;
    color: #fff;
    transform: translateY(-4px);
    box-shadow: 0 12px 30px rgba(107,68,35,0.22);
}

/* ANIMATION */
@keyframes marqueeScroll {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-50%);
    }
}

/* 🔥 TESTIMONIAL SECTION */
.testimonial-section{
    padding: 90px 0;
}

/* HEADING */
.testimonial-heading{
    margin-bottom: 55px;
}

/* BADGE */
.testimonial-badge{
    display: inline-block;

    padding: 8px 18px;

    border-radius: 30px;

    background: #eadbc8;
    color: #7a5230;

    font-size: 12px;
    letter-spacing: 2px;
    font-weight: 600;

    margin-bottom: 20px;

    transition: 0.3s;
}

.testimonial-badge:hover{
    background: #6b4423;
    color: #fff;
}

/* TITLE */
.testimonial-heading h2{
    font-size: 56px;
    font-weight: 700;
    color: #3e2c23;

    margin-bottom: 18px;
}

/* SUBTITLE */
.testimonial-heading p{
    max-width: 720px;
    margin: auto;

    font-size: 18px;
    line-height: 1.8;

    color: #7a6a5d;
}

/* 🔥 CARD */
.review-card{
    background: rgba(255,255,255,0.75);

    backdrop-filter: blur(12px);

    border-radius: 30px;

    overflow: hidden;

    height: 100%;

    transition: 0.4s;

    border: 1px solid rgba(107,68,35,0.06);

    box-shadow: 0 15px 40px rgba(92,59,30,0.08);

    position: relative;
}

/* glow */
.review-card::before{
    content: "";
    position: absolute;

    top: -70px;
    right: -70px;

    width: 160px;
    height: 160px;

    background: rgba(234,219,200,0.35);

    border-radius: 50%;
}

/* HOVER */
.review-card:hover{
    transform: translateY(-10px);

    box-shadow: 0 22px 55px rgba(107,68,35,0.16);
}

/* IMAGE */
.review-image-wrapper{
    overflow: hidden;
}

.review-img{
    width: 100%;
    height: 260px;

    object-fit: cover;

    transition: 0.5s;
}

.review-card:hover .review-img{
    transform: scale(1.08);
}

/* CONTENT */
.review-content{
    padding: 28px;
    text-align: center;
}

/* STARS */
.stars{
    color: #c49a6c;

    font-size: 18px;
    letter-spacing: 3px;

    margin-bottom: 18px;
}

/* MESSAGE */
.review-content p{
    font-size: 16px;
    line-height: 1.9;

    color: #5f534b;

    margin-bottom: 28px;
}

/* USER */
.review-user h6{
    font-size: 20px;
    font-weight: 700;

    color: #3e2c23;

    margin-bottom: 5px;
}

.review-user span{
    font-size: 14px;
    color: #9b8778;
}

/* 🔥 MOBILE */
@media(max-width:768px){

    .testimonial-heading h2{
        font-size: 38px;
    }

    .testimonial-heading p{
        font-size: 16px;
    }

    .review-img{
        height: 220px;
    }
}

</style>

<!-- 🔥 HERO SECTION -->
<div class="hero-section">
    <div class="container">
        <div class="row align-items-center">

            <!-- LEFT CONTENT -->
            <div class="col-md-6">

                <span class="hero-tag">
                    PREMIUM FURNITURE COLLECTION
                </span>
            
                <h1 class="hero-title">
                    {{ $hero->title ?? 'Luxury Living Starts Here' }}
                </h1>
            
                <p class="hero-text">
                    {{ $hero->subtitle ?? 'Handpicked Furniture Designed to Bring Style, Comfort, and Sophistication into Your Space' }}
                </p>
            
                <div class="d-flex align-items-center mt-4 flex-wrap gap-3">
            
                    <button class="hero-btn"
                        onclick="window.location='{{ $hero->button_link ?? '/collection' }}'">
                        {{ $hero->button_text ?? 'EXPLORE COLLECTION' }}
                    </button>
            
                    <div class="hero-mini-text">
                        Trusted by 10,000+ happy homeowners
                    </div>
            
                </div>
            
                <div class="hero-bottom-info">
                    <div>
                        <h4>700+</h4>
                        <span>Luxury Pieces</span>
                    </div>
            
                    <div>
                        <h4>4.9★</h4>
                        <span>Customer Rating</span>
                    </div>
            
                    <div>
                        <h4>25+</h4>
                        <span>Premium Brands</span>
                    </div>
                </div>
            
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

    <div class="category-heading text-center">

        <h2>
            Explore All Categories
        </h2>

        <p>
            Discover handcrafted furniture collections designed
            for modern luxury living and timeless interiors.
        </p>

    </div>

    <div class="slider-wrapper" id="sliderWrapper">
        <div class="slider">
        
            @foreach($categories as $cat)
            <div class="slide-card"
                 onclick="window.location='/category/{{ $cat->id }}'">
        
                <img src="{{ asset('images/' . ($cat->icon ?? 'default.jpg')) }}">
        
                <p>{{ $cat->name }}</p>
            </div>
            @endforeach
        
            <!-- 🔥 duplicate for smooth infinite slider -->
            @foreach($categories as $cat)
            <div class="slide-card"
                 onclick="window.location='/category/{{ $cat->id }}'">
        
                <img src="{{ asset('images/' . ($cat->icon ?? 'default.jpg')) }}">
        
                <p>{{ $cat->name }}</p>
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

<section>

<div class="container mt-5">

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

</div>
</section>

<div class="container mt-5 testimonial-section">

    <div class="testimonial-heading text-center">

        <span class="testimonial-badge">
            CLIENT EXPERIENCES
        </span>

        <h2>Happy Customers</h2>

        <p>
            Hear what our customers say about their experience
            with our luxury furniture collections and premium quality.
        </p>

    </div>

    <div class="row g-4">

        @foreach($testimonials as $item)

        <div class="col-md-4">

            <div class="review-card">

                <div class="review-image-wrapper">
                    <img src="{{ asset('images/' . ($item->image ?? 'default.jpg')) }}"
                         class="review-img">
                </div>

                <div class="review-content">

                    <div class="stars">
                        ★★★★★
                    </div>

                    <p>
                        "{{ $item->message }}"
                    </p>

                    <div class="review-user">
                        <h6>{{ $item->name }}</h6>
                        <span>Verified Customer</span>
                    </div>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

</section>

<div class="container mt-5">

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