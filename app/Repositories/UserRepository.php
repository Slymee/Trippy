<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getUserData(string $userId)
    {
        return User::where('id', $userId)
                    ->select(['id', 'name', 'username', 'email', 'contact', 'bio', 'address'])
                    ->get();
    }
}