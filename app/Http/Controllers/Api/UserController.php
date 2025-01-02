<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(
        private UserService $userService
    ) {}
    
    public function index(): JsonResponse
    {
        try {
            $users = $this->userService->index();

            return $this->success('Usuarios obtenidos con éxito', $users);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function register(UserRegisterRequest $request): JsonResponse
    {
        try {
            $user = $this->userService->register($request->toUserDTO());

            return $this->success('Usuario registrado con éxito', $user);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function show(int $id): JsonResponse
    {
        try {
            $user = $this->userService->show($id);

            return $this->success('Usuario obtenido con éxito', $user);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function update(UserRegisterRequest $request, int $id): JsonResponse
    {
        try {
            $user = $this->userService->update($request->toUserDTO(), $id);

            return $this->success('Usuario actualizado con éxito', $user);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $this->userService->destroy($id);

            return $this->success('Usuario eliminado con éxito');
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }
}
