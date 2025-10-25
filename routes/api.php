<?php

use App\Http\Controllers\Api\LogController;
use App\Http\Controllers\Api\PhotoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aqui estão registradas as rotas da API para captura de localização
| e upload de fotos com consentimento do usuário.
|
*/

// Rate limiting: máximo 60 requisições por minuto
Route::middleware(['throttle:60,1'])->group(function () {

    // Endpoint para registrar localização
    Route::post('/log', [LogController::class, 'store']);

    // Endpoint para upload de foto
    Route::post('/upload-photo', [PhotoController::class, 'upload']);

    // Endpoint de debug para verificar IP detectado
    Route::get('/whoami', [LogController::class, 'whoami']);
});
