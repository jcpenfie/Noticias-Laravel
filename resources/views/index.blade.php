@extends('layouts.plantillanoticias')

@section('title', 'Periódico')

@section('content')
    <h1>Bienvenido al periodico</h1>
    <ul>
        <li>{{$noticia}}</li>
    </ul>
@endsection