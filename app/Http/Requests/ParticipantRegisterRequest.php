<?php

namespace App\Http\Requests;

use App\DataTransferObjects\ParticipantDTO;

class ParticipantRegisterRequest extends BaseRequest
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
            'name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'identification' => 'required|string|max:20|unique:participants,identification',
            'email' => 'nullable|string|email|max:50|unique:participants,email',
            'phone' => 'nullable|string|max:20|unique:participants,phone',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre es obligatorio',
            'name.string' => 'El campo nombre debe ser un texto',
            'name.max' => 'El campo nombre debe tener máximo 100 caracteres',
            'last_name.required' => 'El campo primer apellido es obligatorio',
            'last_name.string' => 'El campo primer apellido debe ser un texto',
            'last_name.max' => 'El campo primer apellido debe tener máximo 100 caracteres',
            'identification.required' => 'El campo identificación es obligatorio',
            'identification.string' => 'El campo identificación debe ser un texto',
            'identification.max' => 'El campo identificación debe tener máximo 20 caracteres',
            'identification.unique' => 'El campo identificación ya está en uso',
            'email.string' => 'El correo electrónico debe ser un texto',
            'email.email' => 'El correo electrónico debe ser un correo electrónico',
            'email.max' => 'El correo electrónico debe tener máximo 50 caracteres',
            'email.unique' => 'El correo electrónico ya está en uso',
            'phone.string' => 'El campo teléfono debe ser un texto',
            'phone.max' => 'El campo teléfono debe tener máximo 20 caracteres',
            'phone.unique' => 'El campo teléfono ya está en uso',
        ];
    }

    public function toParticipantDTO(): ParticipantDTO
    {
        return new ParticipantDTO(
            name: $this->name,
            last_name: $this->last_name,
            identification: $this->identification,
            email: $this->email,
            phone: $this->phone
        );
    }
}
