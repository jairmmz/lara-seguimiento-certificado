<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\ParticipantController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['ok' => true, 'message' => 'Api Sistema de Seguimiento de Trámite de Certificados 1.0'];
});

Route::post('/login', [AuthController::class, 'login']);

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
    Route::get('/participants/show-detail/{id}', [ParticipantController::class, 'showDetail']);
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

    // Certificados

    // Matriculas - Inscripciones

});

/*
|--------------------------------------------------------------------------
| Rutas Frontend en Vue.js folder Router - index.ts
|--------------------------------------------------------------------------
*/