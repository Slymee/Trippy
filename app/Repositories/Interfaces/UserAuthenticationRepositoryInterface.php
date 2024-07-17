<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface UserAuthenticationRepositoryInterface {
    public function userCreate(array $data);

    public function addressCreate(int $userId, array $data);
}
