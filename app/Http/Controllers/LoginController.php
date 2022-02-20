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
        return view('login.panel', compact('usuario', 'categorias', 'noticias'));
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

    public function destroy(noticia $noticia)
    {
        return view('login.destroy', compact('noticia'));
    }

    // public function update($idnoticia)
    // {
    //     $usuario = Usuario::where('nombre', '=', $_SESSION['usuario'])->first();
    //     return view('login.update', compact('noticia','usuario'));
    // }

    public function show($idnoticia)
    {
        session_start();
        $usuario = Usuario::where('nombre', '=', $_SESSION['usuario'])->first();
        $noticia = Noticia::find($idnoticia);
        $categorias = Categoria::all();
        $autores = Usuario::all();
        return view('login.show', compact('noticia', 'categorias','autores','usuario'));
    }

    public function edit(Noticia $noticia){
        session_start();
        $usuario = Usuario::where('nombre', '=', $_SESSION['usuario'])->first();
        $categorias = Categoria::all();
        $autores = Usuario::all();
        return view('login.edit', compact('noticia','categorias','autores','usuario'));
    }

    public function update(Request $request, Noticia $noticia){
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
        // $noticia->imagen = $request->imagen;
        $noticia->categoria_id = $request->categoria_id;

        $noticia->save();
        return redirect()->route('login.usuario');

    }
}
