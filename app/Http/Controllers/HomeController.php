<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $noticias = Noticia::paginate(10);

        return view('index', compact('noticias'));
    }

    public function show($id){
        $noticia = Noticia::find($id);
        return view('show', compact('noticia'));
    }
    
    public function noticias($idnoticia)
    {
        return view('index', compact('idnoticia'));
    }


}
