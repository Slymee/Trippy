<?php

namespace App\Repositories\RepositoryTrip;

use App\Models\Trip;
use App\Repositories\Interfaces\Trip\TripCreateUpdateRepositoryInterface;

class TripCreateUpdateRepository implements TripCreateUpdateRepositoryInterface
{
    public function createTrip(array $data)
    {
        return Trip::create($data);
    }

    public function updateTrip(array $data, $tripId)
    {

    }
}
