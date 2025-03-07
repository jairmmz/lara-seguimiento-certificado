<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RegistrationController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\ParticipantController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CertificateController;
use App\Http\Controllers\Api\HomeAdminController;
use App\Http\Controllers\Api\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['ok' => true, 'message' => 'Api Sistema de Seguimiento de Trámite de Certificados 1.0'];
});

Route::post('/login', [AuthController::class, 'login']);
Route::get('/participants/show-detail/{identification}', [ParticipantController::class, 'showDetail']);
Route::post('/password-reset', [UserController::class, 'sendPasswordResetLink']);
Route::post('/password-reset/validate', [UserController::class, 'validatePasswordResetToken']);
Route::post('/password-reset/recover', [UserController::class, 'resetPassword']);

Route::middleware('auth:sanctum')->group(function () {
    // Autenticación
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/profile', [AuthController::class, 'profile']);

    // Usuarios
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/users', [UserController::class, 'register']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::patch('/users/update-profile', [UserController::class, 'updateProfile']);
    Route::patch('/users/update-password', [UserController::class, 'updatePassword']);
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
    Route::get('/registrations/courses-participants-not-registrations/{id}', [RegistrationController::class, 'coursesParticipantsNotRegistrations']);
    Route::get('/registrations/participants-registrations-by-course/{id}', [RegistrationController::class, 'getParticipantsByCourse']);
    Route::post('/registrations/{id}', [RegistrationController::class, 'store']);
    Route::delete('/registrations/{id}', [RegistrationController::class, 'destroy']);
    Route::post('/registrations/import-participants/{couseId}', [RegistrationController::class, 'importCsvParticipants']);

    // Certificados
    Route::get('/certificates', [CertificateController::class, 'index']);
    Route::get('/certificates/show/{id}', [CertificateController::class, 'show']);
    Route::post('/certificates/create', [CertificateController::class, 'store']);
    Route::post('/certificates/update/{id}', [CertificateController::class, 'update']);
    Route::delete('/certificates/{id}', [CertificateController::class, 'destroy']);

    // Home Admin
    Route::get('/home-admin', [HomeAdminController::class, 'index']);
    Route::get('/home-admin/get-participants-without-registration', [HomeAdminController::class, 'getParticipantsWithoutRegistration']);
    Route::get('/home-admin/get-courses-without-registration', [HomeAdminController::class, 'getCoursesWithoutRegistrations']);
    Route::get('/home-admin/get-registrations-without-certificate', [HomeAdminController::class, 'getRegistrationsWithoutCertificate']);

    // Reportes
    Route::get('/reports', [ReportController::class, 'index']);
});

/*
|--------------------------------------------------------------------------
| Rutas Frontend en Vue.js folder Router - index.ts
|--------------------------------------------------------------------------
*/
