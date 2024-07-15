<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserParticipateTrip extends Model
{
    use HasFactory;

    protected $table = 'user_participate_trips';

    protected $fillable = [
        'user_id',
        'trip_id',
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
