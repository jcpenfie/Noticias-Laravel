@extends('layouts.plantillanoticias')

@section('title', 'Periódico')

@section('header')
    <nav class="bg-yellow-300 border-gray-200 px-2 sm:px-4 py-2.5 dark:bg-gray-800 sticky top-0 z-50">
        <div class="relative container flex flex-wrap justify-between items-center mx-auto">
            <a href="{{ route('paginaPrincipal') }}" class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-10" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <span class="self-center text-lg font-semibold whitespace-nowrap dark:text-white">Periódico</span>
            </a>
            <button data-collapse-toggle="mobile-menu" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
                <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
                <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                    @foreach ($categorias as $categoria)
                        <li>
                            <a href="{{ route('noticias.categoria', $categoria->id) }}"
                                class="block py-2 pr-4 pl-3 text-gray-700 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">{{ $categoria->nombre }}</a>
                        </li>
                    @endforeach
                    <li>
                        <a href="{{ route('paginaPrincipal') }}"
                            class="block py-2 pr-4 pl-3 text-gray-700 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Todas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endsection


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
