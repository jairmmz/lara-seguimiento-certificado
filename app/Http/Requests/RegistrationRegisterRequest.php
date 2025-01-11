<?php

namespace App\Http\Requests;

use App\DataTransferObjects\RegistrationDTO;

class RegistrationRegisterRequest extends BaseRequest
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
            'participant_id' => 'required|exists:participants,id',
            'type_participant_id' => 'required|exists:type_participants,id',
        ];
    }

    public function messages(): array
    {
        return [
            'participant_id.required' => 'El campo participante es obligatorio.',
            'participant_id.exists' => 'El participante seleccionado no existe.',
            'pype_participant_id.required' => 'El campo tipo de participante es obligatorio.',
            'pype_participant_id.exists' => 'El tipo de participante seleccionado no existe.',
        ];
    }

    public function toRegistrationDTO(): RegistrationDTO
    {
        return new RegistrationDTO(
            participant_id: $this->participant_id,
            type_participant_id: $this->type_participant_id,
        );
    }
}
