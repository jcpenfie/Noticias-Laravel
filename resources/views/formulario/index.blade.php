@extends('layouts.plantillalogin')

@section('title', 'Formulario de contacto')

@section('content')
    <h1>Formulario de contacto</h1>

    <form action="{{route('formulario.store')}}" method="POST">
        @csrf

        <label>
            Nombre:
            <br>
            <input type="text" name="name">
        </label>
        <br>

        @error('name')
        <p><strong>{{$message}}</strong></p>
        @enderror

        <label>
            Correo:
            <br>
            <input type="text" name="correo">
        </label>
        <br>

        @error('correo')
        <p><strong>{{$message}}</strong></p>
        @enderror

        <label>
            Mensaje:
            <textarea name="mensaje" cols="30" rows="10"></textarea>
        </label>
        <br>

        @error('mensaje')
        <p><strong>{{$message}}</strong></p>
        @enderror

        <button type="submit">Enviar mensaje</button>
@endsection