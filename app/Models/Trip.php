<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Trip extends Model
{
    use HasFactory;

    protected $table = 'trips';

    protected $fillable = [
        'user_id',
        'trip_title',
        'start_date',
        'end_date',
        'trip_description',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function arrivalTimePlace(): HasOne
    {
        return $this->hasOne('trip_arrival_place_time', 'trip_id', 'id');
    }

    public function userParticipateTrip(): HasMany
    {
        return $this->hasMany('user_participate_trips', 'trip_id', 'id');
    }
}
