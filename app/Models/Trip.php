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
}
