<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // Basic Info
            $table->string('product_name');
            $table->string('slug')->unique();
            $table->text('short_description')->nullable();
            $table->longText('full_description')->nullable();
            $table->string('product_tag')->nullable();

            // Pricing
            $table->decimal('regular_price', 10, 2);
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->decimal('cost_price', 10, 2)->nullable();
            $table->decimal('tax_rate', 5, 2)->nullable();

            // Dimensions
            $table->float('weight')->nullable();
            $table->float('length')->nullable();
            $table->float('width')->nullable();
            $table->float('height')->nullable();

            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            // Publish
            $table->timestamp('publish_date')->nullable();
            $table->string('visibility')->default('public');

            // Category
            $table->string('category');
            $table->string('subcategory')->nullable();
            $table->string('brand')->nullable();
            $table->string('product_type')->default('simple');

            // Inventory
            $table->string('sku')->unique();
            $table->string('barcode')->nullable();
            $table->integer('qty_stock')->default(0);
            $table->integer('low_stock_alert')->default(0);

            // Shipping
            $table->string('shipping_class')->nullable();

            // Status
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
