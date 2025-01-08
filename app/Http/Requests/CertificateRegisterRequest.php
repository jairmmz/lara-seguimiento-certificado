<?php

namespace App\Http\Requests;

use App\DataTransferObjects\CertificateDTO;

class CertificateRegisterRequest extends BaseRequest
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
            'participant_id' => 'required|exists:participants,id',
            'type_participant_id' => 'required|exists:type_participants,id',
            'course_id' => 'required|exists:courses,id',
            'certificate_template_id' => 'required|certificate_templates,id',
            'issue_date' => 'required|date',
            'status' => 'required|in:pendiente,completado,cancelado',
        ];
    }

    public function messages(): array
    {
        return [
            'participant_id.required' => 'El campo participante es obligatorio',
            'participant_id.exists' => 'El participante seleccionado no existe',
            'type_participant_id.required' => 'El campo tipo de participante es obligatorio',
            'type_participant_id.exists' => 'El tipo de participante seleccionado no existe',
            'course_id.required' => 'El campo curso es obligatorio',
            'course_id.exists' => 'El curso seleccionado no existe',
            'certificate_template_id.required' => 'El campo plantilla de certificado es obligatorio',
            'certificate_template_id.exists' => 'La plantilla de certificado seleccionada no existe',
            'issue_date.required' => 'El campo fecha de emisión es obligatorio',
            'issue_date.date' => 'El campo fecha de emisión debe ser una fecha',
            'status.required' => 'El campo estado es obligatorio',
            'status.in' => 'El campo estado debe ser pendiente, completado o cancelado',
        ];
    }

    public function toCertificateDTO(): CertificateDTO
    {
        return new CertificateDTO(
            participant_id: $this->input('participant_id'),
            type_participant_id: $this->input('type_participant_id'),
            course_id: $this->input('course_id'),
            certificate_template_id: $this->input('certificate_template_id'),
            issue_date: $this->input('issue_date'),
            status: $this->input('status'),
        );
    }
}
