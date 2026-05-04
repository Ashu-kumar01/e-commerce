<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    public function index()
    {
        $editId = new SubCategory();
        $categories = Category::all();
        $subCategorys = SubCategory::orderBy('updated_at', 'desc')->paginate(5);
        return view('admin.form.subcategory-form', compact('editId', 'subCategorys', 'categories'));
    }


    public function create()
    {

        return view('admin.form.subcategory-form');
    }

    public function store(Request $req)
    {

        $req->validate([
            'category_id' => 'required',
            'sub_category' => 'required',
            'slug' => 'required|unique:subcategorys,slug,' . $req->id,
        ]);


        SubCategory::updateOrCreate(
            ['id' => $req->id],
            [
                'category_id' => $req->category_id,
                'sub_category' => $req->sub_category,
                'slug' => $req->slug,
                'status' => $req->status
            ]
        );

        return redirect()->route('admin.subcategory.index')->with('success', 'subcategory will be saved!');
    }

    public function edit($id)
    {
        // dd($id);
        $categories = Category::all();
        $editId = SubCategory::findOrFail($id);
        $subcategories = new SubCategory();
        $subCategorys = SubCategory::orderBy('updated_at', 'desc')->paginate(5);
        return view('admin.form.subcategory-form', compact('editId', 'subCategorys', 'subcategories', 'categories'));
        // dd($editId);
    }
}
