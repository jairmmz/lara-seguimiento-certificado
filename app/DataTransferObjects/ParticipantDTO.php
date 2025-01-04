<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;

class ParticipantDTO extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly string $first_name,
        public readonly string $last_name,
        public readonly string $identification,
        public readonly string $email,
        public readonly string $phone,
    ) { }
}
