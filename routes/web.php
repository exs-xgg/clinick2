<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PatientController;

Route::get('/',[ DashboardController::class, 'index']);
Route::get('/search',[ PatientController::class, 'index']);

Route::get('/create-patient',[ PatientController::class, 'create']);


Route::resource('patient',PatientController::class);
