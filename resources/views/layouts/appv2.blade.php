<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="google-site-verification" content="Zvnh-85JQrapTpoEpzYXG7dldWEV0e9JSPhMh_IiBjU" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
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
        <nav class="navbar navbar-expand-md navbar-light bg-envios-gradient-reverse shadow-sm">
            <div class="container-fluid px-5">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="" src="{{asset("assets/Envios_OK_secundario.svg")}}" alt="">
                </a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#nosotros">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#planes">Nuestros Planes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#paqueteria">Paquetería</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#cotiza">Cotiza ahora</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#faqs">FAQ´S</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route('login')}}">Iniciar sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="pb-4">
            <section class="section-header bg-envios-gradient text-white">
                <div class="container-fluid px-5">
                    <div class="row">
                        <div class="col-md-6 my-auto">
                            <p class="text-justify">En EnvíosOK podrás cotizar envíos nacionales en sencillos pasos.</p>
                            <h1 class="fw-bold">Envía paquetes de forma segura y rápida</h1>
                            <p class="text-justify">Hemos nacido como una empresa joven en el mercado de mensajería y paquetería al ofrecer a nuestros
                                clientes una plataforma autogestionable para generar sus propios envíos nacionales con los mejores aliados logísticos en México los 365 días
                                del año y en tiempo real.</p>
                            <p class="text-justify">En EnviosOK podrás cotizar envíos nacionales en dos sencillos pasos; sólo necesitamos el origen,
                                destino, peso y dimensiones del paquete que enviaremos. Nuestra plataforma está pensada
                                para ser usada por profesionales independientes y emprendedores hasta PyMes.</p>
                            <div class="row my-4">
                                <div class="col-12 text-center text-md-start">
                                    <a class="btn btn-warning text-primary fw-bold">
                                        Cotiza ahora
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-center my-auto">
                            <img src="{{asset('assets/imagenes/seccion1.png')}}" alt="" class="w-90" style="max-width: 750px">
                        </div>
                    </div>
                </div>
                <div class="pattern bottom"></div>
            </section>
            <section class="section text-primary" id="nosotros">
                <div class="container-fluid ps-0 pe-5">
                    <div class="row">
                        <div class="col-md-6 my-auto mb-4">
                            <img src="{{asset('assets/imagenes/seccion2.png')}}" alt="" class="w-100" style="max-width: 750px">
                        </div>
                        <div class="col-md-6 my-auto ps-5 pt-3">
                            <h1 class="fw-bold">¿Qué es Envíos<span class="text-warning">OK</span>?</h1>
                            <p class="text-justify text-dark">En un mercado saturado de opciones, encontrar una empresa de envíos
                                confiable y con precios justos es crucial para cualquier emprendedor. Enviar
                                paquetes de forma segura y rápida a cualquier parte de México no sólo
                                garantiza la satisfacción del cliente, sino que también fortalece la reputación
                                y la credibilidad de nuestro negocio. Con precios justos y envíos seguros,
                                podemos concentrarnos en lo que realmente nos importa: hacer crecer
                                nuestro emprendimiento sin preocupaciones logísticas.</p>
                            <p class="text-justify text-dark">Es por ello que surge EnvíosOK como la plataforma más eficiente para que
                                puedas gestionar tus envíos por paquetería de una forma segura y
                                económica.</p>
                            <div class="row my-4">
                                <div class="col-12 text-center text-md-start">
                                    <a class="btn btn-warning text-primary fw-bold">
                                        Cotiza ahora
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section-header bg-cream text-white" id="planes">
                <div class="pattern top"></div>
                <div class="container-fluid mt-0 mt-sm-5 pt-5 px-5">
                    <div class="row justify-content-center">
                        <div class="col-12 text-center">
                            <h1 class="text-primary fw-bold mb-0">Nuestros mantras</h1>
                            <p class="text-dark">Somos el autoservicio digital de paquetería en México que necesitas para tu Negocio.</p>
                        </div>
                        <div class="col-sm-6 col-md-4 mt-3">
                            <div class="card border-0 rounded-50">
                                <div class="card-body text-center">
                                    <img src="{{asset('assets/iconos/engranes.svg')}}" style="max-width: 60px">
                                    <h5 class="card-title text-primary fw-bold mt-2">Autonomía</h5>
                                    <p class="card-text">Lorem Ipsum es simplemente el texto de
                                        relleno de las imprentas y archivos de
                                        texto.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 mt-3">
                            <div class="card border-0 rounded-50">
                                <div class="card-body text-center">
                                    <img src="{{asset('assets/iconos/libertad.svg')}}" style="max-width: 60px">
                                    <h5 class="card-title text-primary fw-bold mt-2">Libertad</h5>
                                    <p class="card-text">Lorem Ipsum es simplemente el texto de
                                        relleno de las imprentas y archivos de
                                        texto.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 mt-3">
                            <div class="card border-0 rounded-50">
                                <div class="card-body text-center">
                                    <img src="{{asset('assets/iconos/click.svg')}}" style="max-width: 60px">
                                    <h5 class="card-title text-primary fw-bold mt-2">Facilidad</h5>
                                    <p class="card-text">Lorem Ipsum es simplemente el texto de
                                        relleno de las imprentas y archivos de
                                        texto.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 mt-3">
                            <div class="card border-0 rounded-50">
                                <div class="card-body text-center">
                                    <img src="{{asset('assets/iconos/seguridad.svg')}}" style="max-width: 60px">
                                    <h5 class="card-title text-primary fw-bold mt-2">Seguridad</h5>
                                    <p class="card-text">Lorem Ipsum es simplemente el texto de
                                        relleno de las imprentas y archivos de
                                        texto.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 mt-3">
                            <div class="card border-0 rounded-50">
                                <div class="card-body text-center">
                                    <img src="{{asset('assets/iconos/camion-engrane.svg')}}" style="max-width: 60px">
                                    <h5 class="card-title text-primary fw-bold mt-2">Gestión de envíos</h5>
                                    <p class="card-text">Lorem Ipsum es simplemente el texto de
                                        relleno de las imprentas y archivos de
                                        texto.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 mt-3">
                            <div class="card border-0 rounded-50">
                                <div class="card-body text-center">
                                    <img src="{{asset('assets/iconos/reloj-engrane.svg')}}" style="max-width: 60px">
                                    <h5 class="card-title text-primary fw-bold mt-2">Eficiencia de tiempo al enviar paquetes</h5>
                                    <p class="card-text">Lorem Ipsum es simplemente el texto de
                                        relleno de las imprentas y archivos de
                                        texto.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 mt-3">
                            <div class="card border-0 rounded-50">
                                <div class="card-body text-center">
                                    <img src="{{asset('assets/iconos/etiqueta-precio.svg')}}" style="max-width: 60px">
                                    <h5 class="card-title text-primary fw-bold mt-2">Precios razonables en tus envíos nacionales</h5>
                                    <p class="card-text">Lorem Ipsum es simplemente el texto de
                                        relleno de las imprentas y archivos de
                                        texto.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center my-4">
                            <h3 class="text-primary fw-bold mb-0">Buscamos ofrecer a nuestros clientes una plataforma que les permita tener a su disposición envíos y paquetería las 24 horas del día de una forma autónoma.</h3>
                        </div>
                    </div>
                </div>
                <div class="pattern bottom"></div>
            </section>
            <section class="section text-primary" >
                <div class="container-fluid" id="paqueteria">
                    <div class="row">
                        <div class="col-md-6 my-auto pt-3 px-5">
                            <h1 class="fw-bold">¿Qué debo saber sobre los
                                envíos por <span class="text-warning">paquetería</span>?</h1>
                            <p class="text-justify text-dark">
                                <span class=" fw-bold text-primary">Entrega exprés: </span>Es la entrega que realizaremos entre uno a dos días hábiles.
                            </p>
                            <p class="text-justify text-dark">
                                <span class=" fw-bold text-primary">Entrega estándar: </span>En la entrega que se puede realizar después de 3 hasta 7
                                días hábiles.
                            </p>
                            <p class="text-justify text-dark">
                                <span class=" fw-bold text-primary">Paquetería: </span>Son todos aquellos paquetes que pesan máximo 68Kgs (ya sea
                                del peso báscula o peso dimensional).
                            </p>
                            <p class="text-justify text-dark">
                                <span class=" fw-bold text-primary">Paqueterías: </span>Son aquellos Partners con los que tiene alianza EnvíosOK para
                                el traslado seguro de tus paquetes (Estafeta, DHL, Redpack, entre otros).
                            </p>
                            <div class="row my-4">
                                <div class="col-12 text-center text-md-start">
                                    <a class="btn btn-warning text-primary fw-bold">
                                        Cotiza tu envío ahora
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 my-auto pe-0 text-end">
                            <img src="{{asset('assets/imagenes/seccion4.png')}}" alt="" class="w-100" style="max-width: 750px">
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-5" id="cotiza">
                    <div class="row">
                        <div class="col-12 text-center mt-5">
                            <h1 class="fw-bold">
                                Cotiza tu envío con nuestra calculadora de
                            </h1>
                            <img style="max-width: 200px" src="{{asset("assets/Envios_OK_variante_A.svg")}}" alt="">
                        </div>
                    </div>
                </div>
            </section>
            <section class="section-header bg-lightblue text-white" id="faqs">
                <div class="pattern top"></div>
                <div class="container-fluid mt-0 mt-sm-5 pt-5 px-5">
                    <div class="row justify-content-center">
                        <div class="col-12 text-center mb-4">
                            <h1 class="text-secondary fw-bold mb-0">FAQ´S</h1>
                        </div>
                        <div class="col-sm-6 col-md-5 mt-3">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading1">
                                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                            ¿Qué es una guía de rastreo?
                                        </button>
                                    </h2>
                                    <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="heading1">
                                        <div class="accordion-body">
                                            Es el número con el que se puede dar seguimiento a las
                                            entregas dentro de la red de cada proveedor (Estafeta, Fedex,
                                            DHL, Redpack, UPS) teniendo visibilidad en todo momento de
                                            la ubicación de tu paquete, hasta su entrega.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-5 mt-3">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading2">
                                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                            ¿Qué se entiende por sobrepesos o cargos adicionales?
                                        </button>
                                    </h2>
                                    <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2">
                                        <div class="accordion-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad amet cupiditate deserunt esse eum excepturi explicabo natus nisi officia possimus quae quam quo quos reiciendis repellendus, reprehenderit ut vel voluptates!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-5 mt-3">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading3">
                                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                            ¿Cuáles son los objetos prohibidos que no puedo enviar?
                                        </button>
                                    </h2>
                                    <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3">
                                        <div class="accordion-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad amet cupiditate deserunt esse eum excepturi explicabo natus nisi officia possimus quae quam quo quos reiciendis repellendus, reprehenderit ut vel voluptates!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-5 mt-3">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading4">
                                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                            ¿Puedo hacer envíos masivos a través de Excel?
                                        </button>
                                    </h2>
                                    <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4">
                                        <div class="accordion-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad amet cupiditate deserunt esse eum excepturi explicabo natus nisi officia possimus quae quam quo quos reiciendis repellendus, reprehenderit ut vel voluptates!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-5 mt-3">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading5">
                                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                            ¿Qué es el valor declarado?
                                        </button>
                                    </h2>
                                    <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5">
                                        <div class="accordion-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad amet cupiditate deserunt esse eum excepturi explicabo natus nisi officia possimus quae quam quo quos reiciendis repellendus, reprehenderit ut vel voluptates!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-5 mt-3">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading6">
                                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                            ¿Cómo aseguro mi envío y qué cobertura tiene?
                                        </button>
                                    </h2>
                                    <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6">
                                        <div class="accordion-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad amet cupiditate deserunt esse eum excepturi explicabo natus nisi officia possimus quae quam quo quos reiciendis repellendus, reprehenderit ut vel voluptates!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-5 mt-3">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading7">
                                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                            ¿Dónde puedo ver el rastreo de mis paquetes?
                                        </button>
                                    </h2>
                                    <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="heading7">
                                        <div class="accordion-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad amet cupiditate deserunt esse eum excepturi explicabo natus nisi officia possimus quae quam quo quos reiciendis repellendus, reprehenderit ut vel voluptates!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-5 mt-3">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading8">
                                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                            ¿Cómo Genero mi Reporte por Daño o Extravío?
                                        </button>
                                    </h2>
                                    <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="heading8">
                                        <div class="accordion-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad amet cupiditate deserunt esse eum excepturi explicabo natus nisi officia possimus quae quam quo quos reiciendis repellendus, reprehenderit ut vel voluptates!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-5 mt-3">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading9">
                                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                                            ¿Qué es un envío exprés?
                                        </button>
                                    </h2>
                                    <div id="collapse9" class="accordion-collapse collapse" aria-labelledby="heading9">
                                        <div class="accordion-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad amet cupiditate deserunt esse eum excepturi explicabo natus nisi officia possimus quae quam quo quos reiciendis repellendus, reprehenderit ut vel voluptates!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-5 mt-3">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading10">
                                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                                            ¿Se puede realizar pago contra entrega?
                                        </button>
                                    </h2>
                                    <div id="collapse10" class="accordion-collapse collapse" aria-labelledby="heading10">
                                        <div class="accordion-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad amet cupiditate deserunt esse eum excepturi explicabo natus nisi officia possimus quae quam quo quos reiciendis repellendus, reprehenderit ut vel voluptates!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 text-center my-4">
                            <a class="btn btn-warning text-primary fw-bold">
                                Ver mas
                            </a>
                        </div>
                    </div>
                </div>
                <div class="pattern bottom"></div>
            </section>

            <section class="section text-primary pb-0" >
                <div class="container-fluid px-5">
                    <div class="row justify-content-between">
                        <div class="col-md-4 col-sm-5 text-center text-md-start">
                            <img style="max-width: 220px" src="{{asset("assets/Envios_OK_primario.svg")}}" alt="">
                        </div>
                        <div class="col-md-8 justify-content-center d-flex align-items-end justify-content-md-end">
                            <div class="row justify-content-between">
                                <div class="col-auto">
                                    <a class="btn btn-link text-dark" style="text-decoration: none" href="tel:+5250987865">+52 5098 7865</a>
                                </div>
                                <div class="col-auto p-0">
                                    <a class="btn btn-link text-dark" style="text-decoration: none" href="mailto:hola@envios-ok.com">hola@envios-ok.com</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 my-3">
                            <hr class="hr-warning m-0">
                        </div>
                        <div class="col-md-4 col-sm-5 text-center text-md-start">
                            <div class="row text-dark justify-content-center align-items-center justify-content-md-start">
                                <div class="col-auto">
                                    Síguenos en:
                                </div>
                                <div class="col-auto p-0">
                                    <a class="btn btn-link text-dark px-1" style="text-decoration: none" href="https://facebook.com" target="_blank">
                                        <img style="max-width: 30px" src="{{asset("assets/iconos/facebook.svg")}}" alt="">
                                    </a>
                                </div>
                                <div class="col-auto p-0">
                                    <a class="btn btn-link text-dark px-1" style="text-decoration: none" href="https://instagram.com" target="_blank">
                                        <img style="max-width: 30px" src="{{asset("assets/iconos/instagram.svg")}}" alt="">
                                    </a>
                                </div>
                                <div class="col-auto p-0">
                                    <a class="btn btn-link text-dark px-1" style="text-decoration: none" href="https://youtube.com" target="_blank">
                                        <img style="max-width: 30px" src="{{asset("assets/iconos/youtube.svg")}}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8 justify-content-center d-flex align-items-end justify-content-md-end">
                            <div class="row justify-content-center justify-content-md-end">
                                <div class="col-auto p-0">
                                    <a class="btn btn-link text-dark px-1" style="text-decoration: none">Aviso de privacidad</a>
                                </div>
                                <div class="col-auto p-0 d-flex align-items-center text-dark">
                                    |
                                </div>
                                <div class="col-auto p-0">
                                    <a class="btn btn-link text-dark px-1" style="text-decoration: none">Glosario</a>
                                </div>
                                <div class="col-auto p-0 d-flex align-items-center text-dark">
                                    |
                                </div>
                                <div class="col-auto p-0">
                                    <a class="btn btn-link text-dark px-1" style="text-decoration: none">Opiniones</a>
                                </div>
                                <div class="col-auto p-0 d-flex align-items-center text-dark">
                                    |
                                </div>
                                <div class="col-auto p-0">
                                    <a class="btn btn-link text-dark px-1" style="text-decoration: none">Soporte</a>
                                </div>
                                <div class="col-auto p-0 d-flex align-items-center text-dark">
                                    |&nbsp;
                                </div>
                                <div class="col-auto p-0 pe-2 d-flex align-items-center text-dark">
                                    © Todos los derechos reservados
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
<script>
    var url_base = '{{url('/')}}';
    var token = document.head.querySelector('meta[name="csrf-token"]');
</script>
</html>
