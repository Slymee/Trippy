<?php

namespace App\Repositories\Interfaces\Trip;

interface TripCreateUpdateRepoInterface{
    public function createTrip(array $data);

    public function updateTrip(array $data, $tripId);
    
}