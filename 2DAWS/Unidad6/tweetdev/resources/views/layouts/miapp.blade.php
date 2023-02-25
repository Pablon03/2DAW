<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <!-- Styles -->
    <style>
        input#contenido-post:focus{
            box-shadow: none;
        border-color: #ced4da;
        outline: none;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen" style="background-color: #4C5967  !important">
        {{-- @livewire('navigation-menu') --}}

        <!-- Page Heading -->
        {{-- @include('header') --}}

        <!-- Page Content -->
        <main>
              <div class="container-fluid">
                <div class="row">
                  {{-- <div class="col-3 position-fixed">@yield('usuario')</div> --}}
                  <div class="col-3 position-fixed d-flex justify-content-end">@include('header')</div>
                  <div class="col-12 col-lg-6 mx-auto">@yield('content')</div>
                  <div class="col-3 position-fixed" style="right: 0;">@include('rightColumn')</div>
                </div>
              </div>
        </main>
    </div>

    @stack('modals')

    @livewireScripts
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
