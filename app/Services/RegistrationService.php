<?php

namespace App\Services;

use App\DataTransferObjects\RegistrationDTO;
use App\Http\Resources\CourseParticipantResource;
use App\Http\Resources\RegistrationDetailResource;
use App\Http\Resources\RegistrationResource;
use App\Http\Resources\CourseResource;
use App\Http\Resources\ParticipantsByCourseResource;
use App\Models\Registration;
use App\Models\Course;
use App\Models\Participant;
use App\Models\TypeParticipant;

class RegistrationService
{
    public function index()
    {
        $courses = Course::with('registrations.typeParticipant')->get();
        return ParticipantsByCourseResource::collection($courses);
    }

    public function coursesParticipantsNotRegistrations()
    {
        $courses = Course::doesntHave('registrations')->get();
        $participants = Participant::all();
        $typeParticipants = TypeParticipant::all();

        $arrayData = [
            'courses' => $courses,
            'participants' => $participants,
            'type_participants' => $typeParticipants,
        ];

        return CourseParticipantResource::make($arrayData);
    }


    public function show($id)
    {
        $registration = Registration::with('participant', 'course')->findOrFail($id);
        return RegistrationDetailResource::make($registration);
    }

    public function showDetail($id)
    {
        $registration = Registration::with('participant', 'course')->findOrFail($id);
        return RegistrationDetailResource::make($registration);
    }

    public function store(RegistrationDTO $registerDdtos): void
    {
        foreach ($registerDdtos->participants as $participantDto) {
            Registration::create([
                'participant_id' => $participantDto->participant_id,
                'type_participant_id' => $participantDto->type_participant_id,
                'course_id' => $participantDto->course_id,
            ]);
        }
    }

    public function update(RegistrationDTO $registrationDto, $id): void
    {
        $registration = Registration::findOrFail($id);
        foreach ($registrationDto->participants as $participantDto) {
            $registration->update([
                'participant_id' => $participantDto->participant_id,
                'type_participant_id' => $participantDto->type_participant_id,
            ]);
        }
    }

    public function destroy($id): void
    {
        $registration = Registration::findOrFail($id);
        $registration->delete();
    }

    private function createRegistration($id): void
    {
        $registration = Registration::findOrFail($id);
        $registration->update(['status' => 'CREATED']);
    }

    private function generateRegistration($id): void
    {
        $registration = Registration::findOrFail($id);
        $registration->update(['status' => 'GENERATED']);
    }
}
