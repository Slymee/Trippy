<?php

namespace App\Repositories;

use App\Models\Address;
use App\Models\User;
use App\Repositories\Interfaces\UserAuthenticationRepositoryInterface;

class UserAuthenticationRepository implements UserAuthenticationRepositoryInterface
{
    public function userCreate(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'contact' => $data['contact'],
            'bio' => $data['bio'],
        ]);
    }

    public function addressCreate(int $userId, array $data)
    {
        return Address::create([
            'user_id' => $userId,
            'street_name' => $data['street_name'],
            'city_name' => $data['city_name'],
            'state_province' => $data['state_province'],
            'postal_code' => $data['postal_code'],
            'country_name' => $data['country_name'],
        ]);
    }
}
