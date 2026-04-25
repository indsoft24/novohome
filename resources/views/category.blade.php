@extends('layouts.app')

@section('content')

<style>

/* 🔥 MAIN COLLECTION SECTION (background + spacing) */
.collection {
  background: #f5f1ea;
  padding: 50px;
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
  display: flex;
  flex-wrap: wrap;
  gap: 30px;
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

/* 🔥 SINGLE PRODUCT CARD */
.card {
  background: white;
  padding: 20px;
  border-radius: 15px;
  flex: 0 0 calc(33.33% - 20px); /* 3 cards per row */
  text-align: center;
  transition: 0.3s;
  cursor: pointer;
}

/* CARD HOVER */
.card:hover {
  transform: translateY(-10px);
}

/* PRODUCT IMAGE */
.card img {
  width: 100%;
  height: 250px;
  object-fit: cover;
  border-radius: 10px;
  transition: 0.4s;
}

/* IMAGE ZOOM EFFECT */
.card:hover img {
  transform: scale(1.05);
}

/* PRODUCT TEXT AREA */
.card-info {
  margin-top: 15px;
}

/* PRODUCT NAME COLOR */
.card-info h4 {
  color: #8b5e3c;
}

/* 🔥 WHATSAPP FOLLOW SECTION */
.follow-section {
  background: #f5f1ea;
  padding: 60px 20px;
}

/* FLEX CONTAINER */
.follow-container {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 40px;
}

/* LEFT IMAGE */
.follow-image img {
  width: 260px;
  border-radius: 20px;
}

/* RIGHT TEXT AREA */
.follow-text {
  max-width: 400px;
}

/* HEADING */
.follow-text h2 {
  color: #8b5e3c;
  font-size: 28px;
}

/* DESCRIPTION */
.follow-text p {
  color: #555;
  font-size: 14px;
}

/* BUTTON */
.follow-text button {
  background: #8b5e3c;
  color: white;
  padding: 10px 20px;
  border-radius: 25px;
  border: none;
  cursor: pointer;
}

/* BUTTON HOVER */
.follow-text button:hover {
  background: #6f4a33;
}

/* 🔥 MARQUEE SCROLL */
.marquee-wrapper {
  overflow: hidden;
  background: #fff;
  margin-top: 40px;
}

.marquee-track {
  display: flex;
  animation: scroll 15s linear infinite;
}

.marquee-content {
  white-space: nowrap;
  padding-right: 50px;
  color: #8b5e3c;
}

/* ANIMATION */
@keyframes scroll {
  0% { transform: translateX(0); }
  100% { transform: translateX(-50%); }
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

    <!-- PRODUCT IMAGE -->
    <img src="{{ asset('images/' . $product->image) }}">

    <!-- PRODUCT INFO -->
    <div class="card-info">
        <h4>{{ $product->name }}</h4>
        <p>{{ $product->price }}</p>
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

<div class="card"
     onclick="window.location.href='/product/{{ $product->id }}'">

    <img src="{{ asset('images/' . $product->image) }}">

    <div class="card-info">
        <h4>{{ $product->name }}</h4>
        <p>{{ $product->price }}</p>
    </div>

</div>

@endforeach

</div>

</section>


{{-- 🔥 WHATSAPP FOLLOW SECTION --}}
<section class="follow-section">

<div class="follow-container">
    
    <!-- LEFT IMAGE -->
    <div class="follow-image">
      <img src="{{ asset('images/' . ($whatsapp->image ?? 'phone.jpg')) }}">
    </div>

    <!-- RIGHT TEXT -->
    <div class="follow-text">

      <h2>{{ $whatsapp->heading ?? 'FOLLOW ON WHATSAPP' }}</h2>

      <p>{{ $whatsapp->subtext ?? 'Join our WhatsApp Channel' }}</p>

      <!-- BUTTON -->
      <a href="{{ $whatsapp->whatsapp_link ?? '#' }}" target="_blank">
        <button>
          {{ $whatsapp->button_text ?? 'FOLLOW' }}
        </button>
      </a>

    </div>

</div>


{{-- 🔥 MARQUEE TEXT --}}
@php
$items = explode('|', $whatsapp->marquee_text ?? '');
@endphp

<div class="marquee-wrapper">
  <div class="marquee-track">

    <!-- FIRST LOOP -->
    <div class="marquee-content">
      @foreach($items as $item)
        <span>{{ $item }}</span>
      @endforeach
    </div>

    <!-- DUPLICATE LOOP (smooth scroll) -->
    <div class="marquee-content">
      @foreach($items as $item)
        <span>{{ $item }}</span>
      @endforeach
    </div>

  </div>
</div>

</section>

@endsection