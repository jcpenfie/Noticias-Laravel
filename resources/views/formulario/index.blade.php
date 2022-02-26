@extends('layouts.plantillalogin')

@section('title', 'Formulario de contacto')

@section('content')

<div class="w-full">
    <div class="bg-gradient-to-b from-yellow-500 to-yellow-300 h-96 text-center pt-6">
        
    </div>
    
    <div class="max-w-5xl mx-auto px-6 sm:px-6 lg:px-8 mb-12">
        <div class="bg-white w-full shadow rounded p-8 sm:p-12 -mt-72">
            <p class="text-3xl font-bold leading-7 text-center">Formulario de contacto</p>
            <form action="{{route('formulario.store')}}" method="POST">
                @csrf
                <div class="md:flex items-center mt-12">
                    <div class="w-full md:w-1/2 flex flex-col">
                        <label class="font-semibold leading-none">Nombre</label>
                        <input type="text" name="name" class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200" />
                    </div>
                    @error('name')
                        <p><strong>{{$message}}</strong></p>
                    @enderror
                    <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                        <label class="font-semibold leading-none">Correo</label>
                        <input type="text" name="correo" class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"/>
                    </div>
                    @error('correo')
                        <p><strong>{{$message}}</strong></p>
                    @enderror
                </div>
                <div>
                    <div class="w-full flex flex-col mt-8">
                        <label class="font-semibold leading-none">Mensaje</label>
                        <textarea name="mensaje" cols="30" rows="10" class="h-40 text-base leading-none text-gray-900 p-3 focus:oultine-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"></textarea>
                    </div>
                    @error('mensaje')
                        <p><strong>{{$message}}</strong></p>
                    @enderror
                </div>
                <div class="flex items-center justify-center w-full">
                    <a href="{{route('paginaPrincipal')}}" class="mt-9 font-semibold leading-none text-white py-4 px-10 bg-red-500 rounded hover:bg-red-600 focus:ring-2 focus:ring-offset-2 focus:ring-yellow-700 focus:outline-none mr-3">Volver</a>
                    <button type="submit" class="mt-9 font-semibold leading-none text-white py-4 px-10 bg-yellow-500 rounded hover:bg-yellow-600 focus:ring-2 focus:ring-offset-2 focus:ring-yellow-700 focus:outline-none">
                        Enviar mensaje
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection