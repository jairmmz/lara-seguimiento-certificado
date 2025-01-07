<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CertificateDetailResource extends JsonResource
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
            'certificate_template_id' => $this->certificate_template_id,
            'issue_date' => $this->issue_date,
            'certificate_url' => $this->certificate_url,
            'status' => $this->status,
            'qr_code' => $this->qr_code,
            'courses' => CourseResource::make($this->whenLoaded('course')),
            'type_participant' => TypeParticipantResource::make($this->whenLoaded('typeParticipant')),
        ];
    }
}
