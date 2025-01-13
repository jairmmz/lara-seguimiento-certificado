<?php

namespace App\DataTransferObjects\User;

use Spatie\LaravelData\Data;

class UserProfileDTO extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
    ) { }
}
