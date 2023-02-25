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