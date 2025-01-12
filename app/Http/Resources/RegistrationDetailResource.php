<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegistrationDetailResource extends JsonResource
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
            'participant_id' => $this->participant_id,
            'type_participant_id' => $this->type_participant_id,
            'course_id' => $this->course_id,
            'courses' => CourseDetailCertificateResource::make($this->whenLoaded('course')),
            'type_participant' => TypeParticipantResource::make($this->whenLoaded('typeParticipant')),
            'certificate' => CertificateResource::make($this->whenLoaded('certificate')),
        ];
    }
}
