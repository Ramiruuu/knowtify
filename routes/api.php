<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

use App\Http\Controllers\Auth\ApiRegisteredUserController;
use App\Http\Controllers\Auth\ApiAuthenticatedSessionController;


// Public API auth routes for Postman/mobile
Route::post('/register', [ApiRegisteredUserController::class, 'store']);
Route::post('/login', [ApiAuthenticatedSessionController::class, 'store']);
Route::post('/logout', [ApiAuthenticatedSessionController::class, 'destroy'])->middleware('auth:sanctum');

// Protected notes routes
Route::middleware(['auth:sanctum', 'throttle:60,1'])->group(function () {
    Route::get('/notes', [NoteController::class, 'index']);
    Route::post('/notes', [NoteController::class, 'store']);
    Route::put('/notes/{note}', [NoteController::class, 'update']);
    Route::delete('/notes/{note}', [NoteController::class, 'destroy']);
});

