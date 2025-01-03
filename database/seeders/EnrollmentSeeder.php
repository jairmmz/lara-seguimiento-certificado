<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $enrollments = [
            [
                'id' => 1,
                'participant_id' => 1,
                'type_participant_id' => 1,
                'course_id' => 1,
                'status' => 'completado'
            ],
            [
                'id' => 2,
                'participant_id' => 2,
                'type_participant_id' => 1,
                'course_id' => 2,
                'status' => 'completado'
            ],
            [
                'id' => 3,
                'participant_id' => 3,
                'type_participant_id' => 1,
                'course_id' => 3,
                'status' => 'completado'
            ],
            [
                'id' => 4,
                'participant_id' => 4,
                'type_participant_id' => 1,
                'course_id' => 4,
                'status' => 'completado'
            ],
            [
                'id' => 5,
                'participant_id' => 5,
                'type_participant_id' => 2,
                'course_id' => 5,
                'status' => 'completado'
            ]
        ];

        DB::table('enrollments')->insert($enrollments);
    }
}
