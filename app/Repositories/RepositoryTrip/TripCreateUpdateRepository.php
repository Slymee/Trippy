<?php

namespace App\Repositories\RepositoryTrip;

use App\Models\Trip;
use App\Repositories\Interfaces\Trip\TripCreateUpdateRepositoryInterface;

class TripCreateUpdateRepository implements TripCreateUpdateRepositoryInterface
{
    public function createOrUpdateTrip(array $data)
    {
        return Trip::updateOrCreate(['id' => $data['id']], $data);
    }
}
