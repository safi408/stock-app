<!-- resources/views/brand-products.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3>{{ $brand->name }} Products</h3>
    <div class="row">
        @forelse($brand->products as $product)
            <div class="col-md-4 mb-3">
                <div class="card">
                    @if($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top">
                    @endif
                    <div class="card-body">
                        <h5>{{ $product->name }}</h5>
                        <p>Rs. {{ $product->price }}</p>
                        <p>{!! $product->description !!}</p>
                    </div>
                </div>
            </div>
        @empty
            <p>No products found for this brand.</p>
        @endforelse
    </div>
</div>
@endsection
