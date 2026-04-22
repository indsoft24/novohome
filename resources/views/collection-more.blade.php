@extends('layouts.app')

@section('content')

<style>
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

/* CARD FIXED */
.card {
  background: white;
  padding: 20px;
  border-radius: 15px;
  flex: 0 0 calc(33.33% - 20px); /* 👈 PERFECT 3 PER ROW */
  text-align: center;
  transition: 0.3s;
  position: relative;
  overflow: hidden;
}

.card:hover img {
  transform: scale(1.05);
}

/* IMAGE */
.card img {
  width: 100%;
  height: 250px;
  object-fit: cover;
  border-radius: 10px;
  transition: 0.4s;
}

/* INFO */
.card-info {
  margin-top: 15px;
}

.card-info h4 {
  color: #8b5e3c;
}

/* HOVER */
.card:hover {
  transform: translateY(-10px);
}

/* HAPPY CUSTOMER */
.customer-card {
  background:#fff;
  padding:20px;
  border-radius:15px;
  width:30%;
  text-align:center;
}
</style>

{{-- 🔥 BANNER --}}
<section style="position:relative; margin-bottom:40px;">

<img src="{{ asset('images/' . ($products->first()->banner ?? 'banner.jpg')) }}"
     style="width:100%; height:350px; object-fit:cover; border-radius:15px;">

<div style="
    position:absolute;
    top:50%;
    right:50px;
    transform:translateY(-50%);
    text-align:right;
">
    <h1 style="color:#9c6b4f; letter-spacing:4px;">
        {{ strtoupper($products->first()->title ?? $type) }}
    </h1>
    <h2 style="font-family:cursive;">
        {{ $products->first()->subtitle ?? 'Collection' }}
    </h2>
</div>

</section>

{{-- 🔥 PRODUCTS --}}
<section class="collection">

<div class="collection-header">
  <div>
    <h2>{{ strtoupper($type) }}</h2>
    <h3>Full Collection</h3>
  </div>
</div>

<div class="collection-cards">

@foreach($products as $product)
<div class="card">

    <img src="{{ asset('images/' . $product->image) }}">

    <!-- ARROW -->
    <div style="
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
        cursor:pointer;"
        onclick="window.location.href='/product/{{ $product->id }}'">
        →
    </div>

    <div class="card-info">
        <h4>{{ $product->name }}</h4>
        <p>{{ $product->price }}</p>
    </div>

</div>
@endforeach

</div>
</section>

{{-- 🔥 HAPPY CUSTOMERS (NOW FIXED POSITION) --}}
<section style="background:#f5f1ea; padding:60px 0;">

<div class="container">

<h2 style="text-align:center; color:#8b5e3c; margin-bottom:40px;">
  Happy Customers 💖
</h2>

<div style="display:flex; gap:30px;">

@foreach($testimonials as $item)
<div class="customer-card">

  <img src="{{ asset('images/' . $item->image) }}" style="
    width:80px;
    height:80px;
    border-radius:50%;
    object-fit:cover;
    margin-bottom:10px;
  ">

  <h5>{{ $item->name }}</h5>
  <p>"{{ $item->review }}"</p>

</div>
@endforeach

</div>

</div>
</section>

@endsection