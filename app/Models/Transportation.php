<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    use HasFactory;

    protected $table = 'transportation';

    protected $fillable = [
        'itinerary_id',
        'transport_name',
        'transport_type',
        'transport_number',
        'price_per_head',
    ];

    public function itinerary(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Itinerary::class);
    }
}
