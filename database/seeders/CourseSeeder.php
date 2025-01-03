<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'id' => 1,
                'name' => 'Curso de Capacitación en Laravel',
                'description' => 'Curso de capacitación en Laravel para desarrolladores',
                'start_date' => '2025-01-01',
                'end_date' => '2025-01-30',
            ],
            [
                'id' => 2,
                'name' => 'Curso de Capacitación en Vue.js',
                'description' => 'Curso de capacitación en Vue.js para desarrolladores',
                'start_date' => '2025-02-01',
                'end_date' => '2025-02-28',
            ],
            [
                'id' => 3,
                'name' => 'Curso de Capacitación en React',
                'description' => 'Curso de capacitación en React para desarrolladores',
                'start_date' => '2025-03-01',
                'end_date' => '2025-03-31',
            ],
            [
                'id' => 4,
                'name' => 'Curso de Capacitación en Angular',
                'description' => 'Curso de capacitación en Angular para desarrolladores',
                'start_date' => '2025-04-01',
                'end_date' => '2025-04-30',
            ],
            [
                'id' => 5,
                'name' => 'Curso de Capacitación en PHP',
                'description' => 'Curso de capacitación en PHP para desarrolladores',
                'start_date' => '2025-05-01',
                'end_date' => '2025-05-31',
            ]
        ];

        DB::table('courses')->insert($courses);
    }
}
