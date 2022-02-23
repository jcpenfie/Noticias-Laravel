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
        $usuario = Usuario::where('nombre', $datos->usuario)->where('password', $datos->password)->first();
            if (isset($_SESSION['usuario']) and isset($_SESSION['id'])) {
                if ($usuario->rol == "administrador") {
                    $noticias = Noticia::orderBy('updated_at', 'desc')->Paginate(5); //paginado de 5 en 5
                } else {
                    $noticias = Noticia::where('autor_id', '=', $_SESSION['id'])->orderBy('updated_at', 'desc')->Paginate(5); //paginado de 5 en 5
                }
                $categorias = Categoria::all();
                $usuarios = Usuario::all();
            } else {
                if(!isset($usuario->rol)){
                    $_SESSION['mensaje'] = 'Correo o contraseña incorrecto';
                    return redirect()->route('login');

                }else if ($usuario->rol == "administrador") {
                    $noticias = Noticia::orderBy('updated_at', 'desc')->Paginate(5); //paginado de 5 en 5
                } else {
                    $noticias = Noticia::where('autor_id', '=', $usuario->id)->orderBy('updated_at', 'desc')->Paginate(5); //paginado de 5 en 5
                }
                $categorias = Categoria::all();
                $usuarios = Usuario::all();

                $_SESSION['usuario'] = $datos->usuario;
                $_SESSION['id'] = $usuario->id;
                $_SESSION['mensaje'] = '';
            }
            return view('login.panel', compact('usuario', 'categorias', 'noticias', 'usuarios'));
    }

    public function create()
    {
        session_start();
        $usuario = Usuario::where('nombre', '=', $_SESSION['usuario'])->first();
        $categorias = Categoria::all();
        return view('login.create', compact('categorias', 'usuario'));
    }

    public function store(Request $request)
    {
        session_start();

        echo $_SESSION['id'];
        $noticia = new Noticia();

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $destino = "img/";
            $fileName = time() . '-' . $file->getClientOriginalName();

            $subidaImagen = $request->file('imagen')->move($destino, $fileName); //Sube la imagen al servidor a la ruta especificada
            $noticia->imagen = $fileName; //sube la imagen a la base de datos
        }


        $noticia->titulo = $request->titulo;
        $noticia->descripcion = $request->descripcion;
        $noticia->categoria_id = $request->categoria;
        $noticia->autor_id = $_SESSION['id'];

        $noticia->save();
        return redirect()->route('login.usuario');
    }

    public function destroy($idnoticia)
    {
        session_start();
        $noticia = Noticia::find($idnoticia);
        $noticia->delete();
        return redirect()->route('login.usuario');
    }

    public function show($idnoticia)
    {
        session_start();
        $usuario = Usuario::where('nombre', '=', $_SESSION['usuario'])->first();
        $noticia = Noticia::find($idnoticia);
        $categorias = Categoria::all();
        $autores = Usuario::all();
        return view('login.show', compact('noticia', 'categorias', 'autores', 'usuario'));
    }

    public function edit(Noticia $noticia)
    {
        session_start();
        $usuario = Usuario::where('nombre', '=', $_SESSION['usuario'])->first();
        $categorias = Categoria::all();
        $autores = Usuario::all();
        return view('login.edit', compact('noticia', 'categorias', 'autores', 'usuario'));
    }

    public function update(Request $request, Noticia $noticia)
    {
        session_start();

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $destino = "img/";
            $fileName = time() . '-' . $file->getClientOriginalName();

            $subidaImagen = $request->file('imagen')->move($destino, $fileName); //Sube la imagen al servidor a la ruta especificada
            $noticia->imagen = $fileName; //sube la imagen a la base de datos
        }

        $noticia->titulo = $request->titulo;
        $noticia->descripcion = $request->descripcion;
        $noticia->categoria_id = $request->categoria_id;

        if ($request->autor_id != $_SESSION['id']) {
            $noticia->autor_id = $request->autor_id;
        } else {
            $noticia->autor_id = $_SESSION['id'];
        }

        $noticia->save();
        return redirect()->route('login.usuario');
    }
}
