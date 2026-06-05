<?php

namespace App\Http\Controllers;

use App\Models\BrandMaster;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\SubCategory;
use App\Models\Size;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        $categogys = Category::where('status', 1)->get();
        $sizes = Size::get();
        $products = ProductType::where('status', 1)->get();
        return view('admin.addProduct', compact('categogys', 'products', 'sizes', 'all_Products'));
    }

    public function create(Request $request)
    {

        $request->validate([

            // CATEGORY
            'category' => 'required|exists:categories,id',

            // BASIC INFO
            'product_name' => 'required|string|max:255',

            'slug' => 'required',

            'short_description' => 'required|string',

            'full_description' => 'required|string',

            'product_tags' => 'required|string',

            // IMAGES
            'images.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:8192',

            // INVENTORY
            'sku' => 'nullable|string|max:255',

            'barcode' => 'nullable|string|max:255',

            'qty_stock' => 'nullable|integer|min:0',

            'low_stock_alert' => 'nullable|integer|min:0',

            // PUBLISH
            'publish_date' => 'nullable|date',

            'visibility' => 'nullable|string',

            // PRICING
            'regular_price' => 'required|numeric|min:0',

            'discount_rate' => 'nullable|numeric|min:0|max:100',

            'discount_price' => 'nullable|numeric|min:0',

            'selling_price' => 'nullable|numeric|min:0',

            // ATTRIBUTES
            'sizes' => 'nullable|array',

            'weight' => 'nullable|numeric|min:0',

            'length' => 'nullable|numeric|min:0',

            'width' => 'nullable|numeric|min:0',

            'height' => 'nullable|numeric|min:0',

            // SEO
            'meta_title' => 'nullable|string|max:255',

            'meta_description' => 'nullable|string',

        ]);

        $slug = Str::slug($request->product_name);

        $originalSlug = $slug;

        $count = 1;

        while (Product::where('slug', $slug)->exists()) {

            $slug = $originalSlug . '-' . $count++;
        }



        // dd($request->all());
        $images = [];

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {

                $name = time() . '_' . $image->getClientOriginalName();

                $image->move(public_path('uploads/products'), $name);

                $images[] = $name;
            }
        }

        Product::create(
            [

                'category' => $request->category,
                'product_name' => $request->product_name,
                'slug' => $slug,

                'short_description' => $request->short_description,
                'full_description' => $request->full_description,
                'product_tags' => $request->product_tags,

                'images' => $images,

                'sku' => $request->sku,
                'barcode' => $request->barcode,

                'qty_stock' => $request->qty_stock,
                'low_stock_alert' => $request->low_stock_alert,

                'publish_date' => $request->publish_date,
                'visibility' => $request->visibility,

                'regular_price' => $request->regular_price,
                'discount_rate' => $request->discount_rate,
                'discount_price' => $request->discount_price,
                'selling_price' => $request->selling_price,

                'sizes' => $request->sizes,

                'weight' => $request->weight,
                'length' => $request->length,
                'width' => $request->width,
                'height' => $request->height,

                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
            ]
        );

        return back()->with('success', 'Product Added Successfully');
    }

    public function product($id)
    {
        $product_details = Product::with('categorys')->where('id', $id)->first();
        // dd($product_details);
        $all_Products = Product::limit(4)->get();
        return view('website.product', compact('product_details', 'all_Products'));
    }
}
