<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CertificateTemplateRegisterRequest;
use App\Http\Requests\CertificateTemplateUpdateRequest;
use App\Services\CertificateTemplateService;
use Illuminate\Http\JsonResponse;

class CertificateTemplateController extends Controller
{
    public function __construct(
        private CertificateTemplateService $certificateTemplateService
    ) { }

    public function index(): JsonResponse
    {
        try {
            $certificateTemplates = $this->certificateTemplateService->index();

            return $this->success('Certificados obtenidos con éxito', $certificateTemplates);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function show($id): JsonResponse
    {
        try {
            $certificateTemplate = $this->certificateTemplateService->show($id);

            return $this->success('Certificado obtenido con éxito', $certificateTemplate);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function showDetail($id): JsonResponse
    {
        try {
            $certificateTemplate = $this->certificateTemplateService->showDetail($id);

            return $this->success('Certificado obtenido con éxito', $certificateTemplate);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function store(CertificateTemplateRegisterRequest $request): JsonResponse
    {
        try {
            $this->certificateTemplateService->store($request->toCertificateTemplateDTO());

            return $this->success('Certificado registrado con éxito', null, 201);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function update(CertificateTemplateUpdateRequest $request, $id): JsonResponse
    {
        try {
            $this->certificateTemplateService->update($request->toCertificateTemplateDTO(), $id);

            return $this->success('Certificado actualizado con éxito');
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            $this->certificateTemplateService->destroy($id);

            return $this->success('Certificado eliminado con éxito');
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }
}
