@extends('admin.layouts.app')

@section('content')

<style>

/* Page Background */
body {
    background: #f5f6f8;
}

/* Card */
.card {
    background: #ffffff;
    border-radius: 14px;
    border: 1px solid #eee;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

/* Heading */
h3 {
    color: #111;
    font-weight: 600;
}

/* Labels */
.form-label {
    font-weight: 500;
    color: #333;
}

/* Inputs */
.custom-input {
    border-radius: 8px;
    padding: 10px 12px;
    border: 1px solid #ddd;
    background: #fff;
    transition: all 0.25s ease;
}

/* Input Focus */
.custom-input:focus {
    border-color: #000;
    box-shadow: 0 0 0 2px rgba(0,0,0,0.08);
}

/* Placeholder */
.custom-input::placeholder {
    color: #aaa;
}

/* Button */
.custom-btn {
    background: #111;
    border: none;
    color: #fff;
    border-radius: 8px;
    padding: 10px 20px;
    font-weight: 500;
    transition: 0.3s ease;
}

/* Button Hover */
.custom-btn:hover {
    background: #000;
    transform: translateY(-1px);
}

/* Alert */
.alert-success {
    background: #e9f9ee;
    color: #1e7e34;
    border: none;
    border-radius: 8px;
}

/* File Input Fix */
input[type="file"].custom-input {
    padding: 8px;
}

/* Responsive spacing */
@media (max-width: 768px) {
    .card {
        padding: 20px !important;
    }
}

</style>

<div class="container mt-4">

    <div class="card shadow-lg p-4" style="border-radius:15px; border:none;">

        <h3 class="mb-4">🛋️ Add New Product</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="/admin/products/store" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">

            <!-- Product Name -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="name" 
                       class="form-control custom-input" 
                       placeholder="Enter product name" required>
            </div>

            <!-- Price -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Price</label>
                <input type="text" name="price" 
                       class="form-control custom-input" 
                       placeholder="₹ Enter price" required>
            </div>

            <!-- Category -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Category</label>
                <select name="category_id" class="form-control custom-input" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Image -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Upload Image</label>
                <input type="file" name="image" class="form-control custom-input">
            </div>

        </div>

        <!-- Button -->
        <div class="mt-3">
            <button class="btn custom-btn px-4">
                ➕ Add Product
            </button>
        </div>

        </form>

    </div>

</div>

@endsection