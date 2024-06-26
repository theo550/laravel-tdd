<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/events', [EventController::class, 'index']);
Route::post('/events', [EventController::class, 'store']);
Route::delete('/events', [EventController::class, 'delete']);
Route::put('/events', [EventController::class, 'update']);

Route::get('event/city/{id}', [EventController::class, 'getEventbyCity']);
Route::get('event/{id}', [EventController::class, 'show']);

Route::get('/types', [TypeController::class, 'show']);
Route::post('/types', [TypeController::class, 'store']);
Route::delete('/types', [TypeController::class, 'delete']);
Route::put('/types', [TypeController::class, 'update']);

Route::get('/cities', [CityController::class, 'index']);

