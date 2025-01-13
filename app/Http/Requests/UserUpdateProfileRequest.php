<?php

namespace App\Http\Requests;

use App\DataTransferObjects\User\UserProfileDTO;
use Illuminate\Validation\Rule;

class UserUpdateProfileRequest extends BaseRequest
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
            'email' => ['required', 'string', 'email', Rule::unique('users', 'email')->ignore(auth()->id())],
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
        ];
    }

    public function toUserProfileDTO(): UserProfileDTO
    {
        return new UserProfileDTO(
            name: $this->name,
            email: $this->email,
        );
    }
}
