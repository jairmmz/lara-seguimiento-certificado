<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;

class RegistrationDTO extends Data
{
    public function __construct(
        public readonly int $course_id,
        public readonly array $participants,
    ) { }
}
