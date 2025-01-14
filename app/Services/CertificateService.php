<?php

namespace App\Services;

use App\DataTransferObjects\CertificateDTO;
use App\Enums\CertificateEnum;
use App\Http\Resources\CertificateResource;
use App\Models\Certificate;
use App\Models\Registration;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use function PHPUnit\Framework\isEmpty;

class CertificateService
{
    public function index()
    {
        return CertificateResource::collection(Certificate::all());
    }

    public function show($id)
    {
        $certificate = Certificate::where('registration_id', $id)->first();
        if (!$certificate) {
            return null;
        }

        return CertificateResource::make($certificate);
    }

    public function store(CertificateDTO $certificateDTO): void
    {
        $certificate = [
            'registration_id' => $certificateDTO->registration_id,
            'certificate_file' => Storage::disk('certificates')->put('/', $certificateDTO->certificate_file),
            'status' => CertificateEnum::Approved->value,
            'qr_code' => Str::uuid(),
        ];

        Certificate::create($certificate);
    }

    public function update(CertificateDTO $certificateDTO, $certificateId): void
    {
        $certificate = Certificate::findOrFail($certificateId);
        if (Storage::disk('certificates')->exists($certificate->certificate_file)) {
            Storage::disk('certificates')->delete($certificate->certificate_file);
        }
        $certificate->certificate_file = Storage::disk('certificates')->put('/', $certificateDTO->certificate_file);

        $certificate->save();
    }

    public function destroy($id): void
    {
        $certificate = Certificate::findOrFail($id);
        if (Storage::disk('certificates')->exists($certificate->certificate_file)) {
            Storage::disk('certificates')->delete($certificate->certificate_file);
        }

        $certificate->delete();
    }
}
