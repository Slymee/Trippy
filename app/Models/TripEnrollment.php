<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripEnrollment extends Model
{
    use HasFactory;

    protected $table = 'trip_entrollments';

    protected $fillable = [
        'trip_id',
        'user_id',
    ];
}
