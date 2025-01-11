<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParticipantsByCourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $numberParticipants = $this->registrations
            ->groupBy('type_participant_id')
            ->map->count();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'number_participants' => $numberParticipants->get(1, 0), // Tipo ID 1: Participante
            'number_organizers' => $numberParticipants->get(2, 0),  // Tipo ID 2: Organizador
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ];
    }
}
