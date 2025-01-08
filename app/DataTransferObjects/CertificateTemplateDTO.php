<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;

class CertificateTemplateDTO extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly string $template_file,
    ) { }
}
