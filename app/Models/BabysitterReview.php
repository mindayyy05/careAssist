<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BabysitterReview extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'review'];
}
