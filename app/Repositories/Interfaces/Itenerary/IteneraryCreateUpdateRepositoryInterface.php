<?php

namespace App\Repositories\Interfaces\Itenerary;

interface IteneraryCreateUpdateRepositoryInterface{
        
    public function createItenerary(array $data);

    public function updateItenerary(array $data, $iteneraryId);
}