<?php

namespace App\Repositories\Interfaces;

interface TripItenerariesCreateRepositoryInterface{
    public function tripCreate(array $data, $userId);

    public function destinationCreate(array $data, $tripId);

    public function iteneraryCreate(array $data, $destinationId);

    public function accomodationCreate(array $data, $iteneraryId);

    public function transportationCreate(array $data, $iteneraryId);
}