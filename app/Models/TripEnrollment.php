<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripEnrollment extends Model
{
    use HasFactory;

    protected $table = 'trip_enrollments';

    protected $fillable = [
        'trip_id',
        'user_id',
    ];

    // Define the inverse relationship to Trip
    public function trip()
    {
        return $this->belongsTo(Trip::class, 'trip_id');
    }

    // Define the inverse relationship to User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
