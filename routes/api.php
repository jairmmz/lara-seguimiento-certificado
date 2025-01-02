<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['ok' => true, 'message' => 'Api Sistema de Seguimiento de Trámite de Certificados 1.0'];
});

Route::prefix('v1')->group(function () {
    // Autenticación
    Route::post('login', [AuthController::class, 'login']);

    Route::middleware('api')->group(function () {
        Route::middleware('auth:sanctum')->group(function () {
            // Autenticación
            Route::post('logout', [AuthController::class, 'logout']);
            Route::post('profile', [AuthController::class, 'profile']);

            // Usuarios
            Route::get('users', [UserController::class, 'index']);
            Route::post('users', [UserController::class, 'register']);
            Route::get('users/{id}', [UserController::class, 'show']);
            Route::put('users/{id}', [UserController::class, 'update']);
            Route::delete('users/{id}', [UserController::class, 'destroy']);

            // Trámites

            // Estudiantes

            // Certificados

            // Reportes

            // Configuración

            // Roles

            // Permisos

            
        });
    });
});