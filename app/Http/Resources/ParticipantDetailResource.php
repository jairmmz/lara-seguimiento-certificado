<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParticipantDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'participant' => [
                'name' => $this->name,
                'last_name' => $this->last_name,
                'identification' => $this->identification,
                'email' => $this->email,
                'phone' => $this->phone
            ],
            'registrations' => RegistrationDetailResource::collection($this->whenLoaded('registrations')),
        ];
    }
}
