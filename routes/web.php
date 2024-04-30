<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/events', [EventController::class, 'show']);
Route::post('/events', [EventController::class, 'store']);
Route::delete('/events', [EventController::class, 'delete']);
Route::put('/events', [EventController::class, 'update']);

Route::get('/types', [TypeController::class, 'show']);
Route::post('/types', [TypeController::class, 'store']);
