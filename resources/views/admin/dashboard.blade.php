@extends('admin.layouts.app')

@section('content')

<style>

body{
    background:#f4f7fb;
}

/* ================= GRID ================= */

.dashboard-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:22px;
}

/* ================= LINKS ================= */

.dashboard-link{
    text-decoration:none;
    color:inherit;
}

/* ================= CARDS ================= */

.dashboard-card{
    position:relative;
    overflow:hidden;
    border-radius:22px;
    padding:28px;
    color:#fff;
    transition:0.3s;
    box-shadow:0 15px 35px rgba(0,0,0,0.08);
}

.dashboard-card:hover{
    transform:translateY(-6px);
}

/* CARD COLORS */

.green{
    background:linear-gradient(135deg,#1abc9c,#16a085);
}

.orange{
    background:linear-gradient(135deg,#f39c12,#e67e22);
}

.blue{
    background:linear-gradient(135deg,#3498db,#2980b9);
}

.purple{
    background:linear-gradient(135deg,#9b59b6,#8e44ad);
}

/* CARD BG CIRCLE */

.dashboard-card::before{
    content:'';
    position:absolute;
    width:120px;
    height:120px;
    background:rgba(255,255,255,0.08);
    border-radius:50%;
    top:-30px;
    right:-30px;
}

/* CARD CONTENT */

.card-inner{
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.card-content h6{
    font-size:14px;
    font-weight:500;
    margin-bottom:10px;
    opacity:0.9;
    letter-spacing:0.5px;
}

.card-content h2{
    font-size:34px;
    font-weight:700;
    margin:0;
}

.view-text{
    display:block;
    margin-top:12px;
    font-size:13px;
    opacity:0.9;
}

.card-icon{
    font-size:34px;
    opacity:0.95;
}

/* ================= COMMON CARDS ================= */

.chart-card,
.table-card,
.analytics-card{
    background:#fff;
    border-radius:26px;
    padding:28px;
    box-shadow:0 10px 30px rgba(0,0,0,0.05);
    border:1px solid #edf1f7;
}

/* ================= CHART ================= */

.chart-card{
    margin-top:25px;
    padding:20px 25px;
    height:auto;
}

.chart-header h4{
    margin:0 0 12px;
    font-size:22px;
    font-weight:700;
    color:#1e293b;
}

/* SMALL SINGLE LINE CHART */
#salesChart{
    width:100% !important;
    height:90px !important;
    max-height:90px !important;
    display:block;
}

/* ================= TABLE CARD ================= */

.card-top{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:18px;
}

.card-top h5{
    margin:0;
    font-size:22px;
    font-weight:700;
    color:#1e293b;
}

/* BUTTON */

.view-btn{
    text-decoration:none;
    background:#111827;
    color:#fff;
    padding:10px 16px;
    border-radius:12px;
    font-size:13px;
    transition:0.3s;
}

.view-btn:hover{
    background:#374151;
    color:#fff;
}

/* TABLE */

.modern-table{
    margin:0;
}

.modern-table tr{
    border-bottom:1px solid #f1f1f1;
}

.modern-table td{
    padding:18px 10px;
    vertical-align:middle;
}

.modern-table tbody tr:hover{
    background:#f8f9fc;
}

/* PRODUCT FLEX */

.table-product{
    display:flex;
    align-items:center;
    gap:15px;
}

/* ICON BOX */

.product-icon{
    width:50px;
    height:50px;
    border-radius:14px;
    background:#ecfdf5;
    color:#10b981;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:18px;
}

/* ORDER ICON */

.purple-bg{
    background:#f3e8ff;
    color:#9333ea;
}

/* TEXT */

.table-product strong{
    display:block;
    color:#111827;
}

.table-product small{
    color:#6b7280;
}

/* PRICE */

.price-tag{
    font-size:16px;
    font-weight:700;
    color:#16a085;
}

/* ================= ANALYTICS ================= */

.analytics-card{
    text-align:center;
}

.analytics-box{
    display:flex;
    justify-content:space-around;
    margin-top:25px;
    text-align:center;
}

.analytics-box h2{
    font-size:50px;
    font-weight:800;
    color:#111827;
}

.analytics-box p{
    color:#6b7280;
}

/* ================= RESPONSIVE ================= */

@media(max-width:992px){

    .dashboard-grid{
        grid-template-columns:repeat(2,1fr);
    }
}

@media(max-width:768px){

    .analytics-box{
        flex-direction:column;
        gap:30px;
    }

    .card-top{
        flex-direction:column;
        align-items:flex-start;
        gap:12px;
    }
}

@media(max-width:576px){

    .dashboard-grid{
        grid-template-columns:1fr;
    }

    .card-content h2{
        font-size:28px;
    }
}

</style>

<div class="dashboard-grid">

    <!-- PRODUCTS -->
    <a href="/admin/products" class="dashboard-link">

        <div class="dashboard-card green">

            <div class="card-inner">

                <div class="card-content">
                    <h6>Total Products</h6>
                    <h2>{{ \App\Models\Product::count() }}</h2>

                    <small class="view-text">
                        View All Products →
                    </small>
                </div>

                <div class="card-icon">
                    <i class="fas fa-box"></i>
                </div>

            </div>

        </div>

    </a>

    <!-- CATEGORIES -->
    <a href="/admin/categories" class="dashboard-link">

        <div class="dashboard-card orange">

            <div class="card-inner">

                <div class="card-content">
                    <h6>Categories</h6>
                    <h2>{{ \App\Models\Category::count() }}</h2>

                    <small class="view-text">
                        Manage Categories →
                    </small>
                </div>

                <div class="card-icon">
                    <i class="fas fa-layer-group"></i>
                </div>

            </div>

        </div>

    </a>

    <!-- REVIEWS -->
    <a href="/admin/reviews" class="dashboard-link">

        <div class="dashboard-card blue">

            <div class="card-inner">

                <div class="card-content">
                    <h6>Reviews</h6>
                    <h2>{{ \App\Models\Testimonial::count() }}</h2>

                    <small class="view-text">
                        Customer Reviews →
                    </small>
                </div>

                <div class="card-icon">
                    <i class="fas fa-star"></i>
                </div>

            </div>

        </div>

    </a>

    <!-- ORDERS -->
    <a href="/admin/orders" class="dashboard-link">

        <div class="dashboard-card purple">

            <div class="card-inner">

                <div class="card-content">
                    <h6>Orders</h6>
                    <h2>{{ \App\Models\Order::count() ?? 0 }}</h2>

                    <small class="view-text">
                        View Orders →
                    </small>
                </div>

                <div class="card-icon">
                    <i class="fas fa-shopping-bag"></i>
                </div>

            </div>

        </div>

    </a>

</div>

<div class="chart-card">

    <div class="chart-header">
        <h4>Sales Analytics</h4>
    </div>

    <canvas id="salesChart"></canvas>

</div>

<div class="row mt-4 g-4">

    <!-- RECENT PRODUCTS -->
    <div class="col-lg-6">

        <div class="table-card">

            <div class="card-top">

                <h5>Recent Products</h5>

                <a href="/admin/products" class="view-btn">
                    View All
                </a>

            </div>

            <table class="table modern-table">

                <tbody>

                @foreach(\App\Models\Product::latest()->take(5)->get() as $product)

                <tr>

                    <td>

                        <div class="table-product">

                            <div class="product-icon">
                                <i class="fas fa-couch"></i>
                            </div>

                            <div>
                                <strong>{{ $product->name }}</strong>

                                <small>
                                    Product ID #{{ $product->id }}
                                </small>
                            </div>

                        </div>

                    </td>

                    <td class="price-tag">
                        ₹{{ $product->price }}
                    </td>

                </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

    <!-- RECENT ORDERS -->
    <div class="col-lg-6">

        <div class="table-card">

            <div class="card-top">

                <h5>Recent Orders</h5>

                <a href="/admin/orders" class="view-btn">
                    View All
                </a>

            </div>

            <table class="table modern-table">

                <tbody>

                @foreach(\App\Models\Order::latest()->take(5)->get() as $order)

                <tr>

                    <td>

                        <div class="table-product">

                            <div class="product-icon purple-bg">
                                <i class="fas fa-shopping-bag"></i>
                            </div>

                            <div>
                                <strong>Order #{{ $order->id }}</strong>

                                <small>
                                    {{ $order->name }}
                                </small>
                            </div>

                        </div>

                    </td>

                    <td class="price-tag">
                        ₹{{ $order->total }}
                    </td>

                </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

<div class="analytics-card mt-4">

    <h4>Customer Analytics</h4>

    <div class="analytics-box">

        <div>
            <h2>85%</h2>
            <p>Returning Customers</p>
        </div>

        <div>
            <h2>15%</h2>
            <p>New Customers</p>
        </div>

    </div>

</div>

@endsection