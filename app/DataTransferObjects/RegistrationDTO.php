<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;

class RegistrationDTO extends Data
{
    public function __construct(
        public readonly int $participant_id,
        public readonly int $type_participant_id,
    ) { }
}
