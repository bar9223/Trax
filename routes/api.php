<?php

use Illuminate\Http\Request;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\TripsController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::middleware('auth:api')->group(function () {
    Route::resource('cars', CarsController::class);
    Route::resource('trips', TripsController::class);
});
