<?php

namespace App\DataTransferObjects\User;

use Spatie\LaravelData\Data;

class UserDTO extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
        public readonly array $role,
        public readonly bool $is_active,
    ) { }
}
