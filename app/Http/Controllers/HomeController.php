<?php

namespace App\Http\Controllers;

use App\Models\noticia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $noticias = noticia::paginate(10);
        
        return view('index', compact('noticias'));
    }
    public function login($idusuario = null){
        return view('login', compact('idusuario'));
    }
    public function noticias($idnoticia){
        return view('index', compact('idnoticia'));
    }
    public function destroy($idnoticia){
        return view('login.destroy', compact('idnoticia'));
    }
    public function update($idnoticia){
        return view('login.update', compact('idnoticia'));
    }
    public function create(){
        return view('login.create');
    }
}
