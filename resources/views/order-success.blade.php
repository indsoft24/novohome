@extends('layouts.app')

@section('content')

<style>
.success-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 60px 20px;
}

.success-card {
    background: #ffffff;
    padding: 40px 30px;
    border-radius: 15px;
    text-align: center;
    max-width: 420px;
    width: 100%;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    animation: fadeIn 0.6s ease;
}

.success-icon {
    font-size: 60px;
    color: #28a745;
    margin-bottom: 15px;
}

.success-title {
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 10px;
}

.success-text {
    font-size: 14px;
    color: #666;
    margin-bottom: 25px;
}

.success-btn {
    padding: 12px 25px;
    border-radius: 30px;
    background: linear-gradient(135deg, #00c6ff, #0072ff);
    color: #fff;
    text-decoration: none;
    font-weight: 500;
    transition: 0.3s;
    display: inline-block;
}

.success-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    color: #fff;
}

@keyframes fadeIn {
    from {opacity: 0; transform: translateY(20px);}
    to {opacity: 1; transform: translateY(0);}
}
</style>

<div class="success-wrapper">
    <div class="success-card">

        <div class="success-icon">✅</div>

        <div class="success-title">
            Order Placed Successfully!
        </div>

        <div class="success-text">
            Thank you for your purchase. Your order has been confirmed and will be processed shortly.
        </div>

        <a href="/" class="success-btn">
            Continue Shopping →
        </a>

    </div>
</div>

@endsection