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

</style>

<section class="collection">
  
  <div class="collection-header">
    <div>
      <h2>Harmony</h2>
      <h3>Exclusive Range</h3>
    </div>
    <button class="discover-btn">View Collection →</button>
  </div>

  <div class="collection-cards">

    @foreach($products as $product)
    <div class="card">
        <img src="{{ asset('images/' . $product->image) }}">
        <!-- ➡️ ARROW -->
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
        justify-content:center;" onclick="window.location.href='/product/{{ $product->id }}'">
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

<section class="collection">
  
  <div class="collection-header">
    <div>
      <h2>Premium Picks</h2>
      <h3>Exclusive Range</h3>
    </div>
    <button class="discover-btn">View Collection →</button>
  </div>

  <div class="collection-cards">

    @foreach($products as $item)
    <div class="card">
        <img src="{{ asset('images/' . $item->image) }}">
        <!-- ➡️ ARROW -->
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
        justify-content:center;" onclick="window.location.href='/product/{{ $product->id }}'">
        →
        
    </div>
        
        <div class="card-info">
            <h4>{{ $item->name }}</h4>
            <p>{{ $item->price }}</p>
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
    <button class="discover-btn">View Collection →</button>
  </div>

  <div class="collection-cards">

    @foreach($products as $product)
<div class="card">

    <!-- IMAGE -->
    <img src="{{ asset('images/' . $product->image) }}">


    <!-- ➡️ ARROW -->
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
        justify-content:center;" onclick="window.location.href='/product/{{ $product->id }}'">
        →
        
    </div>

    <!-- NORMAL TEXT (same as before) -->
    <div class="card-info">
        <h4>{{ $product->name }}</h4>
        <p>{{ $product->price }}</p>
    </div>

</div>
@endforeach

  </div>

</section>

@endsection