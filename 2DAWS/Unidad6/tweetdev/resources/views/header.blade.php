<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark my-5 rounded-3 shadow" style="width: 280px; height: auto">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <img width="30" height="20" class="mr-2" src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4f/Twitter-logo.svg/2491px-Twitter-logo.svg.png">
        <span class="fs-4">TweetDev</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item my-2">
            <a href="#" class="nav-link active d-flex" aria-current="page">
                <img width="30" height="20" class="mr-2" src="https://cdn-icons-png.flaticon.com/512/9131/9131957.png">
                <span>Home</span>
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a class="d-flex align-items-center text-white nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ auth()->user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-right mr-5" aria-labelledby="navbarDropdownMenuLink">
            <div class="block px-4 py-2 text-xs text-gray-400">
                Manage Account
            </div>

            <a class="dropdown-item" href="{{ route('profile.show') }}">Mi Perfil</a>

            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf

                <button type="submit" class="dropdown-item">Log Out</button>
            </form>
        </div>
    </div>
</div>
