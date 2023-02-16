<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PatientController;




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

    Route::post('/logout', [AuthController::class, 'logout'] );

    
    Route::get('/hospital/patients', [AuthController::class, 'getPatientsHospital']);
    Route::get('/hospital/medicines', [AuthController::class, 'getMedicinesHospital']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);





