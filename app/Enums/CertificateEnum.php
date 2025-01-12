<?php

namespace App\Enums;

enum CertificateEnum: string
{
    case Pending = 'pendiente';
    case Approved = 'aprobado';
    case Rejected = 'rechazado';

    /**
     * Devuelve todos los valores de los roles.
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
