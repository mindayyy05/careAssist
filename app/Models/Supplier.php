<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model implements Authenticatable
{
    use AuthenticatableTrait;

    protected $table = 'supplier_info';

    protected $fillable = [
        'shop_name',
        'email',
        'phone_number',
        'location',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
