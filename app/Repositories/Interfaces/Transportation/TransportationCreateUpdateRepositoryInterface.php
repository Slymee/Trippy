<?php

namespace App\Repositories\Interfaces\Transportation;

interface TransportationCreateUpdateRepositoryInterface{

    public function createTransportation(array $data);

    public function updateTransportation(array $data, $accommodationId);

}
