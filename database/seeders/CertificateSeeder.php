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
        $certificates = [
            [
                'id' => 1,
                'participant_id' => 1,
                'type_participant_id' => 1,
                'course_id' => 1,
                'issue_date' => '2025-01-10',
                'certificate_file' => 'dasdasdasfasd.pdf',
                'status' => 'completado',
                'qr_code' => 'https://example.com/qr/1'
            ],
            [
                'id' => 2,
                'participant_id' => 2,
                'type_participant_id' => 1,
                'course_id' => 2,
                'issue_date' => '2022-01-02',
                'certificate_file' => 'dasdasdasfasd1.pdf',
                'status' => 'completado',
                'qr_code' => 'https://example.com/qr/2'
            ],
            [
                'id' => 3,
                'participant_id' => 2,
                'type_participant_id' => 1,
                'course_id' => 3,
                'issue_date' => '2021-01-03',
                'certificate_file' => 'dasdasdasfasd2.pdf',
                'status' => 'completado',
                'qr_code' => 'https://example.com/qr/3'
            ],
            [
                'id' => 4,
                'participant_id' => 3,
                'type_participant_id' => 1,
                'course_id' => 4,
                'issue_date' => '2025-02-04',
                'certificate_file' => 'dasdasdasfasd3.pdf',
                'status' => 'pendiente',
                'qr_code' => 'https://example.com/qr/4'
            ],
            [
                'id' => 5,
                'participant_id' => 4,
                'type_participant_id' => 2,
                'course_id' => 5,
                'issue_date' => '2024-01-05',
                'certificate_file' => 'dasdasdasfasd4.pdf',
                'status' => 'completado',
                'qr_code' => 'https://example.com/qr/5'
            ],
            [
                'id' => 6,
                'participant_id' => 5,
                'type_participant_id' => 2,
                'course_id' => 5,
                'issue_date' => '2021-01-06',
                'certificate_file' => 'dasdasdasfasd5.pdf',
                'status' => 'cancelado',
                'qr_code' => 'https://example.com/qr/6'
            ]
        ];

        DB::table('certificates')->insert($certificates);
    }
}
