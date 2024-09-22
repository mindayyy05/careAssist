<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Therapist extends Model
{
    use HasFactory;

    protected $table = 'therapists_info';

    protected $fillable = [
        'name',
        'agency_name',
        'email',
        'phone_number',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
