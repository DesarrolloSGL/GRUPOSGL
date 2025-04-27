<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="width:auto; padding: 0; box-sizing:border-box; height:auto; overflow-y:auto; overflow-x:hidden; margin:0;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body class="global-font">
    {{-- Content --}}
    <main class="">
        @yield('content')
    </main>
</body>
</html>
