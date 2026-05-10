<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table;
    protected $fillable = [
        'category_id',
        'size',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
