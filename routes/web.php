<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\dosencontroller;
use App\Http\Controllers\mahasiswacontroller;
use App\Http\Controllers\mataKuliahcontroller;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[DashboardController::class,'index']);
Route::resource('dosens',DosenController::class);
Route::resource('mahasiswas',MahasiswaController::class);
Route::resource('mata_kuliahs',MataKuliahController::class);
