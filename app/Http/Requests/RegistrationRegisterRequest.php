<?php

namespace App\Http\Requests;

use App\DataTransferObjects\ParticipantRegistrationDTO;
use App\DataTransferObjects\RegistrationDTO;

class RegistrationRegisterRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'course_id' => 'required|exists:courses,id',
            'participants' => 'required|array',
            'participants.*.participant_id' => 'required|exists:participants,id',
            'participants.*.type_participant_id' => 'required|exists:type_participants,id',
        ];
    }

    public function messages(): array
    {
        return [
            'course_id.required' => 'El campo curso es obligatorio.',
            'course_id.exists' => 'El curso seleccionado no existe.',
            'participants.required' => 'El campo participantes es obligatorio.',
            'participants.array' => 'El campo participantes debe ser un arreglo.',
            'participants.*.participant_id.required' => 'El campo participante es obligatorio.',
            'participants.*.participant_id.exists' => 'El participante seleccionado no existe.',
            'participants.*.type_participant_id.required' => 'El campo tipo de participante es obligatorio.',
            'participants.*.type_participant_id.exists' => 'El tipo de participante seleccionado no existe.',
        ];
    }

    public function toRegistrationDTO(): RegistrationDTO
    {
        $participants = collect($this->input('participants'))
            ->map(function ($participant) {
                return new ParticipantRegistrationDTO(
                    participant_id: $participant['participant_id'],
                    type_participant_id: $participant['type_participant_id'],
                );
            })->toArray();

        return new RegistrationDTO(
            course_id: $this->input('course_id'),
            participants: $participants,
        );
    }
}
