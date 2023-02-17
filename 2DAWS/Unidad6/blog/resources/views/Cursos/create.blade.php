@extends('layouts.plantilla')

@section('title', 'Crear Cursos')

@section('content')
    <h1>En esta página podrás crear un curso</h1>
    <form action="{{route('cursos.store')}}" method="POST">

        @scrf
        
        <label>
            Nombre:
            <input type="text" name="name">
        </label>
        <br>
        <label>
            Descripción:
            <textarea name="description" rows="5"></textarea>
        </label>
        <br>
        <label>
            Categoría:
            <input type="text" name="categoria">
        </label>
        <br>
        <button type="submit">Enviar Datos</button>
    </form>

@endsection
