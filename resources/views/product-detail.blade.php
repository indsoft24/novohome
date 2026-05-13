@extends('layouts.app')

@section('content')

<style>
.product-page {
    padding: 60px 0;
    min-height: 50vh;   /* 👈 ye add karo */
}

.product-img {
    width: 100%;
    height: 450px;          /* 👈 fix height */
    object-fit: cover;      /* 👈 crop perfect */
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);

}

/* 🔥 RIGHT DETAILS */
.product-details{
    padding-left: 30px;
}

/* CATEGORY */
.product-category{
    display: inline-block;

    background: #f3e6d8;
    color: #8b5e3c;

    padding: 8px 18px;

    border-radius: 30px;

    font-size: 12px;
    font-weight: 700;
    letter-spacing: 1px;

    margin-bottom: 22px;
}

/* TITLE */
.product-title {
    font-size: 52px;
    line-height: 1.1;

    color: #2f241d;
    font-weight: 700;

    margin-bottom: 20px;
}

/* PRICE */
.product-price {
    font-size: 34px;
    font-weight: 700;

    color: #8b5e3c;

    margin-bottom: 22px;
}

/* DESCRIPTION */
.product-desc{
    font-size: 17px;
    line-height: 2;

    color: #6b625b;

    margin-bottom: 28px;

    max-width: 90%;
}

/* FEATURES */
.product-features{
    display:flex;
    flex-wrap:wrap;

    gap:14px;

    margin-bottom:35px;
}

.feature{
    padding:10px 18px;

    border-radius:14px;

    background:#faf6f1;

    border:1px solid rgba(139,94,60,0.08);

    color:#5f4a3a;

    font-size:14px;
    font-weight:600;
}

/* BUTTONS */
.product-buttons{
    display:flex;
    gap:16px;
    flex-wrap:wrap;
}

/* WHATSAPP */
.btn-whatsapp {
    background: #25D366;
    color: #fff;

    padding: 14px 28px;

    border-radius: 14px;

    border: none;

    font-weight: 700;

    transition: 0.3s;

    box-shadow: 0 10px 25px rgba(37,211,102,0.22);
}

.btn-whatsapp:hover{
    transform: translateY(-4px);
    background:#1fb857;
}

/* CART */
.btn-cart {
    border: 1px solid #8b5e3c;

    padding: 14px 28px;

    border-radius: 14px;

    background: transparent;

    color:#8b5e3c;

    font-weight:700;

    transition:0.3s;
}

.btn-cart:hover{
    background:#8b5e3c;
    color:#fff;

    transform:translateY(-4px);
}

/* MOBILE */
@media(max-width:768px){

    .product-details{
        padding-left: 0;
        margin-top: 30px;
    }

    .product-title{
        font-size: 38px;
    }

    .product-price{
        font-size: 28px;
    }

    .product-desc{
        max-width: 100%;
    }
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
        <div class="col-md-6 product-details">

            <div class="product-category">
                {{ strtoupper($product->category->name ?? 'PREMIUM COLLECTION') }}
            </div>
            <h1 class="product-title">{{ $product->name }}</h1>

            <h4 class="product-price">₹{{ $product->price }}</h4>

            <p class="product-desc">
               {{ $product->description ?? 'Premium quality ' . $product->name . ' designed for modern homes with comfort and elegance.' }}
            </p>

            <div class="product-features">

                <div class="feature">Premium Finish</div>
            
                <div class="feature">Modern Design</div>
            
                <div class="feature">Luxury Comfort</div>
            
                <div class="feature">Durable Quality</div>
            
            </div>

            <div class="product-buttons">
                <button class="btn-whatsapp">WhatsApp</button>
                <button class="btn-cart" onclick="addToCart({{ $product->id }}, this)">
                    Add to Cart
                </button>
            </div>

        </div>

    </div>
</div>

<!-- 🔥 PRODUCT REVIEW FORM -->
<div class="container mt-5">
    <div class="review-section">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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
                        <div class="upload-box">
                            <input 
                                type="file" 
                                name="image"
                                accept="image/*"
                                class="form-control"
                                required>
                        </div>
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


<!-- 🔥 ORDER MODAL -->
<div class="modal fade" id="orderModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content p-3">

      <h5 class="mb-3">Place Your Order</h5>

      <form action="{{ route('order.store') }}" method="POST">
        @csrf

        <input type="hidden" name="product_id" value="{{ $product->id }}">

        <!-- Name -->
        <div class="mb-2">
            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
        </div>

        <!-- Phone -->
        <div class="mb-2">
            <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
        </div>

        <!-- Address -->
        <div class="mb-2">
            <textarea name="address" class="form-control" placeholder="Full Address" required></textarea>
        </div>

        <!-- Quantity -->
        <div class="mb-2">
            <input type="number" name="qty" class="form-control" value="1" min="1">
        </div>

        <button class="btn btn-success w-100">
            Confirm Order
        </button>

      </form>

    </div>
  </div>
</div>




@endsection