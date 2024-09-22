<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Specify the table associated with the model if it doesn't follow Laravel's naming conventions
    protected $table = 'products';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'product_name',
        'price',
        'quantity',
    ];

    // Optionally, specify timestamps if your table doesn't have them
    public $timestamps = true;
}
