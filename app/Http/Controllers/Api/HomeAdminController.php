<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\HomeAdminService;
use Illuminate\Http\JsonResponse;

class HomeAdminController extends Controller
{
    public function __construct(
        private HomeAdminService $homeAdminService
    ) { }

    public function index(): JsonResponse
    {
        try {
            $homeAdmins = $this->homeAdminService->index();

            return $this->success('Datos obtenidos con éxito', $homeAdmins);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function getParticipantsWithoutRegistration(): JsonResponse
    {
        try {
            $homeAdmins = $this->homeAdminService->getParticipantsWithoutRegistration();

            return $this->success('Datos obtenidos con éxito', $homeAdmins);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function getCoursesWithoutRegistrations(): JsonResponse
    {
        try {
            $homeAdmins = $this->homeAdminService->getCoursesWithoutRegistrations();

            return $this->success('Datos obtenidos con éxito', $homeAdmins);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function getRegistrationsWithoutCertificate(): JsonResponse
    {
        try {
            $homeAdmins = $this->homeAdminService->getRegistrationsWithoutCertificate();

            return $this->success('Datos obtenidos con éxito', $homeAdmins);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }
}
