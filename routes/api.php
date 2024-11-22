<?php

use App\Http\Controllers\Api\ArticuloController;
use App\Http\Controllers\Api\ComentarioController;

Route::middleware('auth:sanctum')->group(function () {
	// Artículos
    Route::get('articulos', [ArticuloController::class, 'index']);
    Route::get('articulos/{articulo}', [ArticuloController::class, 'show']);
    Route::post('articulos', [ArticuloController::class, 'store']);
    Route::put('articulos/{articulo}', [ArticuloController::class, 'update']);
    Route::delete('articulos/{articulo}', [ArticuloController::class, 'destroy']);

    // Comentarios
    Route::post('articulos/{articulo}/comentarios', [ComentarioController::class, 'store']);
    Route::delete('comentarios/{comentario}', [ComentarioController::class, 'destroy']);
});
