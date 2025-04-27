@extends('layouts.clean')

@section('content')
    <section class="bg-blue-50 ">
        <div class="bg-white w-fit mx-auto">
            <h3 class="bg-blue-900/90 text-blue-100 text-2xl py-3 text-center font-bold">¡Gracias por Cotizar en GrupoSGL!</h3>

            <a href="https://www.gruposgl.com/">
                <div class="bg-white p-10 rounded-xl">
                    <img class="mx-auto opacity-90" width="50" height="50" src="{{asset('images/main/logo.png')}}" alt="">
                </div>
            </a>
            <div class="px-1 text-gray-700 sm:px-5">
                <h3 class="text-lg font-bold text-center">Tu Cotización está lista</h3>
                <div class="my-5 text-center">
                    {{-- <h3 class="px-1 text-sm sm:px-5">No: {{$quotation_number}}</h3> --}}
                </div>
            </div>
            <br>
        </div>
    </section>
@endsection