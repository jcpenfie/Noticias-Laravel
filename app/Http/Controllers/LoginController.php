<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Usuario;
use App\Models\Categoria;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        session_start();
        if (isset($_SESSION['usuario']) and isset($_SESSION['id'])) {
            session_destroy();
        }
        return view('login.login');
    }

    public function panel(Request $datos)
    {
        session_start();

        if (isset($_SESSION['usuario']) and isset($_SESSION['id'])) {
            $usuario = Usuario::where('nombre', '=', $_SESSION['usuario'])->first();
            $noticias = Noticia::where('autor_id', '=', $_SESSION['id'])->orderby('updated_at')->Paginate(5); //paginado de 5 en 5
            $categorias = Categoria::all();
        } else {
            $usuario = Usuario::where('nombre', '=', $datos->usuario)->first();
            $noticias = Noticia::where('autor_id', '=', $usuario->id)->orderby('updated_at')->Paginate(5); //paginado de 5 en 5
            $categorias = Categoria::all();
            
            $_SESSION['usuario'] = $datos->usuario;
            $_SESSION['id'] = $usuario->id;
        }
        return view('login.panel', compact('usuario' ,'categorias', 'noticias'));
    }

    public function create()
    {
        return view('login.create');
    }

    public function show()
    {
    }

    public function destroy(noticia $noticia)
    {
        return view('login.destroy', compact('noticia'));
    }
    public function update($idnoticia)
    {
        return view('login.update', compact('noticia'));
    }

    public function showNot()
    {
        # code...
    }
}
