<?php

namespace App\Services;

use App\DataTransferObjects\CertificateDTO;
use App\Http\Resources\CertificateDetailResource;
use App\Http\Resources\CertificateResource;
use App\Models\Certificate;

class CertificateService
{
    public function index()
    {
        $certificates = Certificate::all();

        return CertificateResource::collection($certificates);
    }

    public function show($id)
    {
        $certificate = Certificate::findOrFail($id);

        return CertificateResource::make($certificate);
    }

    public function showDetail($id)
    {
        $certificate = Certificate::with('participant', 'course')->findOrFail($id);

        return CertificateDetailResource::make($certificate);
    }

    public function store(CertificateDTO $dto): void
    {
        $certificate = Certificate::create([
            'participant_id' => $dto->participant_id,
            'type_participant_id' => $dto->type_participant_id,
            'course_id' => $dto->course_id,
            'certificate_template_id' => $dto->certificate_template_id,
            'issue_date' => $dto->issue_date,
            'status' => $dto->status,
            'certificate_url' => $dto->certificate_url,
            'qr_code' => $dto->qr_code,
        ]);
    }

    public function update(CertificateDTO $dto, $id): void
    {
        $certificate = Certificate::findOrFail($id);
        $certificate->update($dto->toArray());
    }

    public function destroy($id): void
    {
        $certificate = Certificate::findOrFail($id);
        $certificate->delete();
    }

    private function createCertificate($id): void
    {
        $certificate = Certificate::findOrFail($id);
        $certificate->update(['status' => 'CREATED']);
    }

    private function generateCertificate($id): void
    {
        $certificate = Certificate::findOrFail($id);
        $certificate->update(['status' => 'GENERATED']);
    }
}
