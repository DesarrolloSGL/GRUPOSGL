@extends('layouts.app')

@section('content')
    <section class="bg-white flex p-5">
        <div class="w-96 border-gray-100 bg-white min-h-screen h-full rounded-xl py-5 hidden md:block">
            <a href="/profile">
                <div class="px-5 py-1 cursor-pointer whitespace-nowrap">
                    Mis Datos
                </div>
            </a>
            <hr class="border-gray-300 w-5/6 mx-auto">
            <a href="/user-orders">
                <div class="px-5 py-1 cursor-pointer whitespace-nowrap">
                    Mis Ordenes
                </div>
            </a>
            @role('client')
            <hr class="border-gray-300 w-5/6 mx-auto">
            <a href="/locker">
                <div class="px-5 py-1 cursor-pointer whitespace-nowrap">
                    Mi Casillero
                </div>
            </a>
            <hr class="border-gray-300 w-5/6 mx-auto">
            <a href="/membership">
                <div class="px-5 py-1 cursor-pointer whitespace-nowrap">
                    Membresia
                </div>
            </a>
            @endrole
            <hr class="border-gray-300 w-5/6 mx-auto">
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <div class="p-2 text-center font-bold">
                    {{ __('Cerrar Sesión') }}
                </div>
            </a>
            <hr class="border-gray-300 w-5/6 mx-auto">
        </div>
        <div class="bg-white w-full">
            @yield('user-content')
        </div>
    </section>
@endsection