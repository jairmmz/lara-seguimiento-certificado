<?php

namespace App\DataTransferObjects;

use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Data;

class CertificateDTO extends Data
{
    public function __construct(
        public readonly int $registration_id,
        public readonly string $status,
        public ?UploadedFile $certificate_file,
        public ?string $qr_code = null,
    ) {}
}
