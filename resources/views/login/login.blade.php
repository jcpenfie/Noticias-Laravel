@extends('layouts.plantillalogin')

@section('title', 'Login')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="px-8 py-6 mt-4 text-left bg-white shadow-lg">
        <h3 class="text-2xl font-bold text-center">Login to your account</h3>
        <form action="{{route('login.usuario')}}" method="post">
            @csrf
            <div class="mt-4">
                <div>
                    <label class="block" for="usuario">Usuario:<label>
                            <input type="text" name="usuario" placeholder="Usuario"
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" required>
                </div>
                <div class="mt-4">
                    <label class="block">Contraseña:<label>
                            <input type="password" name="password" placeholder="Contraseña"
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" required>
                </div>
                <div class="flex items-baseline justify-between">
                    <button class="px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Entrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection