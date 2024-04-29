<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/events', [EventController::class, 'show']);
Route::post('/events', [EventController::class, 'store']);
Route::delete('/events', [EventController::class, 'delete']);
Route::put('/events', [EventController::class, 'update']);
