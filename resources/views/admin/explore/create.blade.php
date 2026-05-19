@extends('admin.layouts.app')

@section('content')

<div class="container-fluid py-4">

    <div class="card shadow border-0">

        <!-- Header -->
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                <i class="fas fa-compass me-2"></i>
                Add Explore Page
            </h4>

            <a href="/admin/explore" class="btn btn-light btn-sm">
                <i class="fas fa-arrow-left"></i> Back
            </a>

        </div>

        <!-- Body -->
        <div class="card-body">

            <form action="/admin/explore/store"
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
                               class="form-control"
                               placeholder="Enter page title"
                               required>
                    </div>

                    <!-- Slug -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">
                            Slug
                        </label>

                        <input type="text"
                               name="slug"
                               class="form-control"
                               placeholder="about-us"
                               required>
                    </div>

                    <!-- Category -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">
                            Category
                        </label>

                        <input type="text"
                               name="category"
                               class="form-control"
                               placeholder="Our Story / Legal"
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
                    </div>

                    <!-- Content -->
                    <div class="col-12 mb-3">
                        <label class="form-label fw-bold">
                            Page Content
                        </label>

                        <textarea name="content"
                                  rows="10"
                                  class="form-control"
                                  placeholder="Write page content here..."
                                  required></textarea>
                    </div>

                </div>

                <!-- Button -->
                <button class="btn btn-dark px-4">
                    <i class="fas fa-save me-1"></i>
                    Save Page
                </button>

            </form>

        </div>

    </div>

</div>

@endsection