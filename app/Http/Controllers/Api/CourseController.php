<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRegisterRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Services\CourseService;
use Illuminate\Http\JsonResponse;

class CourseController extends Controller
{
    public function __construct(
        private CourseService $courseService
    ) { }

    public function index(): JsonResponse
    {
        try {
            $courses = $this->courseService->index();

            return $this->success('Cursos obtenidos con éxito', $courses);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function show($id): JsonResponse
    {
        try {
            $course = $this->courseService->show($id);

            return $this->success('Curso obtenido con éxito', $course);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function showDetail($id): JsonResponse
    {
        try {
            $course = $this->courseService->showDetail($id);

            return $this->success('Curso obtenido con éxito', $course);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function store(CourseRegisterRequest $request): JsonResponse
    {
        try {
            $course = $this->courseService->store($request->toCourseDTO());

            return $this->success('Curso registrado con éxito', $course);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function update(CourseUpdateRequest $request, $id): JsonResponse
    {
        try {
            $course = $this->courseService->update($request->toCourseDTO(), $id);

            return $this->success('Curso actualizado con éxito', $course);
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            $this->courseService->destroy($id);

            return $this->success('Curso eliminado con éxito');
        } catch (\Throwable $th) {
            return $this->badRequest('Ocurrio un error inesperado', $th->getMessage());
        }
    }
}
