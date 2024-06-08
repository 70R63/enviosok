<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- spruha -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <!-- Favicon -->
    <link rel="icon" href="{{ url('spruha/img/brand/favicon.ico') }}" type="image/x-icon"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>{{ config('app.name', 'Laravel') }} - Plataforma de envios</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-primary bg-gradient shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="" src="{{asset("assets/Envios_OK_secundario.svg")}}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="pb-4">
            <section class="section-header bg-primary text-white pb-9 pb-lg-13 mb-4 mb-lg-6">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="text-justify">En EnvíosOK podrás cotizar envíos nacionales en sencillos pasos.</p>
                            <h1>Envía paquetes de forma segura y rápida.</h1>
                            <p class="text-justify">Hemos nacido como una empresa joven en el mercado de mensajería y paquetería al ofrecer a nuestros
                            clientes una plataforma autogestionable para generar sus propios envíos nacionales con los mejores aliados logísticos en México los 365 días
                            del año y en tiempo real.</p>
                            <p class="text-justify">En EnviosOK podrás cotizar envíos nacionales en dos sencillos pasos; sólo necesitamos el origen,
                            destino, peso y dimensiones del paquete que enviaremos. Nuestra plataforma está pensada
                            para ser usada por profesionales independientes y emprendedores hasta PyMes.</p>
                        </div>
                        <div class="col-md-6 text-center">
                            <div style="position: absolute;">
                                <img src="{{asset('assets/patterns/mancha-circulo.svg')}}" alt="" class="w-75">
                            </div>
                            <div style="position: absolute;">
                                <img src="{{asset('assets/imagenes/envios-ok.png')}}" alt="" class="w-75">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pattern bottom"></div>
            </section>
        </main>
    </div>
</body>
<script>
    var url_base = '{{url('/')}}';
    var token = document.head.querySelector('meta[name="csrf-token"]');
</script>
</html>
