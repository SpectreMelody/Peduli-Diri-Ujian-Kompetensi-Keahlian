<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\perjalananController;
use App\Http\Controllers\dashboardController;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Perjalanan;
use App\Models\User;

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

Route::get('/',[dashboardController::class,'Dashboard'])->middleware('auth');

Route::get('/input-perjalanan',[perjalananController::class,'InputPerjalananPage'])->middleware('auth');
Route::post('/simpanPerjalanan',[perjalananController::class,'SimpanPerjalanan'])->middleware('auth');
Route::post('/deletePerjalanan',[perjalananController::class,'DeletePerjalanan'])->middleware('auth');
Route::post('/editPerjalanan',[perjalananController::class,'EditPerjalanan'])->middleware('auth');
Route::get('/perjalanan',[perjalananController::class,'Perjalanan'])->middleware('auth');
Route::get('/search',[perjalananController::class,'SearchPerjalanan'])->middleware('auth');

Route::get('/register',[userController::class,'RegisterPage']);
Route::post('/simpanUser',[userController::class,'SimpanRegister']);

Route::get('/login',[loginController::class,'LoginPage'])->name('login');
Route::any('/postLogin',[loginController::class,'Login']);

Route::get('/logout',[loginController::class,'logOut']);