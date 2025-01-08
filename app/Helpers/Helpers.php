<?php

use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

/**
 * Función para generar una URL temporal de un archivo.
 */
if (!function_exists('generateUrlTemporaly')) {
    function generateUrlTemporaly(string $disk, string $path, int $hours = 3)
    {
        if (Storage::disk($disk)->exists($path)) {
            return Storage::disk($disk)
                ->temporaryUrl(
                    $path,
                    Carbon::now()
                        ->addHours($hours)
                );
        }
        return null;
    }
}

/**
 * Función para generar una URL pública de un archivo.
 */
if (!function_exists('generateUrl')) {
    function generateUrl(string $disk, string $path)
    {
        if (Storage::disk($disk)->exists($path)) {
            return Storage::disk($disk)->url($path);
        }
        return null;
    }
}

/**
 * Función para obtener los tipos de exportación permitidos.
 */
if (!function_exists('allowed_export_types')) {
    function allowed_export_types(): array
    {
        return ['pdf', 'excel', 'word', 'csv'];
    }
}
