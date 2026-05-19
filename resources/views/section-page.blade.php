@extends('layouts.app')

@section('content')

<style>

.section-container{
    padding:60px 0;
    background:#f8f9fb;
}

/* Heading */
.section-title{
    font-size:38px;
    font-weight:700;
    margin-bottom:40px;
    color:#2f3e46;
    text-align:center;
}

/* Card */
.product-card{
    background:#fff;
    border-radius:20px;
    overflow:hidden;
    transition:0.4s;
    height:100%;
    position:relative;
    box-shadow:0 8px 25px rgba(0,0,0,0.05);
}

.product-card:hover{
    transform:translateY(-8px);
    box-shadow:0 20px 40px rgba(0,0,0,0.12);
}

/* Image */
.product-img-wrapper{
    overflow:hidden;
    position:relative;
}

.product-img{
    width:100%;
    height:260px;
    object-fit:cover;
    transition:0.5s;
}

.product-card:hover .product-img{
    transform:scale(1.08);
}

/* Badge */
.product-badge{
    position:absolute;
    top:15px;
    left:15px;
    background:#9c6b4f;
    color:#fff;
    padding:6px 14px;
    border-radius:30px;
    font-size:12px;
    font-weight:600;
}

/* Content */
.product-content{
    padding:20px;
}

/* Name */
.product-name{
    font-size:18px;
    font-weight:600;
    color:#2f3e46;
    margin-bottom:10px;
}

/* Price */
.product-price{
    color:#9c6b4f;
    font-size:20px;
    font-weight:bold;
    margin-bottom:15px;
}

/* Button */
.view-btn{
    width:100%;
    border:none;
    background:linear-gradient(135deg,#9c6b4f,#c49a6c);
    color:#fff;
    padding:12px;
    border-radius:12px;
    font-weight:600;
    transition:0.3s;
}

.view-btn:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 20px rgba(0,0,0,0.15);
}

</style>

<div class="container section-container">

    <h2 class="section-title">
        {{ ucfirst($type) }} Collection
    </h2>

    <div class="row">

        @forelse($products as $product)

        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">

            <a href="/product/{{ $product->id }}"
               class="text-decoration-none">

                <div class="product-card">

                    <div class="product-img-wrapper">

                        <span class="product-badge">
                            Premium
                        </span>

                        <img src="{{ asset('images/' . $product->image) }}"
                             class="product-img">

                    </div>

                    <div class="product-content">

                        <div class="product-name">
                            {{ $product->name }}
                        </div>

                        <div class="product-price">
                            ₹ {{ $product->price }}
                        </div>

                        <button class="view-btn">
                            View Product
                        </button>

                    </div>

                </div>

            </a>

        </div>

        @empty

        <p>No products found</p>

        @endforelse

    </div>

</div>

@endsection