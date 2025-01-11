<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $registrations = [
            [
                'id' => 1,
                'registration_id' => 1,
                'registration_file' => 'dasdasdasfasd.pdf',
                'status' => 'completado',
                'qr_code' => 'https://example.com/qr/1'
            ],
            [
                'id' => 2,
                'registration_id' => 1,
                'registration_file' => 'dasdasdasfasd1.pdf',
                'status' => 'completado',
                'qr_code' => 'https://example.com/qr/2'
            ],
            [
                'id' => 3,
                'registration_id' => 1,
                'registration_file' => 'V1lN7aUbLcG9Nizzrw4ANttA4fRMTY0VxFpD1RdA.pdf',
                'status' => 'completado',
                'qr_code' => 'https://example.com/qr/3'
            ],
            [
                'id' => 4,
                'registration_id' => 1,
                'registration_file' => 'dasdasdasfasd3.pdf',
                'status' => 'pendiente',
                'qr_code' => 'https://example.com/qr/4'
            ],
            [
                'id' => 5,
                'registration_id' => 1,
                'registration_file' => 'dasdasdasfasd4.pdf',
                'status' => 'completado',
                'qr_code' => 'https://example.com/qr/5'
            ],
            [
                'id' => 6,
                'registration_id' => 1,
                'registration_file' => 'dasdasdasfasd5.pdf',
                'status' => 'cancelado',
                'qr_code' => 'https://example.com/qr/6'
            ]
        ];

        DB::table('registrations')->insert($registrations);
    }
}
