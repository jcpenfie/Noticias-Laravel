<?php

namespace App\Http\Controllers;

use App\Models\noticia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $noticias = noticia::paginate(10);

        return view('index', compact('noticias'));
    }
    
    public function noticias($idnoticia)
    {
        return view('index', compact('idnoticia'));
    }

}
