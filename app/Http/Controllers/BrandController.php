<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    //
    public function brands(){
        $brands = Brand::all();
        return view('Brands.create', compact('brands'));
    }

    public function store(Request $req){

        $req->validate([
            'name' => 'required'
        ]);

        $brand = new Brand;
        $brand->name = $req->name;
        $brand->save();
        return redirect()->back()->with('success', 'Brand created successfully!');
    }

    public function delete($id){
     $brand = Brand::find($id);
        $brand->delete();
     return redirect()->back()->with('error', 'Brand deleted successfully!');
    }


}
