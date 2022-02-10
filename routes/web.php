<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class,'index'])->name('paginaPrincipal');
Route::get('noticias/{idcategoria}', [HomeController::class,'index'])->name('noticias');
Route::get('login', [HomeController::class,'login'])->name('login');
Route::get('login/{idusuario}', [HomeController::class,'login'])->name('login');
Route::get('login/delete/{idnoticia}', [HomeController::class,'delete'])->name('delete');
Route::get('login/update/{idnoticia}', [HomeController::class,'update'])->name('update');
Route::get('login/create', [HomeController::class,'create'])->name('create');
// Route::get('login/create/{idnoticia}', [HomeController::class,'create'])->name('create');