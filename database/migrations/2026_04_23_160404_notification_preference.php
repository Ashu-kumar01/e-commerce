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
        Schema::create('notification_preferences', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            // Channels
            $table->boolean('email_notification')->default(1);
            $table->boolean('sms_alert')->default(1);
            $table->boolean('push_alerts')->default(1);

            // Events
            $table->boolean('new_order')->default(1);
            $table->boolean('order_status')->default(1);
            $table->boolean('low_stock')->default(1);
            $table->boolean('customer_reviews')->default(1);
            $table->boolean('weekly_analytics')->default(1);
            $table->boolean('marketing_promotion')->default(1);

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
