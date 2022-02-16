<?php

namespace App\Http\Controllers;

use App\Models\noticia;
use App\Models\usuario;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function panel($idusuario)
    {
        $usuario = usuario::where('id', '=', $idusuario)->get();
        $noticias = noticia::where('autor_id', '=', $idusuario)->orderby('updated_at')->Paginate(5); //paginado de 5 en 5
        return view('login.panel', compact('usuario'), compact('noticias'));
    }

    public function create()
    {
        return view('login.create');
    }

    public function show()
    {
    }

    public function destroy($idnoticia)
    {
        return view('login.destroy', compact('idnoticia'));
    }
    public function update($idnoticia)
    {
        return view('login.update', compact('idnoticia'));
    }
}
