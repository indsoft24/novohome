@extends('admin.layouts.app')

@section('content')

<style>
.edit-wrapper {
    max-width: 100%;
}

.edit-card {
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.06);
}

.edit-card h4 {
    margin-bottom: 20px;
    font-weight: 600;
}

.form-control {
    border-radius: 8px;
    padding: 10px;
}

textarea.form-control {
    min-height: 250px;
    transition: 0.3s ease;
    overflow: hidden;
}

textarea.form-control:focus {
    min-height: 500px;
}

.btn-success {
    border-radius: 8px;
    padding: 8px 18px;
}

.back-link {
    display: inline-block;
    margin-bottom: 15px;
    text-decoration: none;
    color: #666;
}

.back-link:hover {
    color: #000;
}
</style>

<div class="edit-wrapper">

    <!-- Back Button -->
    <a href="/admin/blog" class="back-link">
        ← Back to Blog
    </a>

    <div class="edit-card">

        <h4>Add Blog</h4>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="/admin/blog/store" method="POST">
            @csrf

            <!-- Title -->
            <div class="mb-3">
                <label class="form-label">Blog Title</label>
                <input type="text" 
                       name="title" 
                       class="form-control" 
                       placeholder="Enter blog title">

                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Blog Image</label>
                
                <input type="file" name="image" class="form-control">
            
                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Content -->
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea name="content" 
                          class="form-control auto-expand"
                          placeholder="Write blog content..."></textarea> 
            </div>

            <!-- Button -->
            <button class="btn btn-success">Save Blog</button>

        </form>

    </div>
</div>

@endsection