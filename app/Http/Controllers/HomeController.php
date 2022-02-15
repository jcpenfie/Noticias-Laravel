<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        //session_start();
        // ...
        return view('index');
    }
    public function login($idusuario = null){
        return view('login', compact('idusuario'));
    }
    public function noticias($idnoticia){
        return view('index', compact('idnoticia'));
    }
    public function delete($idnoticia){
        return view('pc.delete', compact('idnoticia'));
    }
    public function update($idnoticia){
        return view('pc.update', compact('idnoticia'));
    }
    public function create(){
        return view('pc.create');
    }
}
