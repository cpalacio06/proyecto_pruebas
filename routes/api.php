<?php

use App\Http\Controllers\ProductController;

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('products', ProductController::class);
});
