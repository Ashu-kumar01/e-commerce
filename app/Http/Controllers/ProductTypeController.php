<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product_types = ProductType::latest()->paginate(10);
        $products = null;
        return view('admin.form.product-type-master', compact('product_types', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.form.product-type-master');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ProductType::updateOrCreate(
            ['id' => $request->id],
            [
                'type' => $request->type,
                'identifier_code' => $request->identifier_code,
                'description' => $request->description,
                'status' => $request->status
            ]
        );

        return redirect()->route('admin.addproduct.index')->with('success', 'data Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product_types = ProductType::latest()->paginate(10);
        $products = ProductType::findOrFail($id);
        return view('admin.form.product-type-master', compact('products', 'product_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = ProductType::findOrFail($id)->delete();
        return redirect()->route('admin.addproduct.index')
            ->with('success', 'Product Type deleted successfully');
    }
}
