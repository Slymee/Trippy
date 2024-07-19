<?php

namespace App\Repositories\Interfaces\Itenerary;

interface IteneraryReadDeleteRepoInterface{

    public function getAllItenerary($destinationId);

    public function getItenerary($iteneraryId);

    public function deleteItenerary($iteneraryId);
}