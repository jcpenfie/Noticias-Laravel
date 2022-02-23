@extends('layouts.plantillalogin')

@section('title', 'Login')

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="px-8 py-6 mt-4 text-left bg-white shadow-lg">
            <h3 class="text-2xl font-bold text-center">Inicia sesión con tu cuenta</h3>
            @if (isset($_SESSION['mensaje']) && $_SESSION['mensaje'] != '')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error de validación</strong>
                    <span class="block sm:inline">{{ $_SESSION['mensaje'] }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-0 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            @endif
            <form action="{{ route('login.usuario') }}" method="post">
                @csrf
                <div class="mt-4">
                    <div>
                        <label class="block" for="usuario">Usuario:<label>
                                <input type="text" name="usuario" placeholder="Usuario"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                                    required>
                    </div>
                    <div class="mt-4">
                        <label class="block">Contraseña:<label>
                                <input type="password" name="password" placeholder="Contraseña"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                                    required>
                    </div>
                    <div class="flex items-baseline justify-between">
                        <button class="px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Entrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
