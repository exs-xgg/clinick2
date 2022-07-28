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
use App\Http\Controllers\VisitsController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;


Route::get('/login',function(){
    return view('login');
})->name('login');
Route::post('login',[ LoginController::class, 'store']);
Route::get('logout',[ LoginController::class, 'index']);

Route::get('/',[ DashboardController::class, 'index']);

Route::middleware([])->group(function () {

    Route::get('/search',[ PatientController::class, 'index']);

    Route::get('/create-patient',[ PatientController::class, 'create']);


    Route::resource('patient',PatientController::class);
    Route::resource('visit',VisitsController::class);
    Route::resource('image',ImageController::class);
});
