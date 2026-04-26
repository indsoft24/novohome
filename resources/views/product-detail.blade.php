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

/* 🔥 REVIEW SECTION */
.review-section {
    background: linear-gradient(135deg, #f5f2ed, #fff);
    padding: 50px 30px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
}

/* Title */
.review-title {
    color: #9c6b4f;
    font-weight: bold;
}

/* Input */
.review-section .form-control {
    border-radius: 12px;
    border: 1px solid #ddd;
    padding: 12px;
    transition: 0.3s;
}

.review-section .form-control:focus {
    border-color: #9c6b4f;
    box-shadow: 0 0 0 0.1rem rgba(156,107,79,0.2);
}

/* Upload box */
.file-box {
    border: 2px dashed #ddd;
    padding: 20px;
    border-radius: 12px;
    text-align: center;
    cursor: pointer;
    transition: 0.3s;
}

.file-box:hover {
    border-color: #9c6b4f;
    background: #faf7f4;
}

/* Button */
.review-btn {
    background: #9c6b4f;
    color: #fff;
    border: none;
    padding: 12px 25px;
    border-radius: 10px;
    font-weight: 600;
    transition: 0.3s;
}

.review-btn:hover {
    background: #7a4f38;
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
    <div class="review-section">

        <h3 class="review-title mb-4">Write a Review</h3>

        <form action="{{ route('product.review') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="product_id" value="{{ $product->id }}">

            <div class="row g-3">

                <!-- Name -->
                <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>

                <!-- Image Upload -->
                <div class="col-md-6">
                    <label class="file-box w-100">
                        Upload Image
                        <input type="file" name="image" hidden>
                    </label>
                </div>

                <!-- Message -->
                <div class="col-md-12">
                    <textarea name="message" class="form-control" rows="4" placeholder="Write your experience..." required></textarea>
                </div>

                <!-- Button -->
                <div class="col-md-12 text-end">
                    <button class="review-btn">Submit Review</button>
                </div>

            </div>
        </form>

    </div>
</div>

@endsection