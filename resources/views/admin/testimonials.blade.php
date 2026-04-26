@extends('admin.layouts.app')

@section('content')

<h3>Customer Reviews</h3>

<table class="table bg-white">
<tr>
    <th>Image</th>
    <th>Name</th>
    <th>Message</th>
</tr>

@foreach($testimonials as $t)
<tr>
    <td><img src="{{ asset('images/'.$t->image) }}" width="70"></td>
    <td>{{ $t->name }}</td>
    <td>{{ $t->message }}</td>
</tr>
@endforeach

</table>

@endsection