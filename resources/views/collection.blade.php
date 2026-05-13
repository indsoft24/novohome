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

/* 🔥 PREMIUM COLLECTION CARDS */
.collection-cards{
    display:flex;
    gap:30px;
    align-items:stretch;
    flex-wrap:wrap;
}

/* 🔥 CARD */
.card{
    background: rgba(255,255,255,0.75);
    backdrop-filter: blur(12px);

    border-radius: 26px;
    overflow: hidden;

    width: 30%;
    min-height: 100%;

    padding: 16px;

    border: 1px solid rgba(139,94,60,0.08);

    box-shadow:
        0 12px 35px rgba(0,0,0,0.05),
        0 3px 12px rgba(139,94,60,0.05);

    transition: all 0.4s ease;

    display:flex;
    flex-direction:column;
    justify-content:space-between;

    position:relative;
}

/* 🔥 GLOW EFFECT */
.card::before{
    content:"";
    position:absolute;

    top:-50px;
    right:-50px;

    width:140px;
    height:140px;

    background:rgba(196,154,108,0.08);

    border-radius:50%;
}

/* 🔥 HOVER */
.card:hover{
    transform: translateY(-12px);

    box-shadow:
        0 25px 50px rgba(0,0,0,0.08),
        0 10px 25px rgba(139,94,60,0.12);
}

/* 🔥 IMAGE */
.card img{
    width:100%;
    height:260px;

    object-fit:cover;

    border-radius:20px;

    transition:0.5s ease;
}

/* 🔥 IMAGE ZOOM */
.card:hover img{
    transform:scale(1.05);
}

/* 🔥 CARD INFO */
.card-info{
    margin-top:20px;
    text-align:left;
}

/* 🔥 TITLE */
.card-info h4{
    color:#3e2c23;
    font-size:24px;
    font-weight:700;

    margin-bottom:10px;
}

/* 🔥 DESCRIPTION */
.card-info p{
    color:#7b6f66;
    font-size:15px;
    line-height:1.7;
    margin-bottom:16px;
}

/* 🔥 PRICE */
.card-price{
    font-size:22px;
    font-weight:700;
    color:#8b5e3c;
}

/* 🔥 BUTTON */
.card-btn{
    margin-top:12px;

    background:#8b5e3c;
    color:#fff;

    border:none;

    padding:10px 18px;

    border-radius:12px;

    font-size:13px;
    font-weight:600;

    transition:0.3s;
}

.card-btn:hover{
    background:#6f4526;
}

/* 🔥 RESPONSIVE */
@media (max-width: 992px){

    .card{
        width:48%;
    }

}

@media (max-width: 768px){

    .collection-cards{
        flex-direction:column;
    }

    .card{
        width:100%;
    }

    .card img{
        height:220px;
    }

    .card-info h4{
        font-size:20px;
    }

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

        <p>
            {{ \Illuminate\Support\Str::limit($product->description, 90) }}
        </p>

        <div class="card-price">
            ₹ {{ $product->price }}
        </div>

        <button class="card-btn">
            Explore Now
        </button>

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

        <p>
            {{ \Illuminate\Support\Str::limit($product->description, 90) }}
        </p>

        <div class="card-price">
            ₹ {{ $product->price }}
        </div>

        <button class="card-btn">
            Explore Now
        </button>

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

    <img src="{{ asset('images/' . $product->image) }}">

    <div class="card-info">

        <h4>{{ $product->name }}</h4>

    <p>
        {{ \Illuminate\Support\Str::limit($product->description, 90) }}
    </p>

        <div class="card-price">
            ₹ {{ $product->price }}
        </div>

        <button class="card-btn">
            Explore Now
        </button>

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