<?php

namespace App\Services;

use App\DataTransferObjects\User\UserLoginDTO;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function login(UserLoginDTO $dto)
    {
        $user = User::where('email', $dto->email)->first();

        if (!$user || !Hash::check($dto->password, $user->password)) {
            return null;
        }

        /** @var \App\Models\User */
        $token = $user->createToken('auth_token')->plainTextToken;

        return ['user' => $user, 'token' => $token];
    }

    public function profile()
    {
        return Auth::user();
    }

    public function logout(): void
    {
        Auth::user()->tokens()->delete();
    }
}