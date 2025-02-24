<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\RegistrationService;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct(
        private RegistrationService $registrationService
    ) {}

    public function index()
    {
        try {
            $numberParticipantsByCourse = $this->registrationService->getNumberParticipantsByCourse();

            return $this->success('Inscripciones obtenidos con éxito', $numberParticipantsByCourse);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }
}
