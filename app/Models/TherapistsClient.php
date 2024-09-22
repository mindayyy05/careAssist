<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TherapistsClient extends Model
{
    use HasFactory;

    protected $fillable = [
        'therapist_id',
        'appointment_date',
        'time_slot',
        'reason_for_therapy',
        'user_name',
        'user_age',
        'user_gender',
    ];
}
