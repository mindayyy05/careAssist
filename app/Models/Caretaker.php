<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Caretaker extends Authenticatable
{
    use HasFactory;

    // Specify the guard if using custom guards
    protected $guard = 'caretaker';

    // Fillable attributes for mass assignment
    protected $fillable = [
        'name',
        'agency_name',
        'phone',
        'email',
        'password',
    ];

    // Define the relationship with clients
    public function clients()
    {
        return $this->belongsToMany(CustomerForCaretaker::class, 'customers_for_caretakers', 'caretaker_id', 'customer_id');
    }

    // Define the relationship with todos
    public function todos()
    {
        return $this->hasMany(Todo::class, 'caretaker_id');
    }
}
