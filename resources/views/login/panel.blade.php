@extends('layouts.plantillalogin')

@section('title', 'Panel de ' . $usuarioConsulta->nombre)

@section('content')
    <h1>Bienvenido {{$usuarioConsulta->nombre}}</h1>
    <div class="contenedor">
        @foreach ($noticias as $noticia)
            <div class="noticia">
                <img src="" alt="">
                <h3>{{$noticia->titulo}}</h3>
                <p>Categoria: {{$noticia->categoria_id}}</p>
                <p>{{$noticia->descripcion}}</p>
                <a href="{{route('login.update',$noticia->categoria_id)}}">EDITAR</a>
                <a href="{{route('login.destroy',$noticia->categoria_id)}}">BORRAR</a>
                <a href="{{route('login.show.noticia',[$noticia->autor_id,$noticia->categoria_id])}}">LEER MÁS</a>
            </div>
            <hr>
        @endforeach
        {{$noticias->links()}}
    </div>
@endsection