@extends('layouts.plantillanoticias')

@section('title', 'Periódico')

@section('content')
    <!-- component -->
    <div class="min-h-screen bg-yellow-400 flex justify-center items-center py-20">
        <div class="container mx-auto p-12 bg-gray-100 rounded-xl">
            <h1 class="text-4xl uppercase font-bold from-current mb-8">Noticias</h1>
            <div class="sm:grid sm:grid-cols-2 lg:grid-cols-3 gap-4 space-y-4 sm:space-y-0">
                @foreach ($noticias as $noticia)
                    <div class="bg-white">
                        <div>
                            <div class="shadow-lg hover:shadow-xl transform transition duration-500 hover:scale-105">
                                <div>
                                    <img class="w-full" src="{{ $noticia->imagen }}" />
                                    <div class="px-4 py-2">
                                        <h1 class="text-xl font-gray-700 font-bold">{{ $noticia->titulo }}
                                        </h1>
                                        <div class="flex space-x-2 mt-2">
                                            <h3 class="text-lg text-gray-600 font-semibold mb-2">
                                                {{ $categorias[$noticia->categoria_id - 1]->nombre }}</h3>
                                        </div>
                                        <p class="text-sm tracking-normal">{{ $noticia->descripcion }}</p>
                                        <a href={{ route('noticias.show', $noticia->id) }}><button
                                                class="mt-12 w-full text-center bg-yellow-400 py-2 rounded-lg">Leer
                                                más</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <br>
            {{ $noticias->links() }}
        </div>
    </div>
@endsection
