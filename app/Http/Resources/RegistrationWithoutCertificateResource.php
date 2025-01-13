<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegistrationWithoutCertificateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'participant' => ParticipantResource::make($this->whenLoaded('participant')),
            'course' => CourseResource::make($this->whenLoaded('course')),
        ];
    }
}
