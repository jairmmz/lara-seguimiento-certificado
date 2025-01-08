<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;

class CertificateDTO extends Data
{
    public function __construct(
        public readonly string $participant_id,
        public readonly string $type_participant_id,
        public readonly string $course_id,
        public readonly string $certificate_template_id,
        public readonly string $issue_date,
        public readonly string $status,
        public ?string $certificate_url = null,
        public ?string $qr_code = null,
    ) { }
}
