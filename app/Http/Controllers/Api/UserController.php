<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\SendPasswordResetRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserUpdatePasswordRequest;
use App\Http\Requests\UserUpdateProfileRequest;
use App\Http\Requests\ValidatePasswordResetTokenRequest;
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
            $this->userService->register($request->toUserDTO());

            return $this->success('Usuario registrado con éxito', null, 201);
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

    public function updateProfile(UserUpdateProfileRequest $request): JsonResponse
    {
        try {
            $user = $this->userService->updateProfile($request->toUserProfileDTO());

            return $this->success('Usuario actualizado con éxito', $user);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function updatePassword(UserUpdatePasswordRequest $request): JsonResponse
    {
        try {
            $user = $this->userService->updatePassword($request->toUserPasswordDTO());

            return $this->success('La contraseña ha sido actualizado con éxito', $user);
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

    public function sendPasswordResetLink(SendPasswordResetRequest $request): JsonResponse
    {
        try {
            $this->userService->sendPasswordResetLink($request->email());

            return $this->success('Se ha enviado un correo con el enlace para restablecer la contraseña, verifique su bandeja de entrada');
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function validatePasswordResetToken(ValidatePasswordResetTokenRequest $request): JsonResponse
    {
        try {
            $validate = $this->userService->validatePasswordResetToken($request->email(), $request->token());

            return $this->success('Token validado con éxito', $validate);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function resetPassword(ResetPasswordRequest $request): JsonResponse
    {
        try {
            $user = $this->userService->resetPassword($request->email(), $request->token(), $request->password());

            return $this->success('La contraseña ha sido actualizado con éxito', $user);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }
}
