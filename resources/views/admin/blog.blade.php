@extends('admin.layouts.app')

@section('content')

<style>
.blog-card {
    display: flex;
    gap: 20px;
    background: #fff;
    border-radius: 12px;
    padding: 15px;
    margin-bottom: 20px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.05);
    align-items: center;
}

.blog-img {
    width: 120px;
    height: 90px;
    object-fit: cover;
    border-radius: 10px;
}

.blog-title {
    font-size: 18px;
    font-weight: 600;
}

.blog-meta {
    font-size: 13px;
    color: #888;
}

.add-btn {
    background: #000;
    color: #fff;
    padding: 8px 18px;
    border-radius: 8px;
    text-decoration: none;
}
</style>

<h4 class="mb-3">Blog Posts</h4>

<a href="/admin/blog/create" class="add-btn mb-3 d-inline-block">+ Add Blog</a>

@foreach($blogs as $blog)
<div class="blog-card">

    <!-- IMAGE -->
    <img src="{{ asset('images/' . $blog->image) }}" class="blog-img">

    <!-- CONTENT -->
    <div style="flex:1">

        <div class="blog-title">{{ $blog->title }}</div>

        <div class="blog-meta">
            {{ $blog->created_at->format('d M Y') }}
        </div>

    </div>

    <!-- ACTION -->
    <div>
        <a href="/admin/blog/edit/{{ $blog->id }}" class="btn btn-warning btn-sm">Edit</a>
        <a href="/admin/blog/delete/{{ $blog->id }}" 
           class="btn btn-danger btn-sm"
           onclick="return confirm('Delete this blog?')">
           Delete
        </a>
    </div>

</div>
@endforeach

@endsection