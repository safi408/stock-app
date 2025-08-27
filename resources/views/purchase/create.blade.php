@extends('layouts.masterlayout')

@section('title', 'Add Purchase')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="col-lg-12">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-success text-white rounded-top-4">
                    <h4 class="mb-0">
                        <i class="bi bi-cart-plus-fill me-2"></i> Add New Purchase
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{route('purchase.store')}}" method="POST" class="row g-3">
                        @csrf

                        <!-- Select Product -->
                        <div class="col-md-6">
                            <label for="product_id" class="form-label">
                                <i class="bi bi-box-seam me-1"></i> Select Product <span class="text-danger">*</span>
                            </label>
                            <select name="product_id" id="product_id" class="form-select">
                                <option value="">Select Product</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Quantity -->
                        <div class="col-md-3">
                            <label for="quantity" class="form-label">
                                <i class="bi bi-hash me-1"></i> Quantity <span class="text-danger">*</span>
                            </label>
                            <input type="number" name="quantity" id="quantity" class="form-control" placeholder="e.g. 10">
                            @error('quantity')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Purchase Price -->
                        <div class="col-md-3">
                            <label for="purchase_price" class="form-label">
                                <i class="bi bi-cash-coin me-1"></i> Purchase Price <span class="text-danger">*</span>
                            </label>
                            <input type="number" name="purchase_price" id="purchase_price" step="0.01" class="form-control" placeholder="e.g. 1500.00">
                            @error('purchase_price')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Purchase Date -->
                        <div class="col-md-6">
                            <label for="purchase_date" class="form-label">
                                <i class="bi bi-calendar-date me-1"></i> Purchase Date <span class="text-danger">*</span>
                            </label>
                            <input type="date" name="purchase_date" id="purchase_date" class="form-control">
                            @error('purchase_date')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Notes -->
                        <div class="col-12">
                            <label for="notes" class="form-label">
                                <i class="bi bi-journal-text me-1"></i> Notes (Optional)
                            </label>
                            <textarea name="notes" id="notes" class="form-control" rows="3" placeholder="Optional remarks or vendor details"></textarea>
                            @error('notes')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit -->
                        <div class="col-12 text-end pt-2">
                            <button type="submit" class="btn btn-success px-4">
                                <i class="bi bi-save-fill me-1"></i> Save Purchase
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
