<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    // app/Http/Controllers/FrontendController.php

public function productsByBrand($id)
{
    $brand = \App\Models\Brand::with('products')->findOrFail($id);
    return view('brands-products', compact('brand'));
}

public function allproduct(){
    $products = \App\Models\Product::with('brand')->latest()->get();
    return view('all-products', compact('products'));
}
}
