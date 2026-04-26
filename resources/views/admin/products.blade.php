@extends('admin.layouts.app')

@section('content')

<style>
.table td, .table th {
    vertical-align: middle;
}

.btn-warning {
    background-color: #f0ad4e;
    border: none;
}

.btn-danger {
    background-color: #dc3545;
    border: none;
}
</style>

<div class="container mt-4">

    <h3 class="mb-4">📦 Manage Products</h3>

    <!-- ADD PRODUCT -->
    <a href="/admin/products/create" class="btn btn-dark mb-3">+ Add Product</a>

    <!-- PRODUCT LIST -->
    <div class="card p-3 shadow-sm">

        <h5 class="mb-3">All Products</h5>

        <table class="table table-bordered text-center align-middle">
            <thead class="table-light">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($products as $p)
                <tr>
                    <td>
                        @if($p->image)
                            <img src="{{ asset('images/'.$p->image) }}" 
                                 width="60" height="60"
                                 style="object-fit:cover; border-radius:8px;">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>

                    <td>{{ $p->name }}</td>
                    <td>₹{{ $p->price }}</td>

                    <td>
                        <!-- EDIT -->
                        <a href="/admin/products/edit/{{ $p->id }}" 
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <!-- DELETE -->
                        <a href="/admin/products/delete/{{ $p->id }}"
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