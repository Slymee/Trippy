<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Log;

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

    public function update(UserRegisterRequest $request, $userId)
    {
        try{
            if(!$this->userRepository->getUserData($userId)){
                return apiResponse(null, 'User not Found.', false, 404);
            }

            $userData = $this->userRepository->updateUserData($userId, $request->validated());

            return apiResponse($userData, 'Successfully Updated.', true, 200);
        }catch (\Exception $e){
            Log::error('Caught Exception: '. $e->getMessage());
            Log::error('Exception Details: '. $e);

            return apiResponse(null, $e->getMessage(), false, 500);
        }
    }
}
