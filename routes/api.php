<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CertificateController;
use App\Http\Controllers\Api\CertificateTemplateController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\ParticipantController;
use App\Http\Controllers\Api\UserController;
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

    // Plantilla de Certificados
    Route::get('/certificate-templates', [CertificateTemplateController::class, 'index']);
    Route::get('/certificate-templates/show/{id}', [CertificateTemplateController::class, 'show']);
    Route::get('/certificate-templates/show-detail/{id}', [CertificateTemplateController::class, 'showDetail']);
    Route::post('/certificate-templates', [CertificateTemplateController::class, 'store']);
    Route::put('/certificate-templates/{id}', [CertificateTemplateController::class, 'update']);
    Route::delete('/certificate-templates/{id}', [CertificateTemplateController::class, 'destroy']);
        
    // Certificados
    Route::get('/certificates', [CertificateController::class, 'index']);
    Route::get('/certificates/show/{id}', [CertificateController::class, 'show']);
    Route::get('/certificates/show-detail/{id}', [CertificateController::class, 'showDetail']);
    Route::post('/certificates', [CertificateController::class, 'store']);
    Route::put('/certificates/{id}', [CertificateController::class, 'update']);
    Route::delete('/certificates/{id}', [CertificateController::class, 'destroy']);
});

/*
|--------------------------------------------------------------------------
| Rutas Frontend en Vue.js folder Router - index.ts
|--------------------------------------------------------------------------
*/