<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
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
            if(auth()->id == $userId){
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
}
