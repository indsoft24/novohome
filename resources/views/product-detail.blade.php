@extends('layouts.app')

@section('content')

<div style="padding:50px; text-align:center;">

    <img src="{{ asset('images/' . $product->image) }}" width="300">

    <h2>{{ $product->name }}</h2>
    <h3>{{ $product->price }}</h3>

</div>

@endsection