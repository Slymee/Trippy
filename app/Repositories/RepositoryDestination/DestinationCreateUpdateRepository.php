<?php

namespace App\Repositories\RepositoryDestination;

use App\Models\Destination;
use App\Repositories\Interfaces\Destination\DestinationCreateUpdateRepositoryInterface;

class DestinationCreateUpdateRepository implements DestinationCreateUpdateRepositoryInterface
{
    public function createDestination(array $data)
    {
        return Destination::create($data);
    }

    public function updateDestination(array $data, $destinationId)
    {

    }
}
