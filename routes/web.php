<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendidikanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', DashboardController::class)->name('dashboard');
Route::resource('/cabang', CabangController::class);
Route::resource('/divisi', DivisiController::class);
Route::resource('/level', LevelController::class);
Route::resource('/golongan', GolonganController::class);
Route::resource('/pendidikan', PendidikanController::class);
