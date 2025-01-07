<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertificateTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $certificateTemplates = [
            [
                'id' => 1,
                'name' => 'Certificate of Participation',
                'template_file' => 'certificate_of_participation.png',
            ],
            [
                'id' => 2,
                'name' => 'Certificate of Completion',
                'template_file' => 'certificate_of_completion.png',
            ],
            [
                'id' => 3,
                'name' => 'Certificate of Achievement',
                'template_file' => 'certificate_of_achievement.png',
            ],
        ];

        DB::table('certificate_templates')->insert($certificateTemplates);
    }
}
