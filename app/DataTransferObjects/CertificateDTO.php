<?php

namespace App\DataTransferObjects;

use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Data;

class CertificateDTO extends Data
{
    public function __construct(
        public readonly string $participant_id,
        public readonly string $type_participant_id,
        public readonly string $course_id,
        public readonly string $issue_date,
        public readonly string $status,
        public UploadedFile $certificate_file,
        public ?string $qr_code = null,
    ) { }
}
