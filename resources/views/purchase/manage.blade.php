@extends('layouts.masterlayout')

@section('title', 'All Purchases')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4><i class="bi bi-bag-check-fill me-2"></i> All Purchases</h4>
        <a href="{{route('purchase.store')}}" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i> Add New Purchase
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
                    <th>#</th>
                    <th><i class="bi bi-box me-1"></i> Product</th>
                    <th><i class="bi bi-hash me-1"></i> Quantity</th>
                    <th><i class="bi bi-cash-coin me-1"></i> Purchase Price</th>
                    <th><i class="bi bi-calendar-check me-1"></i> Purchase Date</th>
                    <th><i class="bi bi-journal-text me-1"></i> Notes</th>
                    <th><i class="bi bi-calendar-event me-1"></i> Added On</th>
                    <th><i class="bi bi-gear me-1"></i> Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($purchases as $index => $purchase)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $purchase->product->name ?? 'Na' }}</td>
                        <td><span class="badge bg-secondary">{{ $purchase->quantity }}</span></td>
                        <td><span class="badge bg-success">Rs. {{ number_format($purchase->purchase_price, 2) }}</span></td>
                        <td>{{ \Carbon\Carbon::parse($purchase->purchase_date)->format('d M Y') }}</td>
                        <td>{!! Str::limit($purchase->notes, 50) !!}</td>
                        <td>{{ $purchase->created_at->format('d M, Y') }}</td>
                        <td>
                            {{-- Future View or Delete Actions --}}
                            <form action="" method="POST" class="d-inline"
                                  onsubmit="return confirm('Are you sure you want to delete this purchase?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">No purchases found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
