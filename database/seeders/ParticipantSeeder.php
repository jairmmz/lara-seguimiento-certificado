<?php

namespace Database\Seeders;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $participants = [
            [
                'id' => 1,
                'name' => 'Juan',
                'first_name' => 'Perez',
                'last_name' => 'Gomez',
                'identification' => '12345678',
                'email' => 'jperez@example.com',
                'phone' => '987654321',
            ],
            [
                'id' => 2,
                'name' => 'Maria',
                'first_name' => 'Gomez',
                'last_name' => 'Perez',
                'identification' => '75698282',
                'email' => 'mariz1@example.com',
                'phone' => '123456789',
            ],
            [
                'id' => 3,
                'name' => 'Pedro',
                'first_name' => 'Gomez',
                'last_name' => 'Perez',
                'identification' => '16325489',
                'email' => 'pedrito1@example.com',
                'phone' => '987584521',
            ],
            [
                'id' => 4,
                'name' => 'Ana',
                'first_name' => 'Perez',
                'last_name' => 'Gomez',
                'identification' => '21478652',
                'email' => 'anaperz@example.com',
                'phone' => '9875896254',
            ],
            [
                'id' => 5,
                'name' => 'Luis',
                'first_name' => 'Gomez',
                'last_name' => 'Perez',
                'identification' => '25418762',
                'email' => 'lucho2@example.com',
                'phone' => '9875896256',
            ]
        ];

        DB::table('participants')->insert($participants);
    }
}
