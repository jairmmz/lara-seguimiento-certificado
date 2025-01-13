<?php

namespace App\DataTransferObjects\User;

use Spatie\LaravelData\Data;

class UserPasswordDTO extends Data
{
    public function __construct(
        public readonly string $current_password,
        public readonly string $password,
        public readonly string $password_confirmation,
    ) {}
}
