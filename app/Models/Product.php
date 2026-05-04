<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';


    protected $fillable = [

        // Basic Info
        'product_name',
        'slug',
        'short_description',
        'full_description',
        'product_tag',

        // Pricing
        'regular_price',
        'sale_price',
        'cost_price',
        'tax_rate',

        // Dimensions
        'weight',
        'length',
        'width',
        'height',

        // SEO
        'meta_title',
        'meta_description',

        // Publish
        'publish_date',
        'visibility',

        // Category
        'category',
        'subcategory',
        'brand',
        'product_type',

        // Inventory
        'sku',
        'barcode',
        'qty_stock',
        'low_stock_alert',

        // Shipping
        'shipping_class',

        // Status
        'is_active',
        'is_featured',
    ];

    // ✅ Data Casting (IMPORTANT 🔥)
    protected $casts = [
        'regular_price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'cost_price' => 'decimal:2',
        'tax_rate' => 'decimal:2',

        'weight' => 'float',
        'length' => 'float',
        'width' => 'float',
        'height' => 'float',

        'qty_stock' => 'integer',
        'low_stock_alert' => 'integer',

        'is_active' => 'boolean',
        'is_featured' => 'boolean',

        'publish_date' => 'datetime',
    ];
}
