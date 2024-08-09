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
    @vite('resources/css/app.css')




<!-- SPRUHA -->
        <!-- spruha -->
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
        <!-- Favicon -->
        <link rel="icon" href="{{ url('spruha/img/brand/favicon.ico') }}" type="image/x-icon"/>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Title -->
        <title>{{ config('app.name', 'Laravel') }} - Plataforma de envios</title>

        <!-- Bootstrap css-->
        <link href="{{ url('spruha/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"/ type="text/css">

        <!-- Icons css-->
        <link href="{{ url('spruha/plugins/web-fonts/icons.css') }}"  rel="stylesheet"/>
        <link href="{{ url('spruha/plugins/web-fonts/font-awesome/font-awesome.min.css') }}"  rel="stylesheet">
        <link href="{{ url('spruha/plugins/web-fonts/plugin.css') }}"  rel="stylesheet"/>

        <!-- Style css-->
        <link href="{{ url('spruha/css/style.css') }}"  rel="stylesheet">
        <link href="{{ url('spruha/css/colors/color6.css') }}"  rel="stylesheet">

        <!-- Select2 css-->
        <link href="{{ url('spruha/plugins/select2/css/select2.min.css') }}"  rel="stylesheet">

        <!-- Mutipleselect css-->
        <link rel="stylesheet" href="{{ url('spruha/plugins/multipleselect/multiple-select.css') }}">
        <style>
            html, body {
                height: 100%; /* Make sure the page takes up the full content height */
            }

            body {
                display: flex; /* Use flexbox to structure the layout */
                flex-direction: column; /* Stack elements vertically */
            }
            main {
                flex-grow: 1; /* Allows main content to grow and fill available space */
            }
            footer {
                margin-top: auto; /* Automatically margins the footer at the bottom */
            }
        </style>


<!-- ---------- -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-16657588228">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-16657588228');
    </script><script>
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
    <div id="app" class="d-flex flex-column h-100">
        <main class="py-4">
            @yield('content')
        </main>
        <footer class="mt-auto text-center text-lg-start main-footer">
            <div class="text-center">
                <span>Copyright © 2024 <a href="#">ENVIOS OK</a>. Designed by <a href="#">TED</a> All rights reserved.</span>
            </div>
        </footer>
    </div>

    @include('partials.modal_preview_archivo')

</body>
@vite('resources/js/app.js')
<script>
    var url_base = '{{url('/')}}';
    var token = document.head.querySelector('meta[name="csrf-token"]');
</script>
</html>
