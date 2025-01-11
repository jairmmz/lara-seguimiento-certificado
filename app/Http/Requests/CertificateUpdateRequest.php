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
            'certificate_file' => 'required|file|mimes:pdf|',
            'status' => 'required|in:pendiente,aprobado,rechazado',
            'qr_code' => 'nullable|file|mimes:png',
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
            'status.required' => 'El campo estado es obligatorio',
            'status.in' => 'El campo estado debe ser uno de los siguientes valores: pendiente, aprobado, rechazado',
            'qr_code.file' => 'El archivo de código QR debe ser un archivo',
            'qr_code.mimes' => 'El archivo de código QR debe ser un archivo de tipo: png',
        ];
    }

    public function toCertificateDTO(): CertificateDTO
    {
        return new CertificateDTO(
            registration_id: $this->input('registration_id'),
            certificate_file: $this->file('certificate_file'),
            status: $this->input('status'),
            qr_code: $this->file('qr_code'),
        );
    }
}
