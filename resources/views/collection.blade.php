@extends('layouts.app')

@section('content')

<style>
.collection {
  background: #f5f1ea;
  padding: 50px;
}

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

.discover-btn {
  background: #8b5e3c;
  color: white;
  padding: 10px 18px;
  border: none;
  border-radius: 20px;
  cursor: pointer;
}

.collection-cards {
  display: flex;
  gap: 30px;
}

.collection-cards {
  display: flex;
  gap: 30px;
  align-items: stretch; /* 👈 important */
}

.card {
  background: white;
  padding: 20px;
  border-radius: 15px;
  width: 30%;
  text-align: center;
  transition: 0.3s;
  display: flex;
  flex-direction: column;
  justify-content: space-between; /* 👈 equal spacing */
}

/* 👇 IMAGE FIX */
.card img {
  width: 100%;
  height: 250px;       /* 👈 same height sabki */
  object-fit: cover;   /* 👈 crop karega properly */
  border-radius: 10px;
}

.card-info {
  margin-top: 15px;
}


.card-info h4 {
  color: #8b5e3c;
}

.card:hover {
  transform: translateY(-10px);
}

/* 🔥 SEARCH CATEGORY SECTION */
.search-category-section {
    text-align: center;
}

/* TITLE */
.search-title {
    color: #8b5e3c;
    letter-spacing: 2px;
}

/* SEARCH INPUT */
.search-input {
    width: 100%;
    padding: 12px;
    border-radius: 20px;
    border: 1px solid #ddd;
    margin: 20px 0;
    outline: none;
}

/* SUB TITLE */
.sub-title {
    text-align: left;
    margin-bottom: 20px;
}

/* GRID */
.category-grid {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 20px;
}

/* CARD */
.category-card {
    background: #fff;
    padding: 25px;
    border-radius: 20px;
    text-align: center;
    cursor: pointer;
    transition: 0.3s;
}

/* HOVER */
.category-card:hover {
    background: #8b5e3c;
    color: #fff;
    transform: translateY(-5px);
}

/* ICON */
.category-icon {
    font-size: 30px;
    margin-bottom: 10px;
}

/* NAME */
.category-name {
    font-weight: 600;
}

.category-icon img {
    width: 40px;
    height: 40px;
    object-fit: contain;
    filter: grayscale(100%);
    transition: 0.3s;
}

.category-card:hover img {
    filter: none;
}

</style>

<section class="collection">
  
  <div class="collection-header">
    <div>
      <h2>Harmony</h2>
      <h3>Exclusive Range</h3>
    </div>
    <button class="discover-btn" onclick="window.location.href='/collection/venus'">
    View Collection →
</button>
  </div>

  <div class="collection-cards">

@foreach($venus as $product)
    <div class="card"
     onclick="window.location.href='/product/{{ $product->id }}'"
     style="cursor:pointer;">
        <img src="{{ asset('images/' . $product->image) }}">
        <div class="card-info">
            <h4>{{ $product->name }}</h4>
            <p>{{ $product->price }}</p>
        </div>
    </div>
    @endforeach

  </div>

</section>

<section class="collection">
  
  <div class="collection-header">
    <div>
      <h2>Premium Picks</h2>
      <h3>Exclusive Range</h3>
    </div>
    <button class="discover-btn" onclick="window.location.href='/collection/arte'">
    View Collection →
</button>
  </div>

  <div class="collection-cards">

    @foreach($arte as $product)
    <div class="card"
     onclick="window.location.href='/product/{{ $product->id }}'"
     style="cursor:pointer;">
        <img src="{{ asset('images/' . $product->image) }}">        
        <div class="card-info">
            <h4>{{ $product->name }}</h4>
            <p>{{ $product->price }}</p>
        </div>
    </div>
    @endforeach

  </div>

</section>
<section class="collection">

  <!-- HEADER -->
  <div class="collection-header">
    <div>
      <h2>ELEGANCE </h2>
      <h3>Exclusive Range</h3>
    </div>
    <button class="discover-btn" onclick="window.location.href='/collection/luxe'">
    View Collection →
    </button>
  </div>

  <div class="collection-cards">

    @foreach($luxe as $product)
    <div class="card"
         onclick="window.location.href='/product/{{ $product->id }}'"
         style="cursor:pointer;">
    
        <!-- IMAGE -->
        <img src="{{ asset('images/' . $product->image) }}">
        <!-- NORMAL TEXT (same as before) -->
        <div class="card-info">
            <h4>{{ $product->name }}</h4>
            <p>{{ $product->price }}</p>
        </div>
    
    </div>
    @endforeach


</div>

<!-- 🔥 SEARCH CATEGORIES SECTION -->
<div class="search-category-section container mt-5">

    <h2 class="search-title">SEARCH CATEGORIES</h2>

    <!-- SEARCH BOX -->
    <input type="text" placeholder="Search..." class="search-input">

    <h5 class="sub-title">SUB CATEGORIES</h5>

    <div class="category-grid">

        @foreach($categories as $cat)
        <div class="category-card"
             onclick="window.location.href='/category/{{ $cat->id }}'">

            <div class="category-icon">
              <img src="{{ asset('icons/' . $cat->icon) }}" style="width:40px; margin-bottom:10px;">
            </div>

            <p class="category-name">
                {{ strtoupper($cat->name) }}
            </p>

        </div>
        @endforeach

    </div>

  </div>

</section>

@endsection