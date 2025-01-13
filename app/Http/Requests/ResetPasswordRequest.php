<?php

namespace App\Http\Requests;

class ResetPasswordRequest extends BaseRequest
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
            'email' => 'required|email|exists:users,email',
            'token' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'El campo correo electrónico es obligatorio',
            'email.email' => 'El campo correo electrónico debe ser una dirección de correo válida',
            'email.exists' => 'El correo electrónico no se encuentra registrado',
            'token.required' => 'El campo token es obligatorio',
            'token.string' => 'El campo token debe ser una cadena de texto',
            'password.required' => 'El campo contraseña es obligatorio',
            'password.string' => 'El campo contraseña debe ser una cadena de texto',
            'password.min' => 'El campo contraseña debe tener al menos 8 caracteres',
            'password.confirmed' => 'El campo contraseña no coincide con la confirmación',
        ];
    }

    public function email(): string
    {
        return $this->input('email');
    }

    public function token(): string
    {
        return $this->input('token');
    }

    public function password(): string
    {
        return $this->input('password');
    }
}
