<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaretakerClient extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'caretaker_id',
        'status',
        'name',
        'age',
        'gender',
        'city',
        'street_number',
        'house_number',
        'start_date',
        'end_date',
        'specific_date',
        'start_time',
        'end_time',
        'allergies',
        'disabilities',
        'extra_notes',
    ];

    // Define relationships if necessary
}
