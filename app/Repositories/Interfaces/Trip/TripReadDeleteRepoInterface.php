<?php

namespace App\Repositories\Interfaces\Trip;

interface TripReadDeleteRepoInterface{

    public function getAllTrip();

    public function getTrip($tripId);

    public function deleteTrip($tripId);
}