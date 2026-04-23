@extends('layouts.app')

@section('content')

<style>
.section-container {
  padding: 40px;
}

.product-card {
  border: 1px solid #ddd;
  padding: 15px;
  border-radius: 10px;
  background: #fff;
  transition: 0.3s;
  height: 100%;
}

.product-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

.product-img {
  width: 100%;
  height: 220px;              /* 🔥 fixed height */
  object-fit: cover;          /* 🔥 image crop fix */
  border-radius: 8px;
}

.product-name {
  font-size: 16px;
  margin-top: 10px;
  font-weight: 600;
}
</style>

<div class="container section-container">

    <h2 style="margin-bottom:30px;">
        {{ ucfirst($type) }} Collection
    </h2>

    <div class="row">
        @forelse($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">

                <div class="product-card">

                    <img src="{{ asset('images/' . $product->image) }}" 
                         class="product-img">

                    <h5 class="product-name">
                        {{ $product->name }}
                    </h5>

                </div>

            </div>
        @empty
            <p>No products found</p>
        @endforelse
    </div>

</div>

@endsection