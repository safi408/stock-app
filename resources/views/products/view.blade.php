@extends('layouts.masterlayout')

@section('title', 'View Product')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4><i class="bi bi-eye-fill me-1"></i> View Product Details</h4>
        <a href="{{route('products.show')}}" class="btn btn-secondary">
            <i class="bi bi-arrow-left-circle me-1"></i> Back to List
        </a>
    </div>

    <div class="card shadow-sm rounded-3">
        <div class="card-body row">
            <div class="col-md-4 text-center">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="img-fluid rounded mb-3" style="max-height: 250px;">
                @else
                    <div class="text-muted">No Image Available</div>
                @endif
            </div>
            <div class="col-md-8">
                <h5><i class="bi bi-tag me-1"></i> {{ $product->name }}</h5>
                <p><i class="bi bi-diagram-3 me-1"></i> <strong>Brand:</strong> {{ $product->brand->name }}</p>
                <p><i class="bi bi-card-text me-1"></i> <strong>Description:</strong> {!! $product->description !!}</p>
                <p><i class="bi bi-currency-dollar me-1"></i> <strong>Price:</strong> Rs. {{ $product->price }}</p>
                <p><i class="bi bi-box-seam me-1"></i> <strong>Stock:</strong> {{ $product->stock }}</p>
                <p><i class="bi bi-calendar-event me-1"></i> <strong>Created At:</strong> {{ $product->created_at->format('d M, Y') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
