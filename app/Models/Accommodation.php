<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;

    protected $table = 'accomodations';

    protected $fillable = [
        'itenerary_id',
        'accomidation_name',
        'accomodation_address',
        'accomodation_phone',
        'accomodation_type',
        'check_in',
        'check_out',
        'price_per_day',
    ];
}
