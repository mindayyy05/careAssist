<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BabysitterTodo extends Model
{
    use HasFactory;

    protected $table = 'babysitter_todos';
    protected $fillable = [
        'user_id',
        'babysitter_booking_id',
        'task1',
        'task2',
        'task3',
        'task4',
        'task5',
    ];

    public function booking()
    {
        return $this->belongsTo(BabysitterBooking::class, 'babysitter_booking_id');
    }
}
