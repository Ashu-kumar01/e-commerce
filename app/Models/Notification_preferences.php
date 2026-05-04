<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class notification_preferences extends Model
{
    protected $table = 'notification_preferences';

    protected $fillable = [
        'user_id',
        'email_notification',
        'sms_alert',
        'push_alerts',
        'new_order',
        'order_status',
        'low_stock',
        'customer_reviews',
        'weekly_analytics',
        'marketing_promotion',
    ];

    protected $casts = [
        'email_notification' => 'boolean',
        'sms_alert' => 'boolean',
        'push_alerts' => 'boolean',
        'new_order' => 'boolean',
        'order_status' => 'boolean',
        'low_stock' => 'boolean',
        'customer_reviews' => 'boolean',
        'weekly_analytics' => 'boolean',
        'marketing_promotion' => 'boolean',
    ];
}
