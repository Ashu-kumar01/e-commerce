<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = "subcategorys";

    protected $fillable = [
        'category_id',
        'sub_category',
        'slug',
        'status',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
