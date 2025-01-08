<?php

namespace App\Services;

use App\DataTransferObjects\CertificateTemplateDTO;
use App\Http\Resources\CertificateTemplateDetailResource;
use App\Http\Resources\CertificateTemplateResource;
use App\Models\CertificateTemplate;

class CertificateTemplateService
{
    public function index()
    {
        $certificateTemplates = CertificateTemplate::all();

        return CertificateTemplateResource::collection($certificateTemplates);
    }

    public function show($id)
    {
        $certificateTemplate = CertificateTemplate::findOrFail($id);

        return CertificateTemplateResource::make($certificateTemplate);
    }

    public function showDetail($id)
    {
        $certificateTemplate = CertificateTemplate::with('participant', 'course')->findOrFail($id);

        return CertificateTemplateDetailResource::make($certificateTemplate);
    }

    public function store(CertificateTemplateDTO $dto): void
    {
        $certificateTemplate = CertificateTemplate::create([
            'name' => $dto->name,
            'template_file' => $dto->template_file,
        ]);
    }

    public function update(CertificateTemplateDTO $dto, $id): void
    {
        $certificateTemplate = CertificateTemplate::findOrFail($id);
        $certificateTemplate->update($dto->toArray());
    }

    public function destroy($id): void
    {
        $certificateTemplate = CertificateTemplate::findOrFail($id);
        $certificateTemplate->delete();
    }

    public function uploadFile($file)
    {
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $fileName);

        return $fileName;
    }
}
