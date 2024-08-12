<?php

namespace App\Repositories\Interfaces;

interface UserAuthenticationRepositoryInterface {
    public function userCreate(array $data);

    // public function addressCreate(int $userId, array $data);
}
