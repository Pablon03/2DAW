@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Crear publicación</h2>

        <form method="post" action="{{ route('posts.store') }}">
            @csrf
            <div class="form-group">
                <label for="body">Mensaje:</label>
                <textarea class="form-control" rows="5" id="body" name="body"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Crear publicación</button>
        </form>
    </div>
@endsection
