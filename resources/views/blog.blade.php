@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h2 class="mb-4" style="color:#9c6b4f;">Our Blogs</h2>

    <div class="row">

        @foreach($blogs as $blog)
        <div class="col-md-4 mb-4">

            <div class="card shadow-sm p-3" style="border-radius:15px;">

                <!-- Image -->
                <img src="{{ asset('images/' . $blog->image) }}" style="width:100%; height:200px; object-fit:cover;">

                <!-- Title -->
                <h5 class="mt-3">{{ $blog->title }}</h5>

                <!-- Short desc -->
                <p>{{ \Illuminate\Support\Str::limit($blog->description, 80) }}</p>

                <!-- Button -->
                <a href="{{ route('blog.detail', $blog->id) }}" class="btn btn-dark">
                    Read More
                </a>

            </div>

        </div>
        @endforeach

    </div>
</div>

@endsection