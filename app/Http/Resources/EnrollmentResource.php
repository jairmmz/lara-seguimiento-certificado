<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EnrollmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'participant_id' => $this->participant_id,
            'type_participant_id' => $this->type_participant_id,
            'course_id' => $this->course_id,
            'status' => $this->status,
        ];
    }
}
