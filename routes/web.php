<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TripsController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('api/cars', [CarsController::class, 'index'])->name('cars.index');
Route::get('api/cars/create', [CarsController::class, 'create'])->name('cars.create');
Route::post('api/cars', [CarsController::class, 'store'])->name('cars.store');
Route::delete('/cars/{car}', [CarsController::class, 'destroy'])->name('cars.destroy');
Route::get('/api/trips', [TripsController::class, 'index'])->name('trips.index');
Route::get('/api/trips/create', [TripsController::class, 'create'])->name('trips.create');
Route::post('api/trips', [TripsController::class, 'store'])->name('trips.store');
Route::delete('/trips/{trip}', [TripsController::class, 'destroy'])->name('trips.destroy');
Route::get('cars/{id}/trips', [CarsController::class, 'trips'])->name('cars.trips');

