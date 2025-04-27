@extends('admin.base')

@php
    switch ($order->order_type)
    {
        case 1:
            $courier = 'national';
            break;
        case 2:
            $courier = 'miami';
            break;
        case 3:
            $courier = 'china';
            break;
        case 4:
            $courier = 'tienda';
            break;
        case 5:
            $courier = 'Tienda';
            break;
        default:
            $courier = null;
    }

    switch ($payment['payment']->type)
    {
        case 1:
            $payment_type ='Tarjeta de Credito/Debito';
            break;
        case 2:
            $payment_type ='Transferencia Bancaria';
            break;
        case 3:
            $payment_type ='Pago en Agencia';
            break;
        case 4:
            $payment_type ='Pago Contra Entrega';
            break;
        default:
            $payment_type = null;
    }


@endphp

@section('admin-content')
    <section class="min-h-screen max-w-7xl mx-auto p-5">
        <h3 class="font-bold text-lg text-center">Resumen De La Orden</h3>
        {{-- Header Data --}}
        <div class="px-2 py-5 space-y-1">
            <div class="space-y-1 max-w-2xs">
                <h3 class="text-center text-xl font-bold">Orden#{{$order->order_number}}</h3>

                @if (isset($order->idtracking))
                    <form action="/track/" method="POST" class="flex items-center text-center w-fit mx-auto p-2 rounded-lg">
                        @csrf
                        <input name="tracking_number" type="text" value="{{$order->tracking_number}}" hidden>
                        <button type="submit" class="bg-blue-900 rounded-lg text-sm px-2
                        text-white py-3 mr-auto align-middle flex
                        hover:bg-blue-400">{{$order->last_status}}</button>
                    </form>
                    <div class="text-center">
                        <h3 class="font-bold text-sm">No.Tracking: {{$order->tracking_number}}</h3>
                    </div>
                @else
                    <div class="flex space-x-2 items-center bg-blue-700 text-white py-1 px-1 rounded-lg ">
                        <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2h4a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h4m6 0a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1m6 0v3H6V2M5 5h8m-8 5h8m-8 4h8"/>
                        </svg>
                        <h3 class="text-sm">Pendiente de Confirmar</h3>
                    </div>
                @endif

                <div class="flex space-x-2 items-center bg-blue-200 text-blue-800 py-1 px-1 rounded-lg">
                    <svg class="w-4 h-4 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                        <path d="M19 0H1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1ZM2 6v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6H2Zm11 3a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8a1 1 0 0 1 2 0h2a1 1 0 0 1 2 0v1Z"/>
                    </svg>
                    <h3 class="w-fit">{{$courier}}</h3>
                </div>

                <div class="flex space-x-2 items-center text-blue-700 py-1 px-1 rounded-lg">
                    <svg class="w-3 h-3 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm14-7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4Z"/>
                    </svg>
                    <h3 class="text-sm">{{$order->order_created_at}}</h3>
                </div>

                <div class="flex space-x-2 items-center text-green-800 py-1 px-1 rounded-lg">
                    <svg class="w-4 h-4 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                    </svg>
                    <h3 class="font-bold text-sm">Total de esta orden: {{$payment['payment']->currency}}{{number_format((float)$payment['total'], 2, '.', '')}} </h3>
                </div>

                {{-- Start Block Payment Button --}}
                @if($payment['payment']->status == 3)
                    <div type="button" class="w-full cursor-pointer py-3 border-2 rounded-lg transition-all delay-75 border-green-100 bg-green-700 text-green-100 hover:bg-green-500 hover:border-green-500">
                        <div class="w-fit mx-auto flex items-center space-x-1">
                            <svg class="w-5 h-5 text-green-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                            </svg>
                            Pago Completado
                        </div>
                    </div>
                @else
                    <div type="button" class="w-full cursor-pointer py-3 border-2 rounded-lg transition-all delay-75 border-red-100 bg-red-700 text-red-100 hover:bg-red-500 hover:border-red-500">
                        <div class="w-fit mx-auto flex items-center space-x-1">
                            <svg class="w-5 h-5 text-green-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                            </svg>
                            Pago Pendiente
                        </div>
                    </div>
                @endif
                {{-- End Block Payment Button --}}
            </div>
        </div>

        @if ($order->order_type == 1 || $order->order_type == 2 || $order->order_type == 3 || $order->order_type == 4)
            {{-- ADDRESS --}}
            <div class="space-x-1 my-10 2xl:space-x-10 lg:flex">
                @foreach ($address as $a)
                    <div class="max-w-xl">
                        @if($a->type == 1)
                            <h3 class="font-bold text-base">Dirección Recolección</h3>
                        @else
                            <h3 class="font-bold text-base">Dirección Entrega</h3>
                        @endif
                        <div class="border-gray-200 border rounded-lg p-5 space-y-3 text-sm h-full">
                            <h3 class="font-bold">{{$a->name}}</h3>
                            <h3>{{$a->municipio}} {{$a->departamento}} {{$a->address}}</h3>
                            <h3 class="font-bold">{{$a->phone}}</h3>
                            <h3>{{$a->email}}</h3>
                            <h3 class="font-bold">DPI/CUI:{{$a->cui}}</h3>
                            @if($a->date)
                                <h3>Fecha de Recolección</h3>
                                <span>A partir de: {{$a->date}}</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- END ADDRESS --}}

            {{-- DOCS --}}
            @if($order->order_type && $order->service == 1)
                <div class="max-w-xl">
                    <h3 class="font-bold text-base">Documentos</h3>
                    <div class="border-gray-200 border rounded-lg p-5 space-y-3 text-sm h-full">
                        @if(is_null($order->idinvoice))
                            <h3 class="font-bold text-xl text-center">Factura de Compra Pendiente</h3>
                            <p class="text-sm text-center">
                                El cliente aún no ha subido la factura de su compra.
                            </p>
                        @else

                            <h3 class="font-bold text-xl text-center">Factura Recibida</h3>
                            <div class="flex justify-center">
                                <form id="user_order_show_invoice_form" action="/show-invoice/{{$order->idorder}}" method="GET">
                                    @csrf
                                    <button id="user_order_show_invoice_btn" type="button" class="flex mx-auto mt-5 bg-blue-800 px-4 py-2
                                        rounded-md text-white cursor-pointer" >Ver Factura
                                    </button>
                                </form>

                                <form id="user_order_delete_invoice_form" action="/delete-invoice" method="POST">
                                    @csrf
                                    <input type="text" value="{{$order->idorder}}" name="idorder" hidden>
                                </form>
                            </div>
                            <h3>No.Tracking: {{$order->tracking}}</h3>
                            <h3>Palabra Clave: {{$order->keyword}}</h3>
                        @endif
                    </div>
                </div>
            @endif
            {{-- END DOCS --}}

            {{-- PACKAGE --}}
            <h3 class="font-bold text-base">Datos Paquete(s)</h3>
            <div class="space-x-1 my-10 2xl:space-x-10 lg:flex">
                <div class="max-w-x max-h-44 overflow-y-auto overflow-x-hidden">
                    @if($order->order_type == 1)
                        @foreach ($packages as $key => $p)
                            <div class="border-2 my-2 p-1 rounded-lg grid grid-cols-3 space-x-1 justify-evenly text-xs lg:grid-cols-8 md:space-x-3">
                                <div>
                                    <h3 class="w-fit rounded-md px-1
                                    py-1 font-bold text-blue-900">
                                    No. </h3>
                                    <h3>Paquete #{{ $key+1 }}</h3>
                                </div>

                                <div>
                                    <h3 class="w-fit rounded-md px-1
                                    py-1 font-bold text-blue-900">
                                    Tipo. </h3>
                                    <h3>{{$p->detail}}</h3>
                                </div>

                                <div>
                                    <h3 class="w-fit rounded-md px-1
                                    py-1 font-bold text-blue-900">
                                    Tamaño. </h3>
                                    @if($p->size)
                                        <h3>{{$p->size.'cm'}}</h3>
                                    @endif
                                </div>

                                <div>
                                    <h3 class="w-fit rounded-md px-1
                                    py-1 font-bold text-blue-900">
                                    Peso. </h3>
                                    @if($p->weight)
                                        <h3>{{$p->weight.'lb'}}</h3>
                                    @endif
                                </div>

                                <div>
                                    <h3 class="w-fit rounded-md px-1
                                    py-1 font-bold text-blue-900">
                                    Frágil. </h3>
                                    <h3>
                                        {{ $p->fragile == 0 ? 'No' : 'Sí' }}
                                    </h3>
                                </div>

                                <div>
                                    <h3 class="w-fit rounded-md px-1
                                    py-1 font-bold text-blue-900">
                                    Peligroso. </h3>
                                    <h3>
                                        {{ $p->dangerous == 0 ? 'No' : 'Sí' }}
                                    </h3>
                                </div>

                                <div>
                                    <h3 class="w-fit rounded-md px-1
                                        py-1 font-bold text-blue-900">
                                        Perecedero. </h3>
                                    <h3>
                                        {{ $p->perishable == 0 ? 'No' : 'Sí' }}
                                    </h3>
                                </div>

                                <div>
                                    <h3 class="w-fit rounded-md px-1
                                        py-1 font-bold text-blue-900">
                                        Unidades. </h3>
                                    <h3 class="text-center">
                                        {{ $p->units }}
                                    </h3>
                                </div>
                            </div>
                        @endforeach
                    @elseif($order->order_type == 2 || $order->order_type == 3 || $order->order_type == 4)
                        @foreach ($packages as $p)
                        <div class="flex justify-evenly  rounded-lg">
                            <div>
                                <h3 class="w-fit rounded-md px-2
                                    py-1 font-bold text-blue-900">Valor mercadería: </h3>
                                <h3 class=" w-fit rounded-md px-2
                                py-1 font-bold text-black">${{number_format((float)$p->price, 2, '.', '')}}</h3>
                            </div>
                            <div>
                                <h3 class="w-fit rounded-md px-2
                                    py-1 font-bold text-blue-900">
                                    Peso: </h3>
                                <h3 class=" w-fit rounded-md px-2
                                py-1 font-bold text-black">{{$p->weight}}lb</h3>
                            </div>
                            <div>
                                <h3 class="w-fit rounded-md px-2
                                    py-1 font-bold text-blue-900">Shipping: </h3>
                                <h3 class=" w-fit rounded-md px-2
                                py-1 font-bold text-black">${{number_format((float)$p->shipping, 2, '.', '')}}</h3>
                            </div>

                            @if(isset($p->link))
                                <div class="flex items-center space-x-1">
                                    <div class="rounded-lg border border-gray-200 px-3 py-3 max-w-2xl overflow-x-scroll">
                                        <h3 class="text-blue-800 whitespace-nowrap text-xs underline hover:text-blue-500">{{$p->link}}</h3>
                                    </div>
                                    <div class="bg-blue-100 rounded-lg p-2 cursor-pointer" data-value="{{$p->link}}" onclick="navigator.clipboard.writeText(this.dataset.value);">
                                        <svg class="w-6 h-6 text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                            <path d="M5 9V4.13a2.96 2.96 0 0 0-1.293.749L.879 7.707A2.96 2.96 0 0 0 .13 9H5Zm11.066-9H9.829a2.98 2.98 0 0 0-2.122.879L7 1.584A.987.987 0 0 0 6.766 2h4.3A3.972 3.972 0 0 1 15 6v10h1.066A1.97 1.97 0 0 0 18 14V2a1.97 1.97 0 0 0-1.934-2Z"/>
                                            <path d="M11.066 4H7v5a2 2 0 0 1-2 2H0v7a1.969 1.969 0 0 0 1.933 2h9.133A1.97 1.97 0 0 0 13 18V6a1.97 1.97 0 0 0-1.934-2Z"/>
                                        </svg>
                                    </div>
                                    <div class="bg-blue-100 rounded-lg p-2">
                                        <a href="{{$p->link}}" target="_blank">
                                            <svg class="w-6 h-6 text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 17">
                                                <path d="M2.057 6.9a8.718 8.718 0 0 1 6.41-3.62v-1.2A2.064 2.064 0 0 1 9.626.2a1.979 1.979 0 0 1 2.1.23l5.481 4.308a2.107 2.107 0 0 1 0 3.3l-5.479 4.308a1.977 1.977 0 0 1-2.1.228 2.063 2.063 0 0 1-1.158-1.876v-.942c-5.32 1.284-6.2 5.25-6.238 5.44a1 1 0 0 1-.921.807h-.06a1 1 0 0 1-.953-.7A10.24 10.24 0 0 1 2.057 6.9Z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            @endif

                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
            {{-- END PACKAGE --}}

            <div class="space-x-1 space-y-2 my-10 2xl:space-x-10 lg:flex lg:space-x-0 lg:space-y-0">
                <div class="border rounded-xl p-5 space-x-5">
                    @if(isset($order->idbilling))
                        <div class="text-sm space-y-3">
                            <h3 class="font-bold text-base">Datos De Facturación</h3>
                            <h3>NIT:{{$order->billing_nit}}</h3>
                            <h3>{{$order->billing_name}}</h3>
                            <h3>{{$order->billing_address}}</h3>
                        </div>
                    @endif
                    <h3 class="font-bold text-xl text-center">Orden De Servicio Al Cliente</h3>
                    <p class="text-sm text-center">
                        Si deseas ver la orden de servicio al cliente
                        has click en el boton de abajo
                    </p>
                    <a href="/{{$courier}}-quoter-generate-osc/{{$order->idquotation}}" target="_blank" >
                        <button  type="button" class="flex mx-auto bg-blue-800 px-4 py-2
                            rounded-md text-white cursor-pointer hover:bg-blue-600" >Ver
                        </button>
                    </a>
                </div>
                <div class="border rounded-xl p-5 space-x-5">
                    <div class="text-sm space-y-3">
                        <h3 class="font-bold text-base">Datos De Pago</h3>
                        <h3>{{$payment_type}}</h3>
                        <h3>Total servicio paquetería: <span class="font-bold">{{$payment['payment']->currency}}{{number_format((float)$payment['total'], 2, '.', '')}}</span></h3>

                        @if ($payment['total_cod'])
                            <h3 class="font-bold">Contra Entrega: Sí</h3>
                            <h3>Total a cobrar(contra entrega): <span class="font-bold">{{$payment['total_cod']->currency}}{{number_format((float)$payment['total_cod']->total, 2, '.', '')}}</span></h3>
                            <hr class="border-gray-400">
                            <h3>Total reembolso a cliente: <span class="font-bold">{{$payment['total_cod']->currency}}{{number_format((float)($payment['total_cod']->total-$payment['total_cod']->total*0.018), 2, '.', '')}}</span></h3>
                            <h3>Total comisión SGL 1.8%: <span class="font-bold">{{$payment['total_cod']->currency}}{{number_format((float)$payment['total_cod']->total*0.018, 2, '.', '')}}</span></h3>
                        @else
                            <h3>Contra Entrega: No</h3>
                        @endif
                    </div>
                </div>
            </div>

            {{-- GUIDE --}}
            <div class="space-x-1 space-y-2 my-10 2xl:space-x-10 lg:flex lg:space-x-0 lg:space-y-0">
                <div class="border rounded-xl p-5 space-x-5">
                    <h3 class="font-bold text-xl text-center">Guía</h3>
                    <p class="text-sm text-center">
                        Si deseas ver la guía
                        has click en el boton de abajo
                    </p>
                    <a href="/{{$courier}}-quoter-generate-guide/{{$order->idquotation}}" target="_blank" >
                        <button  type="button" class="flex mx-auto mt-1 bg-yellow-400 px-4 py-2
                            rounded-md text-white cursor-pointer hover:bg-yellow-600" >Ver
                        </button>
                    </a>
                </div>
            </div>
            {{-- END GUIDE --}}

            {{-- CONFIRM --}}
            @if($order->order_status == 2)
                <div class="ml-auto w-fit">
                    <form action="/admin-order-confirm" method="POST">
                        @csrf
                        <button type="submit" class="mx-auto block bg-blue-700 rounded-lg text-white px-3 py-2">
                            Confirmar Orden
                            <input type="text" value="{{$order->idorder}}" name="idorder" hidden>
                        </button>
                    </form>
                    <h3 class="text-xs ml-auto">Al confirmar la orden se iniciara el tracking</h3>
                </div>
            @endif
            {{-- END CONFIRM --}}
        @endif

        @if ($order->order_type == 5)
            {{-- ADDRESS --}}
            <section class="w-fit min-w-[300px] wrounded-lg h-fit p-5">
                <h3 class="text-lg">
                    Datos Entrega
                </h3>
                <div class="flex py-1 text-sm">
                    <h3 class="ml-right block">Nombre:</h3>
                    <h3 class="ml-auto block line-clamp-2">{{$address['name']}}</h3>
                </div>
                <div class="flex py-1 text-sm font-bold">
                    <h3 class="ml-right block">Teléfono:</h3>
                    <h3 class="ml-auto block line-clamp-2">{{$address['phone']}}</h3>
                </div>
                @if ($address['address'])
                    <div class="flex py-1 text-sm">
                        <h3 class="ml-right block">Dirección:</h3>
                        <h3 class="ml-auto block line-clamp-2">{{$address['address']}}</h3>
                    </div>
                @endif
                @if ($address['departamento'])
                    <div class="flex py-1 text-sm">
                        <h3 class="ml-right block">Departamento:</h3>
                        <h3 class="ml-auto block line-clamp-2">{{$address['departamento']}}</h3>
                    </div>
                @endif
                @if ($address['municipio'])
                    <div class="flex py-1 text-sm">
                        <h3 class="ml-right block">Municipio:</h3>
                        <h3 class="ml-auto block line-clamp-2">{{$address['municipio']}}</h3>
                    </div>
                @endif
                @if ($address['comments'])
                    <div class="flex py-1 text-sm font-bold">
                        <h3 class="ml-right block">Referencia:</h3>
                        <h3 class="ml-auto block line-clamp-2">{{$address['comments']}}</h3>
                    </div>
                @endif
            </section>
            {{-- END ADDRESS --}}

            {{-- CART --}}
            <section class="w-full border border-gray-100 rounded-lg my-5 px-2 lg:w-8/12 xl:w-9/12 max-h-80 lg:max-h-screen overflow-y-auto">
                <h3 class="text-lg">Detalle Pedido</h3>
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
                                <div class="space-y-5">
                                    <h3 class="text-xs font- text-left line-clamp-2 md:line-clamp-2 lg:line-clamp-3 lg:text-base">{{$item->name}}</h3>
                                    <div class="max-w-[400px] flex items-center border p-1 rounded hover:bg-gray-100" data-value="{{$item->link}}" onclick="navigator.clipboard.writeText(this.dataset.value); ">
                                        <h3 class="w-full truncate whitespace-nowrap">{{$item->link}}</h3>
                                        <svg class="w-6 h-6 text-black rounded border " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M18 3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1V9a4 4 0 0 0-4-4h-3a1.99 1.99 0 0 0-1 .267V5a2 2 0 0 1 2-2h7Z" clip-rule="evenodd"/>
                                            <path fill-rule="evenodd" d="M8 7.054V11H4.2a2 2 0 0 1 .281-.432l2.46-2.87A2 2 0 0 1 8 7.054ZM10 7v4a2 2 0 0 1-2 2H4v6a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3Z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </div>
                                {{-- First Subsection --}}
                                <div class="flex my-5 md:my-0 ml-auto w-fit">
                                    <div class="my-auto">
                                        {{-- Price --}}
                                        <div class="ml-auto w-fit">
                                            <div class="w-fit font-bold tracking-wider">Q{{number_format((float)($item->price*$item->units), 2, '.', '')}}</div>
                                            @if ($item->units > 1)
                                                <div class="ml-auto w-fit mx-5 text-xs tracking-wider">Q{{number_format((float)($item->price), 2, '.', '')}}c/u</div>
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
            {{-- END CART --}}

            {{-- CONFIRM --}}
            @if($order->order_status == 2)
                <div class="ml-auto w-fit">
                    <form action="/admin-order-confirm" method="POST">
                        @csrf
                        <button type="submit" class="mx-auto block bg-blue-700 rounded-lg text-white px-3 py-2">
                            Confirmar Orden
                            <input type="text" value="{{$order->idorder}}" name="idorder" hidden>
                        </button>
                    </form>
                    <h3 class="text-xs ml-auto">Al confirmar la orden se iniciara el tracking</h3>
                </div>
            @endif
            {{-- END CONFIRM --}}
        @endif
    </section>
