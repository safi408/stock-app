<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;

use Barryvdh\DomPDF\Facade\Pdf;

class SaleController extends Controller
{
    //
    public function sale(){
        $products = Product::all();
        return view('sales.create', compact('products'));
    }

        // Store sale
 public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'customer_name' => 'required|string|max:255',
        ]);

        $product = Product::findOrFail($request->product_id);

        // Check stock
        if ($product->stock < $request->quantity) {
            return back()->withErrors(['quantity' => 'Not enough stock available for this product.'])->withInput();
        }

        // Calculate total
        $unitPrice = $product->price;
        $totalPrice = $unitPrice * $request->quantity;

        // Create sale
        Sale::create([
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'price' => $unitPrice,
            'total_price' => $totalPrice,
            'customer_name' => $request->customer_name,
        ]);

        // Update stock
        $product->stock -= $request->quantity;
        $product->save();

        return redirect()->back()->with('success', 'Sale recorded and stock updated.');
    } 

    public function show(){
       $sales = Sale::with('Product')->latest()->paginate(3); // 10 sales per page
        return view('sales.manage', compact('sales'));
    }

    public function destroy(Sale $sale)
{
    // Optional: Restore product stock
    if ($sale->product) {
        $sale->product->stock += $sale->quantity;
        $sale->product->save();
    }

    // Delete sale record
    $sale->delete();

    return redirect()->back()->with('success', 'Sale deleted successfully and stock restored.');
}

  public function singlePDF($id)
{
    $sale = \App\Models\Sale::with('product')->findOrFail($id);
    $pdf = Pdf::loadView('pdf.single_invoice', compact('sale'));
    return $pdf->download('sale_invoice_'.$sale->id.'.pdf');
    //  return $pdf->stream('sale_invoice_'.$sale->id.'.pdf');
}

}
