<?php

namespace App\Repositories\Interfaces\Transport;

interface TransportReadDeleteRepositoryInterface{

    public function getAllTransportation($iteneraryId);

    public function getTransportation($transportId);

    public function deleteTransportation($transportId);
}