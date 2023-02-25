@extends('layouts.miapp')

@section('title', 'Perfil del {{Auth::user()->name}}')
@section('heading', 'Inicio')

@section('content')
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

{{-- @section('usuarios')
    <div class="d-flex flex-column flex-shrink-0" style="width:280px">
        <div class="sidebar mt-5">
            <div class="card">
                <img class="card-img-top"
                    src="https://img.freepik.com/foto-gratis/retrato-nina-afroamericana-conmovida-complacida-cogidos-mano-corazon-diciendo-gracias-smi_1258-137610.jpg?size=626&ext=jpg"
                    alt="Card image cap">
                <div class="card-body">
                    <h2>{{ Auth::user()->name }}</h2>
                    <p>{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>
        <div style="margin-top: 20px">
            <h1 class="my-2 text-light" style="font-size: 20px">Lista de usuarios</h1>
            <hr>
            <div class="row" style="margin-top: 20px">
                @foreach ($usuarios as $usuario)
                    <div class="col-12 mb-3 d-flex align-items-center">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCBGgGxGVoooSozaxaw4dMikelp66NAnsfSF_nXb7Kmg&s"
                            class="rounded-circle mr-3 text-light" alt="Imagen de {{ $usuario->nombre }}" width="20">
                        <span class="text-light" style="color: black">{{ $usuario->name }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection --}}
