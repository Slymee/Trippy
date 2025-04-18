<?php

namespace App\Repositories\Interfaces;

interface TripRepositoryInterface
{
    public function getAll($userId);

    public function getSearchTrip($searchTerm);

    public function upcomingTrips($paginate);

    public function getTripDetails($tripId);

    public function createTrip(array $data);

    public function enrollUserInTrip($userId, $tripId);

    public function leaveUserInTrip($userId, $tripId);

    public function inviteToTrip(array $receiverIds, $tripId);

    public function getAllInvites();

    public function inviteAction(string $action, $tripId);
}
