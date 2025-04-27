@extends('layouts.app')

@section('content')
<section class="min-h-[90vh] px-5">
    <div class="bg-white text-center border-2 rounded-xl max-w-sm mt-[15vh] mx-auto p-5 space-y-5">
        <img width="50" height="50" class="mx-auto" src="{{asset('images/main/logo.png')}}" alt="">
        <div class="text-xl">{{ __('Restablecer contraseña') }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electrónico') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="rounded-xl form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn bg-blue-600 text-white hover:bg-blue-700 rounded-lg text-sm px-2 py-3 my-5">
                            {{ __('Enviar enlace para restablecer contraseña') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
