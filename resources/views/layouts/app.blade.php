<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  style="width:auto; padding: 0; box-sizing:border-box; height:auto; overflow-y:auto; overflow-x:hidden; margin:0;">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name')}}</title>
        <link rel="icon" href="{{asset('favicon.png')}}">

        <meta property="og:image" content="{{ asset('favicon.png') }}">

        <meta name="description" content="En nuestra empresa, nos especializamos en ofrecer soluciones integrales para tus necesidades detransporte marítimo desde diferentes partes del mundo hacia Centroamérica. Desde Europa, Asia,Norte América y Sudamérica, estamos aquí para facilitar cada paso del proceso logístico.Nuestros servicios abarcan desde la negociación con fabricantes en China hasta los trámitesaduanales, transporte marítimo, almacenaje y gestión de trámites aduaneros en el puerto dedestino. Nos encargamos de cada detalle para asegurarnos de que tu carga llegue a su destino demanera segura y eficiente.Manejamos una amplia variedad de productos, desde los más tradicionales hasta carga peligrosa.Nuestro equipo cuenta con la experiencia y el conocimiento necesarios para manejar cada tipo demercancía de manera adecuada y cumpliendo con todas las regulaciones y normativaspertinentes.Además, ofrecemos asesoría comercial para brindarte las mejores soluciones para tus necesidadesespecíficas. Ya sea que necesites transporte marítimo de carga general o requieras serviciosespecializados, estamos aquí para ayudarte a encontrar la mejor opción para tu empresa.En cuanto al transporte marítimo, tenemos la capacidad de recibir carga en los puertos deGuatemala y trasladarla hacia El Salvador, Honduras y Nicaragua. Nuestra red de socios ycolaboradores nos permite ofrecer un servicio confiable y eficiente en toda la región.También nos especializamos en la logística de importación hacia Centroamérica desde paísescomo Brasil, Chile y Colombia. Nos encargamos de coordinar todos los aspectos del proceso paragarantizar una importación sin contratiempos y en tiempo récord.En resumen, en nuestra empresa ofrecemos soluciones completas y personalizadas para tusnecesidades de transporte marítimo y logística internacional hacia Centroamérica. Confía ennosotros para llevar tu carga de manera segura, eficiente y puntual a su destino final.¡Contáctanos hoy mismo para conocer más sobre nuestros servicios y cómo podemos ayudarte ahacer crecer tu negocio!">
        <meta name="keywords" content="
            Transporte marítimo,Logística internacional,Centroamérica,Importación,Exportación,Aduana,Trámites aduanales,Almacenaje,
            Distribución de carga,Carga peligrosa,Manejo de productos,Servicios de transporte,Puerto de destino,Negociación con fabricantes,
            Despacho aduanero,Flota de transporte,Asesoría logística,Gestión aduanera,Comercio internacional,Mercancía,Logística de exportación,
            Logística de importación,Transportistas marítimos,Despacho de mercancía,Recepción de carga,Envío de mercancía,Traslado de mercancía,
            Exportadores,Importadores,Soluciones logísticas,Almacenaje en Guatemala,Almacenaje en Centroamérica,Importaciones desde China,
            Exportaciones hacia China,Importaciones desde Asia,Exportaciones hacia Asia,Importaciones desde Brasil,Exportaciones hacia Brasil,
            Importaciones desde Chile,Exportaciones hacia Chile,Importaciones desde Colombia,Exportaciones hacia Colombia,Importaciones desde Estados Unidos,
            Exportaciones hacia Estados Unidos,Logística aduanera,Transporte marítimo hacia Guatemala,Transporte marítimo hacia Centroamérica,
            Logística de transporte,Soluciones aduaneras,Logística en Guatemala,Logística en Centroamérica,Logística de carga,Transporte de carga,
            Servicios logísticos,Logística de envío,Exportación desde Guatemala,Exportación desde Centroamérica,Importación hacia Guatemala,
            Importación hacia Centroamérica,Transporte marítimo desde China,Transporte marítimo desde Asia,Transporte marítimo desde Brasil,
            Transporte marítimo desde Chile,Transporte marítimo desde Colombia,Transporte marítimo desde Estados Unidos,Soluciones de importación,
            Soluciones de exportación,Transporte marítimo de carga,Logística de almacenaje,Soluciones logísticas integradas,Logística y distribución,
            Servicios aduaneros,Soluciones de transporte global,Logística de cadena de suministro,Importación de productos,Exportación de productos,
            Servicios logísticos personalizados,Soluciones de logística empresarial,Transporte marítimo confiable,Logística de transporte eficiente,
            Soluciones de almacenaje seguro,Transporte marítimo de alta calidad,Logística de importación y exportación,Transporte marítimo de mercancías,
            Soluciones de distribución eficaz,Transporte marítimo de carga general,Logística de cadena de suministro global,Soluciones de logística a medida,
            Transporte marítimo de contenedores,Logística de transporte seguro,Transporte marítimo de productos,Soluciones de logística de vanguardia,
            Transporte marítimo de carga pesada,Logística de transporte marítimo eficiente,Transporte marítimo de productos químicos,Soluciones de logística de alta calidad,
            Transporte marítimo de carga refrigerada,Logística de transporte marítimo seguro,Transporte marítimo de productos farmacéuticos,Transporte marítimo hacia Brasil,
            Transporte marítimo hacia Chile,Transporte marítimo hacia Colombia,Transporte marítimo hacia Estados Unidos,Soluciones aduaneras en Guatemala,
            Soluciones aduaneras en Centroamérica,Logística de transporte en Guatemala,Logística de transporte en Centroamérica,Transporte marítimo seguro,
            Logística de importación desde China,Logística de exportación hacia China,Logística de importación desde Asia,Logística de exportación hacia Asia,
            Logística de importación desde Brasil,Logística de exportación hacia Brasil,Logística de importación desde Chile,Logística de exportación hacia Chile,
            Logística de importación desde Colombia,Logística de exportación hacia Colombia,Logística de importación desde Estados Unidos,Logística de exportación hacia Estados Unidos,
            Transporte marítimo hacia Brasil desde Guatemala,Transporte marítimo hacia Brasil desde Centroamérica,Transporte marítimo hacia Chile desde Guatemala,
            Transporte marítimo hacia Chile desde Centroamérica,Transporte marítimo hacia Colombia desde Guatemala,Transporte marítimo hacia Colombia desde Centroamérica,
            Transporte marítimo hacia Estados Unidos desde Guatemala,Transporte marítimo hacia Estados Unidos desde Centroamérica,Soluciones de transporte marítimo,
            Logística de almacenamiento en Guatemala,Logística de almacenamiento en Centroamérica,Transporte marítimo confiable en Guatemala,Transporte marítimo confiable en Centroamérica,
            Logística de transporte eficiente en Guatemala,Logística de transporte eficiente en Centroamérica,Soluciones de almacenaje seguro en Guatemala,
            Soluciones de almacenaje seguro en Centroamérica,Transporte marítimo de alta calidad en Guatemala,Transporte marítimo de alta calidad en Centroamérica,
            Logística de importación y exportación en Guatemala,Logística de importación y exportación en Centroamérica,Transporte marítimo de mercancías en Guatemala
            Transporte marítimo de mercancías en Centroamérica,Soluciones de distribución eficaz en Guatemala,Soluciones de distribución eficaz en Centroamérica,
            Transporte marítimo de carga general en Guatemala,Transporte marítimo de carga general en Centroamérica,Logística de cadena de suministro global en Guatemala,
            Logística de cadena de suministro global en Centroamérica,Soluciones de logística a medida en Guatemala,Soluciones de logística a medida en Centroamérica,
            Transporte marítimo de contenedores en Guatemala,Transporte marítimo de contenedores en Centroamérica,Logística de transporte seguro en Guatemala,
            Logística de transporte seguro en Centroamérica,Transporte marítimo de productos en Guatemala,Transporte marítimo de productos en Centroamérica,
            Soluciones de logística de vanguardia en Guatemala,Soluciones de logística de vanguardia en Centroamérica,Transporte marítimo de carga pesada en Guatemala,
            Transporte marítimo de carga pesada en Centroamérica,Logística de transporte marítimo eficiente en Guatemala,Logística de transporte marítimo eficiente en Centroamérica,
            Transporte marítimo de productos químicos en Guatemala,Transporte marítimo de productos químicos en Centroamérica,Soluciones de logística de alta calidad en Guatemala,
            Soluciones de logística de alta calidad en Centroamérica,Transporte marítimo de carga refrigerada en Guatemala,Transporte marítimo de carga refrigerada en Centroamérica,
            Logística de transporte marítimo seguro en Guatemala,Logística de transporte marítimo seguro en Centroamérica,Transporte marítimo de productos farmacéuticos en Guatemala,
            Transporte marítimo de productos farmacéuticos en Centroamérica,Soluciones de logística innovadoras en Guatemala,Soluciones de logística innovadoras en Centroamérica,Transporte marítimo de carga seca en Guatemala,
            Transporte marítimo de carga seca en Centroamérica,Logística de transporte marítimo fiable en Guatemala,Logística de transporte marítimo fiable en Centroamérica,Transporte marítimo de productos industriales en Guatemala,
            Transporte marítimo de productos industriales en Centroamérica,Soluciones de logística personalizadas en Guatemala,Soluciones de logística personalizadas en Centroamérica,
            Transporte marítimo de carga aérea en Guatemala,Transporte marítimo de carga aérea en Centroamérica,Logística de transporte marítimo internacional en Guatemala,
            Logística de transporte marítimo internacional en Centroamérica,Transporte marítimo de productos alimenticios en Guatemala,Transporte marítimo de productos alimenticios en Centroamérica"
            >

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.css" rel="stylesheet" />

        <!-- Styles -->
        <link href="{{ asset('css/app.css?v='.filemtime(public_path('css/app.css'))) }}"  rel="stylesheet">
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
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

        <script src="https://www.google.com/recaptcha/enterprise.js?render=6LfAhvApAAAAAGiMMIGEgUGr12kOe0_vvl6xCvzY"></script>

    </head>

    <body class="global-font bg-white">

        <livewire:home.news-marquee />

        <livewire:app.nav-bar />

        {{-- Content --}}
        <main class="relative min-h-screen">
            @yield('content')
        </main>

        <livewire:app.footer />

        <div class="sticky bottom-0">
            <a href="https://wa.me/50232220185" target="_blank">
                <div class="relative">
                    <img class="absolute bottom-0 -top-36 right-0 w-10 h-10 sm:-top-32 sm:w-12 sm:h-12" src="{{asset('images/icons/whatsapp.png')}}"/>
                </div>
            </a>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/jquery.min.js') }}" ></script>
        <script src="{{ asset('js/main.js?v='.filemtime(public_path('js/main.js'))) }}" ></script>
        @livewireScripts
        @stack('child-scripts')

        <script>
            $('#home_movil_menu_btn').click(function(){
                $('#home_movil_menu_div').slideDown();
            })
            $('#home_movil_menu_close_btn').click(function(){
                $('#home_movil_menu_div').slideUp('fast');
            })
            $('#footer_set_appointment_a').click(function(){
                $('html, body').animate({
                    scrollTop: $("#home_request_new_appointment_div").offset().top
                }, 1000);
            });
        </script>



    </body>
</html>
