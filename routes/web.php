<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\FrontendController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/safi', function () {
   return view('boostrap');
});


Route::get('/categories/create', [CategoryController::class, 'category'])->name('category.create');
Route::get('/brands/create', [BrandController::class, 'brands'])->name('brands.create');
Route::post('/brands/create', [BrandController::class, 'store'])->name('brand.store');
Route::get('/brands/create/{id}', [BrandController::class, 'delete'])->name('brand.delete');


Route::get('/products/create', [ProductController::class, 'product'])->name('product.create');
Route::post('/products/create', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/show', [ProductController::class, 'show'])->name('products.show');
Route::get('/product/{id}', [ProductController::class, 'view'])->name('product.view');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');



Route::get('/purchase', [PurchaseController::class, 'purchase'])->name('purchase.create');
Route::post('/purchase', [PurchaseController::class, 'store'])->name('purchase.store');
Route::get('/purchase/show', [PurchaseController::class, 'show'])->name('purchase.show');

Route::get('/sales', [SaleController::class, 'sale'])->name('sale.create');
Route::post('/sales', [SaleController::class, 'store'])->name('sale.store');
Route::get('/sales/show', [SaleController::class, 'show'])->name('sale.show');
Route::delete('/sales/{sale}', [SaleController::class, 'destroy'])->name('sale.destroy');
Route::get('/sale/{id}/pdf', [SaleController::class, 'singlePDF'])->name('sale.pdf');



Route::get('/reports/stock', [StockController::class, 'stockReport'])->name('report.stock');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/brand/{id}', [FrontendController::class, 'productsByBrand'])->name('brand.products');
Route::get('/all/product', [FrontendController::class, 'allproduct'])->name('all.product');

