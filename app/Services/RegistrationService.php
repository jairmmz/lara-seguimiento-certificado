<?php

namespace App\Services;

use App\DataTransferObjects\RegistrationDTO;
use App\Http\Resources\CourseParticipantResource;
use App\Http\Resources\ParticipantsByCourseResource;
use App\Models\Registration;
use App\Models\Course;
use App\Models\Participant;
use App\Models\TypeParticipant;
use Illuminate\Support\Facades\Storage;

class RegistrationService
{
    public function index()
    {
        $courses = Course::with('registrations.typeParticipant')->get();
        return ParticipantsByCourseResource::collection($courses);
    }

    public function coursesParticipantsNotRegistrations($id)
    {
        $participants = Participant::whereDoesntHave('registrations', function ($query) use ($id) {
            $query->where('course_id', $id);
        })->get();

        $typeParticipants = TypeParticipant::all();

        $arrayData = [
            'participants' => $participants,
            'type_participants' => $typeParticipants,
        ];

        return CourseParticipantResource::make($arrayData);
    }

    public function getParticipantsByCourse($id)
    {
        $course = Course::with('registrations.participant', 'registrations.typeParticipant')->findOrFail($id);
        $participants = $course->registrations->map(function ($registration) {
            return [
                'id' => $registration->id,
                'participant_id' => $registration->participant->id,
                'participant_name' => $registration->participant->name,
                'participant_last_name' => $registration->participant->last_name,
                'participant_identification' => $registration->participant->identification,
                'type_participant_id' => $registration->typeParticipant->id,
                'type_participant' => $registration->typeParticipant->name,
            ];
        });

        return $participants;
    }

    public function store(RegistrationDTO $registerDdtos, $idCourse): void
    {
        Registration::create([
            'participant_id' => $registerDdtos->participant_id,
            'type_participant_id' => $registerDdtos->type_participant_id,
            'course_id' => $idCourse,
        ]);
    }

    public function destroy($id): void
    {
        $registration = Registration::findOrFail($id);
        $certificateFile = $registration->certificate->certificate_file ?? null;
        $registration->certificate()->delete();
        $registration->delete();
    
        if ($certificateFile && Storage::disk('certificates')->exists($certificateFile)) {
            Storage::disk('certificates')->delete($certificateFile);
        }
    }
    
}
