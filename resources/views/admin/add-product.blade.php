@extends('admin.layouts.app')

@section('content')

<style>

    /* Card */
.card {
    background: #ffffff;
    border-radius: 15px;
}

/* Labels */
.form-label {
    font-weight: 600;
    color: #5a3e2b;
}

/* Inputs */
.custom-input {
    border-radius: 10px;
    padding: 10px;
    border: 1px solid #ddd;
    transition: 0.3s;
}

.custom-input:focus {
    border-color: #9c6b4f;
    box-shadow: 0 0 0 0.2rem rgba(156,107,79,0.25);
}

/* Button */
.custom-btn {
    background: linear-gradient(135deg, #9c6b4f, #7a4f38);
    border: none;
    color: #fff;
    border-radius: 10px;
    padding: 10px 20px;
    transition: 0.3s;
}

.custom-btn:hover {
    background: linear-gradient(135deg, #7a4f38, #5a3e2b);
}

</style>

<div class="container mt-4">

    <div class="card shadow-lg p-4" style="border-radius:15px; border:none;">

        <h3 class="mb-4" style="color:#9c6b4f;">🛋️ Add New Product</h3>

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