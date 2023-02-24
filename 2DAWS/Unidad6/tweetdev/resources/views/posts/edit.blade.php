@extends('layouts.miapp')

@section('title', 'Actualizar')
@section('heading', 'Actualizar Post')

@section('content')
<div class="pt-5">
    <div class="justify-content-center">
        <div class="card">
            <div class="card-header">Editar Publicación</div>
            <div class="card-body">
                <form method="POST" action="{{route('updatePost', $post)}}">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                        <div class="col-md-12 ml-1">

                            <input name="content" type="text" id="contenido-post" placeholder="{{$post->message}}"
                                style="outline:none" type="text"
                                class="border-0 rounded-6 form-control @error('contenido') is-invalid @enderror"
                                name="contenido" required>
                                @error('content')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="d-flex justify-content-end mt-1">
                            <button type="submit" class="rounded-pill btn btn-outline-primary">Actualizar Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection