@extends('layouts.plantillapanel')

@section('title', 'Nueva Noticia')

@section('botones')
<a href="{{route('login.usuario')}}" class="px-4 py-1 text-lg text-white bg-yellow-400 rounded font-bold">Volver</a>
@endsection

@section('content')
    <div class="w-full">
        <div class="bg-gradient-to-b from-blue-800 to-blue-600 h-96"></div>
        <div class="max-w-5xl mx-auto px-6 sm:px-6 lg:px-8 mb-12">
            <div class="bg-white w-full shadow rounded p-8 sm:p-12 -mt-72">
                <p class="text-3xl font-bold leading-7 text-center">Crear una nueva noticia</p>
                <form action="{{ route('login.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="w-full flex flex-col mt-8">
                        <div class="w-full flex flex-col">
                            <label class="font-semibold leading-none" for="titulo">Título: </label>
                            <input type="text" name="titulo" id="titulo"
                                class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200" />
                        </div>
                    </div>

                    <div class="w-full flex flex-col mt-8">
                        <div class="w-full flex flex-col">
                            <label class="font-semibold leading-none" for="descripcion">Descripción: </label>
                            <textarea name="descripcion" id="descripcion" cols="30" rows="10"
                                class="h-40 text-base leading-none text-gray-900 p-3 focus:oultine-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"></textarea>
                        </div>
                    </div>

                    <div class="md:flex items-center mt-8">
                        <div class="w-full flex flex-col">
                            <label class="font-semibold leading-none" for="imagen">Imagen: </label>
                            <input type="file" name="imagen" id="imagen"
                                class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200" />
                        </div>
                    </div>
                    <div class="md:flex items-center mt-8">
                        <div class="w-full flex flex-col">
                            <label class="font-semibold leading-none" for="categoria    ">Categoría: </label>
                            <select class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200" name="categoria" id="categoria" required>
                                <option value="0">Seleccionar</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="flex items-center justify-center w-full">
                        <button
                            class="mt-9 font-semibold leading-none text-white py-4 px-10 bg-blue-700 rounded hover:bg-blue-600 focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 focus:outline-none">
                            Crear
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
