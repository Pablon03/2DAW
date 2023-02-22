<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="w-75">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" href="{{route('index')}}">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>
    </div>
    <div class="w-25 d-flex justify-content-end mr-5">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ auth()->user()->name }}
        </a>
        <div class="dropdown-menu pull-right mr-5" aria-labelledby="navbarDropdownMenuLink">
          <div class="block px-4 py-2 text-xs text-gray-400">
            Manage Account
        </div>
        <a class="dropdown-item" href="{{ route('profile.show') }}">Mi Perfil</a>
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf

            <button type="submit">Log Out
            </button>
        </form>
        <a class="dropdown-item" href="{{route('logout')}}">Log Out</a>
      </div>

      {{-- <form method="POST" action="{{ route('logout') }}" x-data>
        @csrf

        <x-dropdown-link href="{{ route('logout') }}"
                 @click.prevent="$root.submit();">
            {{ __('Log Out') }}
        </x-dropdown-link>
    </form> --}}
        {{-- <div class="absolute z-50 mt-2 w-48 rounded-md shadow-lg origin-top-right right-0"
            aria-labelledby="navbarDropdownMenuLink">
            <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
                <!-- Account Management -->
                <div class="block px-4 py-2 text-xs text-gray-400">
                    Manage Account
                </div>

                <a class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                    href="http://localhost/github/2daw/2daws/unidad6/tweetdev/public/user/profile">Profile</a>


                <div class="border-t border-gray-200"></div>

                <!-- Authentication -->
                <form method="POST" action="http://localhost/github/2daw/2daws/unidad6/tweetdev/public/logout"
                    x-data="">
                    <input type="hidden" name="_token" value="usaJmaIXt14zBpuH7iTxQkxMAhRVdLOS777wO0AQ">
                    <a class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                        href="http://localhost/github/2daw/2daws/unidad6/tweetdev/public/logout"
                        @click.prevent="$root.submit();">Log Out</a>
                </form>
            </div>
        </div> --}}
    </div>
</nav>
