<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="width:auto; padding: 0; box-sizing:border-box; height:auto; overflow-y:auto; overflow-x:hidden; margin:0;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="../images/logo.png">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.css" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css?v='.filemtime(public_path('css/app.css'))) }}"  rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    {{-- Flowbite --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
    <!-- Alpine Plugins (Variable Persistence) -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
    <!-- Alpine Plugins (Resize) -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/resize@3.x.x/dist/cdn.min.js"></script>
    <!-- Alpine Core -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @livewireStyles

    {{-- CLOAK --}}
    <style>
        [x-cloak] { display: none !important; }
    </style>
    {{-- END CLOAK --}}

    {{-- <script src="https://www.google.com/recaptcha/enterprise.js?render=6LfAhvApAAAAAGiMMIGEgUGr12kOe0_vvl6xCvzY"></script> --}}
</head>
<body class="global-font">


    {{-- Content --}}
    <main class="w-full">
        @yield('content')
    </main>


    {{-- Footer --}}

    {{-- <footer class="flex bg-blue-950 p-10 text-gray-400 text-xs">
        <div class="space-x-8 flex">

            <div class="grid whitespace-nowrap h-fit space-y-1">
                <a href="/our-history">Nuestra Historia</a>
                <a href="/about-us">Acerca de nosotros</a>
                <a href="/">Bolsa de Empleo</a>
                <a href="https://gruposgl.com/blog/">Blog</a>
                <a href="/">Formulario de reintegro</a>
                <a href="/">Formulario de reclamo</a>
                <a href="/">Formulario solicitud de depositos en garantia</a>
            </div>

            <div class="grid whitespace-nowrap h-fit space-y-1">
                <a href="/">Instrucciones de pagos</a>
                <a href="/">Politicas de devoluciones y reintegros</a>
                <a href="/">Noticias</a>
                <a href="/">Preguntas frecuentes</a>
                <a href="/">Conocimiento de fraudes</a>
                <a href="/">Aviso legal</a>
                <a href="/">Condiciones de uso</a>
                <a href="/">Resolución de disputas</a>
            </div>

            <div class="grid whitespace-nowrap h-fit space-y-1">
                <h3 class="text-white font-bold text-sm">Nuestras Divisiones</h3>
                <a href="/">SGL Servicios Forwarding</a>
                <a href="/">SGL Servicios Courier Internacional</a>
                <a href="/">SGL Freight</a>
                <a href="/">SGL Cadena de Suministros</a>
                <a href="/">SGL eCommerce</a>
                <a href="/">SGL Aduana y Tramites</a>
                <a href="/">SGL Express</a>
            </div>

            <div class="grid whitespace-nowrap h-fit space-y-1">
            <h3 class="text-white font-bold text-sm">Nuestros Socios</h3>
            <a href="/">Navieras</a>
            <a href="/">Clientes</a>
            <a href="/">Transportes Terrestres</a>
            <a href="/">Aerolineas</a>
            <a href="/">Gremiales</a>
            <a href="/">Agentes aduaneros</a>
            </div>
        </div>

        <div class="space-y-5 ml-auto">
            <div class="text-base text-justify space-y-4">
                <h3>5ta. Avenida 15-45 Zona 10 Edificio Centro Empresarial</h3>
                <h3>+502 2379-0640</h3>
                <h3>customerservice@gruposgl.com</h3>
            </div>
            <div class="flex mx-auto w-fit space-x-3 items-center">
                <a href="https://www.facebook.com/SGLINTERNACIONAL/" target="_blank">
                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                        <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
                    </svg>
                </a>
                <a href="https://www.instagram.com/gruposgl1/"  target="_blank">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg"  fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                    </svg>
                </a>
                <a href="https://www.youtube.com/channel/UCWhqCd3O0L41LLWddQr4EiA"  target="_blank">
                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                        <path fill-rule="evenodd" d="M19.7 3.037a4.26 4.26 0 0 0-.789-1.964 2.84 2.84 0 0 0-1.984-.84c-2.767-.2-6.926-.2-6.926-.2s-4.157 0-6.928.2a2.836 2.836 0 0 0-1.983.84A4.225 4.225 0 0 0 .3 3.038a30.148 30.148 0 0 0-.2 3.206v1.5c.01 1.071.076 2.142.2 3.206.094.712.363 1.39.784 1.972.604.536 1.38.837 2.187.848 1.583.15 6.731.2 6.731.2s4.161 0 6.928-.2a2.844 2.844 0 0 0 1.985-.84 4.27 4.27 0 0 0 .787-1.965c.124-1.064.19-2.135.2-3.206V6.243a30.672 30.672 0 0 0-.202-3.206ZM8.008 9.59V3.97l5.4 2.819-5.4 2.8Z" clip-rule="evenodd"/>
                    </svg>
                </a>
                <a href="https://www.linkedin.com/company/10830100/admin/" target="_blank">
                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 15 15">
                        <path fill-rule="evenodd" d="M7.979 5v1.586a3.5 3.5 0 0 1 3.082-1.574C14.3 5.012 15 7.03 15 9.655V15h-3v-4.738c0-1.13-.229-2.584-1.995-2.584-1.713 0-2.005 1.23-2.005 2.5V15H5.009V5h2.97ZM3 2.487a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" clip-rule="evenodd"/>
                        <path d="M3 5.012H0V15h3V5.012Z"/>
                    </svg>
                </a>

            </div>
        </div>
    </footer> --}}


    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}" ></script>
    <script src="{{ asset('js/main.js') }}" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
    @stack('child-scripts')
</body>
</html>
