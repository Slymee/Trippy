<?php

namespace App\Repositories\Interfaces\Itinerary;

interface ItineraryReadDeleteRepositoryInterface{

    public function getAllItinerary($destinationId);

    public function getItinerary($itineraryId);

    public function deleteItinerary($itineraryId);
}
