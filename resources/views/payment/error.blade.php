@extends('layouts.clean')


@section('content')

    <section class="flex h-screen w-full items-center justify-center">
        <div class="w-80 rounded bg-gray-50 px-6 pt-8 shadow-lg">
            <div class="text-center w-fit mx-auto">
                <svg class="mx-auto w-12 h-12 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v5a1 1 0 1 0 2 0V8Zm-1 7a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H12Z" clip-rule="evenodd"/>
                </svg>
                <h4 class="font-bold text-2xl text-center">Hubo un problema con tu pago</h4>
            </div>
            <div class="py-4 justify-center items-center flex flex-col gap-2">
                <h3 class="font-bold">Intenta de nuevo o</h3>
                <h3 class="font-bold">contacta a nuestro soporte</h3>
                <p class="flex gap-2">
                    <svg class="w-5 h-5 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M2.038 5.61A2.01 2.01 0 0 0 2 6v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6c0-.12-.01-.238-.03-.352l-.866.65-7.89 6.032a2 2 0 0 1-2.429 0L2.884 6.288l-.846-.677Z"/>
                        <path d="M20.677 4.117A1.996 1.996 0 0 0 20 4H4c-.225 0-.44.037-.642.105l.758.607L12 10.742 19.9 4.7l.777-.583Z"/>
                    </svg>
                    atencionclientes@gruposgl.com
                </p>
                <p class="flex gap-2">
                    <svg class="w-5 h-5 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7.978 4a2.553 2.553 0 0 0-1.926.877C4.233 6.7 3.699 8.751 4.153 10.814c.44 1.995 1.778 3.893 3.456 5.572 1.68 1.679 3.577 3.018 5.57 3.459 2.062.456 4.115-.073 5.94-1.885a2.556 2.556 0 0 0 .001-3.861l-1.21-1.21a2.689 2.689 0 0 0-3.802 0l-.617.618a.806.806 0 0 1-1.14 0l-1.854-1.855a.807.807 0 0 1 0-1.14l.618-.62a2.692 2.692 0 0 0 0-3.803l-1.21-1.211A2.555 2.555 0 0 0 7.978 4Z"/>
                    </svg>
                    +502 2379-0640
                </p>
            </div>
            <img  class="mx-auto w-16 py-4"  src="{{asset('images/main/logo.png')}}" alt=""/>
        </div>

    </section>

@endsection