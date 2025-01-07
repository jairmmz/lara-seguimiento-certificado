<?php

namespace App\Http\Requests;

use App\DataTransferObjects\CourseDTO;

class CourseUpdateRequest extends BaseRequest
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
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:100'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre del curso es requerido',
            'name.string' => 'El nombre del curso debe ser un texto',
            'name.max' => 'El nombre del curso no debe exceder los 255 caracteres',
            'description.string' => 'La descripción del curso debe ser un texto',
            'description.max' => 'La descripción del curso no debe exceder los 100 caracteres',
            'start_date.required' => 'La fecha de inicio del curso es requerida',
            'start_date.date' => 'La fecha de inicio del curso debe ser una fecha',
            'end_date.required' => 'La fecha de fin del curso es requerida',
            'end_date.date' => 'La fecha de fin del curso debe ser una fecha',
        ];
    }

    public function toCourseDTO(): CourseDTO
    {
        return new CourseDTO(
            name: $this->input('name'),
            description: $this->input('description'),
            start_date: $this->input('start_date'),
            end_date: $this->input('end_date'),
        );
    }
}
