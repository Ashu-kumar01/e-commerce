<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // 👈 IMPORTANT
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable   // 👈 IMPORTANT
{
    use HasFactory, Notifiable;

    protected $table = 'admins';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
