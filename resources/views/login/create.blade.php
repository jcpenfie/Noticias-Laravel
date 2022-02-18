@extends('layouts.plantillalogin')

@section('title', 'Nueva Noticia')

@section('content')
    <h1>Inserta una nueva noticia</h1>
    <form action="{{route('login.store')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <label for="imagen">Imagen: </label>
        <input type="file" name="imagen" id="imagen"><br>
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo"><br>
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea><br>
        <label for="categoria">Categoría:</label>
        <select name="categoria" id="categoria" required>
            <option value="0">Seleccionar</option>
            @foreach ($categorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
            @endforeach
        </select><br>
        <input type="submit" value="Crear">
    </form>
@endsection