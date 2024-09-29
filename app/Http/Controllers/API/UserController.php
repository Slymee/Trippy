<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

use function App\Helpers\apiResponse;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(string $userId)
    {
        try{
            if(auth()->id() == $userId){
                $userData = $this->userRepository->getUserData($userId);

                return apiResponse($userData, 'User Found', true, 200);
            }

            return apiResponse(null, 'User not Found', false, 404);
        }catch (\Exception $e){
            Log::error('Caught Exception: '. $e->getMessage());
            Log::error('Exception Details: '. $e);

            return apiResponse(null, $e->getMessage(), false, 500);
        }
    }

    public function update(Request $request, $userId)
    {
        try{
            if(!$this->userRepository->getUserData($userId)){
                return apiResponse(null, 'User not Found.', false, 404);
            }

            // Validate the request data
            $validatedData = $request->validate($this->updateRules($userId));

            // Update the user data
            $userData = $this->userRepository->updateUserData($userId, $validatedData);

            return apiResponse($userData, 'Successfully Updated.', true, 200);
        }catch (\Exception $e){
            Log::error('Caught Exception: '. $e->getMessage());
            Log::error('Exception Details: '. $e);

            return apiResponse(null, $e->getMessage(), false, 500);
        }
    }



    protected function updateRules($userId)
    {
        return [
            'name' => ['sometimes', 'string', 'max:255', 'bail'],
            'username' => [
                'sometimes', 'string', 'max:255',
                Rule::unique('users')->ignore($userId), // Ignore current user's username
                'bail'
            ],
            'email' => [
                'sometimes', 'string', 'email', 'max:255',
                Rule::unique('users')->ignore($userId), // Ignore current user's email
                'bail'
            ],
            'password' => ['sometimes', 'string', 'min:5', 'confirmed', 'bail'],
            'contact' => [
                'sometimes', 'integer',
                Rule::unique('users')->ignore($userId), // Ignore current user's contact
                'bail'
            ],
            'address' => ['sometimes', 'string', 'max:255', 'bail'],
            'bio' => ['sometimes', 'string', 'bail'],
        ];
    }
}
