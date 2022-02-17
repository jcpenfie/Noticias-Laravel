@extends('layouts.plantillalogin')

@section('title', 'Panel de ' . $usuario->nombre)

@section('content')
    <h1>Bienvenido {{ $usuario->nombre }}</h1>
    <div class="mt-2">
        <table class="mx-auto table-auto">
            <thead>
                <tr class="bg-blue-500">
                    <th class="px-16 py-2">
                        <span class="text-gray-100 font-semibold">Imagen</span>
                    </th>
                    <th class="px-16 py-2">
                        <span class="text-gray-100 font-semibold">Título</span>
                    </th>

                    <th class="px-16 py-2">
                        <span class="text-gray-100 font-semibold">Autor</span>
                    </th>

                    <th class="px-16 py-2">
                        <span class="text-gray-100 font-semibold">Categoría</span>
                    </th>

                    <th class="px-16 py-2">
                        <span class="text-gray-100 font-semibold">Ver</span>
                    </th>
                </tr>
            </thead>
            @foreach ($noticias as $noticia)
                <tbody class="bg-gray-200">
                    <tr class="bg-white border-b-2 border-gray-200">
                        <td>
                            <img src="{{$noticia->imagen}}" alt="portada" width="100" height="100">
                        </td>

                        <td class="px-16 py-2">
                            <span> {{$noticia->titulo}} </span>
                        </td>
                        <td class="px-16 py-2">
                            <span class="text-center ml-2 font-semibold">{{$usuario->nombre}}</span>
                        </td>
                        <td class="px-16 py-2">
                            <span>{{$noticia->categoria_id}}</span>
                        </td>

                        <td class="px-16 py-2">
                            <a href="{{route('login.show.noticia',[$usuario->id,$noticia->id])}}"
                                class="border-2 border-blue-500 rounded-lg font-bold text-blue-500 px-2 py-1 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white mr-6">
                                Ver noticia
                            </a>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
        {{$noticias->links()}}
    </div>

@endsection
