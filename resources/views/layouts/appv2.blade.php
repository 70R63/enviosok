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
    <link rel="icon" href="{{ url('favicon.ico') }}" type="image/x-icon"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>Envíos nacionales: Cotiza tu envío y manda paquetes de forma segura</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-16657588228">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-16657588228');
    </script>
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:5087677,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>

<!-- Event snippet for Vista de página conversion page -->
    <script>
        gtag('event', 'conversion', {
            'send_to': 'AW-16657588228/I2TyCMOPzcYZEITA-oY-',
            'value': 1.0,
            'currency': 'MXN'
        });
    </script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16657588228"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-16657588228');
    </script>
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
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route('register')}}">Registro</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="pb-4">
            <div class="container-fluid px-0 pt-3 bg-envios-gradient sticky" id="cotizador">
                <div class="container text-white pb-3">
                    <form action="" id="formCotizador" novalidate>
                        <div class="row justify-content-between appear-scale align-items-end">
                                <div class="col-12 text-center">
                                    <h5 class="fw-bold animate__animated animate__flip">Cotiza gratis tu envío</h5>
                                </div>
                                <div class="form-group col-md-6 col-lg-2 col-6">
                                    <label for="origen">Código postal origen</label>
                                    <input type="text" name="origen" id="origen" class="form-control form-control-sm" placeholder="Código postal" autocomplete="off" required>
                                </div>
                                <div class="form-group col-md-6 col-lg-2 col-6">
                                    <label for="origen">Código postal destino</label>
                                    <input type="text" name="destino" id="destino" class="form-control form-control-sm" placeholder="Código postal" autocomplete="off" required>
                                </div>
                                <div class="form-group col-md-6 col-lg-2 col-6">
                                    <label for="origen">Tipo de envío</label>
                                    <select name="tipo_envio" id="tipo_envio" class="form-select form-select-sm" required>
                                        <option value="caja">Caja</option>
                                        <option value="sobre">Sobre</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-lg-1 col-6">
                                    <label for="peso_cotizador">Peso (kg)</label>
                                    <input type="number" name="peso" id="peso_cotizador" class="no-controls form-control form-control-sm" placeholder="Kg(s)" step="0.1" inputmode="numeric" autocomplete="off" required max="68" min="0.1">
                                </div>
                                <div class="form-group col-md-12 col-lg-3">
                                    <label for="peso">Tamaño de caja (cm)</label>
                                    <div class="d-flex">
                                        <input type="number" name="alto" id="alto_cotizador" class="no-controls form-control form-control-sm rounded-0 rounded-start" placeholder="Alto" step="0.1" inputmode="numeric" autocomplete="off" required max="69" min="1">
                                        <input type="number" name="largo"id="largo_cotizador" class="no-controls form-control form-control-sm rounded-0" placeholder="Largo" step="0.1" inputmode="numeric" autocomplete="off" required max="69" min="1">
                                        <input type="number" name="ancho"id="ancho_cotizador" class="no-controls form-control form-control-sm rounded-0 rounded-end" placeholder="Ancho" step="0.1" inputmode="numeric" autocomplete="off" required max="69" min="1">
                                    </div>
                                </div>
                                <div class="col-md-auto d-flex align-items-end mt-3 mt-lg-0">
                                    <button class="btn btn-sm px-2 btn-warning text-primary fw-bold animate__animated animate__wobble">Cotizar envío</button>
                                </div>

                        </div>
                    </form>
                </div>
                <div class="container-fluid bg-white">
                    <div class="container">
                        <div class="row p-4 d-none" id="divBusquedaCotizador">
                            <div class="col-md-12 text-center">
                                <h4 class="fw-bold" id="tituloCotizador">Cotizando...</h4>
                            </div>
                            <div class="col-md-12 text-center">
                                <img style="max-width: 100px" src="{{asset('img/loading.gif')}}" alt="Buscando los mejores precios">
                            </div>
                        </div>
                        <div class="row p-4 d-none" id="divResultadosCotizador">
                        </div>
                    </div>
                </div>
            </div>
            <section class="section mb-5">
                <div class="container-fluid">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7 my-auto animate__animated animate__backInLeft appear-scale">
                                <h1 class="fw-bold">Somos el autoservicio digital de <span class="text-warning">paquetería en México</span> que necesitas para tu negocio.</h1>
                                <h2 class="my-4">Regístrate ahora y obtén un <strong>descuento exclusivo</strong> en tus envíos.</h2>
                                <h1 class="mb-4 text-primary"><i class="fa fa-paper-plane"></i> Envíos nacionales desde $85 MXN</h1>
                                <div class="row">
                                    <div class="col-md-3 text-center text-md-start mb-2">
                                        <a class="btn btn-warning text-primary fw-semibold" href="{{route('register')}}">Regístrate ahora</a>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="marquee">
                                            <div class="marquee-content">
                                                <img src="{{asset('assets/dhl.svg')}}">
                                                <img src="{{asset('assets/estafeta.svg')}}">
                                                <img src="{{asset('assets/fedex.png')}}">
                                                <img src="{{asset('assets/dhl.svg')}}">
                                                <img src="{{asset('assets/estafeta.svg')}}">
                                                <img src="{{asset('assets/fedex.png')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 text-center my-auto text-md-end animate__animated animate__slideInRight appear-left">
                                <img src="{{asset('assets/Envios_OK_primario.svg')}}" alt="Envíos nacionales de forma segura y rápida" class="w-90" style="max-width: 750px">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section pt-5 bg-envios-gradient text-white">
                <div class="pattern top"></div>
                <div class="container-fluid mt-5 pt-5">
                    <div class="container">
                        <div class="row mt-5">
                            <div class="col-md-6 my-auto appear-left">
                                <p class="text-justify">En EnvíosOK podrás cotizar envíos nacionales en sencillos pasos.</p>
                                <h1 class="fw-bold">Envía paquetes de forma segura y rápida</h1>
                                <p class="text-justify">Hemos nacido como una empresa joven en el mercado de mensajería y paquetería al ofrecer a nuestros
                                    clientes una plataforma autogestionable para generar sus propios envíos nacionales con los mejores aliados logísticos en México los 365 días
                                    del año y en tiempo real.</p>
                                <p class="text-justify">En EnviosOK podrás cotizar envíos nacionales en dos sencillos pasos; sólo necesitamos el origen,
                                    destino, peso y dimensiones del paquete que enviaremos. Nuestra plataforma está pensada
                                    para ser usada por profesionales independientes y emprendedores hasta PyMes.</p>
                            </div>
                            <div class="col-md-6 text-center my-auto text-md-end animate__animated animate__slideInRight appear-left">
                                <img src="{{asset('assets/imagenes/seccion1.png')}}" alt="Envíos nacionales de forma segura y rápida" class="w-90" style="max-width: 750px">
                            </div>
                            <div class="col my-4"></div>
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
                            </div>
                            <div class="my-4"></div>
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
                                                Sobrepeso es cuando la paquetería pesa y mide tu paquete, detectando que las medidas y pesos son superiores a las declaradas en la guia.
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
                                                <ul>
                                                    <li>Animales vivos (incluyendo, pero no limitado a mamíferos, reptiles, peces, invertebrados, anfibios, insectos o aves)</li>
                                                    <li>Trofeos de caza (animal), partes de animales como marfil o aletas de tiburón, restos de animales, subproductos o derivados de animales, no para consumo humano, prohibidos para transporte por la Convención CITES o reglamentación local</li>
                                                    <li>Restos humanos o cenizas en cualquiera de sus formas</li>
                                                    <li>Lingotes (de cualquier metal precioso)</li>
                                                    <li>Efectivo (moneda de curso legal como billetes, notas de denominación monetaria, monedas)</li>
                                                    <li>Piedras preciosas y semipreciosas sueltas (cortadas o sin cortar, pulidas o sin pulir)</li>
                                                    <li>Armas de fuego completas, munición, explosivos, dispositivos explosivos, incluyendo explosivos inertes o piezas de prueba, armas de aire comprimido, réplicas o imitación de armas de fuego o munición></li>
                                                    <li>Mercancía ilegal, como drogas ilícitas, incluyendo pero no limitado a estimulantes narcóticos, antidepresivos o alucinógenos, cannabis o sus derivados.</li>
                                                    <li>Mercancías falsificadas en violación de derechos de propiedad intelectual (Intellectual property rights - IPR).</li>
                                                </ul>
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
                                                Es el valor comercial de tu mercancía.
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
                                                Al momento de crear la guía activa el botón "Seguro" el portal te solicitará ingresar el valor declarado de tú envío. La cobertura varía con cada proveedor así como el deducible, sin embargo en todos los casos las indemnizaciones se realizan por causas en los que la responsabilidad del siniestro recaiga en el proveedor, no aplica para robo a unidades o fenómenos naturales.
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
                                                <p>Por favor envía un email a <a href="mailto:ayuda@envios-ok.com">ayuda@envios-ok.com</a> indicando en el asunto el número de guía y adjuntando la siguiente documentación:</p>
                                                <ul>
                                                    <li>Domicilio</li>
                                                    <li>Entre qué calles</li>
                                                    <li>Color de fachada</li>
                                                    <li>Referencias</li>
                                                    <li>Teléfono de destino</li>
                                                    <li>Contenido</li>
                                                    <li>Cantidad de piezas</li>
                                                    <li>Relación exacta del contenido</li>
                                                    <li>Empaque del serivicio, peso y dimensiones</li>
                                                    <li>Descripción del empaque</li>
                                                    <li>Color</li>
                                                    <li>Marca</li>
                                                    <li>Modelo</li>
                                                    <li>Seguro</li>
                                                    <li>Foto/Imagen</li>
                                                    <li>Valor del bien</li>
                                                    <li>Factura o nota del bien</li>
                                                </ul>
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
                                                ¿Se puede realizar pago contra entrega?
                                            </button>
                                        </h2>
                                        <div id="collapse9" class="accordion-collapse collapse" aria-labelledby="heading9">
                                            <div class="accordion-body">
                                                No, todas nuestras guías deben ser pagadas al momento de crearse.
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
                                                ¿Dónde puedo ver el rastreo de mis paquetes?
                                            </button>
                                        </h2>
                                        <div id="collapse10" class="accordion-collapse collapse" aria-labelledby="heading10">
                                            <div class="accordion-body">
                                                Dentro de nuestro portal, en la opción Guías - Rastreo podrás seguir el tránsito de todos tus paquetes creados con nosotros.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="accordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading11">
                                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
                                                ¿Qué es un envío exprés?
                                            </button>
                                        </h2>
                                        <div id="collapse11" class="accordion-collapse collapse" aria-labelledby="heading11">
                                            <div class="accordion-body">
                                                Es el envío que tiene un tiempo de entrega de 1 a 2 días hábiles y está sujeto a cobertura.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="accordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading12">
                                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
                                                ¿Qué es un envío económico?
                                            </button>
                                        </h2>
                                        <div id="collapse12" class="accordion-collapse collapse" aria-labelledby="heading12">
                                            <div class="accordion-body">
                                                Es el envío que tiene un tiempo de entrega de 3 a 7 días hábiles y está sujeto a cobertura.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="accordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading13">
                                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
                                                ¿Cúal es el peso real?
                                            </button>
                                        </h2>
                                        <div id="collapse13" class="accordion-collapse collapse" aria-labelledby="heading13">
                                            <div class="accordion-body">
                                                Es lo que pesa tu paquete al estar sobre una báscula.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="accordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading14">
                                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse14" aria-expanded="false" aria-controls="collapse14">
                                                ¿Qué es el peso volumétrico?
                                            </button>
                                        </h2>
                                        <div id="collapse14" class="accordion-collapse collapse" aria-labelledby="heading14">
                                            <div class="accordion-body">
                                                Si tu paquete tiene las siguientes medidas: 30 cm x 20 cm x 50 cm debemos multiplicarlas y el resultado dividirlo entre 5,000, el resultado de esta operación es el peso volumétrico de nuestro paquete, en este caso: 6 kg, si este mismo paquete al momento de colocarlo sobre la báscula nos arroja que pesa 4 kg, la paquetería nos cobrará por el peso más alto, pues este es el espacio que ocupará dentro de su transporte. El peso a cobrar se redondea al kilo inmediato superior; 1.1kgs es 2 Kgs.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="accordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading15">
                                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse15" aria-expanded="false" aria-controls="collapse15">
                                                ¿Por qué trabajar con EnviosOK?
                                            </button>
                                        </h2>
                                        <div id="collapse15" class="accordion-collapse collapse" aria-labelledby="heading15">
                                            <div class="accordion-body">
                                                Porque tu economía es lo más importante para nosotros, es por eso que con EnvíosOK siempre tendrás acceso a las mejores tarifas en el mercado.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="accordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading16">
                                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse17" aria-expanded="false" aria-controls="collapse17">
                                                ¿Cómo cotizar un envío para mi Negocio?
                                            </button>
                                        </h2>
                                        <div id="collapse17" class="accordion-collapse collapse" aria-labelledby="heading16">
                                            <div class="accordion-body">
                                                Dentro de nuestra página principal ingresa tu código postal de origen, código postal de destino, medidas de tu paquete: largo, ancho y alto, peso bascula, y ¡listo! nuestro portal te arrojará las opciones que tenemos disponibles para ti y el costo de cada una.                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="accordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading18">
                                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse18" aria-expanded="false" aria-controls="collapse18">
                                                ¿Puedo obtener descuentos o tarifas preferenciales en envíos para mi negocio?
                                            </button>
                                        </h2>
                                        <div id="collapse18" class="accordion-collapse collapse" aria-labelledby="heading18">
                                            <div class="accordion-body">
                                                Si, a través de nuestro Email de ayuda solicita asesoría personalizada de nuestros ejecutivos comerciales, ellos realizarán el análisis de tu operación y podrán ofrecerte alternativas de acuerdo con tus necesidades.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="accordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading19">
                                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse19" aria-expanded="false" aria-controls="collapse19">
                                                ¿Generan facturas?
                                            </button>
                                        </h2>
                                        <div id="collapse19" class="accordion-collapse collapse" aria-labelledby="heading19">
                                            <div class="accordion-body">
                                                Sí, dentro de nuestra plataforma deberás subir tu información fiscal, tus facturas se generan de forma automática.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="accordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading20">
                                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse20" aria-expanded="false" aria-controls="collapse20">
                                                ¿Cómo puedo pagar las guías de envío?
                                            </button>
                                        </h2>
                                        <div id="collapse20" class="accordion-collapse collapse" aria-labelledby="heading20">
                                            <div class="accordion-body">
                                                Desde nuestra plataforma, con tarjeta de débito, crédito o transferencia.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="accordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading21">
                                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse21" aria-expanded="false" aria-controls="collapse21">
                                                ¿A donde me comunico si tengo un problema con mi paquete?
                                            </button>
                                        </h2>
                                        <div id="collapse21" class="accordion-collapse collapse" aria-labelledby="heading21">
                                            <div class="accordion-body">
                                                Nuestro email de apoyo <a href="mailto:ayuda@envios-ok.com">ayuda@envios-ok.com</a> indica en el asunto el número de guía y en breve uno de nuestros ejecutivos se pondrá en contacto contigo.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="accordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading22">
                                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse22" aria-expanded="false" aria-controls="collapse22">
                                                ¿Cúal es la cobertura de EnvíosOk?
                                            </button>
                                        </h2>
                                        <div id="collapse22" class="accordion-collapse collapse" aria-labelledby="heading22">
                                            <div class="accordion-body">
                                                Tenemos cobertura a toda la república mexicana a través de nuestros proveedores (DHL, Fedex, Estafeta, Redpack, UPS).
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="accordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading24">
                                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse24" aria-expanded="false" aria-controls="collapse24">
                                                ¿Cómo declaro que estoy enviando artículos delicados o de manejo especial?
                                            </button>
                                        </h2>
                                        <div id="collapse24" class="accordion-collapse collapse" aria-labelledby="heading24">
                                            <div class="accordion-body">
                                                En nuestra plataforma puedes indicar el contenido de tu paquete y colocar etiquetas de frágil, sin embargo, debes considerar que para artículos como vidrio, cerámica, no aplica cobertura de seguro.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="accordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading25">
                                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse25" aria-expanded="false" aria-controls="collapse25">
                                                ¿Cómo recargo saldo en mi cuenta?
                                            </button>
                                        </h2>
                                        <div id="collapse25" class="accordion-collapse collapse" aria-labelledby="heading25">
                                            <div class="accordion-body">
                                                Dentro de nuestra plataforma en el menú PAGOS -  RECARGA, desde ahí podrás realizar una recarga de tu saldo desde $400.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="accordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading26">
                                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse26" aria-expanded="false" aria-controls="collapse26">
                                                ¿Qué es un artículo delicado o frágil?
                                            </button>
                                        </h2>
                                        <div id="collapse26" class="accordion-collapse collapse" aria-labelledby="heading26">
                                            <div class="accordion-body">
                                                Son aquellos artículos que requieren un manejo especial por la naturaleza del contenido, ejemplo: vidrio, cerámica, talavera, obras de arte. El empaque es responsabilidad del cliente para evitar que sufra daños su mercancía en el tránsito de la red de nuestros proveedores.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pattern bottom"></div>
            </section>
            <section class="section text-primary pb-0 appear-scale-bottom">
                <div class="container-fluid px-5">
                    <div class="row justify-content-between">
                        <div class="col-md-4 col-sm-5 text-center text-md-start">
                            <img style="max-width: 220px" src="{{asset('assets/Envios_OK_primario.svg')}}" alt="">
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
                        <div class="col-md-12 col-lg-6 text-center text-md-start">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row text-dark justify-content-center align-items-center justify-content-md-start">
                                        <div class="col-auto">
                                            Síguenos en:
                                        </div>
                                        <div class="col-auto p-0">
                                            <a class="btn btn-link text-dark px-1" style="text-decoration: none" href="https://facebook.com" target="_blank">
                                                <img style="max-width: 30px" src="{{asset('assets/iconos/facebook.svg')}}" alt="">
                                            </a>
                                        </div>
                                        <div class="col-auto p-0">
                                            <a class="btn btn-link text-dark px-1" style="text-decoration: none" href="https://instagram.com" target="_blank">
                                                <img style="max-width: 30px" src="{{asset('assets/iconos/instagram.svg')}}" alt="">
                                            </a>
                                        </div>
                                        <div class="col-auto p-0">
                                            <a class="btn btn-link text-dark px-1" style="text-decoration: none" href="https://youtube.com" target="_blank">
                                                <img style="max-width: 30px" src="{{asset('assets/iconos/youtube.svg')}}" alt="">
                                            </a>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6 d-flex justify-content-md-end justify-content-center align-items-center">
                                    <div class="row text-dark">
                                        <div class="col-auto pe-2">
                                            <img style="max-width: 50px" src="{{asset('assets/visa.png')}}" alt="Visa">
                                        </div>
                                        <div class="col-auto px-2">
                                            <img style="max-width: 50px" src="{{asset('assets/mastercard.png')}}" alt="MasterCard">
                                        </div>
                                        <div class="col-auto px-2">
                                            <img style="max-width: 38px" src="{{asset('assets/amex.png')}}" alt="Amex">
                                        </div>
                                        <div class="col-auto ps-2">
                                            <img style="max-width: 50px" src="{{asset('assets/mpago.png')}}" alt="MercadoPago">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 justify-content-center d-flex align-items-end justify-content-md-end">
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
                                    <a class="btn btn-link text-dark px-1" style="text-decoration: none" href="https://helpdesk.envios-ok.com/">Soporte</a>
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

    <a href="https://wa.me/7202706823?text={{urlencode("Hola, deseo más información de los envíos.")}}" target="_blank" class="whatsapp-icon">
        <i class="fab fa-lg fa-whatsapp"></i>
    </a>
</body>
<script>
    var url_base = '{{url('/')}}';
    var token = document.head.querySelector('meta[name="csrf-token"]');
</script>
</html>
