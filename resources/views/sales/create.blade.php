@extends('layouts.masterlayout')

@section('title', 'Add New Sale')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4><i class="bi bi-cart-check me-1"></i> Add New Sale</h4>
        <a href="" class="btn btn-secondary">
            <i class="bi bi-arrow-left-circle me-1"></i> Back to Sales List
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li><i class="bi bi-x-circle-fill me-1"></i>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="" method="POST" class="card shadow-sm p-4 rounded-3">
        @csrf

        <div class="mb-3">
            <label for="product_id" class="form-label">Product <span class="text-danger">*</span></label>
            <select name="product_id" id="product_id" class="form-select">
                <option value="">-- Select Product --</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                        {{ $product->name }} (Stock: {{ $product->stock }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity <span class="text-danger">*</span></label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity') }}" min="1">
        </div>


        <div class="mb-3">
            <label for="customer_name" class="form-label">Customer Name <span class="text-danger">*</span></label>
            <input type="text" name="customer_name" id="customer_name" class="form-control" value="{{ old('customer_name') }}">
        </div>

        <button type="submit" class="btn btn-success">
            <i class="bi bi-save me-1"></i> Record Sale
        </button>
    </form>
</div>
@endsection
