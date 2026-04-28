@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <h2>{{ $blog->title }}</h2>

    <img src="{{ asset('images/' . $blog->image) }}" 
         style="width:100%; height:400px; object-fit:cover; border-radius:15px;">

    <p class="mt-4" style="line-height:1.8; font-size:16px;">
    {{ $blog->content }}
</p>

</div>

@endsection