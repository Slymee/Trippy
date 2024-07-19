<?php

namespace App\Repositories\Interfaces\Transport;

interface TransportReadDeleteRepoInterface{

    public function getAllTransportation($iteneraryId);

    public function getTransportation($transportId);

    public function deleteTransportation($transportId);
}