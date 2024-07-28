<?php

namespace App\Repositories\Interfaces\Accommodation;

interface AccomodationReadDeleteRepositoryInterface{

    public function getAllAccomodation($iteneraryId);

    public function getAccomodation($acccomodationId);

    public function deleteAccomodation($acccomodationId);
}
