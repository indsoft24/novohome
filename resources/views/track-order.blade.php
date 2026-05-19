@extends('layouts.app')

@section('content')

<style>

.track-wrapper{
    min-height:80vh;
    background:#f5f7fb;
    padding:70px 20px;
}

.track-card{
    max-width:700px;
    margin:auto;
    background:#fff;
    border-radius:25px;
    padding:45px;
    box-shadow:0 15px 40px rgba(0,0,0,0.08);
}

.track-title{
    font-size:36px;
    font-weight:700;
    margin-bottom:10px;
    color:#111;
}

.track-subtitle{
    color:#777;
    margin-bottom:35px;
    font-size:15px;
}

.track-form{
    display:flex;
    gap:15px;
    flex-wrap:wrap;
}

.track-input{
    flex:1;
    min-width:250px;
    padding:16px 20px;
    border-radius:14px;
    border:1px solid #ddd;
    font-size:15px;
    outline:none;
    transition:0.3s;
}

.track-input:focus{
    border-color:#000;
    box-shadow:0 0 0 4px rgba(0,0,0,0.05);
}

.track-btn{
    padding:16px 30px;
    border:none;
    border-radius:14px;
    background:linear-gradient(135deg,#111,#333);
    color:#fff;
    font-weight:600;
    transition:0.3s;
}

.track-btn:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 20px rgba(0,0,0,0.15);
}

.order-box{
    margin-top:35px;
    background:#fafafa;
    border-radius:20px;
    padding:30px;
    border:1px solid #eee;
}

.order-top{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
    flex-wrap:wrap;
}

.order-top h4{
    font-size:24px;
    font-weight:700;
    margin:0;
}

.status-badge{
    padding:10px 18px;
    border-radius:30px;
    font-size:14px;
    font-weight:600;
}

.status-completed{
    background:#e7f8ee;
    color:#1b9c55;
}

.status-pending{
    background:#fff4de;
    color:#d68910;
}

.order-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
}

.order-item{
    background:#fff;
    border-radius:15px;
    padding:20px;
    border:1px solid #eee;
}

.order-item span{
    display:block;
    color:#888;
    font-size:13px;
    margin-bottom:8px;
}

.order-item h5{
    margin:0;
    font-size:18px;
    font-weight:700;
    color:#111;
}

.not-found{
    margin-top:30px;
    padding:18px;
    border-radius:14px;
    background:#ffeaea;
    color:#d63031;
    font-weight:600;
}

@media(max-width:768px){

    .track-card{
        padding:30px 20px;
    }

    .track-title{
        font-size:28px;
    }

    .track-form{
        flex-direction:column;
    }

    .track-btn{
        width:100%;
    }
}

</style>

<div class="track-wrapper">

    <div class="track-card">

        <h2 class="track-title">
            Track Your Order
        </h2>

        <p class="track-subtitle">
            Enter your Razorpay Order ID to check your latest order status.
        </p>

        <form method="GET" action="/track-order" class="track-form">

            <input type="text"
                   name="order_id"
                   class="track-input"
                   placeholder="Enter Order ID"
                   required>

            <button type="submit" class="track-btn">
                Track Order
            </button>

        </form>

        @if($order)

        <div class="order-box">

            <div class="order-top">

                <h4>
                    Order Found ✅
                </h4>

                <div class="status-badge 
                    {{ $order->status == 'completed' ? 'status-completed' : 'status-pending' }}">
                    
                    {{ ucfirst($order->status) }}

                </div>

            </div>

            <div class="order-grid">

                <div class="order-item">
                    <span>Order ID</span>
                    <h5>#{{ $order->id }}</h5>
                </div>

                <div class="order-item">
                    <span>Customer Name</span>
                    <h5>{{ $order->name }}</h5>
                </div>

                <div class="order-item">
                    <span>Total Amount</span>
                    <h5>₹{{ $order->total }}</h5>
                </div>

                <div class="order-item">
                    <span>Tracking ID</span>
                    <h5 style="font-size:14px;">
                        {{ $order->razorpay_order_id }}
                    </h5>
                </div>

            </div>

        </div>

        @elseif(request()->order_id)

        <div class="not-found">
            Order not found ❌
        </div>

        @endif

    </div>

</div>

@endsection