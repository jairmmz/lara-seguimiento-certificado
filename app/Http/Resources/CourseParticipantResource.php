<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseParticipantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'courses' => CourseResource::collection($this['courses']),
            'participants' => ParticipantResource::collection($this['participants']),
            'type_participants' => TypeParticipantResource::collection($this['type_participants']),
        ];
    }
}
