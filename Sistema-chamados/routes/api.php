<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChamadoController;
    Route::get('/chamados', [ChamadoController::class, 'index']);
    Route::post('/chamados', [ChamadoController::class, 'store']);
    Route::get('/chamados/{id}', [ChamadoController::class, 'show']);
    Route::put('/chamados/{id}', [ChamadoController::class, 'update']);