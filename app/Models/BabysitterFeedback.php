<?php

// app/Models/BabysitterFeedback.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BabysitterFeedback extends Model
{
    use HasFactory;

    protected $table = 'babysitter_feedbacks';
    protected $fillable = ['reviewer_name', 'review_feedback'];
}
