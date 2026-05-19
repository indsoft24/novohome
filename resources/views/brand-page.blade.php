@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h2 class="mb-4 fw-bold">
        {{ $brand->name }} Collection
    </h2>

    <div class="row">

        @forelse($products as $product)

        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow-sm h-100">

                <img src="{{ asset('images/' . $product->image) }}"
                     class="card-img-top"
                     style="height:250px; object-fit:cover;">

                <div class="card-body">

                    <h5>{{ $product->name }}</h5>

                    <p class="text-muted">
                        ₹{{ $product->price }}
                    </p>

                    <a href="/product/{{ $product->id }}"
                       class="btn btn-dark w-100">

                        View Product

                    </a>

                </div>

            </div>

        </div>

        @empty

        <div class="col-12">

            <div class="alert alert-warning">
                No products found for this brand.
            </div>

        </div>

        @endforelse

    </div>

</div>

@endsection