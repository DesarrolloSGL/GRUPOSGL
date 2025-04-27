

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="width:auto; padding: 0; box-sizing:border-box; height:auto; overflow-y:auto; overflow-x:hidden; margin:0;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}" ></script>
    <script src="{{ asset('js/main.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.css" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body class="global-font">


    {{-- Content --}}
    <main class="">
        <section class="py-5">
            <div class="border-2 border-black rounded-xl mx-auto p-5" style="width:10.795cm; height:13.97cm;">
                <div class="flex">
                    <div>
                        <h3 class="font-bold text-2xl">Orden#12</h3>
                        <h3 class="font-bold">Cotizador Nacional</h3>
                        <h3 class="font-bold ">12/12/2000</h3>
                    </div>
                    <img class="ml-auto w-12 h-16" src="{{asset('images/main/logo.png')}}" style="filter: grayscale(100%)">
                </div>

                <div class="">
                    <h3 class="font-bold">Remitente:</h3>
                    <h3 class="">Michael Cardenal, Blvd San Cristobal Centro Comercial El Dorado Zona 8.</h3>
                </div>
                <br>
                <div class="">
                    <h3 class="font-bold">Destinatario:</h3>
                    <h3 class="font-bold">Mixco, Guatemala</h3>
                    <h3 class="">Blvd San Cristobal Centro Comercial El Dorado Zona 8</h3>
                </div>
                <div class="font-bold">
                    <h3 class="py-2">Michael Cardenal</h3>
                </div>
                <div class="font-bold">
                    <h3 class="py-2">123456</h3>
                </div>

                <div class="flex">
                    <h3 class="py-2">Solo Entregar</h3>
                    {{-- <img class="w-24 ml-auto" src="../images/qr.png"> --}}
                </div>

                {{-- <div class="flex">
                    <div class="border-t-2 mt-8 w-full text-center border-black">
                        Nombre
                    </div>
                    <div class="border-t-2 mt-8 w-full text-center border-black">
                        /
                    </div>
                    <div class="border-t-2 mt-8 w-full text-center border-black">
                        DPI
                    </div>
                </div>

                <div class="flex">
                    <div class="border-t-2 mt-12 w-full text-center border-black">
                        Firma
                    </div>
                </div> --}}
            </div>
        </section>
    </main>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
</body>
</html>


