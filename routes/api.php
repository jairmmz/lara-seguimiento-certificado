<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RegistrationController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\ParticipantController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CertificateController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['ok' => true, 'message' => 'Api Sistema de Seguimiento de Trámite de Certificados 1.0'];
});

Route::post('/login', [AuthController::class, 'login']);
Route::get('/participants/show-detail/{identification}', [ParticipantController::class, 'showDetail']);

Route::middleware('auth:sanctum')->group(function () {
    // Autenticación
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/profile', [AuthController::class, 'profile']);

    // Usuarios
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/users', [UserController::class, 'register']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);

    // Participantes
    Route::get('/participants', [ParticipantController::class, 'index']);
    Route::get('/participants/show/{id}', [ParticipantController::class, 'show']);
    Route::post('/participants', [ParticipantController::class, 'store']);
    Route::put('/participants/{id}', [ParticipantController::class, 'update']);
    Route::delete('/participants/{id}', [ParticipantController::class, 'destroy']);

    // Cursos
    Route::get('/courses', [CourseController::class, 'index']);
    Route::get('/courses/show/{id}', [CourseController::class, 'show']);
    Route::get('/courses/show-detail/{id}', [CourseController::class, 'showDetail']);
    Route::post('/courses', [CourseController::class, 'store']);
    Route::put('/courses/{id}', [CourseController::class, 'update']);
    Route::delete('/courses/{id}', [CourseController::class, 'destroy']);

    // Inscripciones
    Route::get('/registrations', [RegistrationController::class, 'index']);
    Route::get('/registrations/courses-participants-not-registrations', [RegistrationController::class, 'coursesParticipantsNotRegistrations']);
    Route::get('/registrations/show/{id}', [RegistrationController::class, 'show']);
    Route::get('/registrations/show-detail/{id}', [RegistrationController::class, 'showDetail']);
    Route::post('/registrations', [RegistrationController::class, 'store']);
    Route::put('/registrations/{id}', [RegistrationController::class, 'update']);
    Route::delete('/registrations/{id}', [RegistrationController::class, 'destroy']);

    // Certificados
    Route::get('/certificates', [CertificateController::class, 'index']);
    Route::get('/certificates/show/{id}', [CertificateController::class, 'show']);
    Route::post('/certificates', [CertificateController::class, 'store']);
    Route::put('/certificates/{id}', [CertificateController::class, 'update']);
    Route::delete('/certificates/{id}', [CertificateController::class, 'destroy']);
});

/*
|--------------------------------------------------------------------------
| Rutas Frontend en Vue.js folder Router - index.ts
|--------------------------------------------------------------------------
*/