<?php

namespace App\Http\Requests;

use App\DataTransferObjects\User\UserPasswordDTO;
use Illuminate\Support\Facades\Hash;

class UserUpdatePasswordRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'current_password' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, $this->user()->password)) {
                        $fail('La contraseña actual no es correcta.');
                    }
                },
            ],
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'current_password.required_with' => 'El campo contraseña actual es obligatorio',
            'current_password.string' => 'El campo contraseña actual debe ser una cadena de texto',
            'password.required' => 'El campo contraseña es obligatorio',
            'password.string' => 'El campo contraseña debe ser una cadena de texto',
            'password.min' => 'El campo contraseña debe tener al menos 8 caracteres',
            'password.confirmed' => 'El campo contraseña no coincide con la confirmación',
        ];
    }

    public function toUserPasswordDTO(): UserPasswordDTO
    {
        return new UserPasswordDTO(
            current_password: $this->input('current_password'),
            password: $this->input('password'),
            password_confirmation: $this->input('password_confirmation'),
        );
    }
}
