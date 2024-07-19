<?php

namespace App\Repositories\Interfaces\Itenerary;

interface IteneraryCreateUodateRepository{
        
    public function createItenerary(array $data);

    public function updateItenerary(array $data, $iteneraryId);
}