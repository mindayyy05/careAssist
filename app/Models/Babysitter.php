<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Babysitter extends Authenticatable
{
    use HasFactory;

    protected $table = 'babysitters';

    protected $fillable = [
        'name',
        'agency_name',
        'phone',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
