<?php

namespace App\Repositories\Interfaces\Transportation;

interface TransportationReadDeleteRepositoryInterface{

    public function getAllTransportation($iteneraryId);

    public function getTransportation($transportId);

    public function deleteTransportation($transportId);
}
