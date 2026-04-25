@extends('layouts.app')

@section('content')

<style>
.product-page {
    padding: 60px 0;
}

.product-img {
    width: 100%;
    height: 450px;          /* 👈 fix height */
    object-fit: cover;      /* 👈 crop perfect */
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);

}

.product-title {
    font-size: 32px;
    color: #2f3e46;
    font-weight: bold;
}

.product-price {
    font-size: 22px;
    color: #8b5e3c;
    margin: 10px 0;
}

.btn-whatsapp {
    background: green;
    color: #fff;
    padding: 10px 20px;
    border-radius: 8px;
    border: none;
}

.btn-cart {
    border: 1px solid #8b5e3c;
    padding: 10px 20px;
    border-radius: 8px;
    background: none;
}
</style>

<div class="container product-page">
    <div class="row">

        <!-- LEFT IMAGE -->
        <div class="col-md-6">
            <img src="{{ asset('images/' . $product->image) }}" class="product-img">
        </div>

        <!-- RIGHT DETAILS -->
        <div class="col-md-6">

            <p>{{ $product->category->name ?? 'Category' }}</p>

            <h1 class="product-title">{{ $product->name }}</h1>

            <h4 class="product-price">{{ $product->price }}</h4>

            <p>
            {{ $product->description ?? 'Premium quality ' . $product->name . ' designed for modern homes with comfort and elegance.' }}
            </p>

            <div class="mt-3">
                <button class="btn-whatsapp">WhatsApp</button>
                <button class="btn-cart">Add to Cart</button>
            </div>

        </div>

    </div>
</div>

<!-- 🔥 PRODUCT REVIEW FORM -->
<div class="container mt-5">
    <h3 class="mb-3">Write a Review</h3>

    <form action="{{ route('product.review') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="product_id" value="{{ $product->id }}">

        <div class="row">
            <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
            </div>

            <div class="col-md-6">
                <input type="file" name="image" class="form-control">
            </div>

            <div class="col-md-12 mt-3">
                <textarea name="message" class="form-control" rows="4" placeholder="Your Review..." required></textarea>
            </div>

            <div class="col-md-12 mt-3">
                <button class="btn-whatsapp">Submit Review</button>
            </div>
        </div>
    </form>
</div>

@endsection