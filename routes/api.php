<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RegistrationController;





/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:sanctum')->group( function () {
    
    Route::get('/user', function (Request $request){
        return $request->user();
    });

    Route::resource('/medicine', MedicineController::class);
    Route::resource('/patient', PatientController::class);
    Route::resource('/registration', RegistrationController::class);

    Route::post('/logout', [AuthController::class, 'logout'] );

   /* Route::post('/registration', [AuthController::class, 'postRegistration'] );
    Route::get('/registrations', [AuthController::class, 'getRegistration'] );
    Route::delete('/registration/{id}', [AuthController::class, 'deleteRegistration']);*/

    
  /*  Route::get('/hospital/patients', [AuthController::class, 'getPatientsHospital']);
    Route::get('/hospital/medicines', [AuthController::class, 'getMedicinesHospital']);
    Route::get('/hospital/registrations', [AuthController::class, 'getRegistration']);*/
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);





