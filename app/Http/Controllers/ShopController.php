<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $all_Products = Product::with('category')->limit(4)->get();
        $categorys = Category::limit(5)->get(['id', 'name']);
        $sizess = Size::select('id', 'size')->limit(5)->get();
        return view('website.shop', compact('categorys', 'sizess', 'all_Products'));
    }

    public function summary($id)
    {
        $product_order = Product::with('categorys')->where('id', $id)->first();
        return view('website.product-summary', compact('product_order'));
    }

    public function checkout()
    {
        return view('website.checkout');
    }
}
