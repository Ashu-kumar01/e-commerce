<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandMaster extends Model
{
    protected $table = "brand_masters";
    protected $fillable = [
        'name',
        'slug',
        'file',
        'status'
    ];
}
