@extends('admin.layouts.app')

@section('content')

<style>
    .table td, .table th {
    vertical-align: middle;
}

.btn-warning {
    background-color: #f4a261;
    border: none;
}

.btn-danger {
    background-color: #e76f51;
    border: none;
}
</style>

<div class="container mt-4">

    <h3 class="mb-4" style="color:#9c6b4f;">📂 Manage Categories</h3>

    <!-- 🔥 ADD CATEGORY -->
    <div class="card p-4 mb-4 shadow-sm">
        <h5 class="mb-3">Add New Category</h5>

        <form action="/admin/categories/store" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-2">
            <div class="col-md-5">
                <input type="text" name="name" placeholder="Category Name" class="form-control" required>
            </div>

            <div class="col-md-5">
                <input type="file" name="icon" class="form-control">
            </div>

            <div class="col-md-2">
                <button class="btn btn-dark w-100">Add</button>
            </div>
        </div>

        </form>
    </div>

    <!-- 🔥 CATEGORY LIST -->
    <div class="card p-3 shadow-sm">
        
        <h5 class="mb-3">All Categories</h5>

        <table class="table table-bordered text-center align-middle">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Icon</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($categories as $cat)
                <tr>
                    <td>{{ $cat->name }}</td>

                    <td>
                        @if($cat->icon)
                            <img src="{{ asset('images/'.$cat->icon) }}" 
                                 width="60" height="60"
                                 style="object-fit:cover; border-radius:8px;">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>

                    <td>
                        <!-- EDIT -->
                        <a href="/admin/categories/edit/{{ $cat->id }}" 
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <!-- DELETE -->
                        <a href="/admin/categories/delete/{{ $cat->id }}"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Delete karna hai?')">
                           Delete
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>

    </div>

</div>

@endsection