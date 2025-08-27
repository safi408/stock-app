<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function product(){
        $brands = Brand::all();
        return view('products.create', compact('brands'));
    }
    public function store(Request $request){

        $request->validate([
            'brand_id'    => 'required|exists:brands,id',
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

                // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // Save product
        Product::create([
            'brand_id'    => $request->brand_id,
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'image'       => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function show()
{
    $products = Product::with('brand')->latest()->get();
    return view('products.manage', compact('products'));
}

public function view($id)
{
    $product = Product::with('brand')->findOrFail($id);
    return view('products.view', compact('product'));
}
public function destroy(Product $product)
{
    // Optional: check before delete
    $product->delete();

    return redirect()->back()->with('success', 'Product deleted successfully.');
}

}
