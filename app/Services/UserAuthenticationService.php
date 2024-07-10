<?php

namespace App\Services;

class UserAuthenticationService
{
    public function credentials(array $credentials): array
    {
        if(filter_var($credentials['identifier'], FILTER_VALIDATE_EMAIL)) {
            return ['email' => $credentials['identifier'], 'password' => $credentials['password']];
        }
        return ['username' => $credentials['identifier'], 'password' => $credentials['password']];
    }

    public function getAccessToken($user)
    {
        return $user->createToken('auth_token', ['expires_in' => 3600])->plainTextToken;
    }
}
