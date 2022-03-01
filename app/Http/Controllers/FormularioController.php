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

        #Validaciones del formulario.

        $request->validate([
            'name' => 'required',
            'correo' => 'required|email',
            'mensaje' => 'required',
        ]);
        
        $correo = new FormularioMailable($request->all());

        Mail::to('admin@periodico.com')->send($correo);

        return redirect()->route('paginaPrincipal')->with('success','Mensaje enviado');
    }
}
