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
        $course = Course::with('enrollments.participant', 'enrollments.typeParticipant')->findOrFail($id);

        return CourseDetailResource::make($course);
    }

    public function store(CourseDTO $dto)
    {
        $course = Course::create($dto->toArray());

        return new CourseResource($course);
    }

    public function update(CourseDTO $dto, $id)
    {
        $course = Course::findOrFail($id);
        $course->update($dto->toArray());

        return new CourseResource($course);
    }

    public function destroy($id): void
    {
        $course = Course::findOrFail($id);
        $course->delete();
    }
}
