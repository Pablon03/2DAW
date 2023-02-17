@extends('layouts.plantilla')

@section('title', 'Crear Cursos')

@section('content')
    <h1>En esta página podrás crear un curso</h1>
    <form action="{{route('cursos.store')}}" method="POST">

<<<<<<< HEAD
        @csrf
=======
        @scrf
        
>>>>>>> 810357b40b069f61e1bd079a2daf10d027802808
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
