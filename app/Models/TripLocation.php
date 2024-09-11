<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripLocation extends Model
{
    use HasFactory;

    protected $table = 'trip_locations';

    protected $fillable = [
        'trip_id',
        'start_loc',
        'start_loc_name',
        'end_loc',
        'end_loc_name',
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
