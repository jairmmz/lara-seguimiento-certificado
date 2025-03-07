<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRegisterRequest;
use App\Imports\RegistrationsImport;
use App\Services\RegistrationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RegistrationController extends Controller
{
    public function __construct(
        private RegistrationService $registrationService
    ) {}

    public function index(): JsonResponse
    {
        try {
            $registrations = $this->registrationService->index();

            return $this->success('Inscripciones obtenidos con éxito', $registrations);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function coursesParticipantsNotRegistrations($id): JsonResponse
    {
        try {
            $registrations = $this->registrationService->coursesParticipantsNotRegistrations($id);

            return $this->success('Cursos obtenidos con éxito', $registrations);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function getParticipantsByCourse($id): JsonResponse
    {
        try {
            $registrations = $this->registrationService->getParticipantsByCourse($id);

            return $this->success('Cursos obtenidos con éxito', $registrations);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function store(RegistrationRegisterRequest $request, $id): JsonResponse
    {
        try {
            $this->registrationService->store($request->toRegistrationDTO(), $id);

            return $this->success('Certificado registrado con éxito', null, 201);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            $this->registrationService->destroy($id);

            return $this->success('Certificado eliminado con éxito');
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function importCsvParticipants(Request $request, int $courseId)
    {
        try {
            $request->validate([
                'file' => 'required|file|mimes:csv,txt'
            ]);
            Excel::import(new RegistrationsImport($courseId), $request->file('file'));

            return $this->success('Participantes importados con éxito');
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }
}
