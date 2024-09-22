<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // Define the table associated with the model (if different from 'carts')
    protected $table = 'carts';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'amount',
    ];

    // Define relationships if needed
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(ProductInfo::class, 'product_id');
    }
}
