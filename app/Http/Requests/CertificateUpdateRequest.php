<?php

namespace App\Http\Requests;

use App\DataTransferObjects\CertificateDTO;

class CertificateUpdateRequest extends BaseRequest
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
            'registration_id' => 'required|exists:registrations,id',
            'certificate_file' => 'required|file|mimes:pdf',
        ];
    }

    public function messages(): array
    {
        return [
            'registration_id.required' => 'El campo registro es obligatorio',
            'registration_id.exists' => 'El registro seleccionado no existe',
            'certificate_file.required' => 'El campo archivo de certificado es obligatorio',
            'certificate_file.file' => 'El archivo de certificado debe ser un archivo',
            'certificate_file.mimes' => 'El archivo de certificado debe ser un archivo de tipo: pdf',
        ];
    }

    public function toCertificateDTO(): CertificateDTO
    {
        return new CertificateDTO(
            registration_id: $this->input('registration_id'),
            certificate_file: $this->file('certificate_file'),
        );
    }
}
