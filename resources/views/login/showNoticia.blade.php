@extends('layouts.plantillalogin')

@section('title', 'Detalle Noticia')

@section('content')
    <a href="{{ route('login.usuario') }}">Editar</a>
    <h1>{{ $noticia->titulo }}</h1>
    <h1>Autor: {{ $_SESSION['usuario'] }}</h1>
    <p>Categoria: {{ $categorias[$noticia->categoria_id - 1]->nombre }}</p>
    <img src="../{{ $noticia->imagen }}" alt="">
    <p>{{ $noticia->descripcion }}</p>
    <a href="{{ route('login.usuario') }}">Volver</a>
@endsection
