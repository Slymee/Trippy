<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;

    protected $table = 'transports';

    protected $fillable = [
        'itenerary_id',
        'transport_name',
        'transport_type',
        'transport_number',
        'price'
    ];

    public function itenerary()
    {
        return $this->belongsTo(Itenerary::class);
    }
}
