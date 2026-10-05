<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\GroomingController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\CustomerController;


/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});


/*
|--------------------------------------------------------------------------
| Protected System Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | Appointments
    |--------------------------------------------------------------------------
    */

    Route::get('/appointments', [AppointmentController::class, 'index'])
        ->name('appointments.index');

    Route::post('/appointments', [AppointmentController::class, 'store'])
        ->name('appointments.store');

    Route::get('/appointments/{id}/edit', [AppointmentController::class, 'edit'])
        ->name('appointments.edit');

    Route::put('/appointments/{id}', [AppointmentController::class, 'update'])
        ->name('appointments.update');

    Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy'])
        ->name('appointments.destroy');


    /*
    |--------------------------------------------------------------------------
    | Grooming
    |--------------------------------------------------------------------------
    */

    Route::get('/grooming', [GroomingController::class, 'index'])
        ->name('grooming.index');

    Route::post('/grooming', [GroomingController::class, 'store'])
        ->name('grooming.store');

    Route::get('/grooming/{id}/edit', [GroomingController::class, 'edit'])
        ->name('grooming.edit');

    Route::put('/grooming/{id}', [GroomingController::class, 'update'])
        ->name('grooming.update');

    Route::delete('/grooming/{id}', [GroomingController::class, 'destroy'])
        ->name('grooming.destroy');

    Route::patch('/grooming/{id}/status', [GroomingController::class, 'updateStatus'])
    ->name('grooming.status');


    /*
    |--------------------------------------------------------------------------
    | Pet Records
    |--------------------------------------------------------------------------
    */

    Route::get('/pets', [PetController::class, 'index'])
        ->name('pets.index');

    Route::post('/pets', [PetController::class, 'store'])
        ->name('pets.store');

    Route::get('/pets/{id}/edit', [PetController::class, 'edit'])
        ->name('pets.edit');

    Route::put('/pets/{id}', [PetController::class, 'update'])
        ->name('pets.update');

    Route::delete('/pets/{id}', [PetController::class, 'destroy'])
        ->name('pets.destroy');


    /*
    |--------------------------------------------------------------------------
    | Customers
    |--------------------------------------------------------------------------
    */

    Route::get('/customers', [CustomerController::class, 'index'])
        ->name('customers.index');

    Route::post('/customers', [CustomerController::class, 'store'])
        ->name('customers.store');

    Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])
        ->name('customers.edit');

    Route::put('/customers/{id}', [CustomerController::class, 'update'])
        ->name('customers.update');

    Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])
        ->name('customers.destroy');

});


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Auth::routes();