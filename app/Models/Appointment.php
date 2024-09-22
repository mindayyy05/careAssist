<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'therapist_id',
        'client_id',
        'user_name',
        'user_age',
        'user_gender',
        'appointment_date',
        'time_slot',
        'reason_for_therapy',
        'status',
    ];
}
