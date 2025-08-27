<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    //
    public function purchase(){
        $products = Product::latest()->get();
        return view('purchase.create', compact('products'));
    }
    public function store(Request $request)
{
    $request->validate([
        'product_id'     => 'required|exists:products,id',
        'quantity'       => 'required|integer|min:1',
        'purchase_price' => 'required|numeric|min:0',
        'purchase_date'  => 'required|date',
        'notes'          => 'nullable|string|max:500',
    ]);

    Purchase::create($request->all());

    $product = Product::find($request->product_id);
    $product->stock += $request->quantity;
    $product->save();


    return redirect()->back()->with('success', 'Purchase recorded and stock updated successfully!');
}
public function show()
{
    $purchases = Purchase::with('product')->latest()->get();
    return view('purchase.manage', compact('purchases'));
}

}
