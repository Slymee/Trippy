<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $table = 'trips';

    protected $fillable = [
        'user_id',
        'trip_name',
        'trip_description',
        'trip_price',
        'start_date',
        'end_date',
        'arrival_time',
        'means_of_transport',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tripLocation()
    {
        return $this->hasOne(TripLocation::class);
    }

    public function stopOvers()
    {
        return $this->hasMany(StopOver::class);
    }

    // Define the relationship to TripEnrollment
    public function enrollments()
    {
        return $this->hasMany(TripEnrollment::class, 'trip_id');
    }

    // Define the relationship to User through TripEnrollment
    public function users()
    {
        return $this->hasManyThrough(User::class, TripEnrollment::class, 'trip_id', 'id', 'id', 'user_id');
    }
}
