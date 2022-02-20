@extends('layouts.plantillanoticias')

@section('title', 'Noticia')

@section('content')
    <div class="relative m-5">
        <div class="w-full bg-yellow-100 p-3 rounded md:w-2/5 mx-auto">
            <div class="mx-5 my-3 text-sm">
                <a href=""
                    class=" text-red-600 font-bold tracking-widest">{{ $categorias[$noticia->categoria_id - 1]->nombre }}</a>
            </div>
            <div class="w-full text-gray-800 text-4xl px-5 my-2 font-bold leading-none">
                {{ $noticia->titulo }}
            </div>

            <div class="mx-5">
                <img src="{{ asset("img/".$noticia->imagen) }}">
            </div>

            <div class="w-full text-gray-600 font-thin italic px-5 pt-3">
                Por <strong class="text-gray-700">{{ $autores[$noticia->autor_id - 1]->nombre }}</strong><br>
                {{ $noticia->created_at }}<br>
                Actualizado: {{ $noticia->updated_at }}
            </div>

            <div class="py-2 font-semibold mx-auto">
                <p class="my-5">{!! nl2br(e($noticia->descripcion)) !!}</p> {{-- Para que respete los saltos de líneas --}}
            </div>
        </div>
    </div>
@endsection
