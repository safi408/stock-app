@extends('layouts.masterlayout')

@section('title', 'All Products')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4><i class="bi bi-box-seam me-1"></i> All Products</h4>
        <a href="{{ route('product.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Add New Product
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="table-responsive shadow-sm rounded-3">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
             <tr>
    <th><i class="bi bi-hash me-1"></i> #</th>
    <th><i class="bi bi-diagram-3 me-1"></i> Brand</th>
    <th><i class="bi bi-tag me-1"></i> Name</th>
    <th><i class="bi bi-card-text me-1"></i> Description</th>
    <th><i class="bi bi-currency-dollar me-1"></i> Price</th>
    <th><i class="bi bi-box-seam me-1"></i> Stock</th>
    <th><i class="bi bi-image me-1"></i> Image</th>
    <th><i class="bi bi-calendar-event me-1"></i> Created</th>
       <th><i class="bi bi-gear me-1"></i> Actions</th> {{-- New --}}
</tr>

            </thead>
            <tbody>
                @forelse($products as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $product->brand->name ?? 'na' }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{!! Str::limit($product->description, 10, '...') !!}</td>


                        <td><span class="badge bg-success">Rs. {{ $product->price }}</span></td>
                        <td><span class="badge bg-secondary">{{ $product->stock }}</span></td>
                        <td>
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="Image" width="50">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td>{{ $product->created_at->format('d M, Y') }}</td>


    <td>
    <a href="#"
       class="text-danger"
       onclick="event.preventDefault();
                if (confirm('Are you sure you want to delete this product?')) {
                    document.getElementById('delete-product-{{ $product->id }}').submit();
                }"
       title="Delete Product"
    >
        <i class="bi bi-trash-fill"></i>
    </a>

    {{-- Hidden Form --}}
    <form id="delete-product-{{ $product->id }}"
          action="{{ route('products.destroy', $product->id) }}"
          method="POST"
          style="display: none;">
        @csrf
        @method('DELETE')
    </form>
    <a href="{{route('product.view',$product->id)}}" class="text-success"><i class="bi bi-eye"></i></a>
</td>



                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
