<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BabysitterBooking extends Model
{
    use HasFactory;

    protected $table = 'babysitter_bookings';

    protected $fillable = [
        'user_id',
        'selectedDate',
        'number_of_kids',
        'kid_names',
        'allergies',
        'disabilities',
        'timing_start',
        'timing_end',
        'your_name',
        'phone_number',
        'house_address',
        'status',
    ];

    public function todos()
    {
        return $this->hasMany(BabysitterTodo::class, 'babysitter_booking_id');
    }
}
