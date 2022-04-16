<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CameraController;
use App\Http\Controllers\CustomerController;

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

// Route::get('/', function () {
//     return view('newCostumer');
// })->name('hallo');

Route::get('/dashboard',[CustomerController::class,'dashboard'])->middleware('auth')->name('dashboard');
Route::get('/',[CameraController::class,'index'])->middleware('auth')->name('hallo');
Route::post('/savenewcamera',[CameraController::class,'savenewcamera'])->middleware('auth')->name('savenewcamera');
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/ceklogin',[LoginController::class,'authenticate'])->name('ceklogin');
Route::post('/signout', [LoginController::class, 'signout'])                        ->name('signout');
Route::get('/register',[CustomerController::class,'index'])->name('register');
Route::post('/savenewcustomer',[CustomerController::class,'savenewcustomer'])->name('savenewcustomer');