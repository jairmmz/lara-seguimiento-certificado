<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typeParticipants = [
            [
                'id' => 1,
                'name' => 'Participante',
                'description' => 'Participante en un curso, taller o evento',
            ],
            [
                'id' => 2,
                'name' => 'Organizador',
                'description' => 'Organizador de la capacitación, curso o evento',
            ],
            [
                'id' => 3,
                'name' => 'Ponente',
                'description' => 'Ponente de un curso, taller o evento',
            ]
        ];

        DB::table('type_participants')->insert($typeParticipants);
    }
}
