<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ParticipantRegisterRequest;
use App\Services\ParticipantService;
use Illuminate\Http\JsonResponse;

class ParticipantController extends Controller
{
    public function __construct(
        private ParticipantService $participantService
    ) { }

    public function index(): JsonResponse
    {
        try {
            $participants = $this->participantService->index();

            return $this->success('Participantes obtenidos con éxito', $participants);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function show($id): JsonResponse
    {
        try {
            $participant = $this->participantService->show($id);

            return $this->success('Participante obtenido con éxito', $participant);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function showDetail($id): JsonResponse
    {
        try {
            $participant = $this->participantService->showDetail($id);

            return $this->success('Participante obtenido con éxito', $participant);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function store(ParticipantRegisterRequest $request): JsonResponse
    {
        try {
            $participant = $this->participantService->store($request->toParticipantDTO());

            return $this->success('Participante registrado con éxito', $participant);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function update(ParticipantRegisterRequest $request, $id): JsonResponse
    {
        try {
            $participant = $this->participantService->update($request->toParticipantDTO(), $id);

            return $this->success('Participante actualizado con éxito', $participant);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            $this->participantService->destroy($id);

            return $this->success('Participante eliminado con éxito');
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }
}
