<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        return view('website.shop');
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
