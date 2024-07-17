<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itenerary extends Model
{
    use HasFactory;

    protected $table = 'iteneraries';

    protected $fillable = [
        'destination_id',
        'arrival_date',
        'departure_date',
    ];

    public function accomodations()
    {
        return $this->hasMany(Accomodation::class);
    }

    public function tranports()
    {
        return $this->hasMany(Transport::class);
    }
}
