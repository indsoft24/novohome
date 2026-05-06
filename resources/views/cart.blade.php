@extends('layouts.app')

@section('content')

<style>
.cart-page {
    padding: 60px 0;
}

/* Card */
.cart-card {
    border-radius: 15px;
    padding: 20px;
    background: #fff;
    box-shadow: 0 10px 25px rgba(0,0,0,0.05);
    margin-bottom: 20px;
    transition: 0.3s;
}

.cart-card:hover {
    transform: translateY(-3px);
}

/* Image */
.cart-img {
    width: 100px;
    height: auto;
    object-fit: cover;
    border-radius: 10px;
}

/* Title */
.cart-title {
    font-weight: 600;
    font-size: 18px;
    color: #2f3e46;
}

/* Price */
.cart-price {
    color: #8b5e3c;
    font-weight: 600;
}

/* Qty box */
.qty-box {
    display: flex;
    align-items: center;
    gap: 10px;
}

.qty-btn {
    border: none;
    background: #eee;
    padding: 5px 12px;
    border-radius: 6px;
}

.qty-btn:hover {
    background: #9c6b4f;
    color: #fff;
}

/* Remove */
.remove-btn {
    color: red;
    cursor: pointer;
    font-size: 14px;
}

/* Summary */
.summary-box {
    background: #f5f2ed;
    padding: 25px;
    border-radius: 15px;
}

.checkout-btn {
    background: #9c6b4f;
    color: #fff;
    border: none;
    padding: 12px;
    width: 100%;
    border-radius: 10px;
    margin-top: 15px;
}
</style>

<div class="container cart-page">
    <div class="row">

        <!-- LEFT CART ITEMS -->
        <div class="col-md-8">

            <h3 class="mb-4">🛒 Your Cart</h3>

            @php $total = 0; @endphp

            @foreach($cartItems as $item)
                @php 
                    $price = (float) $item->product->price;
                    $qty = (int) $item->qty;
                
                    $subtotal = $price * $qty;
                    $total += $subtotal;
                @endphp

                <div class="cart-card d-flex justify-content-between align-items-center">

                    <div class="d-flex align-items-center gap-3">
                        <img src="{{ asset('images/'.$item->product->image) }}" class="cart-img">

                        <div>
                            <div class="cart-title">{{ $item->product->name }}</div>
                            <div class="cart-price"> {{ $item->product->price }}</div>
                        </div>
                    </div>

                    <!-- Qty -->
                    <div class="qty-box">
                        <button class="qty-btn" onclick="updateQty({{ $item->id }}, {{ $item->qty - 1 }})">-</button>

                        <span>{{ $item->qty }}</span>
                        <button class="qty-btn"onclick="updateQty({{ $item->id }}, {{ $item->qty + 1 }})">+</button>
                    </div>

                    <!-- Subtotal -->
                    <div>
                        ₹ {{ $subtotal }}
                    </div>

                    <!-- Remove -->
                    <div>
                        <span onclick="removeItem({{ $item->id }})" class="remove-btn">Remove</span>
                    </div>

                </div>
            @endforeach

        </div>

        <!-- RIGHT SUMMARY -->
        <div class="col-md-4">

            <div class="summary-box">
                <h4>Order Summary</h4>

                <hr>

                <p>Total Items: {{ $cartItems->sum('qty') }}</p>
                <h5>Total: ₹ {{ $total }}</h5>

                <a href="/checkout" class="btn btn-success">Proceed to Checkout</a>
            </div>

        </div>

    </div>
</div>

@endsection