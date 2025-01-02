<?php

namespace App\Enums;

enum RoleEnum: string
{
    case Admin = 'admin';
    case User = 'user';

    /**
     * Devuelve todos los valores de los roles.
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
