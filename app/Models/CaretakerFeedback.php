<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaretakerFeedback extends Model
{
    use HasFactory;

    protected $table = 'caretaker_feedbacks';
    protected $fillable = ['name', 'feedback'];
}
