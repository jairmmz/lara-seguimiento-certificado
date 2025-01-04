<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;

class EnrollmentDTO extends Data
{
    public function __construct(
        public readonly string $participant_id,
        public readonly string $type_participant_id,
        public readonly string $course_id,
        public readonly bool $status,
    ) { }
}
