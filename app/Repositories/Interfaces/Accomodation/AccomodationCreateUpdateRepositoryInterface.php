<?php

namespace App\Repositories\Interfaces\Accomodation;

interface AccomodationCreateUpdateRepositoryInterface{

    public function createAccomodation(array $data);

    public function updateAccomodation(array $data, $accomodationId);
}