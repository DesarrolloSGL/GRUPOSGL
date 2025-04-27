@extends('layouts.app')

@section('content')
<section class="w-full">
    <div class="px-2">
        <div class="bg-white my-10 mx-auto border border-gray-100 rounded-xl  p-5 xl:w-fit">
            <h3 class="font-bold text-xl text-center">Membresía</h3>
            <div class="py-10 overflow-x-scroll flex border-y w-full mx-auto space-x-1 md:space-x-5 lg:overflow-hidden md:w-fit">
                {{-- Free Tier --}}
                <div class="px-10 py-3 rounded-3xl border-2 max-w-[250px]">
                    <h3 class="font-bold text-left text-lg text-sky-400">Free Tier</h3>
                    <h3 class="font-bold text-center text-lg my-5 text-blue-800">$0 USD <span class="text-xs">/mes</span></h3>
                    <hr class="border my-5 w-full">
                    <ul class="py-5 px-1 text-sm text-gray-700 text-center">
                        <li class="font-bold whitespace-nowrap my-5">
                            <span class="flex items-center mr-6">
                                <svg class="w-6 h-6 text-sky-400 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                $3.50 por libra
                            </span>
                            <h3 class="text-gray-500 text-center text-xs font-bold whitespace-nowrap">Costo Miami</h3>
                        </li>
                        <li class="font-bold whitespace-nowrap my-5">
                            <span class="flex items-center mr-6">
                                <svg class="w-6 h-6 text-sky-400 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                $9.75 por libra
                            </span>
                            <h3 class="text-gray-500 text-center text-xs font-bold whitespace-nowrap">Costo China</h3>
                        </li>
                        <li class="font-bold whitespace-nowrap my-5">
                            <span class="text-center">
                                $4.50 por paquete
                            </span>
                            <h3 class="text-gray-500 text-center text-xs font-bold whitespace-nowrap">Desconsolidación</h3>
                        </li>
                        <li class="font-bold whitespace-nowrap my-5">
                            <span class="text-center">
                                Q15.00
                            </span>
                            <h3 class="text-gray-500 text-center text-xs font-bold whitespace-nowrap">Entrega a domicilio</h3>
                        </li>
                        <li class="font-bold whitespace-nowrap my-5">
                            <span class="flex items-center mr-6">
                                ***1 Punto por paquete
                            </span>
                            <h3 class="text-lime-500 text-center text-xs font-bold whitespace-nowrap">Acumulación de puntos</h3>
                        </li>
                    </ul>
                </div>

                {{-- Premier Club --}}
                <div class="px-10 py-3 rounded-3xl border-2 max-w-[250px]">
                    <h3 class="font-bold text-left text-lg text-sky-400">Premier Club</h3>
                    <h3 class="font-bold text-center text-lg my-5 text-blue-800">*$14.99 USD <span class="text-xs">/mes</span></h3>
                    <hr class="border my-5 w-full">
                    <ul class="py-5 px-1 text-sm text-gray-700 text-center">
                        <li class="font-bold whitespace-nowrap my-5">
                            <span class="flex items-center mr-6">
                                <svg class="w-6 h-6 text-sky-400 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                $3.00 por libra
                            </span>
                            <h3 class="text-gray-500 text-center text-xs font-bold whitespace-nowrap">Costo Miami</h3>
                        </li>
                        <li class="font-bold whitespace-nowrap my-5">
                            <span class="flex items-center mr-6">
                                <svg class="w-6 h-6 text-sky-400 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                $9.25 por libra
                            </span>
                            <h3 class="text-gray-500 text-center text-xs font-bold whitespace-nowrap">Costo China</h3>
                        </li>
                        <li class="font-bold whitespace-nowrap my-5">
                            <span class="text-center">
                                $4.50 por paquete
                            </span>
                            <h3 class="text-gray-500 text-center text-xs font-bold whitespace-nowrap">Desconsolidación</h3>
                        </li>
                        <li class="font-bold whitespace-nowrap my-5">
                            <span class="text-center">
                                **Gratis
                            </span>
                            <h3 class="text-gray-500 text-center text-xs font-bold whitespace-nowrap">Entrega a domicilio</h3>
                        </li>
                        <li class="font-bold whitespace-nowrap my-5">
                            <span class="flex items-center mr-6">
                                ***2 Puntos por paquete
                            </span>
                            <h3 class="text-lime-500 text-center text-xs font-bold whitespace-nowrap">Acumulación de puntos</h3>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="px-5 sm:px-10 md:px-20 lg:px-60">
                <h3 class="text-xs my-5 max-w-7xl text-justify">
                    *Membresía gratis al registrarte con fecha de vencimiento 31/12/24 o hasta que se realices 10 órdenes. Después de la décima orden tendrás que adquirir tu membresía por $14.99.
                </h3>
                <h3 class="text-xs my-5 max-w-7xl text-justify">
                    **Envíos Gratis dentro del perímetro del departamento de Guatemala.
                </h3>
                <h3 class="text-xs my-5 max-w-7xl text-justify">
                    ***(Próximamente) Puntos SGL Express
                    Acumulas los puntos, por cada
                    paquete desconsolidado.
                    Al acumular 10 puntos
                    recibes desconsolidación gratis en
                    1 próximo paquete.
                    Por cada 20 puntos recibes premios
                    sorpresas en tu domicilio adicional
                    a las desconsolidaciones de tus
                    paquetes. Tus puntos serán acumulados
                    internamente. Podrás visualizarlos y
                    utilizarlos cuando la función esté disponible.
                </h3>
            </div>
        </div>
    </div>
</section>
@endsection