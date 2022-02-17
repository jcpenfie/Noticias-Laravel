@extends('layouts.plantillanoticias')

@section('title', 'Noticia')

@section('content')
    <h1>{{$noticia->titulo}}</h1>
    <p>Categoria: {{$noticia->categoria_id}}</p>
    <img src="{{$noticia->imagen}}" alt="">
    <p>{{$noticia->descripcion}}</p>
    <a href={{route('paginaPrincipal')}}>VOLVER</a>
@endsection