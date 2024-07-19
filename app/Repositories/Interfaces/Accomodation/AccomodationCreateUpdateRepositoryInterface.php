<?php

namespace App\Repositories\Interfaces\Accomodation;

interface AccomodationCreateUpdateRepository{

    public function createAccomodation(array $data);

    public function updateAccomodation(array $data, $accomodationId);
}