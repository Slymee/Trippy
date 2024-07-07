<?php

    namespace App\Http\Controllers\API;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\UserRegisterRequest;
    use App\Repositories\Interfaces\UserRegistrationRepositoryInterface;
    use Illuminate\Http\JsonResponse;

    class UserRegisterController extends Controller
    {
        protected $userRegistrationRepository;
        public function __construct(UserRegistrationRepositoryInterface $userRegistrationRepository)
        {
            $this->userRegistrationRepository = $userRegistrationRepository;
        }
        public function register(UserRegisterRequest $request): JsonResponse
        {
            $user = $this->userRegistrationRepository->userCreate($request->validated());

            $address = $this->userRegistrationRepository->addressCreate($user->id, $request->validated());

            $user->address()->save($address);

            //return apiResponse($user->load('address'), 'User registered successfully', true, 201);
            return \App\Helpers\apiResponse($user->load('address'), 'User registered successfully', true, 201);
        }
    }
