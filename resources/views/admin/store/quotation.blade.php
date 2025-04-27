    @extends('admin.base')

@section('admin-content')
<section class="min-h-screen max-w-7xl mx-auto p-5">

    <h3 class="font-bold text-lg text-center">Resumen Cotización</h3>
    {{-- Header Data --}}
    <div class="px-2 py-5 space-y-1">

        <div class="space-y-1 max-w-2xs">
            {{-- Order Number --}}
            <h3 class="text-center text-xl font-bold">Cotización#{{$order->order_number}}</h3>
            {{-- Adviser --}}
            @if ($order->salesman)
                <h3 class="text-sm font-bold">Asesor: {{optional($order->salesman->name.' '.$order->salesman->last_name)}}</h3>
            @endif

            {{-- Status --}}
            <div class="flex space-x-2 items-center bg-blue-700 text-white py-1 px-1 rounded-lg ">
                <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2h4a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h4m6 0a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1m6 0v3H6V2M5 5h8m-8 5h8m-8 4h8"/>
                </svg>
                @if($order->status == 1)
                    <h3 class="text-sm">Pendiente de Cotizar</h3>
                @elseif($order->status == 7)
                    <h3 class="text-sm">Cotizada</h3>
                @endif
            </div>

            {{-- Service Type --}}
            <div class="flex space-x-2 items-center bg-blue-200 text-blue-800 py-1 px-1 rounded-lg">
                <svg class="w-4 h-4 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                    <path d="M19 0H1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1ZM2 6v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6H2Zm11 3a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8a1 1 0 0 1 2 0h2a1 1 0 0 1 2 0v1Z"/>
                </svg>
                <h3 class="w-fit">Tienda</h3>
            </div>

            {{-- Created At --}}
            <div class="flex space-x-2 items-center text-black py-1 px-1 rounded-lg font-mono">
                <svg class="w-3 h-3 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm14-7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4Z"/>
                </svg>
                <h3 class="text-sm">{{$order->created_at}}</h3>
            </div>

        </div>
    </div>

    {{-- Link --}}
    <div class="flex items-center space-x-1">
        <div class="rounded-lg border border-gray-200 px-3 py-3 max-w-2xl overflow-x-scroll">
            <h3 class="text-blue-800 whitespace-nowrap text-xs underline hover:text-blue-500">{{$package->link}}</h3>
        </div>
        <div class="bg-blue-100 rounded-lg p-2 cursor-pointer" data-value="{{$package->link}}" onclick="navigator.clipboard.writeText(this.dataset.value);">
            <svg class="w-6 h-6 text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                <path d="M5 9V4.13a2.96 2.96 0 0 0-1.293.749L.879 7.707A2.96 2.96 0 0 0 .13 9H5Zm11.066-9H9.829a2.98 2.98 0 0 0-2.122.879L7 1.584A.987.987 0 0 0 6.766 2h4.3A3.972 3.972 0 0 1 15 6v10h1.066A1.97 1.97 0 0 0 18 14V2a1.97 1.97 0 0 0-1.934-2Z"/>
                <path d="M11.066 4H7v5a2 2 0 0 1-2 2H0v7a1.969 1.969 0 0 0 1.933 2h9.133A1.97 1.97 0 0 0 13 18V6a1.97 1.97 0 0 0-1.934-2Z"/>
            </svg>
        </div>
        <div class="bg-blue-100 rounded-lg p-2">
            <a href="{{$package->link}}" target="_blank">
                <svg class="w-6 h-6 text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 17">
                    <path d="M2.057 6.9a8.718 8.718 0 0 1 6.41-3.62v-1.2A2.064 2.064 0 0 1 9.626.2a1.979 1.979 0 0 1 2.1.23l5.481 4.308a2.107 2.107 0 0 1 0 3.3l-5.479 4.308a1.977 1.977 0 0 1-2.1.228 2.063 2.063 0 0 1-1.158-1.876v-.942c-5.32 1.284-6.2 5.25-6.238 5.44a1 1 0 0 1-.921.807h-.06a1 1 0 0 1-.953-.7A10.24 10.24 0 0 1 2.057 6.9Z"/>
                </svg>
            </a>
        </div>
    </div>

    {{-- Fieldset --}}
    <form action="/admin-store-quotation-send" method="POST" autocomplete="off">
        <div class="flex my-10 space-x-5">
            <div>
                @csrf
                <div class="text-center">
                    <h3 class="text-sm font-bold">Valor de mercadería en US$:</h3>
                    <input id="home_mg_price" name="price" class="home_quotation_keyup w-11/12 sm:w-8/12 lg:w-11/12 xl:w-auto rounded-lg h-10 border-none bg-gray-100" type="text" placeholder="Precio" value="{{$package->price}}" required>
                </div>
                <div class="text-center">
                    <h3 class="text-sm font-bold">Shipping en US$:</h3>
                    <input id="home_mg_shipping" name="shipping" class="home_quotation_keyup w-11/12 sm:w-8/12 lg:w-11/12 xl:w-auto rounded-lg h-10 border-none bg-gray-100" type="text" placeholder="Shipping" value="{{$package->shipping}}" required>
                </div>
                <div class="text-center">
                    <h3 class="text-sm font-bold">Peso en libras: </h3>
                    <input id="home_mg_weight" name="weight" class="home_quotation_keyup w-11/12 sm:w-8/12 lg:w-11/12 xl:w-auto rounded-lg h-10 border-none bg-gray-100 " type="text" placeholder="Peso" value="{{$package->weight}}" required>
                </div>
                <div class="text-center ">
                    <h3 class="text-sm font-bold">Descripción:</h3>
                    <select id="home_mg_description" name="description" class="home_quotation_change max-w-[226px] lg:w-11/12 xl:w-auto rounded-lg h-10 border-none bg-gray-100  text-center text-sm text-gray-500" required>
                        <option value="-" selected>Selecciona Descripción</option>
                        <option value="15">Accesorio de Aseo Personal: 15%</option>
                        <option value="15">Accesorio de Cámara: 15%</option>
                        <option value="15">Accesorio de Carro: 15%</option>
                        <option value="15">Accesorio de Cocina: 15%</option>
                        <option value="15">Accesorio de Computacion: 15%</option>
                        <option value="15">Accesorio de Musica: 15%</option>
                        <option value="15">Accesorio de Oficina: 15%</option>
                        <option value="15">Accesorio de Telefonia: 15%</option>
                        <option value="15">Accesorio Deportivo: 15%</option>
                        <option value="0">Accesorio Electrico: 0%</option>
                        <option value="15">Articulos de Cuero: 15%</option>
                        <option value="15">Articulos de Fiesta: 15%</option>
                        <option value="15">Bateria de Carro: 15%</option>
                        <option value="15">Bicicleta: 15%</option>
                        <option value="0">Bocinas de Carro: 0%</option>
                        <option value="15">Bolsas: 15%</option>
                        <option value="10">Cables: 10%</option>
                        <option value="0">Camara Fotografica: 0%</option>
                        <option value="10">Cartucho de tinta (Simple): 10%</option>
                        <option value="0">Cartucho de Tinta C/Chip: 0%</option>
                        <option value="15">Catalogos: 15%</option>
                        <option value="13">CD´s: 10% +3% IPSA</option>
                        <option value="0">Celulares: 0%</option>
                        <option value="5">Cinta de Impresora: 5%</option>
                        <option value="0">Computadoras: 0%</option>
                        <option value="15">Consola de Videojuegos: 15%</option>
                        <option value="15">Cosmeticos: 15%</option>
                        <option value="15">Cuadernos: 15%</option>
                        <option value="0">Discos Duros Vacios: 0%</option>
                        <option value="18">DVD Player: 15% +3% IPSA</option>
                        <option value="15">Edredon: 15%</option>
                        <option value="15">Electrodomesticos: 15%</option>
                        <option value="0">Equipo Medico: 0%</option>
                        <option value="15">Estuche de Cuero: 15%</option>
                        <option value="15">Estuche Partes Plasticas: 15%</option>
                        <option value="15">Etiquetas de Papel o Carton: 15%</option>
                        <option value="15">Etiquetas de Tela: 15%</option>
                        <option value="15">Grabadoras: 15%</option>
                        <option value="0">Herramientas de Mano: 0%</option>
                        <option value="0">Impresoras: 0%</option>
                        <option value="15">Joyeria/Bisuteria: 15%</option>
                        <option value="15">Juguetes: 15%</option>
                        <option value="0">Laptop: 0%</option>
                        <option value="15">Lentes: 15%</option>
                        <option value="0">Lentes (solo aro): 0%</option>
                        <option value="5">Lentes de Contacto: 5%</option>
                        <option value="15">Lentes de Sol: 15%</option>
                        <option value="0">Libros: 0%</option>
                        <option value="5">Llaves: 5%</option>
                        <option value="15">Luces Navideñas: 15%</option>
                        <option value="15">Mascarillas: 15%</option>
                        <option value="15">Material Impreso: 15%</option>
                        <option value="15">Material Promocional: 15%</option>
                        <option value="15">Medicamentos: 15%</option>
                        <option value="15">MP3 (iPod): 15%</option>
                        <option value="15">Muebles de Casa: 15%</option>
                        <option value="10">Partes de Bicicleta: 10%</option>
                        <option value="10">Partes Industriales: 10%</option>
                        <option value="15">Poster: 15%</option>
                        <option value="15">Radio de Carro: 15%</option>
                        <option value="15">Reloj de Pulsera/Pared: 15%</option>
                        <option value="10">Repuestos de Carro: 10%</option>
                        <option value="0">Repuestos de Helicoptero: 0%</option>
                        <option value="0">Repuestos de Motor de Carro: 0%</option>
                        <option value="0">Repuestos Electronicos: 0%</option>
                        <option value="15">Ropa: 15%</option>
                        <option value="0">Scanner: 0%</option>
                        <option value="0">Software de PC: 0%</option>
                        <option value="0">Tablets (iPad): 0%</option>
                        <option value="15">Tarjetas de Invitaciones: 15%</option>
                        <option value="0">Videocamara: 0%</option>
                        <option value="18">Videocintas: 15% +3% IPSA</option>
                        <option value="3">Videojuegos CD/DVD/BlueRay- 0% +3% IPSA</option>
                        <option value="18">Videojuegos Cassette: 15% +3% IPSA</option>
                        <option value="15">Zapatos: 15%</option>
                    </select>
                </div>
            </div>

            <div>
                <div class="p-2">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input id="home_mg_exchange_btn" name="currency" type="checkbox" class="sr-only peer" checked>
                        <div class="flex px-2 w-11 h-6  bg-yellow-400 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-transparent rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-gray-300 after:content-[''] after:absolute after:top-[0px] after:left-[1px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-5 after:transition-all  peer-checked:bg-green-500">
                            <span class="mr-auto font-bold text-green-800">$</span>
                            <span class="ml-auto font-bold text-yellow-600">Q</span>
                        </div>
                    </label>

                    <h3>Flete SGL: <span id="home_mg_transport">0.00</span></h3>
                    <h3>Desaduanaje SGL: <span id="home_mg_desaduanaje">0.00</span></h3>
                    <h3 class="font-bold">Servicios SGL: <span id="home_mg_services">0.00</span></h3>
                    <h3>DAI: <span id="home_mg_dai">0.00</span></h3>
                    <h3>IVA: <span id="home_mg_iva">0.00</span></h3>
                    <h3 class="font-bold">Impuestos: <span id="home_mg_taxes">0.00</span></h3>
                    <h3 class="font-bold">Subtotal: Servicio SGL + Impuestos: <span id="home_mg_total_pobox">0.00</span></h3>
                    <hr class="border-gray-300">
                    <h3 class="font-bold">Comisión: <span id="home_mg_commission">0.00</span></h3>
                    <h3 class="font-bold">Total Todo Incluido: Mercadería + Comisión + Servicio SGL + Impuestos: <span id="home_mg_total_include">0.00</span></h3>
                </div>
            </div>
        </div>

        {{-- Confirmar Orden --}}
        @if($order->status == 1)
            <div class="ml-auto w-fit">
                <input type="hidden" name="service" value="2">
                <input type="hidden" name="quotation_id" value="{{$quotation->idquotation}}">
                <button type="submit" class="mx-auto block bg-blue-700 rounded-lg text-white px-3 py-2">
                    Enviar Cotización
                </button>
                <h3 class="text-xs ml-auto">Se enviara la cotización al cliente por email</h3>
            </div>
        @endif
    </form>

</section>
@endsection

@push('child-scripts')
    <script>
        const rates = {{ Js::from($rates) }};
    </script>
    <script src="{{asset('js/quoter.js')}}"></script>
@endpush