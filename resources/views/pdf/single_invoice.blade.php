<!DOCTYPE html>
<html>
<head>
    <title>Sale Invoice</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; margin-top: 20px; }
        td, th { padding: 8px; border: 1px solid #000; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h2>Sale Invoice</h2>
    <p><strong>Customer:</strong> {{ $sale->customer_name }}</p>
    <p><strong>Date:</strong> {{ $sale->created_at->format('d M, Y') }}</p>

    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Total</th>
        </tr>
        <tr>
            <td>{{ $sale->product->name ?? 'N/A' }}</td>
            <td>{{ $sale->quantity }}</td>
            <td>Rs. {{ number_format($sale->price, 2) }}</td>
            <td><strong>Rs. {{ number_format($sale->total_price, 2) }}</strong></td>
        </tr>
    </table>
</body>
</html>
