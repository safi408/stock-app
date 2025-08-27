<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Sale;

use Carbon\Carbon; // Upar import zaroor karen



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
 public function index()
{
    $brands = Brand::count();
    $products = Product::count();
    $purchases = Purchase::count();
    $sales = Sale::count();
    $stock = Product::sum('stock');
    $outOfStock = Product::where('stock', 0)->count();
    // 👇 1 hour mein hone wali sales
$newSales = Sale::where('created_at', '>=', Carbon::now()->subHour())->get();


    // Add notifications
    $lowStockProducts = Product::with('brand')
        ->where('stock', '>', 0)
        ->where('stock', '<=', 5)
        ->get();

    $outOfStockProducts = Product::with('brand')
        ->where('stock', 0)
        ->get();

    return view('home', compact(
        'brands',
        'products',
        'purchases',
        'sales',
        'stock',
        'outOfStock',
        'lowStockProducts',
        'outOfStockProducts',
         'newSales' // 👈 yeh add karo
    ));
}

}
