<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $table = 'shoppingcarts'; // Ensure this matches your table name

    protected $fillable = ['user_id', 'product_id', 'quantity', 'amount']; // Ensure this matches your table columns
}
