<?php

namespace App\Http\Requests;

use App\DataTransferObjects\User\UserDTO;

class UserRegisterRequest extends BaseRequest
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
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', 'string', 'in:admin,user'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre es obligatorio',
            'name.string' => 'El campo nombre debe ser un texto',
            'email.required' => 'El campo email es obligatorio',
            'email.string' => 'El campo email debe ser un texto',
            'email.email' => 'El campo email debe ser un correo electrónico',
            'email.unique' => 'El campo email ya se encuentra registrado',
            'password.required' => 'El campo contraseña es obligatorio',
            'password.string' => 'El campo contraseña debe ser un texto',
            'password.min' => 'El campo contraseña debe tener al menos 8 caracteres',
            'role.required' => 'El campo rol es obligatorio',
            'role.string' => 'El campo rol debe ser un texto',
            'role.in' => 'El campo rol debe ser admin o user',
        ];
    }

    public function toLoginDTO(): UserDTO
    {
        return new UserDTO(
            name: $this->name,
            email: $this->email,
            password: $this->password,
            role: $this->role_id,
            is_active: $this->is_active,
        );
    }
}
