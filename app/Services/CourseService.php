<?php

namespace App\Services;

use App\DataTransferObjects\CourseDTO;
use App\Http\Resources\CourseDetailResource;
use App\Http\Resources\CourseResource;
use App\Models\Course;

class CourseService
{
    public function index()
    {
        $courses = Course::all();

        return CourseResource::collection($courses);
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);

        return CourseResource::make($course);
    }

    public function showDetail($id)
    {
        $course = Course::with('registrations.participant', 'registrations.typeParticipant')->findOrFail($id);

        return CourseDetailResource::make($course);
    }

    public function store(CourseDTO $dto): void
    {
        Course::create($dto->toArray());
    }

    public function update(CourseDTO $dto, $id): void
    {
        $course = Course::findOrFail($id);
        $course->update($dto->toArray());
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        if ($course->registrations->count() > 0) {
            throw new \Exception('No se puede eliminar un curso con inscripciones');
        }

        $course->delete();
    }
}
