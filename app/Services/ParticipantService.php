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

    public function showDetail(string $identification)
    {
        $participant = Participant::with('certificates.course', 'certificates.typeParticipant')->where('identification', $identification)->first();
        return ParticipantDetailResource::make($participant);
    }

    public function store(ParticipantDTO $dto): void
    {
        Participant::create($dto->toArray());
    }

    public function update(ParticipantDTO $dto, $id): void
    {
        $participant = Participant::findOrFail($id);
        $participant->update($dto->toArray());
    }

    public function destroy($id): void
    {
        $participant = Participant::findOrFail($id);
        $participant->delete();
    }
}
