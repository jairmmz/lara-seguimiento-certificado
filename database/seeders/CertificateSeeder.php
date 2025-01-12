<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $certificates = [
            [
                'id' => 1,
                'registration_id' => 1,
                'certificate_file' => 'dasdasdasfasd.pdf',
                'status' => 'aprobado',
                'qr_code' => Str::uuid()
            ],
            [
                'id' => 2,
                'registration_id' => 2,
                'certificate_file' => 'V1lN7aUbLcG9Nizzrw4ANttA4fRMTY0VxFpD1RdA.pdf',
                'status' => 'aprobado',
                'qr_code' => Str::uuid()
            ],
        ];

        DB::table('certificates')->insert($certificates);
    }
}
