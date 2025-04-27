@extends('layouts.app')

@section('content')
<section class="min-h-[90vh] px-5">
    <div class="bg-white text-center border-2 rounded-xl max-w-sm mt-[15vh] mx-auto p-5 space-y-5">
        <img width="50" height="50" class="mx-auto" src="{{asset('images/main/logo.png')}}" alt="">
        <div class="text-xl">{{ __('Verifica tu correo electrónico') }}</div>
        <div class="">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico..') }}
                </div>
            @endif

            {{ __('Antes de continuar, consulte su correo electrónico para obtener un enlace de verificación.') }}
            {{ __('Si no recibiste el correo electrónico revisa en la carpeta de Spam o solicita un  nuevo enlace') }}
            <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn btn-link bg-blue-600 text-white hover:bg-blue-700 rounded-lg text-sm px-3 py-3 my-5">{{ __('Haga clic aquí para solicitar nuevo enlace') }}</button>
            </form>
        </div>
    </div>
</section>
@endsection
