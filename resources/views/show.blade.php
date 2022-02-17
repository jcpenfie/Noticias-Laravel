@extends('layouts.plantillanoticias')

@section('title', 'Noticia')

@section('content')
    <h1>{{$noticia->titulo}}</h1>
    <p>Categoria: {{ $categorias[$noticia->categoria_id-1]->nombre }}</p>
    <img src="{{$noticia->imagen}}" alt="">
    <p>{{$noticia->descripcion}}</p>
    <a href={{route('paginaPrincipal')}}>VOLVER</a>
@endsection