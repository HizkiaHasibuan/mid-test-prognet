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
Route::get('/dashboardAdmin',[CustomerController::class,'dashboardAdmin'])->middleware('auth')->name('dashboardAdmin');
Route::get ('/profil',[CustomerController::class, 'profil'])     ->middleware('auth')->name('user-profil');
Route::get ('/profil/{id}/edit', [CustomerController::class, 'editprofil']) ->middleware('auth')->name('user-edit-profil');
Route::post('/{id}/saveedit',   [CustomerController::class,'saveedit'])->name('nasabah-saveedit');
Route::get('/',[CameraController::class,'index'])->middleware('auth')->name('hallo');
Route::post('/savenewcamera',[CameraController::class,'savenewcamera'])->middleware('auth')->name('savenewcamera');
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/ceklogin',[LoginController::class,'authenticate'])->name('ceklogin');
Route::post('/signout', [LoginController::class, 'signout'])                        ->name('signout');
Route::get('/register',[CustomerController::class,'index'])->name('register');
Route::post('/savenewcustomer',[CustomerController::class,'savenewcustomer'])->name('savenewcustomer');

Route::get ('/listkamera',[CameraController::class, 'listkamera'])->middleware('auth')->name('listkamera');
Route::post('/{id}/delete',[CameraController::class,'deletecamera'])->name('deletecamera');
Route::post('/{id}/formpesan',[CameraController::class, 'formpesan'])->middleware('auth')->name('formpesan');
Route::post('/{id}/pesan',[CameraController::class,'pesan'])->middleware('auth')->name('pesan');

Route::get ('/listkameraadmin',[CameraController::class, 'listkameraadmin'])->middleware('auth')->name('listkameraadmin');

Route::get ('/listpesan',[CameraController::class, 'listpesan'])->middleware('auth')->name('listpesan');
Route::post('/{id}/konfir',[CameraController::class,'confirm'])->name('konfirmasi');