@extends('layouts.plantilla')

@section('title', 'Editar Cursos')

@section('content')
    <h1>En esta página podrás editar un curso</h1>
    <form action="{{route('cursos.update', $curso)}}" method="POST">

        @csrf
        @method('put')
        
        <label>
            Nombre:
            <input type="text" name="name" value="{{$curso->name}}">
        </label>
        <br>
        <label>
            Descripción:
            <textarea name="description" rows="5">{{$curso->description}}</textarea>
        </label>
        <br>
        <label>
            Categoría:
            <input type="text" name="categoria" value="{{$curso->categoria}}">
        </label>
        <br>
        <button type="submit">Actualizar Datos</button>
    </form>

@endsection
