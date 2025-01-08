<?php

namespace App\Http\Requests;

use App\DataTransferObjects\CertificateTemplateDTO;

class CertificateTemplateRegisterRequest extends BaseRequest
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
            'name' => 'required|string',
            'template_file' => 'required|file|mimes:pdf',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe ser una cadena de texto',
            'template_file.required' => 'El archivo de plantilla es requerido',
            'template_file.file' => 'El archivo de plantilla debe ser un archivo',
            'template_file.mimes' => 'El archivo de plantilla debe ser de tipo PDF',
        ];
    }

    public function toCertificateTemplateDTO(): CertificateTemplateDTO
    {
        return new CertificateTemplateDTO(
            name: $this->input('name'),
            template_file: $this->file('template_file'),
        );
    }
}
