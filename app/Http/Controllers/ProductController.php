<?php

namespace App\Http\Controllers;

use App\Models\BrandMaster;
use App\Models\Category;
use App\Models\ProductType;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $categogys = Category::where('status', 1)->get();
        $subcategogys = SubCategory::where('status', 1)->get();
        $products = ProductType::where('status', 1)->get();
        $brands = BrandMaster::where('status', 1)->get();
        return view('admin.addProduct', compact('categogys', 'subcategogys', 'products', 'brands'));
    }

    public function create(Request $request)
    {
        dd($request->all());
    }
}
