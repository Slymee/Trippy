<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    
    protected $table = 'feedbacks';

    protected $fillable = [
        'trip_id',
        'user_id',
        'feedback_title',
        'feedback_description',
        'feedback_rating',
    ];
}
