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
                'last_name' => 'Perez Gomez',
                'identification' => '12345678',
                'email' => 'jperez@example.com',
                'phone' => '987654321',
            ],
            [
                'id' => 2,
                'name' => 'Maria',
                'last_name' => 'Quispe Perez',
                'identification' => '75698282',
                'email' => 'mariz1@example.com',
                'phone' => '123456789',
            ],
            [
                'id' => 3,
                'name' => 'Pedro',
                'last_name' => 'Garcia Quiroz',
                'identification' => '16325489',
                'email' => 'pedrito1@example.com',
                'phone' => '987584521',
            ],
            [
                'id' => 4,
                'name' => 'Ana',
                'last_name' => 'Gomez Chavez',
                'identification' => '21478652',
                'email' => 'anaperz@example.com',
                'phone' => '9875896254',
            ],
            [
                'id' => 5,
                'name' => 'Luis',
                'last_name' => 'Perez Gomez',
                'identification' => '25418762',
                'email' => 'lucho2@example.com',
                'phone' => '9875896256',
            ]
        ];

        DB::table('participants')->insert($participants);
    }
}
