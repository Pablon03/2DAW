@extends('layouts.miapp')

@section('title', 'Inicio')
@section('heading', 'Inicio')

@section('content')
    <div class="pt-5">
        <div class="justify-content-center">
            <div class="card">
                <div class="card-header">{{ __('Create Post') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('store') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12 ml-1">
                                <input type="text" id="contenido-post" placeholder="¿Qué está pasando?"
                                    style="outline:none" type="text"
                                    class="border-0 rounded-6 form-control @error('contenido') is-invalid @enderror"
                                    name="contenido" required>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="d-flex justify-content-end mt-1">
                                <button type="submit" class="rounded-pill btn btn-outline-primary">
                                    {{ __('Postear') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div>
        @if (count($posts) > 0)
            @foreach ($posts as $post)
                @if ($loop->index % 4 == 0)
                    <div class="sidebar mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h2>Colgate <small>· Publicidad</small></h2>
                            </div>
                            <img class="card-img-top" style="object-fit: cover; max-height: 200px; object-position: 100% 0;"
                                src="https://phantom-marca.unidadeditorial.es/979d2e368c16af2240dd46edaed2adc1/crop/0x203/998x763/resize/1320/f/jpg/assets/multimedia/imagenes/2021/05/06/16202987142933.jpg"
                                alt="Card image cap">
                        </div>
                    </div>
                @endif
                <div class="card my-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h5 class="mb-0 font-weight-bold text-muted"><a
                                            href="{{ route('showUser', $post->user->id) }}">{{ $post->user->name }}</a>
                                    </h5>
                                    <p class="mb-0 fw-normal">{{ $post->message }}</p>
                                    <div class="d-flex">
                                        <small>{{ $post->created_at->diffForHumans() }}</small>

                                        @if ($post->user->name === Auth::user()->name)
                                            <small><a href="{{ route('editPost', ['post' => $post->id]) }}"> ·
                                                    Editar</a></small>
                                            <form action="{{ route('destroyPost', $post->id) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button class="d-flex " type="submit"><small>· Borrar Post</small></button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3">{{ $post->content }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <p>No hay publicaciones todavía.</p>
        @endif
    </div>



@endsection
