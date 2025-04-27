@extends('user.base')

@section('user-content')
<section class="min-h-screen max-w-7xl mx-auto p-5">

    <h3 class="font-bold text-lg text-center">Resumen De Mi Cotización</h3>
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
            <div class="flex space-x-2 items-center text-blue-900 py-1 px-1 rounded-lg font-mono">
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

    {{-- Package --}}
    <h3 class="font-bold text-base">Datos Paquete(s)</h3>
    <div class="space-x-1 my-10 2xl:space-x-10 lg:flex">
        <div class="max-w-x max-h-44 overflow-y-auto overflow-x-hidden ">
            <div class="flex justify-evenly  rounded-lg">
                <div>
                    <h3 class="w-fit rounded-md px-2
                        py-1 font-bold text-blue-900">Valor mercadería: </h3>
                    <h3 class=" w-fit rounded-md px-2
                    py-1 font-bold text-black">${{number_format((float)$package->price, 2, '.', '')}}</h3>
                </div>
                <div>
                    <h3 class="w-fit rounded-md px-2
                        py-1 font-bold text-blue-900">
                        Peso: </h3>
                    <h3 class=" w-fit rounded-md px-2
                    py-1 font-bold text-black">{{$package->weight}}lb</h3>
                </div>
                <div>
                    <h3 class="w-fit rounded-md px-2
                        py-1 font-bold text-blue-900">Shipping: </h3>
                    <h3 class=" w-fit rounded-md px-2
                    py-1 font-bold text-black">${{number_format((float)$package->shipping, 2, '.', '')}}</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- Datos de Pago --}}
    <div class="border rounded-xl p-5 space-x-5 w-fit my-10">
        <div class="text-sm space-y-3">
            <h3 class="font-bold text-base">Datos De Pago</h3>
            <h3>Total a pagar: <span class="font-bold">{{$payment->currency}}{{number_format((float)$payment->total, 2, '.', '')}}</span></h3>
        </div>
    </div>

    <hr class="border-gray-300">
    <h3 class="text-xl font-bold">Realizar Orden</h3>
    <h3 class="text-xs">Para continuar con tu orden llena los siguientes datos</h3>

    {{-- Fieldset --}}
    <form id="store_confirm_quotation_form" action="/store-quotation-client-confirm" method="POST" autocomplete="off">
        @csrf
        <div class="">
            {{-- Datos Personales --}}
            <div class="flex space-x-1">
                {{-- Destination Form --}}
                <div id="home_mg_order_destination">
                    <select name="destination" id="store_mg_destination_select" class="p-2 mt-1 mb-1 rounded-lg
                    border-gray-200 h-fit">
                      <option value="0">Seleccione punto de entrega</option>
                      <option value="1" selected>Ciudad de Guatemala</option>
                      <option value="23">Agencia Zona 13</option>
                    </select>
                    <div>
                        <input id="store_address_destination_input" name="address_destination" class="rounded-lg border-gray-200 mx-auto w-full" type="text"  placeholder="Dirección">
                    </div>
                    <div class="my-2  lg:flex lg:space-x-1">
                        <div class="my-2 lg:my-0">
                            <input name="name_destination" class="rounded-lg border-gray-200 mx-auto w-full" type="text"  placeholder="Nombre">
                        </div>
                        <div class="my-2 lg:my-0">
                            <input name="lastname_destination" class="rounded-lg border-gray-200 mx-auto w-full" type="text"  placeholder="Apellido">
                        </div>
                    </div>
                    <div class="my-2">
                        <input name="phone_destination" class="rounded-lg border-gray-200 mx-auto w-full" type="text"  placeholder="Telefono">
                    </div>
                    <div class="my-2">
                        <div class="my-2 lg:my-0">
                            <input name="email_destination" class="rounded-lg border-gray-200 mx-auto w-full" type="email" placeholder="Email">
                        </div>
                        <div class="my-2 lg:my-0">
                            <input name="cui_destination" class="rounded-lg border-gray-200 mx-auto w-full" type="text" placeholder="CUI/DPI">
                        </div>
                    </div>
                    <div class="my-2">
                        <textarea name="comments_destination" class="rounded-lg border-gray-200 w-full p-1" placeholder="Comentarios Adicionales (opcional)"></textarea>
                    </div>
                    <div class="flex my-2 space-x-1 items-center">
                        <input type="checkbox" id="home_mg_destination_profile_data_chk" class="chk_profile_data rounded-sm border-gray-400">
                        <span>Utilizar Datos De Perfil</span>
                    </div>
                </div>
            </div>

            {{-- Facturacion --}}
            <div class="py-1  space-y-1 grid px-1 h-fit max-w-md">
                <h3 class="text-base">Datos de Facturación: </h3>
                <input class="rounded-lg h-10 border-gray-200 "
                    name="bill_name"  type="text" placeholder="Nombre">
                <input class="rounded-lg h-10 border-gray-200"
                    name="bill_address" type="text" placeholder="Dirección">
                <input class="rounded-lg h-10 border-gray-200"
                    name="bill_nit" type="text" placeholder="NIT/DPI">

            </div>
        </div>

        {{-- Confirmar Cotización--}}
        @if($order->status == 7)
            <div class="ml-auto w-fit">
                <input type="hidden" name="service" value="2">
                <input type="hidden" name="order" value="{{$order->order_number}}">
                <button id="store_confirm_quotation_btn" type="button" class="mx-auto block bg-blue-700 rounded-lg text-white px-3 py-2">
                    Aceptar Cotización
                </button>
                <h3 class="text-xs ml-auto">Se añadira la cotización a tus ordenes</h3>
            </div>
        @endif
    </form>


</section>
@endsection

@push('child-scripts')
    <script>
        const rates = {{ Js::from($rates) }};
        const user = {{ Js::from($user) }};

        $('#store_mg_destination_select').change(function(){
            this.value > 22 ? $('#store_address_destination_input').fadeOut('fast'):$('#store_address_destination_input').fadeIn('fast');
        });

        $('#store_confirm_quotation_btn').click(function(){
            let fields = [
                {'name':'name_destination','validation':['alpha','blank']},
                {'name':'lastname_destination','validation':['alpha','blank']},
                {'name':'phone_destination','validation':['number:8-13','blank']},
                {'name':'email_destination','validation':['@','blank']},
                {'name':'cui_destination','validation':['number:1','blank']},
                {'name':'comments_destination','validation':['blank']},
                {'name':'bill_name','validation':['alpha','blank']},
                {'name':'bill_address','validation':['blank']},
                {'name':'bill_nit','validation':['blank']},
            ];


            let form = '#'+$(this).closest("form").attr('id');

            $(form + ' input[name=bill_cf]:checked').length ?
            fields = [
                {'name':'bill_name','validation':['']},
                {'name':'bill_address','validation':['']},
                {'name':'bill_nit','validation':['']},
                {'name':'bill_dpi','validation':['blank']},
                {'name':'payment_mg','validation':['isSelect']},
            ]:
            false;

            let input_address =  $(form + ' input[name=address_destination]').css('display');

            input_address == 'none' ?
            true:
            fields.push(
                {'name':'address_destination','validation':['blank']},
            );

            let validator = Validation(form,fields);
            console.log(validator);
            if(!validator.fail){
                LoadingAnimation(this,'loading');
                $(form).submit();
            }
        });

    </script>
    <script src="{{asset('js/quoter.js')}}"></script>
@endpush