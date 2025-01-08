<?php

namespace App\Services;

use App\DataTransferObjects\CertificateTemplateDTO;
use App\Http\Resources\CertificateTemplateDetailResource;
use App\Http\Resources\CertificateTemplateResource;
use App\Models\CertificateTemplate;
use Illuminate\Support\Facades\Storage;

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
        $certificateTemplate = [
            'name' => $dto->name,
            'template_file' => Storage::disk('certificate_templates')->put('/', $dto->template_file)
        ];

        CertificateTemplate::create($certificateTemplate);
    }

    public function update(CertificateTemplateDTO $dto, $id): void
    {
        $certificateTemplate = CertificateTemplate::findOrFail($id);
        $certificateTemplate->name = $dto->name;

        if ($dto->template_file) {
            Storage::disk('certificates')->delete($certificateTemplate->template_file);
            $certificateTemplate->template_file = Storage::disk('certificates')->put('/', $dto->template_file);
        }

        $certificateTemplate->save();
    }

    public function destroy($id): void
    {
        $certificateTemplate = CertificateTemplate::findOrFail($id);
        $certificateTemplate->delete();
    }
}
