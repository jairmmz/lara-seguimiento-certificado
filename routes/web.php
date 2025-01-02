<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(['ok' => true, 'message' => 'Api Sistema de Seguimiento de Trámite de Certificados 1.0']);
});
