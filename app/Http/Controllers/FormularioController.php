<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\FormularioMailable;
use Illuminate\Support\Facades\Mail;

class FormularioController extends Controller
{
    public function index(){
        return view('formulario.index');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'correo' => 'required|email',
            'mensaje' => 'required',
        ]);
        $correo = new FormularioMailable($request->all());

        Mail::to('rod.amanda@hotmail.com')->send($correo);

        return redirect()->route('paginaPrincipal')->with('info','Mensaje enviado');
    }
}
