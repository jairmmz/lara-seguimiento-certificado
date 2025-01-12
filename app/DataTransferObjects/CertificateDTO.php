<?php

namespace App\DataTransferObjects;

use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Data;

class CertificateDTO extends Data
{
    public function __construct(
        public readonly int $registration_id,
        public ?UploadedFile $certificate_file,
    ) {}
}
