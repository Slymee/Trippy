<?php

namespace App\Repositories\Interfaces\Accommodation;

interface AccommodationCreateUpdateRepositoryInterface{

    public function createAccommodation(array $data);

    public function updateAccommodation(array $data, $accommodationId);
}
