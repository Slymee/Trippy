<?php

    namespace App\Http\Controllers\API;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\UserRegisterRequest;
    use App\Repositories\Interfaces\UserRegistrationRepositoryInterface;
    use Illuminate\Http\JsonResponse;

    class UserController extends Controller
    {
        protected $userRegistrationRepository;
        public function __construct(UserRegistrationRepositoryInterface $userRegistrationRepository)
        {
            $this->userRegistrationRepository = $userRegistrationRepository;
        }
        public function register(UserRegisterRequest $request): JsonResponse
        {
            try {
                $user = $this->userRegistrationRepository->userCreate($request->validated());

                $address = $this->userRegistrationRepository->addressCreate($user->id, $request->validated());

                $user->address()->save($address);

                return \App\Helpers\apiResponse($user->load('address'), 'User registered successfully', true, 201);
            }catch (\Exception $e){
                return \App\Helpers\apiResponse(null, $e->getMessage(), false, 500);
            }
        }
    }
