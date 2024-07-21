<?php

namespace App\Repositories\Interfaces\Destination;

interface DestinationReadDeleteRepositoryInterface{

    
    public function getAllDestination($tripId);

    public function getDestination($destinationId);

    public function deleteDestination($destinationId);
}