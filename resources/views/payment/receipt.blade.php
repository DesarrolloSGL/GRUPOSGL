@extends('layouts.clean')


@section('content')

    <section class="flex h-screen w-full items-center justify-center">
        <div class="w-80 rounded bg-gray-50 px-6 pt-8 shadow-lg">
            <div class="flex items-center text-center w-fit mx-auto">
                <svg class="w-7 h-7 text-yellow-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z" clip-rule="evenodd"/>
                </svg>
                <h4 class="font-bold text-2xl text-center">Pago Exitoso</h4>
            </div>
            <img  class="mx-auto w-16 py-4"  src="{{asset('images/main/logo.png')}}" alt=""/>
            {{-- <img src="https://upload.wikimedia.org/wikipedia/commons/d/d5/Tailwind_CSS_Logo.svg" alt="chippz"/> --}}
            <div class="flex flex-col text-center items-center gap-2">
                <h4 class="font-semibold">Grupo SGL</h4>
                <p class="text-xs">5ta. Avenida 15-45 Zona 10 Edificio Centro Empresarial Cda.Guatemala</p>
            </div>

            <div class="flex flex-col gap-3 border-b py-6 text-xs">
                <p class="flex justify-between">
                    <span class="text-gray-400">Recibo No.:</span>
                    <span>{{$response['auth_trans_ref_no']}}</span>
                </p>
                <p class="flex justify-between">
                    <span class="text-gray-400">Order :</span>
                    <span><span>{{$response['req_reference_number']}}</span></span>
                </p>
                <h3 class="font-bold">Datos de Tarjeta</h3>
                <p class="flex justify-between">
                    <span class="text-gray-400">Tipo:</span>
                    <span>{{$response['card_type_name']}}</span>
                </p>
                <p class="flex justify-between">
                    <span class="text-gray-400">Tarjeta:</span>
                    <span>{{$response['req_card_number']}}</span>
                </p>
                <p class="flex justify-between">
                    <span class="text-gray-400">Nombre:</span>
                    <span>{{$response['req_bill_to_forename'].' '.$response['req_bill_to_surname']}}</span>
                </p>
            </div>
            <div class="flex flex-col gap-3 pb-6 pt-2 text-xs">
                <table class="w-full text-left">
                    @if(false)
                        <thead>
                            <tr class="flex">
                            <th class="w-full py-2">Product</th>
                            <th class="min-w-[44px] py-2">QTY</th>
                            <th class="min-w-[44px] py-2">Total</th>
                            </tr>
                        </thead>
                    @endif
                    <tbody>
                        <tr class="flex py-1">
                            <td class="flex-1">Total</td>
                            <td class="min-w-[44px]">{{$response['req_currency'].' '.$response['auth_amount']}}</td>
                        </tr>
                    </tbody>
                </table>
                <div class=" border-b border border-dashed"></div>
                <div class="py-4 justify-center items-center flex flex-col gap-2">
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
            </div>
            {{-- @if($response['req_reference_number'] == 'Evento_GrupoSGL_15_Ene') --}}
            @if(str_contains($response['req_reference_number'],'Evento_15_Ene'))
                <a href="/">
                    <h3 class="font-bold text-sm text-center">Recibiras un correo con el recibo y confirmación de registro</h3>
                    <button class="px-3 py-2 my-2 block w-11/12 mx-auto rounded-lg  transition-all delay-75 bg-purple-800 text-white hover:bg-purple-600">Home</button>
                </a>
            @elseif(str_contains($response['req_reference_number'],'PSGL'))
                <a href="/">
                    <button class="px-3 py-2 my-2 block w-11/12 mx-auto rounded-lg  transition-all delay-75 bg-purple-800 text-white hover:bg-purple-600">Home</button>
                </a>
            @else
                <a href="/user-order/{{$order->idorder}}">
                    <button class="px-3 py-2 my-2 block w-11/12 mx-auto rounded-lg  transition-all delay-75 bg-purple-800 text-white hover:bg-purple-600">Volver</button>
                </a>
            @endif
        </div>

    </section>
@endsection