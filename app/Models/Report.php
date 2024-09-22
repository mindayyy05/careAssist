<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    // Specify the table name if it's different from 'reports'
    protected $table = 'reports';

    // Define the fields that are mass assignable
    protected $fillable = ['user_id', 'reason'];
}
