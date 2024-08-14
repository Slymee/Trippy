<?php

namespace App\Repositories;

use App\Models\Trip;
use App\Repositories\Interfaces\TripRepositoryInterface;

class TripRepository implements TripRepositoryInterface
{
    public function getAll($userId)
    {
        return Trip::where('user_id', $userId)->get();
    }

    public function getSearchTrip($searchTerm)
    {
        return Trip::where('trip_name', 'ILIKE', "%{$searchTerm}%")
                    ->where('is_private', false)
                    ->paginate(10);
    }
}