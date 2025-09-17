<?php

use App\Http\Controllers\Api\VinylController;
use Illuminate\Support\Facades\Route;

Route::get("vinyls", [VinylController::class, 'index']);

Route::get("vinyls/all", [VinylController::class, 'indexRaw']);

Route::get("vinyls/{vinyl}", [VinylController::class, 'show']);
