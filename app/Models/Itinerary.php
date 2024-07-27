<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    use HasFactory;

    protected $table = 'itineraries';

    protected $fillable = [
        'destination_id',
        'arrival_date',
        'departure_date',
    ];

    public function accommodations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Accommodation::class);
    }

    public function tranports(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Transportation::class);
    }
}
