<?php

namespace App\Imports;

use App\Models\Participant;
use App\Models\Registration;
use App\Models\TypeParticipant;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RegistrationsImport implements ToModel, WithHeadingRow
{
    public function __construct(
        public readonly int $courseId
    ) {}

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $participant = Participant::where('identification', $row['identificacion'])->first();

        if (is_null($participant)) {
            $participant = Participant::create([
                'name' => $row['nombres'],
                'last_name' => $row['apellidos'],
                'identification' => $row['identificacion'],
                'email' => $row['correo_electronico'] ?? null,
                'phone' => $row['numero_celular'] ?? null,
            ]);
        }

        $typeParticipant = TypeParticipant::where('name', $row['tipo_participante'])->first();

        if (is_null($typeParticipant)) {
            return null; // Saltar registro si no existe el tipo de participante
        }

        $existsRegistration = Registration::where('participant_id', $participant->id)
            ->where('course_id', $this->courseId)
            ->exists();

        if (!$existsRegistration) {
            return new Registration([
                'participant_id' => $participant->id,
                'course_id' => $this->courseId,
                'type_participant_id' => $typeParticipant->id,
            ]);
        }

        return null; // Saltar registro si ya existe la inscripción
    }
}
