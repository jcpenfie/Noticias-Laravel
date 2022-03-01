<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Categoria;

class UsuariosController extends Controller
{
    public function create()
    {
        session_start();
        $usuario = Usuario::where('nombre', '=', $_SESSION['usuario'])->first();
        $categorias = Categoria::all();
        return view('registro.create', compact('categorias', 'usuario'));
    }

    public function store(Request $request)
    {
        session_start();

        $usuario2 = Usuario::where('nombre', '=',$request->nombre)->first();
        
        if(!isset($usuario2->nombre)){
            $usuario = new Usuario();
            $usuario->nombre = $request->nombre;
            $usuario->password = $request->password;
            $usuario->rol = $request->rol;
    
            $usuario->save();
            return redirect()->route('login.usuario')->with('success','Usuario creado correctamente.');;
            
        }else{
            var_dump($usuario2);
            return redirect()->route('registro.create')->with('error','Ya existe ese usuario.');
        }
        
        
    }
}
