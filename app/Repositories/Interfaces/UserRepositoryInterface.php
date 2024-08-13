<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function getUserData(string $userId);
}