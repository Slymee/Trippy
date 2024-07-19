<?php

namespace App\Repositories\Interfaces\Destination;

interface DestinationCreateUpdateRepositoryInterface{

    public function createDestination(array $data);

    public function updateDestination(array $data, $destinationId);
}