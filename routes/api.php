<?php

use App\Http\Controllers\Api\VinylController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get("vinyls", [VinylController::class, 'index']);

Route::get("vinyls/{vinyl}", [VinylController::class, 'show']);
