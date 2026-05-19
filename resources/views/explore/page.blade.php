@extends('layouts.app')

@section('content')

<style>

.page-banner{
    position:relative;
    height:380px;
    overflow:hidden;
}

.page-banner img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.banner-overlay{
    position:absolute;
    inset:0;
    background:rgba(0,0,0,0.45);

    display:flex;
    align-items:center;
    justify-content:center;
}

.banner-overlay h1{
    color:#fff;
    font-size:55px;
    font-weight:700;
    letter-spacing:2px;
}

.page-section{
    background:#f8f5f0;
    padding:80px 0;
}

.page-card{
    background:#fff;
    padding:60px;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

.page-card p{
    font-size:17px;
    line-height:1.9;
    color:#444;
}

</style>

{{-- Banner --}}
<div class="page-banner">

    <img src="{{ asset('images/' . $page->banner) }}">

    <div class="banner-overlay">
        <h1>{{ $page->title }}</h1>
    </div>

</div>

{{-- Content --}}
<section class="page-section">

    <div class="container">

        <div class="page-card">

            {!! nl2br(e($page->content)) !!}

        </div>

    </div>

</section>

@endsection