@extends('layouts.miapp')

@section('title', 'Inicio')
@section('heading', 'Inicio')

@section('content')
    {{-- <div class="sidebar">
        <h2>{{ $user->name }}</h2>
        <p>{{ $user->email }}</p>
    </div> --}}

    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Post') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('store') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-12 ml-1">
                                    <textarea id="contentido" type="text" class="form-control @error('contenido') is-invalid @enderror" name="contenido"
                                        required>{{ old('contenido') }}</textarea>

                                    @error('content')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 ">
                                    <button type="submit"
                                        class="bg-info text-white rounded-pill btn btn-primary text-dark">
                                        {{ __('Postear') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (count($posts) > 0)
                    @foreach ($posts as $post)
                        <div class="card my-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        {{-- <img src="{{ $post->user->profile_image }}" class="rounded-circle mr-3"
                                            width="50px" height="50px"> --}}
                                        <div>
                                            <h5 class="mb-0"><a
                                                    href="{{ route('profile.show', $post->user) }}">{{ $post->user->name }}</a>
                                            </h5>

                                            {{-- Pone el botón para editar --}}
                                            {{-- Está bien, solo queda ponerlo bonito y funcional --}}
                                            @if($post->user->name === Auth::user()->name)
                                                <h1>Hola</h1>
                                            @endif
                                            <h4 class="mb-0">{{ $post->message }}</h4>
                                            <small>{{ $post->created_at->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                    {{-- <div>
                                        <button class="btn btn-sm btn-outline-secondary"><i
                                                class="far fa-comment"></i></button>
                                        <button class="btn btn-sm btn-outline-secondary"><i
                                                class="fas fa-retweet"></i></button>
                                        @if (auth()->user()->hasLiked($post))
                                            <form action="{{ route('posts.likes.destroy', $post) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-secondary"><i
                                                        class="fas fa-heart text-danger"></i></button>
                                            </form>
                                        @else
                                            <form action="{{ route('posts.likes.store', $post) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-secondary"><i
                                                        class="far fa-heart"></i></button>
                                            </form>
                                        @endif
                                    </div> --}}
                                </div>
                                <p class="mt-3">{{ $post->content }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No hay publicaciones todavía.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
