<?php

namespace App\Repositories;

use App\Models\StopOver;
use App\Models\Trip;
use App\Models\TripLocation;
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

        if ($paginate === 'all') {
            return $query->get();
        }

        if (is_numeric($paginate) && (int)$paginate > 0) {
            return $query->paginate((int)$paginate);
        }

        return $query->paginate(5);
    }

    public function getTripDetails($tripId)
    {
        return Trip::find($tripId);
    }

    public function createTrip(array $data)
    {
        $trip = Trip::create([
            'user_id' => auth()->id(),
            'trip_name' => $data['trip_name'],
            'trip_description' => $data['trip_description'],
            'trip_price' => $data['trip_price'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'arrival_time' => $data['arrival_time'],
            'means_of_transport' => $data['means_of_transport'],
            'is_private' => $data['is_private'],
        ]);

        TripLocation::create([
            'trip_id' => $trip->id,
            'start_loc' => $data['start_loc'],
            'start_loc_name' => $data['start_loc_name'],
            'end_loc' => $data['end_loc'],
            'end_loc_name' => $data['end_loc_name'],
        ]);

        if (isset($data['location']) && is_array($data['location'])) {
            foreach ($data['location'] as $location) {
                StopOver::create([
                    'trip_id' => $trip->id,
                    'location' => $location,
                ]);
            }
        }

        return $trip->load('tripLocation', 'stopOvers');
    }
}
