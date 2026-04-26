@extends('admin.layouts.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow-sm p-4" style="border-radius: 12px;">
        
        <h3 class="mb-4" style="color:#9c6b4f;">✏️ Edit Category</h3>

        <form action="/admin/categories/update/{{ $category->id }}" 
              method="POST" 
              enctype="multipart/form-data">
        @csrf

        <div class="row">

            <!-- Category Name -->
            <div class="col-md-6 mb-3">
                <label>Category Name</label>
                <input type="text" name="name"
                       value="{{ $category->name }}"
                       class="form-control"
                       placeholder="Enter category name"
                       required>
            </div>

            <!-- Slug -->
            <div class="col-md-6 mb-3">
                <label>Slug</label>
                <input type="text" name="slug"
                       value="{{ $category->slug }}"
                       class="form-control"
                       placeholder="auto-generated">
            </div>

            <!-- Upload Icon -->
            <div class="col-md-6 mb-3">
                <label>Upload Icon</label>
                <input type="file" name="icon" class="form-control">
            </div>

            <!-- Preview -->
            <div class="col-md-6 mb-3">
                <label>Current Icon</label><br>
                @if($category->icon)
                    <img src="{{ asset('images/'.$category->icon) }}" 
                         width="80"
                         style="border-radius:10px;">
                @else
                    <p>No image</p>
                @endif
            </div>

        </div>

        <!-- Buttons -->
        <div class="mt-3 d-flex gap-2">
            <button class="btn btn-primary px-4">Update</button>

            <a href="/admin/categories" class="btn btn-secondary">
                Back
            </a>
        </div>

        </form>
    </div>

</div>

@endsection