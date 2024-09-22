<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'caretaker_id',
        'task_1',
        'task_2',
        'task_3',
        'task_4',
        'task_5',
        'task_6',
        'task_7',
        'task_8',
        'task_9',
        'task_10',
        'task_11',
        'task_12',
        'task_13',
        'task_14',
        'task_15',
        'task_16',
        'task_17',
        'task_18',
        'task_19',
        'task_20',
        'status',
    ];
    public function caretaker()
    {
        return $this->belongsTo(Caretaker::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

