@extends('layouts.masterlayout')

@section('title', 'All Sales')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4><i class="bi bi-list-check me-1"></i> All Sales</h4>
        <a href="" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Add New Sale
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="table-responsive shadow-sm rounded-3">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th><i class="bi bi-person"></i>Customer</th>
                    <th><i class="bi bi-laptop"></i> Product</th>
                    <th><i class="bi bi-hash"></i> Quantity</th>
                    <th><i class="bi bi-currency-dollar"></i> Unit Price</th>
                    <th><i class="bi bi-calculator"></i> Total</th>
                    <th><i class="bi bi-calendar-event"></i> Date</th>
                    <th><i class="bi bi-gear"></i> Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sales as $index => $sale)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $sale->customer_name }}</td>
                        <td>{{ $sale->product->name ?? 'N/A' }}</td>
                        <td><span class="badge bg-secondary">{{ $sale->quantity }}</span></td>
                        <td>Rs. {{ number_format($sale->price, 2) }}</td>
                        <td><strong>Rs. {{ number_format($sale->total_price, 2) }}</strong></td>
                        <td>{{ $sale->created_at->format('d M, Y') }}</td>
<td>
    {{-- PDF Button --}}
    <a href="{{ route('sale.pdf', $sale->id) }}" class="text-success me-2" title="Download PDF Invoice">
        <i class="bi bi-file-earmark-pdf-fill"></i>
    </a>

    {{-- Delete Link --}}
    <a href="#"
       class="text-danger"
       onclick="event.preventDefault();
                if (confirm('Delete this sale?')) {
                  document.getElementById('delete-sale-{{ $sale->id }}').submit();
                }"
       title="Delete Sale">
        <i class="bi bi-trash-fill"></i>
    </a>

    {{-- Hidden Delete Form --}}
    <form id="delete-sale-{{ $sale->id }}"
          action="{{ route('sale.destroy', $sale->id) }}"
          method="POST"
          style="display: none;">
        @csrf
        @method('DELETE')
    </form>
</td>


                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">No sales recorded yet.</td>
                    </tr>
                @endforelse
               {{$sales->links()}}
            </tbody>
        </table>
    </div>
</div>
@endsection
