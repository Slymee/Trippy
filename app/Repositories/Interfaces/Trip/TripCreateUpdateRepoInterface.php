<?php

namespace App\Repositories\Interfaces\Trip;

interface TripCreateUpdateRepositoryInterface{
    public function createTrip(array $data);

    public function updateTrip(array $data, $tripId);
    
}