<?php

use App\Http\Controllers\PhoneController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/phone', [PhoneController::class, 'index']);
Route::post('/phone', [PhoneController::class, 'store']);
Route::get('/phone/{phone}', [PhoneController::class, 'show']);
Route::put('/phone/{phone}', [PhoneController::class, 'update']);
Route::delete('/phone/{phone}', [PhoneController::class, 'destroy']);
