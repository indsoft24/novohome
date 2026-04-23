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
</style>

{{-- 🔥 HEADER --}}
<section class="collection">

<div class="collection-header">
  <div>
    <h2>{{ strtoupper($category->name ?? 'CATEGORY') }}</h2>
    <h3>Category Collection</h3>
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

</div>

</section>

@endsection