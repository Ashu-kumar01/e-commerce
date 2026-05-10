<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sizes_data = null;
        $sizes = Size::with('category')->get();
        $categorys = Category::where('status', 1)->get();
        return view('admin.size-master', compact('categorys', 'sizes', 'sizes_data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.size-master');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'size' => 'required|string|max:50'
        ]);

        Size::updateOrCreate(
            ['id' => $request->id],
            [
                'category_id' => $request->category_id,
                'size' => $request->size,
                'status' => $request->status,
            ]
        );

        return redirect()->route('admin.size.index')->with('success', 'Size added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sizes_data = Size::findOrFail($id);
        $sizes = Size::with('category')->get();
        $categorys = Category::where('status', 1)->get();
        return view('admin.size-master', compact('sizes_data', 'categorys', 'sizes'));
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
        //
    }
}
