<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $table = 'destinations';

    protected $fillable = [
        'trip_id',
        'destination_name',
        'longitude',
        'latitude',
    ];
}
