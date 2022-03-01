<?php

use App\Http\Controllers\FormularioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuariosController;
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

//Muestra todas la noticias de cierta categoria
Route::get('noticias/{idcategoria}', [HomeController::class,'categoria'])->name('noticias.categoria');


//--------------------Login al panel de control-----------------------------

//Login que pide usuario y contraseña
Route::get('login', [LoginController::class,'index'])->name('login');


//--------------------Panel de control (usuarios)-----------------------------


//Panel de control: Lista de todas las noticias de ese usuario y puede filtrar por categoria
//(si es admin aparecen todas las noticias y un nuevo filtro por autor)
Route::post('panel', [LoginController::class,'panel'])->name('login.usuario');
Route::get('panel', [LoginController::class,'panel'])->name('login.usuario'); 


//>>>>>>>>>>>>>>>>>>--------------------Operaciones de las noticias-----------------------------


//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>--------------------Boton: Nueva Noticia-----------------------------

//Formulario para crear una noticia
Route::get('panel/create', [LoginController::class,'create'])->name('login.create');

//Recoge los datos del formulario del create y crea la noticia
Route::post('panel/store', [LoginController::class,'store'])->name('login.store');

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>--------------------Botones: borrar y editar y ver-----------------------------

//En el panel de control hay un botón borrar que llama a este método con la id que hay que borrar
Route::delete('panel/destroy/{idnoticia}', [LoginController::class,'destroy'])->name('login.destroy');

//Te manda a un formulario con los datos ya introducidos en él para modificar exactamente lo que quieres
Route::get('panel/edit/{noticia}', [LoginController::class,'edit'])->name('login.edit');
Route::put('panel/update/{noticia}', [LoginController::class,'update'])->name('login.update');

//Lista cierta noticia de cierto autor(usuario)
Route::get('panel/{idnoticia}', [LoginController::class,'show'])->name('login.show.noticia');

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>--------------------Filtros: Categoria y Autor-----------------------------

//Lista las noticias de cierto usuario de cierta categoría
Route::post('panel/{$idusuario}/{$idcategoria}', [LoginController::class,'showCat'])->name('login.show.categoria');



// Pagina con la noticia ESTE CASTIGADO AQUÍ QUE SI NO FUNCIONA EL LOGIN XD
Route::get('noticia/{idnoticia}',[HomeController::class,'show'])->name('noticias.show');

//MAIL
Route::get('formulario', [FormularioController::class, 'index'])->name('formulario.index');
Route::post('formulario', [FormularioController::class, 'store'])->name('formulario.store');


//Crección de usuarios

//Formulario para crear un usuario
Route::get('registro', [UsuariosController::class,'create'])->name('registro.create');

//Recoge los datos del formulario del create y crea el usuario
Route::post('registro/store', [UsuariosController::class,'store'])->name('registro.store');