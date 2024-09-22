<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class MentalHealthProvider extends Authenticatable
{
    protected $fillable = [
        'name',
        'agency_name',
        'phone_number',
        'email',
        'password',
    ];

    
}
