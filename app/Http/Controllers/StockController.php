<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class StockController extends Controller
{
    //
    public function stockReport()
{
    $products = \App\Models\Product::with('brand')->paginate(5); // 10 products per page
    return view('reports.stock', compact('products'));
}

}
