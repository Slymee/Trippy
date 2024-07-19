<?php

namespace App\Repositories\Interfaces\Transport;

interface TransportCreateUpdateRepoInterface{

    public function createTransportation(array $data);

    public function updateTransportation(array $data, $accomodationId);

}