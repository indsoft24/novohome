@extends('layouts.app')

@section('content')

<style>
  .collection-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.collection-header img {
    background: #fff;
    padding: 10px;
    border-radius: 12px;
    transition: 0.3s;
}

.collection-header img:hover {
    transform: scale(1.1);
}
.collection {
  background: #f5f1ea;
  padding: 50px;
}

/* HEADER */
.collection-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: #ebe6de;
  padding: 30px 40px;
  border-radius: 15px;
  margin-bottom: 40px;
}

.collection-header h2 {
  color: #8b5e3c;
  letter-spacing: 2px;
}

.collection-header h3 {
  font-family: cursive;
  color: #555;
}

/* GRID */
.collection-cards {
  display: flex;
  flex-wrap: wrap;
  gap: 30px;
}

/* CARD */
.card {
  background: white;
  padding: 20px;
  border-radius: 15px;
  flex: 0 0 calc(33.33% - 20px); /* 👈 3 per row */
  text-align: center;
  transition: 0.3s;
  position: relative;
  overflow: hidden;
}

.card:hover {
  transform: translateY(-10px);
}

/* IMAGE */
.card img {
  width: 100%;
  height: 250px;
  object-fit: cover;
  border-radius: 10px;
  transition: 0.4s;
}

.card:hover img {
  transform: scale(1.05);
}

/* INFO */
.card-info {
  margin-top: 15px;
}

.card-info h4 {
  color: #8b5e3c;
}

/* ARROW */
.card-arrow {
  position:absolute;
  top:20px;
  right:20px;
  background:#eee;
  width:35px;
  height:35px;
  border-radius:50%;
  display:flex;
  align-items:center;
  justify-content:center;
  cursor:pointer;
}

.category-icon img {
    width: 40px;
    transition: 0.3s;
    opacity: 0.6;
}

.category-card:hover img {
    opacity: 1;
    transform: scale(1.2);
    filter: brightness(0);
}

.follow-section {
  background: #f5f1ea;
  padding: 60px 20px;
}

.follow-container {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 40px;
}

/* LEFT IMAGE */
.follow-image img {
  width: 260px;
  height: auto;
  border-radius: 20px;
}

/* RIGHT TEXT */
.follow-text {
  max-width: 400px;
}

.follow-text h2 {
  color: #8b5e3c;
  font-size: 28px;
  margin-bottom: 10px;
}

.follow-text p {
  color: #555;
  font-size: 14px;
  margin-bottom: 20px;
}

/* BUTTON */
.follow-text button {
  background: #8b5e3c;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 25px;
  cursor: pointer;
  transition: 0.3s;
}

.follow-text button:hover {
  background: #6f4a33;
}

.marquee-wrapper {
  overflow: hidden;
  background: #fff;
  margin-top: 40px;
  padding: 10px 0;
}

.marquee-track {
  display: flex;
  width: max-content;
  animation: scroll 15s linear infinite;
}

.marquee-content {
  white-space: nowrap;
  padding-right: 50px;
  font-weight: 500;
  color: #8b5e3c;
}

/* 🔥 ANIMATION */
@keyframes scroll {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(-50%);
  }
}

.marquee-content::after {
  content: " ✦ ";
  margin-left: 20px;

  .marquee-content span {
  margin-right: 40px;
  font-weight: 500;
  color: #8b5e3c;
  position: relative;
}

/* 🔥 separator dot */
.marquee-content span::after {
  content: "•";
  margin-left: 15px;
  color: #ccc;
}

.marquee-content span {
  margin-right: 40px;
  display: inline-block;
  padding: 6px 14px;
  background: #f5f1ea;
  border-radius: 20px;
}
}
</style>

{{-- 🔥 HEADER --}}
<section class="collection">

<div class="collection-header">

  <!-- LEFT TEXT -->
  <div>
    <h2>{{ strtoupper($category->name) }}</h2>
    <h3>Category Collection</h3>
  </div>

  <!-- 🔥 RIGHT ICON -->
  <div>
    <img src="{{ asset('icons/' . $category->icon) }}"
         style="width:60px; height:60px; object-fit:contain;">
  </div>

</div>

{{-- 🔥 PRODUCTS --}}
<div class="collection-cards">

@foreach($products as $product)
<div class="card">

    <img src="{{ asset('images/' . $product->image) }}">

    <div class="card-arrow"
         onclick="window.location.href='/product/{{ $product->id }}'">
        →
    </div>

    <div class="card-info">
        <h4>{{ $product->name }}</h4>
        <p>{{ $product->price }}</p>
    </div>

</div>
@endforeach

<section class="collection">

  <div class="collection-header">
    <div>
      <h2>Related Collections</h2>
      <h3>Explore More</h3>
    </div>
  </div>

  <div class="collection-cards">

    @foreach($relatedProducts as $product)
    <div class="card">
        <img src="{{ asset('images/' . $product->image) }}">

        <div class="card-info">
            <h4>{{ $product->name }}</h4>
            <p>{{ $product->price }}</p>
        </div>
    </div>
    @endforeach

  </div>
<section class="follow-section">
  <div class="follow-container">
    
    <!-- LEFT IMAGE -->
    <div class="follow-image">
      <img src="{{ asset('images/' . ($whatsapp->image ?? 'phone.jpg')) }}">
    </div>

    <!-- RIGHT TEXT -->
    <div class="follow-text">
      <p class="small-line"></p>

      <h2>
        {{ $whatsapp->heading ?? 'FOLLOW ON WHATSAPP' }}
      </h2>

      <p>
        {{ $whatsapp->subtext ?? 'Join our WhatsApp Channel and follow the latest news.' }}
      </p>

      <a href="{{ $whatsapp->whatsapp_link ?? '#' }}" target="_blank">
        <button>
          {{ $whatsapp->button_text ?? 'FOLLOW ON WHATSAPP' }}
        </button>
      </a>
    </div>

  </div>

  <!-- MARQUEE -->
@php
$items = explode('|', $whatsapp->marquee_text ?? '');
@endphp

<div class="marquee-wrapper">
  <div class="marquee-track">

    <div class="marquee-content">
      @foreach($items as $item)
        <span>{{ $item }}</span>
      @endforeach
    </div>

    <!-- duplicate for smooth scroll -->
    <div class="marquee-content">
      @foreach($items as $item)
        <span>{{ $item }}</span>
      @endforeach
    </div>

  </div>
</div>

</div>

</section>

@endsection