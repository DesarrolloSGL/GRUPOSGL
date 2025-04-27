@extends('user.base')

@section('user-content')
<section class="min-h-screen max-w-7xl mx-auto">

    <h3 class="font-bold text-lg text-center">Resumen De Mi Orden</h3>
    {{-- Header Data --}}
    <div class="px-2 py-5 space-y-1">
        <div class="space-y-1 max-w-2xs">
            <h3 class="text-center text-xl font-bold tracking-wider">Orden#{{$order->order_number}}</h3>
            @if (isset($tracking))
                <form action="/track/" method="POST" class="flex items-center text-center w-fit mx-auto p-2 rounded-lg">
                    @csrf
                    <input name="tracking_number" type="text" value="{{$tracking->tracking_number}}" hidden>
                    <button type="submit" class="bg-blue-900 rounded-lg text-sm px-2
                    text-white py-3 mr-auto align-middle flex
                    hover:bg-blue-400">{{$tracking_status->state}}</button>
                </form>
                <div class="text-center">
                    <h3 class="font-bold text-sm">No.Tracking: {{$tracking->tracking_number}}</h3>
                </div>
            @else
                <div class="flex space-x-2 items-center bg-blue-700 text-white py-1 px-1 rounded-lg ">
                    <svg class="w-4 h-4 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2h4a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h4m6 0a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1m6 0v3H6V2M5 5h8m-8 5h8m-8 4h8"/>
                    </svg>
                    <h3 class="text-sm">Pendiente de Confirmar</h3>
                </div>
            @endif

            {{-- Order Type --}}
            <div class="flex space-x-2 items-center bg-blue-200 text-blue-800 py-1 px-1 rounded-lg">
                <svg class="w-5 h-5 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M5.535 7.677c.313-.98.687-2.023.926-2.677H17.46c.253.63.646 1.64.977 2.61.166.487.312.953.416 1.347.11.42.148.675.148.779 0 .18-.032.355-.09.515-.06.161-.144.3-.243.412-.1.111-.21.192-.324.245a.809.809 0 0 1-.686 0 1.004 1.004 0 0 1-.324-.245c-.1-.112-.183-.25-.242-.412a1.473 1.473 0 0 1-.091-.515 1 1 0 1 0-2 0 1.4 1.4 0 0 1-.333.927.896.896 0 0 1-.667.323.896.896 0 0 1-.667-.323A1.401 1.401 0 0 1 13 9.736a1 1 0 1 0-2 0 1.4 1.4 0 0 1-.333.927.896.896 0 0 1-.667.323.896.896 0 0 1-.667-.323A1.4 1.4 0 0 1 9 9.74v-.008a1 1 0 0 0-2 .003v.008a1.504 1.504 0 0 1-.18.712 1.22 1.22 0 0 1-.146.209l-.007.007a1.01 1.01 0 0 1-.325.248.82.82 0 0 1-.316.08.973.973 0 0 1-.563-.256 1.224 1.224 0 0 1-.102-.103A1.518 1.518 0 0 1 5 9.724v-.006a2.543 2.543 0 0 1 .029-.207c.024-.132.06-.296.11-.49.098-.385.237-.85.395-1.344ZM4 12.112a3.521 3.521 0 0 1-1-2.376c0-.349.098-.8.202-1.208.112-.441.264-.95.428-1.46.327-1.024.715-2.104.958-2.767A1.985 1.985 0 0 1 6.456 3h11.01c.803 0 1.539.481 1.844 1.243.258.641.67 1.697 1.019 2.72a22.3 22.3 0 0 1 .457 1.487c.114.433.214.903.214 1.286 0 .412-.072.821-.214 1.207A3.288 3.288 0 0 1 20 12.16V19a2 2 0 0 1-2 2h-6a1 1 0 0 1-1-1v-4H8v4a1 1 0 0 1-1 1H6a2 2 0 0 1-2-2v-6.888ZM13 15a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-2Z" clip-rule="evenodd"/>
                </svg>
                <h3 class="w-fit">Tienda</h3>
            </div>

            {{-- Data --}}
            <div class="flex space-x-2 items-center text-blue-700 py-1 px-1 rounded-lg">
                <svg class="w-4 h-4 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm14-7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4Z"/>
                </svg>
                <h3 class="text-sm">{{$order->created_at}}</h3>
            </div>

            {{-- Total --}}
            <div class="flex space-x-2 items-center text-green-800 py-1 px-1 rounded-lg">
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M7 6a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2h-2v-4a3 3 0 0 0-3-3H7V6Z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M2 11a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-7Zm7.5 1a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5Z" clip-rule="evenodd"/>
                    <path d="M10.5 14.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"/>
                </svg>

                <h3 class="font-bold text-sm">Total de esta orden: {{ $payments['payments'][0]->currency }}{{ number_format((float)$payments['total'], 2, '.', '')}}</h3>
            </div>

            {{-- Start Block Payment Button --}}

            @if($payments['payments'][0]->status == 3)
                <button type="button" class="mx-auto flex items-center px-3 py-2 border-2 rounded-lg transition-all delay-75 bg-green-700 text-green-100 hover:bg-green-500 hover:border-green-500">
                    <svg class="w-5 h-5 mx-2 text-green-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                    </svg>
                    Pago Completado
                </button>

            @else
                <button type="button" class="mx-auto flex items-center px-3 py-2 border-2 rounded-lg transition-all delay-75 border-red-100 bg-red-700 text-red-100 hover:bg-red-500 hover:border-red-500">
                    <svg class="w-5 h-5 mx-2 text-red-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12 14a3 3 0 0 1 3-3h4a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-4a3 3 0 0 1-3-3Zm3-1a1 1 0 1 0 0 2h4v-2h-4Z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M12.293 3.293a1 1 0 0 1 1.414 0L16.414 6h-2.828l-1.293-1.293a1 1 0 0 1 0-1.414ZM12.414 6 9.707 3.293a1 1 0 0 0-1.414 0L5.586 6h6.828ZM4.586 7l-.056.055A2 2 0 0 0 3 9v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2h-4a5 5 0 0 1 0-10h4a2 2 0 0 0-1.53-1.945L17.414 7H4.586Z" clip-rule="evenodd"/>
                    </svg>
                    Pago Pendiente
                </button>
            @endif

            {{-- End Block Payment Button

            {{-- Service Bill --}}
            @if(isset($billing->file))
                <div class="flex space-x-2 items-center text-yellow-700 py-1 px-1 rounded-lg bg-yellow-300 hover:bg-yellow-200">
                    <form id="admin_order_show_invoice_form" action="/show-service-invoice/{{$order->idorder}}" method="GET" class="w-full">
                        @csrf
                        <button id="admin_order_show_invoice_btn" type="button" class="flex mx-auto w-full items-center
                            rounded-mdcursor-pointer" >
                            <svg class="w-4  h-4 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 1v4a1 1 0 0 1-1 1H1m8-2h3M9 7h3m-4 3v6m-4-3h8m3-11v16a.969.969 0 0 1-.932 1H1.934A.97.97 0 0 1 1 18V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.829 1h8.239A.969.969 0 0 1 15 2ZM4 10h8v6H4v-6Z"/>
                            </svg>
                            <span class="ml-5">Ver Factura</span>
                        </button>
                    </form>

                    <form id="admin_order_delete_invoice_form" action="/delete-service-invoice" method="POST">
                        @csrf
                        <input type="text" value="{{$order->idorder}}" name="idorder" hidden>
                    </form>
                </div>
            @endif
        </div>
    </div>

    <div class="border rounded-lg p-5 max-w-sm h-48 text-gray-600">
        <h3 class="font-bold text-center">Datos de Contacto</h3>
        <div class="text-sm my-4">
            <h3 class="line-clamp-2"><span class="font-bold">Nombre: </span>{{$address['name']}}</h3>
            <h3 class="line-clamp-1"><span class="font-bold">Teléfono: </span>{{$address['phone']}}</h3>
            @if ($address['address'])
                <h3 class="line-clamp-3"><span class="font-bold">Dirección: </span>{{$address['address']}}</h3>
                <h3 class="line-clamp-1"><span class="font-bold">Departamento: </span>{{$address['departamento']}}</h3>
                <h3 class="line-clamp-1"><span class="font-bold">Municipio: </span>{{$address['municipio']}}</h3>
                <h3 class="line-clamp-2"><span class="font-bold">Referencia: </span>{{$address['comments']}}</h3>
            @endif
        </div>
    </div>

    {{-- Cart --}}
    <section class="w-full border border-gray-100 rounded-lg my-5 px-2 lg:w-8/12 xl:w-9/12 max-h-80 lg:max-h-screen overflow-y-auto">
        @foreach ($cart as $key=>$item)
            <div class="flex my-1 rounded-lg border p-1 lg:p-5">
                <div class="my-auto w-full flex">
                    {{-- First Section --}}
                    <div class="w-20 h-fit rounded-lg">
                        {{-- img --}}
                        <div class="w-20 h-20 bg-gray- p-1 rounded-lg">
                            <img class="w-auto max-h-16 mx-auto my-auto" src="{{asset('storage/store/'.$item['product_idproduct'].'/0'.$item['img_extension'])}}">
                        </div>
                        {{-- Units --}}
                        <div class="mx-auto w-fit">
                            <div class="flex">
                                <p class="mx-1">{{$item['units']}} Uds</p>
                            </div>
                        </div>
                    </div>
                    {{-- End First Section --}}
                    {{-- Second Section --}}
                    <div class="w-full px-1 md:flex">
                        {{-- Title --}}
                        <h3 class="text-xs font- text-left line-clamp-2 md:line-clamp-2 lg:line-clamp-3 lg:text-base">{{$item->name}}</h3>
                        {{-- First Subsection --}}
                        <div class="flex my-5 md:my-0 ml-auto w-fit">
                            <div class="my-auto">
                                {{-- Price --}}
                                <div class="ml-auto w-fit">
                                    <div class="w-fit font-bold tracking-wider">Q{{$item->price*$item->units}}</div>
                                    @if ($item->units > 1)
                                        <div class="ml-auto w-fit mx-5 text-xs tracking-wider">Q{{$item->price}}c/u</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- End First Subsection --}}
                    </div>
                    {{-- End Section --}}
                </div>
            </div>
        @endforeach
    </section>

</section>
@endsection

@push('child-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>Z
@endpush