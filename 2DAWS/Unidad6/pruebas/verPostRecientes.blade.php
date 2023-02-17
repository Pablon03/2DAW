<div class="row">
    @foreach ($posts as $post)
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5>{{ $post->title }}</h5>
                    <p class="card-text">{{ str_limit($post->content, 100) }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            @auth
                                @if (Auth::user()->hasLikedPost($post->id))
                                    <form action="{{ route('unlike', $post->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">Quitar Me gusta</button>
                                    </form>
                                @else
                                    <form action="{{ route('like', $post->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success">Me gusta</button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                        <small class="text-muted">{{ $post->likes->count() }} Me gusta</small>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
