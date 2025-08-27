<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class OrderController extends Controller
{
    //
    public function create() {
    $products = Product::all();
    return view('orders.create', compact('products'));
}

public function store(Request $request) {
    $request->validate([
        'customer_name' => 'required',
        'product_id.*' => 'required|exists:products,id',
        'quantity.*' => 'required|integer|min:1',
    ]);

    $totalAmount = 0;
    foreach ($request->product_id as $index => $productId) {
        $product = Product::find($productId);
        $totalAmount += $product->price * $request->quantity[$index];
    }

    $order = Order::create([
        'customer_name' => $request->customer_name,
        'customer_contact' => $request->customer_contact,
        'total_amount' => $totalAmount,
        'order_date' => now(),
    ]);

    foreach ($request->product_id as $index => $productId) {
        $product = Product::find($productId);
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $productId,
            'quantity' => $request->quantity[$index],
            'price' => $product->price,
            'total' => $product->price * $request->quantity[$index],
        ]);

        // Update stock quantity
        $product->decrement('stock_qty', $request->quantity[$index]);
    }

    return redirect()->route('orders.create')->with('success', 'Order created successfully');
}
}