@endsection



@push('child-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
    <script>
        $('#user_order_show_invoice_btn').click(function(){
            $('#user_order_show_invoice_form').ajaxSubmit({
                success: function(res, status, xhr, form) {
                    var a = document.createElement('a');
                    a.href = res;
                    a.target = '_blank';
                    document.body.appendChild(a);
                    a.click();
                    asyncCall();
                }
            });
        });
        async function asyncCall(_res) {
            console.log('calling');
            const result = await resolveAfter2Seconds();
            console.log(result);
            $('#user_order_delete_invoice_form').ajaxSubmit({
                success: function(res, status, xhr, form) {
                    console.log(res);
                }
            });
        }
        function resolveAfter2Seconds() {
            return new Promise((resolve) => {
                setTimeout(() => {
                    resolve('resolved');
                }, 2000);
            });
        }

        $('#admin_order_show_invoice_btn').click(function(){
            $('#admin_order_show_invoice_form').ajaxSubmit({
                success: function(res, status, xhr, form) {
                    var a = document.createElement('a');
                    a.href = res;
                    a.target = '_blank';
                    document.body.appendChild(a);
                    a.click();
                    asyncCall();
                }
            });
        });
        async function asyncCall(_res) {
            console.log('calling');
            const result = await resolveAfter2Seconds();
            console.log(result);
            $('#admin_order_delete_invoice_form').ajaxSubmit({
                success: function(res, status, xhr, form) {
                    console.log(res);
                }
            });
        }
        function resolveAfter2Seconds() {
            return new Promise((resolve) => {
                setTimeout(() => {
                    resolve('resolved');
                }, 2000);
            });
        }

        $('#admin_order_show_bank_note_btn').click(function(){
            $('#admin_order_show_bank_note_form').ajaxSubmit({
                success: function(res, status, xhr, form) {
                    var a = document.createElement('a');
                    a.href = res;
                    a.target = '_blank';
                    document.body.appendChild(a);
                    a.click();
                    asyncCall();
                }
            });
        });
        async function asyncCall(_res) {
            console.log('calling');
            const result = await resolveAfter2Seconds();
            console.log(result);
            $('#admin_order_delete_bank_note_form').ajaxSubmit({
                success: function(res, status, xhr, form) {
                    console.log(res);
                }
            });
        }
        function resolveAfter2Seconds() {
            return new Promise((resolve) => {
                setTimeout(() => {
                    resolve('resolved');
                }, 2000);
            });
        }

        $('#admin_order_payment_approval_btn').click(function(){
            $('#admin_order_payment_approval_form').submit();
        });
    </script>
@endpush


