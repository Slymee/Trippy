<?php

namespace App\Repositories\Interfaces\Transport;

interface TransportCreateUpdateRepositoryInterface{

    public function createTransportation(array $data);

    public function updateTransportation(array $data, $accomodationId);

}