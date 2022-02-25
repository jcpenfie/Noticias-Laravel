@extends('layouts.plantillapanel')

@section('title', 'Panel de ' . $usuario->nombre)

@section('botones')
<a href="{{route('login.create')}}" class="px-4 py-1 text-lg text-white bg-green-400 rounded font-bold">Crear nueva noticia</a>
@endsection

@section('content')

    <div class="container flex justify-center mx-auto">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="border-b">
                    <table>
                        @if ($usuario->rol == 'administrador')
                            <tr>
                                <div class="flex justify-center" style="align-items: center !important;">
                                    <p class="font-medium leading-tight text-xl mt-0 mb-2 mr-2 text-gray-800">Categoría: </p>
                                    <div class="mb-3 xl:w-96">
                                        <select
                                            class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                            name="category_id" id="select-cagergory">
                                            <option value="">Todas</option>
                                            @foreach ($categorias as $cat)
                                                <option value="{{ $cat->id }}"
                                                    @if ($categoryId == $cat->id) selected @endif>
                                                    {{ $cat->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </tr>
                        @endif
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
                                        <img class="h-20 w-20 rounded" src="{{ asset("img/".$noticia->imagen) }}" alt="">
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $noticia->titulo }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $usuarios[$noticia->autor_id-1]->nombre }}
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
                                {{ $noticias->appends(['category_id' => $categoryId])->links() }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
