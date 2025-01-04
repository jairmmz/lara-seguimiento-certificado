<?php

use Illuminate\Support\Facades\Route;

// Route::get('/{any}', function () {
//     return view('welcome');
// })->where('any', '.*');

Route::any('/', function () {
    return ['ok' => true, 'message' => 'Api Sistema de Seguimiento de Trámite de Certificados 1.0'];
});