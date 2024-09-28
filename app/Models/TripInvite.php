<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripInvite extends Model
{
    use HasFactory;

    protected $table = 'trip_invites';

    protected $fillable = [
        'invited_by',
        'invited_to',
        'status',
    ];
}
