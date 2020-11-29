@php
    //Impide que se almacene la pagina en memoria cache, lo que provoca que se refresque cada vez que se retrocede
    //Se usa para poder refrescar adecuadamente el NavComponent que conforma la pestaña "favoritos" en el navBar
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
    @yield('styles')
    @livewireStyles

</head>
<body>

    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light shadow nav" style="max-height:100px;">
            <div class="container">

                <a class="navbar-brand custom-logo-link" href="{{ url('/') }}">
                    <img src="" alt="tiendita">
                </a>

                <form name="search" action="{{ route('search') }}" method="GET">
                    @csrf
                    <div class="container-3">
                        <div class="vl"></div>
                        @livewire('buscar-component')
                    </div>
                </form>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto menu">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="{{ route('register') }}">{{ __('Crea tu cuenta') }}</a>
                                </li>
                            @endif
                        @else
                        
                        {{--User--}}
                            <small><i class="far fa-user-circle fa-2x mt-2" style="color: rgba(51, 51, 51, 0.616)"></i></small>
                            <li class="nav-item dropdown mr-2">
                                <a id="navbarDropdown text-dark" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-dark" href="{{ route('ventas.create') }}">
                                        Vender
                                    </a>
                                    <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        {{--Mis Compras--}}
                            <li class="nav-item mr-2">

                                <a href="{{ route('compras.show', Auth::user()->id) }}" class="nav-link">
                                    Mis compras
                                </a>

                            </li>

                        {{--Favoritos--}}
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Favoritos
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    
                                    @livewire('nav-component')

                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
                
                {{--Menu desplegable en el Nav, Se muestra en pantallas con resoluciones desde 769px hasta 991px de ancho--}}
                    <li class="nav-item dropdown no-arrow">
                        <a class="btnMenu dropdown no-arrow text-dark" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bars"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            @guest
                                <a class="nav-link text-dark" href="{{ route('login') }}">{{ __('Ingresar') }}</a>

                                @if (Route::has('register'))
                                    <a class="nav-link text-dark" href="{{ route('register') }}">{{ __('Crea tu cuenta') }}</a>
                                @endif
                            @else
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            @endguest
                        </div>
                    </li>

            </div>
        </nav>
        
        <!-- Mensajes de notificacion -->
            @if(isset($danger))
                <div style="z-index: 99 !important">
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $danger }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        <main class="mt-3 mb-3">
            @yield('content')
        </main>

    </div>
    
    {{--jquery--}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
    @stack('scripts')
    @livewireScripts
</body>
</html>