@extends('admin.layouts.app')

@section('content')

<div class="container-fluid py-4">

    <div class="card shadow border-0">

        <!-- Header -->
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                <i class="fas fa-edit me-2"></i>
                Edit Explore Page
            </h4>

            <a href="/admin/explore" class="btn btn-light btn-sm">
                <i class="fas fa-arrow-left"></i> Back
            </a>

        </div>

        <!-- Body -->
        <div class="card-body">

            <form action="/admin/explore/update/{{ $page->id }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <!-- Title -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">
                            Page Title
                        </label>

                        <input type="text"
                               name="title"
                               value="{{ $page->title }}"
                               class="form-control"
                               required>
                    </div>

                    <!-- Slug -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">
                            Slug
                        </label>

                        <input type="text"
                               name="slug"
                               value="{{ $page->slug }}"
                               class="form-control"
                               required>
                    </div>

                    <!-- Category -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">
                            Category
                        </label>

                        <input type="text"
                               name="category"
                               value="{{ $page->category }}"
                               class="form-control"
                               required>
                    </div>

                    <!-- Banner -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">
                            Banner Image
                        </label>

                        <input type="file"
                               name="banner"
                               class="form-control">

                        @if($page->banner)
                            <img src="{{ asset('images/' . $page->banner) }}"
                                 width="120"
                                 class="mt-3 rounded shadow">
                        @endif
                    </div>

                    <!-- Content -->
                    <div class="col-12 mb-3">
                        <label class="form-label fw-bold">
                            Page Content
                        </label>

                        <textarea name="content"
                                  rows="10"
                                  class="form-control"
                                  required>{{ $page->content }}</textarea>
                    </div>

                </div>

                <!-- Button -->
                <button class="btn btn-dark px-4">
                    <i class="fas fa-save me-1"></i>
                    Update Page
                </button>

            </form>

        </div>

    </div>

</div>

@endsection