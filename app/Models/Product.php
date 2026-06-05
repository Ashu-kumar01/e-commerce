<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';


    protected $fillable = [

        'category',
        'product_name',
        'slug',
        'short_description',
        'full_description',
        'product_tags',

        'images',

        'sku',
        'barcode',
        'qty_stock',
        'low_stock_alert',

        'publish_date',
        'visibility',

        'regular_price',
        'discount_rate',
        'discount_price',
        'selling_price',

        'sizes',

        'weight',
        'length',
        'width',
        'height',

        'meta_title',
        'meta_description',

        'status'
    ];

    // ✅ Data Casting (IMPORTANT 🔥)
    protected $casts = [
        'images' => 'array',
        'sizes' => 'array',
        'publish_date' => 'datetime',
    ];



    public function categorys()
    {
        return $this->belongsTo(Category::class, 'category', 'id');
    }
}
