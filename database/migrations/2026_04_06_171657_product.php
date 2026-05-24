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

            /*
            |--------------------------------------------------------------------------
            | CATEGORY
            |--------------------------------------------------------------------------
            */
            $table->unsignedBigInteger('category_id')->nullable();

            /*
            |--------------------------------------------------------------------------
            | BASIC INFORMATION
            |--------------------------------------------------------------------------
            */
            $table->string('product_name');
            $table->string('slug')->unique();

            $table->text('short_description')->nullable();
            $table->longText('full_description')->nullable();

            $table->text('product_tags')->nullable();

            /*
            |--------------------------------------------------------------------------
            | PRODUCT IMAGES
            |--------------------------------------------------------------------------
            */
            $table->json('images')->nullable();

            /*
            |--------------------------------------------------------------------------
            | PUBLISH SETTINGS
            |--------------------------------------------------------------------------
            */
            $table->boolean('status')->default(1);

            $table->boolean('bestseller')->default(0);
            $table->boolean('new_arrival')->default(0);

            $table->timestamp('publish_date')->nullable();

            $table->enum('visibility', [
                'Public',
                'Private',
                'Password Protected'
            ])->default('Public');

            /*
            |--------------------------------------------------------------------------
            | INVENTORY
            |--------------------------------------------------------------------------
            */
            $table->string('sku')->nullable();

            $table->string('barcode')->nullable();

            $table->integer('qty_stock')->default(0);

            $table->integer('low_stock_alert')->default(0);

            /*
            |--------------------------------------------------------------------------
            | PRICING
            |--------------------------------------------------------------------------
            */
            $table->decimal('regular_price', 10, 2)->default(0);

            $table->decimal('sale_price', 10, 2)->nullable();

            $table->decimal('cost_price', 10, 2)->nullable();

            $table->decimal('selling_price', 10, 2)->nullable();

            /*
            |--------------------------------------------------------------------------
            | ATTRIBUTES
            |--------------------------------------------------------------------------
            */
            $table->json('sizes')->nullable();

            $table->decimal('weight', 8, 2)->nullable();

            $table->decimal('length', 8, 2)->nullable();

            $table->decimal('width', 8, 2)->nullable();

            $table->decimal('height', 8, 2)->nullable();

            /*
            |--------------------------------------------------------------------------
            | SEO
            |--------------------------------------------------------------------------
            */
            $table->string('meta_title')->nullable();

            $table->text('meta_description')->nullable();

            $table->timestamps();

            /*
            |--------------------------------------------------------------------------
            | FOREIGN KEY
            |--------------------------------------------------------------------------
            */
            $table->foreign('category_id')
                ->references('id')
                ->on('category_brands')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
