<?php

namespace App\Repositories;

use App\Models\StopOver;
use App\Models\Trip;
use App\Models\TripEnrollment;
use App\Models\TripLocation;
use App\Repositories\Interfaces\TripRepositoryInterface;
use Illuminate\Support\Facades\Auth;

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

        // Fetch the trips
        $trips = $paginate === 'all' ? $query->get() : $query->paginate(is_numeric($paginate) && (int)$paginate > 0 ? (int)$paginate : 5);

        // Get the currently authenticated user
        $user = Auth::user();

        // Attach enrollment status to each trip
        $trips->transform(function ($trip) use ($user) {
            $trip->is_enrolled = $user ? $trip->users()->where('users.id', $user->id)->exists() : false;
            return $trip;
        });

        return $trips;
    }


    public function getTripDetails($tripId)
    {
        return Trip::with('users')->find($tripId)->load('tripLocation', 'stopOvers');
    }

    public function createTrip(array $data)
    {
        $trip = Trip::create([
            'user_id' => auth()->id(),
            'trip_name' => $data['trip_name'],
            'trip_description' => $data['trip_description'],
            'trip_type' => $data['trip_type'],
            'trip_price' => $data['trip_price'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'number_of_days' => floor((abs(strtotime($data['end_date']) - strtotime($data['start_date']))) / (60*60*24)),
            'total_people' => $data['total_people'],
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

    public function enrollUserInTrip($userId, $tripId)
    {

        return TripEnrollment::create([
            'user_id' => $userId,
            'trip_id' => $tripId,
        ]);
    }

    public function leaveUserInTrip($userId, $tripId)
    {
        return Trip::find($tripId)->users()->detach($userId);
    }
}
