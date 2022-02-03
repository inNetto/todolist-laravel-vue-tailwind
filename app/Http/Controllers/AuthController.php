<?php

namespace App\Http\Controllers;

use App\Exceptions\LoginInvalidException;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Resources\UserResource;
use App\Services\AuthService;

class AuthController extends Controller
{
    private $authService;

    /**
     * AuthController constructor.
     * @param $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * @param AuthLoginRequest $request
     * @return UserResource
     */
    public function login(AuthLoginRequest $request) {

        $input = $request->validated();

        $token = $this->authService->login($input['email'], $input['password']);

        return (new UserResource(auth()->user()))->additional($token);
    }
}
