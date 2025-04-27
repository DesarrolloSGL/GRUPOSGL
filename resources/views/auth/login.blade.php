@extends('layouts.clean')

@section('content')
    <section class="bg-gray-100  py-[5%] h-screen">
        <div class="mx-auto w-fit my-3">
            <a href="/">
                <img class="mx-auto max-w-[56px]" src="{{asset('images/main/logo.png')}}" alt="">
            <a href=""></a>
        </div>
        <div class="mx-auto w-72 rounded-2xl shadow-2xl bg-white text-center">
            <form action="/login" method="POST">
                @csrf
                <p class="font-bold text-global-900 text-xl py-3">Iniciar sesión en {{ config('app.name')}}</p>
                <input class="w-10/12 mt-5 p-2 text-sm text-gray-900 border
                border-gray-300 rounded-lg bg-gray-50 focus:ring-global-400
                focus:border-global-400" name="email" type="email" placeholder="Email">

                <input class="togglePasswordField w-10/12 mt-5 p-2 text-sm text-gray-900 border
                border-gray-300 rounded-lg bg-gray-50 focus:ring-global-400
                focus:border-global-400" name="password" type="password" placeholder="Password">

                <div class="text-xs flex items-center space-x-1 p-2 ml-5 mr-auto  w-fit">
                    <input class="togglePasswordChk" type="checkbox">
                    <h3>Mostrar Contraseña</h3>
                </div>

                @if(count($errors) > 0)
                    <div class="text-red-600 text-xs p-5">
                        @foreach ($errors->all() as $error)
                            <h3>{{$error}}</h3>
                        @endforeach
                    </div>
                @endif

                <div class="py-5 px-3">
                    <button class="bg-global-950 rounded-full text-white
                    px-10 py-1">Iniciar Sesión</button>
                    <div class="flex text-xs mt-3">
                        <div class="flex items-center">
                            <input type="checkbox" name="remember">
                            <h3 class="ml-1 text-global-950">Recordar</h3>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="ml-auto text-global-950 underline" href="{{ route('password.request') }}" >
                                Recuperar Contraseña</a>
                        @endif

                    </div>
                </div>
            </form>

            <div class="py-5 px-3 text-xs">
                <h3 class="ml-auto text-global-950">Aún no tienes cuenta?</h3>
                <a class="text-global-950 underline" href="/register">Registrarme</a>
            </div>
        </div>
    </section>
@endsection
