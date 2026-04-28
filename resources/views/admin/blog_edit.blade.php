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

.btn-primary {
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

        <h4>Edit Blog</h4>

        <form action="/admin/blog/update/{{ $blog->id }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Title -->
            <div class="mb-3">
                <label class="form-label">Blog Title</label>
                <input type="text" 
                       name="title" 
                       value="{{ $blog->title }}" 
                       class="form-control" 
                       placeholder="Enter blog title">

                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Current Image -->
            @if($blog->image)
                <div class="mb-3">
                    <label>Current Image</label><br>
                    <img src="{{ asset('images/' . $blog->image) }}" width="120" style="border-radius:10px;">
                </div>
            @endif
            
            <!-- Upload New Image -->
            <div class="mb-3">
                <label class="form-label">Upload New Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <!-- Content -->
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea name="content" 
                    class="form-control auto-expand"
                    placeholder="Write blog content...">{{ $blog->content }}</textarea> 
            </div>

            <!-- Button -->
            <button class="btn btn-primary">Update Blog</button>

        </form>

    </div>
</div>

@endsection