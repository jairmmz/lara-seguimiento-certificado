<?php

namespace App\Services;

use App\DataTransferObjects\User\UserDTO;
use App\DataTransferObjects\User\UserPasswordDTO;
use App\DataTransferObjects\User\UserProfileDTO;
use App\Http\Resources\UserResource;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Resend\Laravel\Facades\Resend;

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

    public function sendPasswordResetLink(string $email): void
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            throw new \Exception('Usuario no encontrado');
        }

        $token = Str::random(64);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $email],
            [
                'token' => Hash::make($token),
                'created_at' => Carbon::now(),
            ]
        );

        $url = config('app.frontend_url') . "/reset-password?token={$token}&email={$email}";

        Resend::emails()->send([
            'from' => 'Soporte <no-reply@resend.dev>',
            'to' => $email,
            'subject' => 'Restablecer contraseña - ' . config('app.name'),
            'html' => view('emails.password-reset', [
                'url' => $url,
            ])->render(),
        ]);
    }

    private function validatePasswordResetToken(string $email, string $token): bool
    {
        $resetRequest = DB::table('password_reset_tokens')
            ->where('email', $email)
            ->first();

        if (!$resetRequest) {
            throw new \Exception('Token o correo electrónico inválido');
        }

        if (Carbon::parse($resetRequest->created_at)->addMinutes(60)->isPast()) {
            throw new \Exception('El token ha expirado');
        }

        if (!Hash::check($token, $resetRequest->token)) {
            throw new \Exception('Token inválido');
        }

        return true;
    }

    public function resetPassword(string $email, string $token, string $newPassword): void
    {
        $this->validatePasswordResetToken($email, $token);

        $user = User::where('email', $email)->first();

        if (!$user) {
            throw new \Exception('Usuario no encontrado');
        }

        $user->password = Hash::make($newPassword);
        $user->save();

        DB::table('password_reset_tokens')->where('email', $email)->delete();
    }
}
