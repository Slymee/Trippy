<?php

namespace App\Repositories\Interfaces\Itenerary;

interface IteneraryReadDeleteRepositoryInterface{

    public function getAllItenerary($destinationId);

    public function getItenerary($iteneraryId);

    public function deleteItenerary($iteneraryId);
}