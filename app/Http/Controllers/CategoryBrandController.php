<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryBrandController extends Controller
{


    public function index()
    {
        $subCategorys = SubCategory::orderBy('updated_at', 'desc')->paginate(5);
        $categories = Category::orderBy('updated_at', 'desc')->paginate(5);
        $category = new Category(); 
        return view('admin.category-brand', compact('categories', 'category', 'subCategorys'));
    }


    public function create()
    {
        return view('admin.category-brand');
    }


    public function store(Request $request)
    {
        $request->validate([
            'catName' => 'required',
            'catSlug' => 'required|unique:categories,slug',
            'status' => 'required',
        ]);

        // dd($request->id);
        Category::updateOrCreate(
            ['id' => $request->id],
            [
                'name' => $request->catName,
                'slug' => $request->catSlug,
                'description' => $request->description,
                'status' => $request->status,
            ]
        );

        $message = $request->id ? 'Category updated successfully' : 'Category created successfully';
        return redirect()->route('admin.category.index')
            ->with('success', $message);
    }

    public function edit($id)
    {
        $categories = Category::orderBy('updated_at', 'desc')->paginate(5); // list
        $category   = Category::findOrFail($id); // single edit data

        return view('admin.category-brand', compact('categories', 'category'));
    }


    // public function update(Request $request, $id)
    // {
    //     $category = Category::findOrFail($id);

    //     $request->validate([
    //         'name' => 'required',
    //         'slug' => 'required|unique:categories,slug,' . $id,
    //     ]);

    //     $category->update([
    //         'name' => $request->name,
    //         'slug' => $request->slug,
    //         'description' => $request->description,
    //         'status' => $request->status,
    //     ]);

    //     return redirect()->route('admin.category.index')
    //         ->with('success', 'Category updated successfully');
    // }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return redirect()->route('admin.category.index')
            ->with('success', 'Category deleted successfully');
    }
}
