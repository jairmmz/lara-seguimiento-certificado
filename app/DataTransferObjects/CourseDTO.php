<?php

namespace App\DataTransferObjects;

use DateTime;
use Spatie\LaravelData\Data;

class CourseDTO extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly string $description,
        public readonly DateTime $start_date,
        public readonly DateTime $end_date,
    ) { }
}
