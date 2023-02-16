@extends('layouts.plantilla')

@section('title', 'Ver Cursos' . $curso->name)

@section('content')
    <h1>Bienvenido al curso: {{$curso->name}}</h1>
    <a href="{{route('cursos.index')}}">Volver a Cursos</a>
    <p><strong>Categoría:</strong>{{$curso->categoria}}</p>
    <p><strong>Descripción:</strong>{{$curso->descripcion}}</p>

@endsection
