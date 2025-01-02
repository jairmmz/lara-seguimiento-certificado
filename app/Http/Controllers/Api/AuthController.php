<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function __construct(
        private AuthService $authService
    ) { }

    public function login(UserLoginRequest $request): JsonResponse
    {
        try {
            $user = $this->authService->login($request->toLoginDTO());

            if (is_null($user)) {
                return $this->unauthorized();
            }

            return $this->success('Usuario autenticado con éxito', $user);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function profile(): JsonResponse
    {
        try {
            $user = $this->authService->profile();

            if (is_null($user)) {
                return $this->unauthorized();
            }

            return $this->success('Usuario obtenido con éxito', $user);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function logout(): JsonResponse
    {
        try {
            $this->authService->logout();

            return $this->success('Usuario deslogueado con éxito');
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }
}
