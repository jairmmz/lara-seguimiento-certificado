<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;

class CourseDTO extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly ?string $description = null,
        public readonly string $start_date,
        public readonly string $end_date,
    ) { }
}
