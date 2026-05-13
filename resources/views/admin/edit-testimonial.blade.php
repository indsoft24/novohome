@extends('admin.layouts.app')

@section('content')

<div class="container py-4">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card shadow p-4">

        <h3 class="mb-4">Edit Review</h3>

        <form action="{{ url('/admin/testimonials/update/'.$testimonial->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input type="text"
                       name="name"
                       value="{{ $testimonial->name }}"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Message</label>
                <textarea name="message"
                          class="form-control"
                          rows="4">{{ $testimonial->message }}</textarea>
            </div>

            <div class="mb-3">
                <label>Current Image</label><br>

                <img src="{{ asset('images/'.$testimonial->image) }}"
                     width="100"
                     class="mb-2 rounded">

                <input type="file"
                       name="image"
                       class="form-control">
            </div>

            <button class="btn btn-primary">
                Update Review
            </button>

        </form>

    </div>

</div>

@endsection