<?php

namespace App\Services;

use App\Http\Resources\CourseResource;
use App\Http\Resources\ParticipantResource;
use App\Http\Resources\RegistrationWithoutCertificateResource;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\Participant;
use App\Models\Registration;

class HomeAdminService
{
    public function index()
    {
        // Número de Participantes
        $numberParticipants = Participant::count();

        // último participante registrado
        $lastParticipant = Participant::latest()->first();

        $participantData = [
            'numberParticipants' => $numberParticipants,
            'lastParticipant' => $lastParticipant
        ];

        // Número de Cursos
        $numberCourses = Course::count();

        // último curso registrado
        $lastCourse = Course::latest()->first();

        $courseData = [
            'numberCourses' => $numberCourses,
            'lastCourse' => $lastCourse
        ];

        // Número de Inscripciones
        $numberRegistrations = Registration::count();

        // última inscripción
        $lastRegistration = Registration::latest()->first();

        $registrationData = [
            'numberRegistrations' => $numberRegistrations,
            'lastRegistration' => $lastRegistration
        ];

        // Número de Certificados
        $numberCertificates = Certificate::count();

        // último certificado
        $lastCertificate = Certificate::latest()->first();

        $certificateData = [
            'numberCertificates' => $numberCertificates,
            'lastCertificate' => $lastCertificate
        ];

        return [
            'participantData' => $participantData,
            'courseData' => $courseData,
            'registrationData' => $registrationData,
            'certificateData' => $certificateData
        ];
    }

    // Función para traer a todos los participantes que no están registrados en la tabla Registration
    public function getParticipantsWithoutRegistration()
    {
        $participants = Participant::whereDoesntHave('registrations')->get();

        return ParticipantResource::collection($participants);
    }

    // Función para traer los Cursos que no tienen inscripciones
    public function getCoursesWithoutRegistrations()
    {
        $courses = Course::whereDoesntHave('registrations')->get();

        return CourseResource::collection($courses);
    }

    // Función para obtener los registros que no tienen relación con la tabla certificado
    public function getRegistrationsWithoutCertificate()
    {
        $registrations = Registration::whereDoesntHave('certificate')->with('participant', 'course')->get();

        return RegistrationWithoutCertificateResource::collection($registrations);
    }
}
