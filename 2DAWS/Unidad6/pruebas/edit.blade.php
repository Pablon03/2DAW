@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar publicación</h2>

        <form method="post" action="{{ route('posts.update', $post->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="body">Mensaje:</label>
                <textarea class="form-control" rows="5" id="body" name="body">{{ $post->body }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
@endsection
