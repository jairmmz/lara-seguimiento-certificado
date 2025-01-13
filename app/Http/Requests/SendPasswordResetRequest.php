<?php

namespace App\Http\Requests;

class SendPasswordResetRequest extends BaseRequest
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
            'email' => 'required|email|string|exists:users,email',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'El campo email es requerido.',
            'email.email' => 'El campo email debe ser un correo electrónico válido.',
            'email.exists' => 'El email ingresado no se encuentra registrado en el sistema.',
        ];
    }

    public function email(): string
    {
        return $this->input('email');
    }
}
