<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
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

Route::get('/', [RegistrationController::class,'create'])->name('default');
Route::post('/users',[RegistrationController::class,'store']);


Route::get('/login', [LoginController::class,'create'])->name('login');
Route::post('/login',[LoginController::class,'store']);

Route::post('/logout',[LoginController::class,'logout']);

Route::get('/home',[DashboardController::class,'home'])->name('home');
Route::get('/view/{id}',[DashboardController::class,'view'])->name('view');
Route::get('/createmeal',[DashboardController::class,'createMealView'])->name('createmeal');


Route::post('/createmeal',[DashboardController::class,'saveMeal']);
Route::post('/delete/{id}',[DashboardController::class,'delete']);
