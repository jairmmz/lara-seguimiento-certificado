<?php

namespace App\DataTransferObjects;

use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Data;

class CertificateTemplateDTO extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly UploadedFile $template_file,
    ) { }
}
