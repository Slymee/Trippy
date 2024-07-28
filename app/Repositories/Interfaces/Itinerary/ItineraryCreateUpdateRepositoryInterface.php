<?php

namespace App\Repositories\Interfaces\Itenerary;

interface ItineraryCreateUpdateRepositoryInterface{

    public function createItinerary(array $data);

    public function updateItinerary(array $data, $itineraryId);
}
