<?php

namespace App\Repositories\Interfaces;

interface TripRepositoryInterface
{
    public function getAll($userId);

    public function getSearchTrip($searchTerm);

    public function upcomingTrips($paginate);

    public function getTripDetails($tripId);

    public function createTrip(array $data);
}
