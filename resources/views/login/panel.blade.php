@extends('layouts.plantillalogin')

@section('title', 'Panel de ' . $usuario->nombre)

@section('header')

    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-800">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <a href="{{ route('paginaPrincipal') }}" class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-10" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <span class="self-center text-lg font-semibold whitespace-nowrap dark:text-white">{{ucfirst($usuario->rol)}}</span>
            </a>
            <div class="flex items-center md:order-2">
                <button type="button"
                    class="flex mr-3 text-sm rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                    <span class="sr-only">Abrir el menú de usuario</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>

                <div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="dropdown">
                    <div class="py-3 px-4">
                        <span class="block text-sm text-gray-900 dark:text-white">{{ $usuario->nombre }}</span>
                        <span
                            class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">{{ $usuario->rol }}</span>
                    </div>
                    <ul class="py-1" aria-labelledby="dropdown">
                        <li>
                            <a href="{{ route('login') }}"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Cerrar
                                Sesion</a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="{{route('login.create')}}" class="px-4 py-1 text-lg text-white bg-green-400 rounded font-bold">Crear nueva noticia</a>
        </div>
    </nav>
@endsection

@section('content')
    <div class="container flex justify-center mx-auto">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="border-b">
                    <table>
                        <thead class="bg-gray-800">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                    Imagen
                                </th>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                    Título
                                </th>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                    Autor
                                </th>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                    Categoria
                                </th>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                </th>
                            </tr>
                        </thead class="border-b">
                        @foreach ($noticias as $noticia)
                            <tbody>
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        <img class="h-20 w-20 rounded" src="{{ $noticia->imagen }}" alt="">
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $noticia->titulo }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $usuario->nombre }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $categorias[$noticia->categoria_id - 1]->nombre }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('login.show.noticia',  $noticia->id) }}"
                                            class="px-4 py-1 text-sm text-white bg-blue-400 rounded">
                                            Ver
                                        </a>
                                    </td>
                                </tr class="bg-white border-b">
                            </tbody>
                        @endforeach
                        <tr class="">
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap" colspan="5">
                                {{ $noticias->links() }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
