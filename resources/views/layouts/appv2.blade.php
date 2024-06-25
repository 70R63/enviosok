<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="google-site-verification" content="Zvnh-85JQrapTpoEpzYXG7dldWEV0e9JSPhMh_IiBjU" />
    <meta name="description" content="Realiza tus envíos nacionales de forma segura y rápida. Cotiza tu envío en minutos con nuestra plataforma auto gestionable. ¡Cotizar envíos nacionales nunca fue tan fácil!">
    <meta name="keywords" content="envíos nacionales, cotizar envío, enviar paquete, plataforma auto gestionable para mensajería, paquetería exprés, enviar paquete urgente">
    <meta property="og:title" content="Envíos nacionales - Enviar paquete de forma segura y rápida">
    <meta property="og:description" content="Realiza tus envíos nacionales de forma segura y rápida. Cotiza tu envío y envía paquetes con nuestra plataforma auto gestionable.">
    <meta property="og:image" content="{{asset('img/enviosok.jpeg')}}">
    <meta property="og:url" content="{{config('app.url', 'https://envios-ok.com')}}">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content=" Envíos nacionales - Enviar paquete de forma segura y rápida ">
    <meta name="twitter:description" content="Realiza tus envíos nacionales de forma segura y rápida. Cotiza tu envío y envía paquetes con nuestra plataforma auto gestionable.">
    <meta name="twitter:image" content="{{asset('img/enviosok.jpeg')}}">
    <meta name="lang" content="es-MX"/>
    <meta name="author" content="EnvíosOK"/>
    <meta name="robots" content="index, follow"/>
    <link rel="canonical" href="{{config('app.url', 'https://envios-ok.com')}}"/>
    <!-- spruha -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <!-- Favicon -->
    <link rel="icon" href="{{ url('spruha/img/brand/favicon.ico') }}" type="image/x-icon"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>Envíos nacionales: Cotiza tu envío y manda paquetes de forma segura</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-envios-gradient-reverse shadow-sm sticky" id="menu">
            <div class="container">
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
                            <a class="nav-link text-white" href="#mantras">Nuestros Mantras</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#paqueteria">Paquetería</a>
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
            <div class="container-fluid py-3 bg-envios-gradient sticky" id="cotizador">
                <div class="container text-white ">
                    <div class="row justify-content-between appear-scale">
                        <div class="col-12 text-center">
                            <h5 class="fw-bold animate__animated animate__flip">Cotiza gratis tu envío</h5>
                        </div>
                        <div class="col-md-2 col-6">
                            <label for="origen">Origen</label>
                            <input type="text" id="origen" class="form-control form-control-sm" placeholder="Código postal" autocomplete="off">
                        </div>
                        <div class="col-md-2 col-6">
                            <label for="origen">Destino</label>
                            <input type="text" id="destino" class="form-control form-control-sm" placeholder="Código postal" autocomplete="off">
                        </div>
                        <div class="col-md-2">
                            <label for="origen">Peso (kg)</label>
                            <input type="number" id="peso" class="no-controls form-control form-control-sm" placeholder="Kg" step="0.1" inputmode="numeric" autocomplete="off">
                        </div>
                        <div class="col-md-3">
                            <label for="peso">Tamaño de caja (cm)</label>
                            <div class="d-flex">
                                <input type="number" id="peso" class="no-controls form-control form-control-sm rounded-0 rounded-start" placeholder="Alto" step="0.1" inputmode="numeric" autocomplete="off">
                                <input type="number" id="peso" class="no-controls form-control form-control-sm rounded-0" placeholder="Largo" step="0.1" inputmode="numeric" autocomplete="off">
                                <input type="number" id="peso" class="no-controls form-control form-control-sm rounded-0 rounded-end" placeholder="Ancho" step="0.1" inputmode="numeric" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-auto d-flex align-items-end mt-3 mt-sm-0">
                            <button class="btn btn-sm px-2 btn-warning text-primary fw-bold animate__animated animate__wobble">Cotizar envío</button>
                        </div>
                    </div>
                </div>
            </div>
            <section class="section-header bg-envios-gradient text-white">
                <div class="container-fluid">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 my-auto animate__animated animate__backInLeft appear-scale">
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
                            <div class="col-md-6 text-center my-auto text-md-end animate__animated animate__slideInRight appear-left">
                                <img src="{{asset('assets/imagenes/seccion1.png')}}" alt="Envíos nacionales de forma segura y rápida" class="w-90" style="max-width: 750px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pattern bottom"></div>
            </section>
            <section class="section text-primary mb-4" id="nosotros">
                <div class="container-fluid">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 my-auto mb-4 appear-left">
                                <img src="{{asset('assets/imagenes/seccion2.png')}}" alt="Cotizar envío a toda la República con Estafeta, DHL, RedPack" class="w-100" style="max-width: 750px">
                            </div>
                            <div class="col-md-6 my-auto pt-3 appear-left">
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
                </div>
            </section>
            <section class="section-header bg-cream text-white" id="mantras">
                <div class="pattern top"></div>
                <div class="container-fluid mt-5 pt-5 px-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 text-center appear-scale">
                                <h1 class="text-primary fw-bold mb-0">Nuestros mantras</h1>
                                <p class="text-dark">Somos el autoservicio digital de paquetería en México que necesitas para tu Negocio.</p>
                            </div>
                            <div class="col-sm-6 col-md-4 mt-3 appear-scale-bottom">
                                <div class="card border-0 rounded-50">
                                    <div class="card-body text-center">
                                        <img src="{{asset('assets/iconos/engranes.svg')}}" style="max-width: 60px">
                                        <h5 class="card-title text-primary fw-bold mt-2">Autonomía</h5>
                                        <p class="card-text">Gestiona tus envíos sin dependencia, con total control y autonomía.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 mt-3 appear-scale">
                                <div class="card border-0 rounded-50">
                                    <div class="card-body text-center">
                                        <img src="{{asset('assets/iconos/libertad.svg')}}" style="max-width: 60px">
                                        <h5 class="card-title text-primary fw-bold mt-2">Libertad</h5>
                                        <p class="card-text">Envía lo que quieras, cuando quieras, disfrutando de plena libertad y flexibilidad.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 mt-3 appear-scale-bottom">
                                <div class="card border-0 rounded-50">
                                    <div class="card-body text-center">
                                        <img src="{{asset('assets/iconos/click.svg')}}" style="max-width: 60px">
                                        <h5 class="card-title text-primary fw-bold mt-2">Facilidad</h5>
                                        <p class="card-text">Facilitamos cada paso del proceso de envío para tu comodidad y tranquilidad.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 mt-3 appear-scale">
                                <div class="card border-0 rounded-50">
                                    <div class="card-body text-center">
                                        <img src="{{asset('assets/iconos/seguridad.svg')}}" style="max-width: 60px">
                                        <h5 class="card-title text-primary fw-bold mt-2">Seguridad</h5>
                                        <p class="card-text">Garantizamos la seguridad de tus paquetes en cada etapa del envío.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 mt-3 appear-scale-bottom">
                                <div class="card border-0 rounded-50">
                                    <div class="card-body text-center">
                                        <img src="{{asset('assets/iconos/camion-engrane.svg')}}" style="max-width: 60px">
                                        <h5 class="card-title text-primary fw-bold mt-2">Gestión de envíos</h5>
                                        <p class="card-text">Optimiza la gestión de tus envíos con nuestra plataforma intuitiva. 100% autogestionable.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 mt-3 appear-scale">
                                <div class="card border-0 rounded-50">
                                    <div class="card-body text-center">
                                        <img src="{{asset('assets/iconos/reloj-engrane.svg')}}" style="max-width: 60px">
                                        <h5 class="card-title text-primary fw-bold mt-2">Eficiencia</h5>
                                        <p class="card-text">Envía de manera rápida y eficiente, ahorrando tiempo y recursos.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 mt-3 appear-scale-bottom">
                                <div class="card border-0 rounded-50">
                                    <div class="card-body text-center">
                                        <img src="{{asset('assets/iconos/etiqueta-precio.svg')}}" style="max-width: 60px">
                                        <h5 class="card-title text-primary fw-bold mt-2">Precios razonables</h5>
                                        <p class="card-text">Disfruta de precios competitivos sin sacrificar calidad en el servicio.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center my-4 appear-scale">
                                <h3 class="text-primary fw-bold mb-0">Buscamos ofrecer a nuestros clientes una plataforma que les permita tener a su disposición envíos y paquetería las 24 horas del día de una forma autónoma.</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pattern bottom"></div>
            </section>
            <section class="section text-primary" >
                <div class="container-fluid" id="paqueteria">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 my-auto pt-3 appear-scale">
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
                            <div class="col-md-6 my-auto text-end appear-left">
                                <img src="{{asset('assets/imagenes/seccion4.png')}}" alt="Envíos baratos a través de Estafeta, RedPack, DHL" class="w-100" style="max-width: 750px">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section-header bg-lightblue text-white appear-left" id="faqs">
                <div class="pattern top"></div>
                <div class="container-fluid mt-0 mt-sm-5 pt-5">
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-12 text-center mb-4">
                                <h1 class="text-secondary fw-bold mb-0">FAQ´S</h1>
                            </div>
                            <div class="col-md-6 mt-3">
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
                            <div class="col-md-6 mt-3">
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
                            <div class="col-md-6 mt-3">
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
                            <div class="col-md-6 mt-3">
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
                            <div class="col-md-6 mt-3">
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
                            <div class="col-md-6 mt-3">
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
                            <div class="col-md-6 mt-3">
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
                            <div class="col-md-6 mt-3">
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
                            <div class="col-md-6 mt-3">
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
                            <div class="col-md-6 mt-3">
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
                </div>
                <div class="pattern bottom"></div>
            </section>

            <section class="section text-primary pb-0 appear-scale-bottom" >
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
                                    <a class="btn btn-link text-dark px-1" style="text-decoration: none" href="{{asset('aviso_privacidad.pdf')}}">Aviso de privacidad</a>
                                </div>
                                <div class="col-auto p-0 d-flex align-items-center text-dark">
                                    |
                                </div>
                                <div class="col-auto p-0">
                                    <a class="btn btn-link text-dark px-1" style="text-decoration: none" href="{{asset('glosario.pdf')}}">Glosario</a>
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
