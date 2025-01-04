<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;

class CertificateDTO extends Data
{
    public function __construct(
        public readonly string $participant_id,
        public readonly string $course_id,
        public readonly string $issue_date,
        public readonly string $certificate_url,
        public readonly bool $status,
    ) { }
}
