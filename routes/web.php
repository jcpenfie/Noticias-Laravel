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
Route::get('login/create', [HomeController::class,'create'])->name('login.create'); 
Route::post('login/store/{$noticia}', [HomeController::class,'store'])->name('login.store');
Route::get('login/{idusuario?}', [HomeController::class,'login'])->name('login');
Route::delete('login/destroy/{idnoticia}', [HomeController::class,'destroy'])->name('login.destroy');
Route::put('login/update/{idnoticia}', [HomeController::class,'update'])->name('login.update');

// Route::get('login/create/{idnoticia}', [HomeController::class,'create'])->name('create');