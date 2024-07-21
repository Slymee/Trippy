<?php

namespace App\Repositories\Interfaces\Trip;

interface TripReadDeleteRepositoryInterface{

    public function getAllTrip();

    public function getTrip($tripId);

    public function deleteTrip($tripId);
}