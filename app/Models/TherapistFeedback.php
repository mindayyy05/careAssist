<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TherapistFeedback extends Model
{
    use HasFactory;

    protected $table = 'therapist_feedbacks';
    protected $fillable = [
        'therapist_id',
        'name',
        'feedback',
    ];
}
