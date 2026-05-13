@extends('admin.layouts.app')

@section('content')

<div class="container py-4">

    <div class="card shadow p-4 rounded-4">

        <h3 class="mb-4 fw-bold">Edit Product</h3>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ url('/admin/products/update/'.$product->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <!-- Product Name -->
            <div class="mb-3">
                <label class="form-label">Product Name</label>

                <input type="text"
                       name="name"
                       value="{{ $product->name }}"
                       class="form-control">
            </div>

            <!-- Price -->
            <div class="mb-3">
                <label class="form-label">Price</label>

                <input type="text"
                       name="price"
                       value="{{ $product->price }}"
                       class="form-control">
            </div>

            <!-- Current Image -->
            <div class="mb-3">
                <label class="form-label">Current Image</label><br>

                <img src="{{ asset('images/'.$product->image) }}"
                     width="120"
                     class="rounded shadow-sm mb-2">

                <input type="file"
                       name="image"
                       class="form-control">
            </div>

            <!-- Button -->
            <button class="btn btn-warning px-4 fw-semibold">
                Update Product
            </button>

        </form>

    </div>

</div>

@endsection