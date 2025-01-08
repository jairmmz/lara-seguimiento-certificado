<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CertificateRegisterRequest;
use App\Http\Requests\CertificateUpdateRequest;
use App\Services\CertificateService;
use Illuminate\Http\JsonResponse;

class CertificateController extends Controller
{
    public function __construct(
        private CertificateService $certificateService
    ) { }

    public function index(): JsonResponse
    {
        try {
            $certificates = $this->certificateService->index();

            return $this->success('Certificados obtenidos con éxito', $certificates);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function show($id): JsonResponse
    {
        try {
            $certificate = $this->certificateService->show($id);

            return $this->success('Certificado obtenido con éxito', $certificate);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function showDetail($id): JsonResponse
    {
        try {
            $certificate = $this->certificateService->showDetail($id);

            return $this->success('Certificado obtenido con éxito', $certificate);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function store(CertificateRegisterRequest $request): JsonResponse
    {
        try {
            $this->certificateService->store($request->toCertificateDTO());

            return $this->success('Certificado registrado con éxito', null, 201);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function update(CertificateUpdateRequest $request, $id): JsonResponse
    {
        try {
            $this->certificateService->update($request->toCertificateDTO(), $id);

            return $this->success('Certificado actualizado con éxito');
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            $this->certificateService->destroy($id);

            return $this->success('Certificado eliminado con éxito');
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }
}
