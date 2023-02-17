@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detalles de la publicación</h2>

        <div class="card">
            <div class="card-header">
                Publicado por: {{ $post->user->name }}
            </div>
            <div class="card-body">
                <p class="card-text">{{ $post->body }}</p>
            </div>
            <div class="card-footer text-muted">
                Publicado el {{ $post->created_at }}
            </div>
        </div>
    </div>
@endsection
