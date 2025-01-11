<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $registrations = [
            [
                'id' => 1,
                'participant_id' => 1,
                'type_participant_id' => 1,
                'course_id' => 1,
            ],
            [
                'id' => 2,
                'participant_id' => 2,
                'type_participant_id' => 1,
                'course_id' => 2,
            ],
            [
                'id' => 3,
                'participant_id' => 2,
                'type_participant_id' => 1,
                'course_id' => 4,
            ],
            [
                'id' => 4,
                'participant_id' => 3,
                'type_participant_id' => 1,
                'course_id' => 4,
            ],
            [
                'id' => 5,
                'participant_id' => 4,
                'type_participant_id' => 2,
                'course_id' => 5,
            ],
            [
                'id' => 6,
                'participant_id' => 5,
                'type_participant_id' => 2,
                'course_id' => 5,
            ]
        ];

        DB::table('registrations')->insert($registrations);
    }
}
