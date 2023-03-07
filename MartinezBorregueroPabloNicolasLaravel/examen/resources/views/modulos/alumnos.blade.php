@extends('layouts.miapp')

@section('title', 'Mostrar Alumnos')

@section('content')
<h1>Listado de alumnos</h1>

<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($alumnos as $alumno)
            <tr>
                <td>{{ $alumno->nombre }}</td>
                <td>{{ $alumno->apellidos }}</td>
                <td>{{ $alumno->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<h2>Añadir nuevo alumno</h2>

<form method="POST" action="{{ route('agregar', $modulo->id) }}">
    @csrf
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
    </div>
    <div>
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <button type="submit">Añadir alumno</button>
</form>

@endsection