<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Size;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $categorys = Category::limit(5)->get(['id', 'name']);
        $sizess = Size::select('id', 'size')->limit(5)->get();
        return view('website.shop', compact('categorys', 'sizess'));
    }

    public function summary()
    {
        return view('website.product-summary');
    }

    public function checkout()
    {
        return view('website.checkout');
    }
}
