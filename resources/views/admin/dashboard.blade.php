@extends('admin.layouts.app')

@section('content')

<h3>Dashboard</h3>

<div class="row mt-4">

    <div class="col-md-4">
        <div class="card-box text-center">
            <h5>Total Products</h5>
            <h3>{{ \App\Models\Product::count() }}</h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card-box text-center">
            <h5>Categories</h5>
            <h3>{{ \App\Models\Category::count() }}</h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card-box text-center">
            <h5>Reviews</h5>
            <h3>{{ \App\Models\Testimonial::count() }}</h3>
        </div>
    </div>

</div>

@endsection