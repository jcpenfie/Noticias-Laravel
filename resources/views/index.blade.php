@extends('layouts.plantillanoticias')

@section('title', 'Periódico')

@section('content')
    <h1>Bienvenido al periodico</h1>
    <div class="contenedor">
        @foreach ($noticias as $noticia)
            <div class="noticia">
                <img src="" alt="">
                <h3>{{$noticia->titulo}}</h3>
                <p>Categoria: {{$noticia->categoria_id}}</p>
                <p>{{$noticia->descripcion}}</p>
                <a href="#">LEER MÁS</a>
            </div>
            <hr>
        @endforeach
        {{$noticias->links()}}
    </div>
@endsection