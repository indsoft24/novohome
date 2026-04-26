@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Add Product</h3>

    <form action="/admin/products/store" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="name" class="form-control mb-2" placeholder="Name">

        <input type="text" name="price" class="form-control mb-2" placeholder="Price">

        <select name="category_id" class="form-control mb-2">
            @foreach($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>

        <input type="file" name="image" class="form-control mb-2">

        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection