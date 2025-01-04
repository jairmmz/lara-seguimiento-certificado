<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;

class TypeParticipantDTO extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly string $description,
    ) { }
}
