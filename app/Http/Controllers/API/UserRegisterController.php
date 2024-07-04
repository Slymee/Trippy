<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        if ($request->fails()){
            return apiResponse(null, 'Validation Failed', false, 400);
        }

        $validatedData = $request->validated();

        $user = User::create([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'bio' => $validatedData['bio'],
        ]);

        $address = Address::create([
            'street_name' => $validatedData['street_name'],
            'city_name' => $validatedData['city_name'],
            'state_province' => $validatedData['state_province'],
            'postal_code' => $validatedData['postal_code'],
            'country_name' => $validatedData['country_name'],
        ]);

        $user->address()->save($address);

        return apiResponse($user, 'User registered successfully', true, 201);
    }
}
