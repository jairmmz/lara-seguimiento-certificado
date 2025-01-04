<?php

namespace App\Services;

use App\DataTransferObjects\ParticipantDTO;
use App\Http\Resources\ParticipantDetailResource;
use App\Http\Resources\ParticipantResource;
use App\Models\Participant;

class ParticipantService
{
    public function index()
    {
        $participants = Participant::all();

        return ParticipantResource::collection($participants);
    }

    public function show($id)
    {
        $participant = Participant::findOrFail($id);

        return new ParticipantResource($participant);
    }

    public function showDetail($id)
    {
        $participant = Participant::with('enrollments.course', 'enrollments.typeParticipant')->findOrFail($id);

        return ParticipantDetailResource::make($participant);
    }

    public function store(ParticipantDTO $dto)
    {
        $participant = Participant::create($dto->toArray());

        return new ParticipantResource($participant);
    }

    public function update(ParticipantDTO $dto, $id)
    {
        $participant = Participant::findOrFail($id);
        $participant->update($dto->toArray());

        return new ParticipantResource($participant);
    }

    public function destroy($id): void
    {
        $participant = Participant::findOrFail($id);
        $participant->delete();
    }
}
