<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripArrivalPlaceTime extends Model
{
    use HasFactory;

    protected $table = 'trip_arrival_place_times';

    protected $fillable = [
        'trip_id',
        'arrival_time',
        'departure_time',
        'longitude',
        'latitude',
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
