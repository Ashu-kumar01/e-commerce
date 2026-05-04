<?php

namespace App\Http\Controllers;

use App\Models\BrandMaster;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class BrandMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = BrandMaster::all();
        $brandId = null;
        return view('admin.form.brand-master', compact('brands','brandId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.form.brand-master');
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:brand_masters,slug,' . $request->id,
            'file' => $request->id ? 'nullable|image' : 'required|image'
        ]);

        // find brand only if id exists
        $brand = $request->id ? BrandMaster::find($request->id) : null;

        // default: keep old image
        $imageName = $brand->file ?? null;

        $path = public_path('uploads/brands');

        // create folder if not exists
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        // only run when new file uploaded
        if ($request->hasFile('file')) {

            // delete old image
            if ($brand && $brand->file && File::exists($path . '/' . $brand->file)) {
                File::delete($path . '/' . $brand->file);
            }

            // upload new image
            $imageName = time() . '.' . $request->file->extension();
            $request->file->move($path, $imageName);
        }

        BrandMaster::updateOrCreate(
            ['id' => $request->id],
            [
                'name' => $request->name,
                'slug' => $request->slug,
                'file' => $imageName,
                'status' => $request->status ?? 1,
            ]
        );

        return redirect()->route('admin.brand.index')->with('success', 'Brand Saved!');
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
        $brandId = BrandMaster::findOrFail($id);
        $brands = BrandMaster::all();
        return view('admin.form.brand-master', compact('brandId', 'brands'));
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
