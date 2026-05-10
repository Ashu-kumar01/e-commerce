<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategotieFactory> */
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'status'
    ];

    public function subcategory()
    {
        return $this->hasMany(SubCategory::class, 'category_id');
    }

    public function size()
    {
        return $this->hasMany(Size::class, 'category_id');
    }
}
