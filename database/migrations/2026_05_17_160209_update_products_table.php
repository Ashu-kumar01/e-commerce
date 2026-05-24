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

            // basic info
            $table->foreignId('category')->nullable();
            $table->string('product_name');
            $table->string('slug')->unique()->nullable();

            $table->text('short_description')->nullable();
            $table->longText('full_description')->nullable();
            $table->text('product_tags')->nullable();

            // images
            $table->json('images')->nullable();

            // inventory
            $table->string('sku')->nullable();
            $table->string('barcode')->nullable();

            $table->integer('qty_stock')->default(0);
            $table->integer('low_stock_alert')->default(0);

            // publish
            $table->timestamp('publish_date')->nullable();
            $table->string('visibility')->default('Public');

            // pricing
            $table->decimal('regular_price', 10, 2)->default(0);
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->decimal('discost_price', 10, 2)->nullable();
            $table->decimal('tax_rate', 10, 2)->nullable();

            // attributes
            $table->json('sizes')->nullable();

            $table->decimal('weight', 8, 2)->nullable();
            $table->decimal('length', 8, 2)->nullable();
            $table->decimal('width', 8, 2)->nullable();
            $table->decimal('height', 8, 2)->nullable();

            // seo
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            // status
            $table->boolean('status')->default(1);

            $table->timestamps();
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
