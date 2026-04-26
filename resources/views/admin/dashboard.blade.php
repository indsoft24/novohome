@extends('admin.layouts.app')

@section('content')

<style>
   .dashboard-wrapper {
    padding: 20px;
    background: #f5f7fb;
}

/* GRID FIX (IMPORTANT) */
.row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

/* Make 4 cards in one row */
.col-md-4 {
    flex: 0 0 calc(25% - 20px);
}

/* CARD DESIGN */
.dashboard-card {
    background: #fff;
    border-radius: 14px;
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: 0.3s ease;
    border: 1px solid #eee;
}

/* HOVER */
.dashboard-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
}

/* TEXT */
.card-content h6 {
    font-size: 14px;
    color: #888;
    margin: 0;
}

.card-content h2 {
    font-size: 26px;
    font-weight: 600;
    color: #222;
    margin-top: 5px;
}

/* ICON */
.card-icon {
    font-size: 28px;
    color: #bbb;
}

/* Optional subtle icon color variations */
.dashboard-card:nth-child(1) .card-icon { color: #4e73df; }
.dashboard-card:nth-child(2) .card-icon { color: #6f42c1; }
.dashboard-card:nth-child(3) .card-icon { color: #1cc88a; }
.dashboard-card:nth-child(4) .card-icon { color: #f39c12; }
.dashboard-card:nth-child(5) .card-icon { color: #e74c3c; }
.dashboard-card:nth-child(6) .card-icon { color: #00bcd4; }
.dashboard-card:nth-child(7) .card-icon { color: #8e44ad; }
.dashboard-card:nth-child(8) .card-icon { color: #2ecc71; }

/* RESPONSIVE */
@media (max-width: 992px) {
    .col-md-4 {
        flex: 0 0 calc(50% - 20px);
    }
}

@media (max-width: 576px) {
    .col-md-4 {
        flex: 0 0 100%;
    }
}
</style>

<div class="row mt-4">

    <!-- Total Products -->
    <div class="col-md-4">
        <div class="dashboard-card blue">
            <div class="card-content">
                <h6>Total Products</h6>
                <h2>{{ \App\Models\Product::count() }}</h2>
            </div>
            <div class="card-icon">
                <i class="fas fa-box"></i>
            </div>
        </div>
    </div>

    <!-- Categories -->
    <div class="col-md-4">
        <div class="dashboard-card purple">
            <div class="card-content">
                <h6>Categories</h6>
                <h2>{{ \App\Models\Category::count() }}</h2>
            </div>
            <div class="card-icon">
                <i class="fas fa-list"></i>
            </div>
        </div>
    </div>

    <!-- Reviews -->
    <div class="col-md-4">
        <div class="dashboard-card green">
            <div class="card-content">
                <h6>Reviews</h6>
                <h2>{{ \App\Models\Testimonial::count() }}</h2>
            </div>
            <div class="card-icon">
                <i class="fas fa-star"></i>
            </div>
        </div>
    </div>

    <!-- Orders -->
    <div class="col-md-4">
        <div class="dashboard-card blue">
            <div class="card-content">
                <h6>Total Orders</h6>
                <h2>{{ \App\Models\Order::count() ?? 0 }}</h2>
            </div>
            <div class="card-icon">
                <i class="fas fa-shopping-cart"></i>
            </div>
        </div>
    </div>

    <!-- Customers -->
    <div class="col-md-4">
        <div class="dashboard-card purple">
            <div class="card-content">
                <h6>Customers</h6>
                <h2>{{ \App\Models\User::count() }}</h2>
            </div>
            <div class="card-icon">
                <i class="fas fa-users"></i>
            </div>
        </div>
    </div>

    <!-- Reports -->
    <div class="col-md-4">
        <div class="dashboard-card green">
            <div class="card-content">
                <h6>Reports</h6>
                <h2>--</h2>
            </div>
            <div class="card-icon">
                <i class="fas fa-chart-bar"></i>
            </div>
        </div>
    </div>

    <!-- Blog -->
    <div class="col-md-4">
        <div class="dashboard-card blue">
            <div class="card-content">
                <h6>Blog Posts</h6>
                <h2>{{ \App\Models\Blog::count() ?? 0 }}</h2>
            </div>
            <div class="card-icon">
                <i class="fas fa-blog"></i>
            </div>
        </div>
    </div>

    <!-- Settings -->
    <div class="col-md-4">
        <div class="dashboard-card purple">
            <div class="card-content">
                <h6>Settings</h6>
                <h2>--</h2>
            </div>
            <div class="card-icon">
                <i class="fas fa-cog"></i>
            </div>
        </div>
    </div>

</div>
@endsection