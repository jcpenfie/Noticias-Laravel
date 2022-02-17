<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Auth\Events\Login;

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


//Todas las páginas tiene sus respectivas paginaciones

//--------------------Pagina principal (sin usuario)-----------------------------
// Pagina con todas la noticas sin importar la categoría
Route::get('/', [HomeController::class,'index'])->name('paginaPrincipal');

// Pagina con la noticia
Route::get('{idnoticia}',[HomeController::class,'show'])->name('noticias.show');

//Muestra todas la noticias de cierta categoria
Route::get('noticias/{idcategoria}', [HomeController::class,'categoria'])->name('noticias.categoria');


//--------------------Login al panel de control-----------------------------

//Login que pide usuario y contraseña
Route::get('login', [LoginController::class,'index'])->name('login');


//--------------------Panel de control (usuarios)-----------------------------


//Panel de control: Lista de todas las noticias de ese usuario y puede filtrar por categoria
//(si es admin aparecen todas las noticias y un nuevo filtro por autor)
Route::post('login/{idusuario?}', [LoginController::class,'panel'])->name('login.usuario');


//>>>>>>>>>>>>>>>>>>--------------------Operaciones de las noticias-----------------------------


//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>--------------------Botones: borrar y editar y ver-----------------------------

//En el panel de control hay un botón borrar que llama a este método con la id que hay que borrar
Route::delete('login/destroy/{idnoticia}', [LoginController::class,'destroy'])->name('login.destroy');

//Te manda a un formulario con los datos ya introducidos en él para modificar exactamente lo que quieres
Route::put('login/update/{idnoticia}', [LoginController::class,'update'])->name('login.update');

//Lista cierta noticia de cierto autor(usuario)
Route::get('login/{idusuario}/{idnoticia}', [LoginController::class,'showNot'])->name('login.show.noticia');


//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>--------------------Boton: Nueva Noticia-----------------------------

//Formulario para crear una noticia
Route::get('login/create', [LoginController::class,'create'])->name('login.create');

//Recoge los datos del formulario del create y crea la noticia
Route::post('login/store/{$noticia}', [LoginController::class,'store'])->name('login.store');

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>--------------------Filtros: Categoria y Autor-----------------------------

//Lista las noticias de cierto usuario de cierta categoría
Route::post('login/{$idusuario}/{$idcategoria}', [LoginController::class,'showCat'])->name('login.show.categoria');