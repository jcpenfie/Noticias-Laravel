@extends('layouts.plantillalogin')

@section('title', 'Login')

@section('content')
    <h1>Bienvenido al login</h1>
    <form action="#" method="get">
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name">
        <label for="pass">Contraseña:</label>
        <input type="password" name="pass" id="pass">
        <input type="submit" value="Entrar">
    </form>
@endsection