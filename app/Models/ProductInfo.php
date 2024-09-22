<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInfo extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'products_info';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'name',
        'price',
        'quantity',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
