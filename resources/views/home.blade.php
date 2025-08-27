@extends('layouts.masterlayout')

@section('title', 'Computer Store Dashboard')

@section('content')
<style>
    .card-3d {
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        transform-style: preserve-3d;
        will-change: transform;
    }

    .card-3d:hover {
        transform: rotateY(8deg) rotateX(4deg) scale(1.03);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        cursor: pointer;
    }

    .card-3d i {
        transition: transform 0.4s ease;
    }

    .card-3d:hover i {
        transform: scale(1.2) rotate(5deg);
    }
</style>

<div class="container-fluid py-4">
    <h3 class="mb-4 fw-bold text-dark">💻 Welcome to Computer Store Admin Dashboard</h3>

    <div class="row g-4">
        <!-- Brands -->
        <div class="col-lg-3 col-md-6">
            <div class="card card-3d bg-dark text-white border-0 rounded-4 shadow">
                <div class="card-body d-flex justify-content-between align-items-center p-4">
                    <div>
                        <h6 class="text-white-50 fw-semibold mb-1">Total Brands</h6>
                        <h3 class="fw-bold count">{{ $brands }}</h3>
                    </div>
                    <i class="bi bi-cpu-fill fa-2x text-white-50 ms-auto"></i>
                </div>
            </div>
        </div>

        <!-- Products -->
        <div class="col-lg-3 col-md-6">
            <div class="card card-3d bg-primary text-white border-0 rounded-4 shadow">
                <div class="card-body d-flex justify-content-between align-items-center p-4">
                    <div>
                        <h6 class="text-white-50 fw-semibold mb-1">Total Products</h6>
                        <h3 class="fw-bold count">{{ $products }}</h3>
                    </div>
                    <i class="bi bi-pc-display-horizontal fa-2x text-white-50 ms-auto"></i>
                </div>
            </div>
        </div>

        <!-- Purchases -->
        <div class="col-lg-3 col-md-6">
            <div class="card card-3d bg-success text-white border-0 rounded-4 shadow">
                <div class="card-body d-flex justify-content-between align-items-center p-4">
                    <div>
                        <h6 class="text-white-50 fw-semibold mb-1">Total Purchases</h6>
                        <h3 class="fw-bold count">{{ $purchases }}</h3>
                    </div>
                    <i class="bi bi-truck-front-fill fa-2x text-white-50 ms-auto"></i>
                </div>
            </div>
        </div>

        <!-- Sales -->
        <div class="col-lg-3 col-md-6">
            <div class="card card-3d bg-info text-white border-0 rounded-4 shadow">
                <div class="card-body d-flex justify-content-between align-items-center p-4">
                    <div>
                        <h6 class="text-white-50 fw-semibold mb-1">Total Sales</h6>
                        <h3 class="fw-bold count">{{ $sales }}</h3>
                    </div>
                    <i class="bi bi-cart-check-fill fa-2x text-white-50 ms-auto"></i>
                </div>
            </div>
        </div>

        <!-- Stock -->
        <div class="col-lg-3 col-md-6">
            <div class="card card-3d bg-warning text-dark border-0 rounded-4 shadow">
                <div class="card-body d-flex justify-content-between align-items-center p-4">
                    <div>
                        <h6 class="text-dark fw-semibold mb-1">Total Stock</h6>
                        <h3 class="fw-bold count">{{ $stock }}</h3>
                    </div>
                    <i class="bi bi-boxes fa-2x text-dark ms-auto"></i>
                </div>
            </div>
        </div>

        <!-- Out of Stock -->
        <div class="col-lg-3 col-md-6">
            <div class="card card-3d bg-danger text-white border-0 rounded-4 shadow">
                <div class="card-body d-flex justify-content-between align-items-center p-4">
                    <div>
                        <h6 class="text-white-50 fw-semibold mb-1">Out of Stock</h6>
                        <h3 class="fw-bold count">{{ $outOfStock }}</h3>
                    </div>
                    <i class="bi bi-exclamation-circle-fill fa-2x text-white-50 ms-auto"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- jQuery + CounterUp -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.counterup@2.1.0/jquery.counterup.min.js"></script>

<script>
    $(function () {
        $('.count').counterUp({
            delay: 10,
            time: 1000
        });
    });
</script>
@endsection
