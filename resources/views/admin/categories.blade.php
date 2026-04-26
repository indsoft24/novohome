@extends('admin.layouts.app')

@section('content')

<h3>Categories</h3>

<!-- Add Form -->
<form action="/admin/categories/store" method="POST" class="mb-4">
@csrf

<input type="text" name="name" placeholder="Category Name" class="form-control mb-2">

<input type="text" name="icon" placeholder="Icon image name (ex: sofa.png)" class="form-control mb-2">

<button class="btn btn-primary">Add Category</button>

</form>

<!-- List -->
<table class="table bg-white">
<tr>
    <th>Name</th>
    <th>Icon</th>
</tr>

@foreach($categories as $cat)
<tr>
    <td>{{ $cat->name }}</td>
    <td>
        <img src="{{ asset('icons/'.$cat->icon) }}" width="40">
    </td>
</tr>
@endforeach

</table>

@endsection