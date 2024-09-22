<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderDetail extends Model
{
    use HasFactory;

    protected $table = 'purchase_order_details';
    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'city',
        'street',
        'house_number',
    ];

    public function userCart()
    {
        return $this->hasMany(UserCart::class, 'user_id', 'user_id');
    }
}
