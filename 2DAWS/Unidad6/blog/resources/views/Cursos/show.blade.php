@extends('layouts.plantilla')

@section('title', 'Ver Cursos' . $curso->name)

@section('content')
    <h1>Bienvenido al curso: {{$curso->name}}</h1>
@endsection
