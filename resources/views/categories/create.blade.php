@extends('layouts.masterlayout')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">🛒 Create New Order</h5>
        </div>
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    ✅ {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form method="POST" action="">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">👤 Customer Name</label>
                        <input type="text" name="customer_name" class="form-control shadow-sm" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">📞 Contact</label>
                        <input type="text" name="customer_contact" class="form-control shadow-sm">
                    </div>
                </div>

                <hr class="my-4">

                <h5 class="mb-3">🧾 Products</h5>

                <div id="product-rows">
                    <div class="row align-items-end mb-3 product-row">
                        <div class="col-md-6">
                            <label class="form-label">🖥️ Product</label>
                            <select name="product_id[]" class="form-select shadow-sm" required>
                                <option value="">-- Select Product --</option>
                                {{-- @foreach($products as $product)
                                    <option value="{{ $product->id }}">
                                        {{ $product->name }} (Rs.{{ $product->price }})
                                    </option>
                                @endforeach --}}
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">🔢 Quantity</label>
                            <input type="number" name="quantity[]" class="form-control shadow-sm" placeholder="Qty" required>
                        </div>
                        <div class="col-md-2 text-end">
                            <button type="button" class="btn btn-danger btn-sm remove-row mt-4">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <button type="button" id="add-row" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-plus-circle me-1"></i> Add Product
                    </button>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success px-4">
                        <i class="bi bi-save me-1"></i> Save Order
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Bootstrap Icons CDN --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<script>
    document.getElementById('add-row').addEventListener('click', function () {
        const row = document.querySelector('#product-rows .product-row').cloneNode(true);
        row.querySelector('select').value = '';
        row.querySelector('input').value = '';
        document.getElementById('product-rows').appendChild(row);
    });

    document.addEventListener('click', function (e) {
        if (e.target.closest('.remove-row')) {
            const rows = document.querySelectorAll('#product-rows .product-row');
            if (rows.length > 1) {
                e.target.closest('.product-row').remove();
            }
        }
    });
</script>
@endsection
