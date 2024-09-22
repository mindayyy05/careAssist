<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // Specify the table name if it differs from the pluralized form of the model name
    protected $table = 'messages';

    // Define which attributes are mass assignable
    protected $fillable = ['message_content', 'user_id'];
}
