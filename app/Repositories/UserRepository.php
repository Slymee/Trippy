<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Exception;

class UserRepository implements UserRepositoryInterface
{
    public function getUserData(string $userId)
    {
        return User::where('id', $userId)
                    ->select(['id', 'name', 'username', 'email', 'contact', 'bio', 'address'])
                    ->get();
    }

    public function updateUserData(string $userId, array $data)
    {
        $user = User::find($userId);

        return $user->update($data);
    }

    public function searchUsername(string $searchTerm)
    {
        return User::where('username', 'ILIKE', "%{$searchTerm}%")
                    ->pluck('username', 'id');
    }
}
