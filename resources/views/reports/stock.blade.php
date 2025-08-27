@extends('layouts.masterlayout')

@section('title', 'Stock Report')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4><i class="bi bi-boxes me-1"></i> Stock Report</h4>
        <a href="{{ route('product.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Add Product
        </a>
    </div>

    <div class="table-responsive shadow-sm rounded-3">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th><i class="bi bi-diagram-3"></i> Brand</th>
                    <th><i class="bi bi-tag"></i> Product</th>
                    <th><i class="bi bi-currency-dollar"></i> Price</th>
                    <th><i class="bi bi-box-seam"></i> Stock</th>
                    <th><i class="bi bi-exclamation-triangle"></i> Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $product->brand->name ?? 'N/A' }}</td>
                        <td>{{ $product->name }}</td>
                        <td>Rs. {{ number_format($product->price, 2) }}</td>
                        <td>
                            <span class="badge {{ $product->stock <= 5 ? 'bg-danger' : 'bg-success' }}">
                                {{ $product->stock }}
                            </span>
                        </td>
                        <td>
                            @if($product->stock == 0)
                                <span class="badge bg-danger">Out of Stock</span>
                            @elseif($product->stock <= 5)
                                <span class="badge bg-warning text-dark">Low Stock</span>
                            @else
                                <span class="badge bg-success">In Stock</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">No products found.</td>
                    </tr>
                @endforelse
                {{$products->links()}}                
            </tbody>
        </table>
    </div>
</div>
@endsection
