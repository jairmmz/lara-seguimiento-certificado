<?php

namespace App\DataTransferObjects\User;

use Spatie\LaravelData\Data;

class UserLoginDTO extends Data
{
    public function __construct(
        public readonly string $email,
        public readonly string $password,
    ) { }
}
