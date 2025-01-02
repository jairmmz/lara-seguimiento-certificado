<?php

namespace App\Services;

use App\DataTransferObjects\User\UserDTO;
use App\Enums\RoleEnum;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserService
{
    public function index(): AnonymousResourceCollection
    {
        return UserResource::collection(User::all());
    }

    public function register(UserDTO $userDTO): UserResource
    {
        $user = User::create([
            'name' => $userDTO->name,
            'email' => $userDTO->email,
            'password' => bcrypt($userDTO->password),
            'role' => RoleEnum::Admin->value,
            'is_active' => $userDTO->is_active,
        ]);

        return UserResource::make($user);
    }

    public function show(int $id): UserResource
    {
        return UserResource::make(User::findOrFail($id));
    }

    public function update(UserDTO $userDTO, int $id): UserResource
    {
        $user = User::findOrFail($id);

        $user->update([
            'name' => $userDTO->name,
            'email' => $userDTO->email,
            'password' => bcrypt($userDTO->password),
            'role' => RoleEnum::Admin->value,
            'is_active' => $userDTO->is_active,
        ]);

        return UserResource::make($user);
    }

    public function destroy(int $id): void
    {
        User::findOrFail($id)->delete();
    }
}
