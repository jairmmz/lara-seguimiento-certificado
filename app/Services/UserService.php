<?php

namespace App\Services;

use App\DataTransferObjects\User\UserDTO;
use App\DataTransferObjects\User\UserPasswordDTO;
use App\DataTransferObjects\User\UserProfileDTO;
use App\Enums\RoleEnum;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function index(): AnonymousResourceCollection
    {
        return UserResource::collection(User::all());
    }

    public function register(UserDTO $userDTO): void
    {
        User::create([
            'name' => $userDTO->name,
            'email' => $userDTO->email,
            'password' => bcrypt($userDTO->password),
            'role' => $userDTO->role,
            'is_active' => $userDTO->is_active,
        ]);
    }

    public function show(int $id): UserResource
    {
        return UserResource::make(User::findOrFail($id));
    }

    public function updateProfile(UserProfileDTO $userDTO)
    {
        $user = Auth::user();

        $user->name = $userDTO->name;
        $user->email = $userDTO->email;

        $user->save();

        return UserResource::make($user);
    }

    public function updatePassword(UserPasswordDTO $userDTO)
    {
        $user = Auth::user();

        $user->password = Hash::make($userDTO->password);
        $user->save();

        return UserResource::make($user);
    }

    public function destroy(int $id): void
    {
        User::findOrFail($id)->delete();
    }
}
