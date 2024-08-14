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

    public function upcomingTrips($paginate)
    {
        $query = Trip::where('is_private', false);

        if (is_numeric($paginate) && (int)$paginate > 0) {
            return $query->paginate((int)$paginate);
        }

        // Return all records if pagination is not specified or is invalid
        return $query->get();
    }
}
