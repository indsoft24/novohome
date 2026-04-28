@extends('admin.layouts.app')

@section('content')

<style>
.row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.col-md-4 {
    flex: 0 0 calc(25% - 20px);
}

/* CARD COLORS (IMPORTANT CHANGE) */
.dashboard-card {
    border-radius: 10px;
    padding: 20px;
    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* COLOR THEMES */
.blue { background: #3498db; }
.green { background: #2ecc71; }
.orange { background: #f39c12; }
.purple { background: #9b59b6; }

.card-content h6 {
    font-size: 14px;
    margin: 0;
    opacity: 0.9;
}

.card-content h2 {
    font-size: 26px;
    font-weight: bold;
    margin-top: 5px;
}

.card-icon {
    font-size: 30px;
    opacity: 0.8;
}

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

<div class="row mt-3">

    <div class="col-md-4">
        <div class="dashboard-card green">
            <div class="card-content">
                <h6>Total Products</h6>
                <h2>{{ \App\Models\Product::count() }}</h2>
            </div>
            <div class="card-icon"><i class="fas fa-box"></i></div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="dashboard-card orange">
            <div class="card-content">
                <h6>Categories</h6>
                <h2>{{ \App\Models\Category::count() }}</h2>
            </div>
            <div class="card-icon"><i class="fas fa-list"></i></div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="dashboard-card blue">
            <div class="card-content">
                <h6>Reviews</h6>
                <h2>{{ \App\Models\Testimonial::count() }}</h2>
            </div>
            <div class="card-icon"><i class="fas fa-star"></i></div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="dashboard-card purple">
            <div class="card-content">
                <h6>Orders</h6>
                <h2>{{ \App\Models\Order::count() ?? 0 }}</h2>
            </div>
            <div class="card-icon"><i class="fas fa-shopping-cart"></i></div>
        </div>
    </div>

    <div class="mt-4">
    <div class="card p-3">
        <h5>Recent Products</h5>

        <table class="table">
            <tr>
                <th>Name</th>
                <th>Price</th>
            </tr>

            @foreach(\App\Models\Product::latest()->take(5)->get() as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

</div>

@endsection