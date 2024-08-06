<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Repositories\Interfaces\UserAuthenticationRepositoryInterface;
use App\Services\UserAuthenticationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use function App\Helpers\apiResponse;

class UserAuthController extends Controller
{
    protected $userAuthenticationRepository, $userAuthenticationService;
    public function __construct(UserAuthenticationRepositoryInterface $userAuthenticationRepository, UserAuthenticationService $userAuthenticationService)
    {
        $this->userAuthenticationRepository = $userAuthenticationRepository;
        $this->userAuthenticationService = $userAuthenticationService;
    }
    public function register(UserRegisterRequest $request): JsonResponse
    {
        try {
            $user = $this->userAuthenticationRepository->userCreate($request->validated());

            $this->userAuthenticationRepository->addressCreate($user->id, $request->validated());

            return apiResponse($user->load('address'), 'User registered successfully', true, 201);
        }catch (\Exception $e){
            Log::error('Caught Exception: '. $e->getMessage());
            Log::error('Exception Details: '. $e);
            return apiResponse(null, $e->getMessage(), false, 500);
        }
    }

    public function login(UserLoginRequest $request): JsonResponse
    {
        try {
            $credentials = $this->userAuthenticationService->credentials($request->validated());

            if (!Auth::attempt($credentials)) {
                return apiResponse(null, 'Invalid credentials', false, 401);
            }

            $user = Auth::user();

            $accessToken = $this->userAuthenticationService->getAccessToken($user);

            return apiResponse([
                'access_token' => $accessToken,
                'token_type' => 'Bearer',
                'expires_in' => 3600 * 48,
            ], 'Login successful', true, 200);

        }catch (\Exception $e){
            Log::error('Caught Exception: '. $e->getMessage());
            Log::error('Exception Details: '. $e);
            return apiResponse(null, $e->getMessage(), false, 500);
        }
    }
}
