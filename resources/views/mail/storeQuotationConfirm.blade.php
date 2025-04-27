@extends('layouts.clean')

@section('content')
    <section class="bg-blue-50 ">
        <div class="bg-white w-fit mx-auto">
            <h3 class="bg-blue-900/90 text-blue-100 text-2xl py-3 text-center font-bold">¡Gracias por Cotizar!</h3>

            <a href="https://www.gruposgl.com/">
                <div class="bg-white p-10 rounded-xl">
                    <img class="mx-auto opacity-90" width="50" height="50" src="{{asset('images/main/logo.png')}}" alt="">
                </div>
            </a>
            <div class="px-1 text-gray-700 sm:px-5">
                <h3 class="text-lg font-bold text-center">Tu Cotización está lista</h3>
                <div class="my-5 text-center">
                    <h3 class="px-1 text-sm sm:px-5">Para ver el detalle de tu cotización, <span class="font-bold">inicia sesión o crea tu cuenta</span></h3>
                    <br>
                    <h3 class="px-1 text-xs sm:px-5 text-gray-800">Haz click en el botón de abajo para ver el detalle tu cotización</h3>
                </div>
            </div>
            <a href="https://www.gruposgl.com/store-quotation-email-confirm/{{$order_number}}">
                <button class="px-3 py-3 text-blue-100 bg-blue-700/90 rounded-lg mx-auto block">
                    Ver Cotización
                </button>
            </a>
            <br>
        </div>
    </section>
@endsection