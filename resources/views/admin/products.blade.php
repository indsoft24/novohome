@extends('admin.layouts.app')

@section('content')

<h3>Products</h3>

<a href="/admin/products/create" class="btn btn-primary mb-3">Add Product</a>

<table class="table table-bordered bg-white">
    <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
    </tr>

    @foreach($products as $p)
    <tr>
        <td><img src="{{ asset('images/'.$p->image) }}" width="80"></td>
        <td>{{ $p->name }}</td>
        <td>{{ $p->price }}</td>
    </tr>
    @endforeach
</table>

@endsection