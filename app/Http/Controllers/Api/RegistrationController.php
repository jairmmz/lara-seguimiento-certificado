<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRegisterRequest;
use App\Http\Requests\RegistrationUpdateRequest;
use App\Services\RegistrationService;
use Illuminate\Http\JsonResponse;

class RegistrationController extends Controller
{
    public function __construct(
        private RegistrationService $registrationService
    ) { }

    public function index(): JsonResponse
    {
        try {
            $registrations = $this->registrationService->index();

            return $this->success('Inscripciones obtenidos con éxito', $registrations);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function coursesParticipantsNotRegistrations(): JsonResponse
    {
        try {
            $registrations = $this->registrationService->coursesParticipantsNotRegistrations();

            return $this->success('Cursos obtenidos con éxito', $registrations);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function show($id): JsonResponse
    {
        try {
            $registration = $this->registrationService->show($id);

            return $this->success('Certificado obtenido con éxito', $registration);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function showDetail($id): JsonResponse
    {
        try {
            $registration = $this->registrationService->showDetail($id);

            return $this->success('Certificado obtenido con éxito', $registration);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function store(RegistrationRegisterRequest $request): JsonResponse
    {
        try {
            $this->registrationService->store($request->toRegistrationDTO());

            return $this->success('Certificado registrado con éxito', null, 201);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function update(RegistrationUpdateRequest $request, $id): JsonResponse
    {
        try {
            $this->registrationService->update($request->toRegistrationDTO(), $id);

            return $this->success('Certificado actualizado con éxito');
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
}
