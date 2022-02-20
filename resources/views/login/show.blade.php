@extends('layouts.plantillapanel')

@section('title', 'Detalle Noticia')

@section('botones')
    <a href="{{ route('login.create') }}" class="px-4 py-1 text-lg text-white bg-green-400 rounded font-bold">Crear nueva
        noticia</a>
    <a href="{{ route('login.edit', $noticia) }}"
        class="px-4 py-1 text-lg text-white bg-red-400 rounded font-bold">Editar</a>
    <a href="{{ route('login.usuario') }}" class="px-4 py-1 text-lg text-white bg-yellow-400 rounded font-bold">Volver</a>
@endsection

@section('content')
    <div class="relative">
        <div class="w-full md:w-2/5 mx-auto">
            @if ($usuario->rol == 'administrador')
                <form action="{{ route('login.destroy', $noticia->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Borrar" class="px-4 py-1 text-lg text-white bg-red-400 rounded font-bold">
                </form>
            @endif
            <div class="mx-5 my-3 text-sm">
                <a href=""
                    class=" text-red-600 font-bold tracking-widest">{{ $categorias[$noticia->categoria_id - 1]->nombre }}</a>
            </div>
            <div class="w-full text-gray-800 text-4xl px-5 my-2 font-bold leading-none">
                {{ $noticia->titulo }}
            </div>

            <div class="mx-5">
                <img src="{{ asset('img/' . $noticia->imagen) }}">
            </div>

            <div class="w-full text-gray-600 font-thin italic px-5 pt-3">
                Por <strong class="text-gray-700">{{ $autores[$noticia->autor_id - 1]->nombre }}</strong><br>
                {{ $noticia->created_at }}<br>
                Actualizado: {{ $noticia->updated_at }}
                <div class="py-2 font-semibold mx-auto">
                    <p class="my-5">{!! nl2br(e($noticia->descripcion)) !!}</p> {{-- Para que respete los saltos de líneas --}}
                </div>
            </div>
        </div>
    @endsection
