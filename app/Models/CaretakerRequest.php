<?php

// app/Models/CaretakerRequest.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaretakerRequest extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'caretaker_requests';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'patient_name',
        'email',
        'age',
        'phone',
        'location',
        'date',
        'start_time',
        'end_time',
        'allergies',
        'disabilities',
        'bathing_times',
        'bathing_method',
        'breakfast_time',
        'lunch_time',
        'dinner_time',
        'user_id',
    ];

    // Optionally, specify the date format if needed
    protected $dateFormat = 'Y-m-d H:i:s';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
