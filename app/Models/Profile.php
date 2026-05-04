<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',

        'first_name',
        'last_name',
        'username',
        'email',
        'phone',
        'dob',
        'website',
        'bio',

        'address',
        'city',
        'state',
        'zip',
        'country',

        'twitter',
        'linkedin',
        'github',
        'instagram',

        'avatar',
    ];
}
