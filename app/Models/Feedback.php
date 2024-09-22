<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Feedback extends Model
{
    protected $table = 'feedbacks';
    protected $fillable = ['user_name', 'feedback', 'date'];

    protected $casts = [
        'date' => 'datetime',
    ];
}
