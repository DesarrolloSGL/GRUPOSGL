{{-- @extends('layouts.mail')

@section('content') --}}
<section style="padding:20px; line-height:0 ">
        <h3 style="text-align:center; font-size:1.25rem; top:20px; margin-bottom:20px;">Solicitud De Reintegro</h3>

        {{-- Block#1 --}}
        <div style="width:100%; margin: auto">
            <div  style="font-weight: bold; border:1px solid black; text-align: center; padding: 8px;">Datos Personales:</div>
            <div style="display: flex;">
                <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                    <div class="font-bold border w-fit p-2" style="font-weight: bold;
                    border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        Nombre Completo de solicitante:
                    </div>
                    <div class="font-bold border w-fit p-2" style="font-weight: normal;
                    border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        {{isset($full_name)? $full_name:false}}
                    </div>
                </div>

                <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                    <div class="font-bold border w-fit p-2" style="font-weight: bold;
                    border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        Número de Identificación CUI:
                    </div>
                    <div class="font-bold border w-fit p-2" style="font-weight: normal;
                    border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        {{isset($cui)? $cui:false}}
                    </div>
                </div>
            </div>
            <div style="display: flex;">
                <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                    <div class="font-bold border w-fit p-2" style="font-weight: bold;
                    border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        Empresa para la que labora:
                    </div>
                    <div class="font-bold border w-fit p-2" style="font-weight: normal;
                    border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        {{isset($company)? $company:false}}
                    </div>
                </div>

                <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                    <div class="font-bold border w-fit p-2" style="font-weight: bold;
                    border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        Puesto que desempeña:
                    </div>
                    <div class="font-bold border w-fit p-2" style="font-weight: normal;
                    border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        {{isset($position)? $position:false}}
                    </div>
                </div>
            </div>
        </div>

        {{-- Block#2 --}}
        <div style="width:100%; margin: auto">
            <div  style="font-weight: bold; border:1px solid black; text-align: center; padding: 8px;">Detalles de Servicio:</div>
            <div style="display: flex;">
                <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                    <div class="font-bold border w-fit p-2" style="font-weight: bold;
                    border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        Numero de Pedido OSC:
                    </div>
                    <div class="font-bold border w-fit p-2" style="font-weight: normal;
                    border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        {{isset($osc_number)? $osc_number:false}}
                    </div>
                </div>

                <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                    <div class="font-bold border w-fit p-2" style="font-weight: bold;
                    border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        Describa El Tipo De Servicio:
                    </div>
                    <div class="font-bold border w-fit p-2" style="font-weight: normal;
                    border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        {{isset($service_type)? $service_type:false}}
                    </div>
                </div>
            </div>
            <div style="display: flex;">
                <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                    <div class="font-bold border w-fit p-2" style="font-weight: bold;
                    border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        Describa el nombre de su asesor de ventas:
                    </div>
                    <div class="font-bold border w-fit p-2" style="font-weight: normal;
                    border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        {{isset($consultant_name)? $consultant_name:false}}
                    </div>
                </div>
            </div>
        </div>

        {{-- Block#3 --}}
        <div style="width:100%; margin: auto">
            <div  style="font-weight: bold; border:1px solid black; text-align: center; padding: 8px;"></div>
            <div style="display: flex;">
                <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                    <div class="font-bold border w-fit p-2" style="font-weight: bold;
                    border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        Su Reclamo Se Debe A:
                    </div>
                    <div class="font-bold border w-fit p-2" style="font-weight: normal;
                    border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        {{isset($claim_type)? $claim_type:false}}
                    </div>
                </div>

                <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                    <div class="font-bold border w-fit p-2" style="font-weight: normal;
                    border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        Pago seguro de carga
                    </div>
                    <div class="font-bold border w-fit p-2" style="font-weight: bold;
                    border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        {{isset($secure_payment)? $secure_payment:false}}
                    </div>
                </div>
            </div>
            <div style="display: flex;">
                <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                    <div class="font-bold border w-fit p-2" style="font-weight: bold;
                    border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        Recibió reintegro de pagos
                        adicionales o depósitos en garantía
                    </div>
                    <div class="font-bold border w-fit p-2" style="font-weight: normal;
                    border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        {{isset($refund_received)? $refund_received:false}}
                    </div>
                </div>
            </div>
        </div>

        {{-- Block#4 --}}
        <div style="width:100%; margin: auto">
            <div  style="font-weight: bold; border:1px solid black; text-align: center; padding: 8px;">Para el servicio TODO INCLUIDO seleccione las fechas de compra y método de pago utilizado:</div>
            @if(isset($purchase_date))
                @foreach ($purchase_date as $key=>$date)
                <div style="display: flex;">
                    <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                        <div class="font-bold border w-fit p-2" style="font-weight: bold;
                        border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                            Fecha:
                        </div>
                        <div class="font-bold border w-fit p-2" style="font-weight: normal;
                        border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                            {{$date}}
                        </div>
                    </div>

                    <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                        <div class="font-bold border w-fit p-2" style="font-weight: normal;
                        border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                            {{ $payment_type[$key]}}
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>

        {{-- Block#5 --}}
        <div style="width:100%; margin: auto">
            <div  style="font-weight: bold; border:1px solid black; text-align: center; padding: 8px;">Describa su reclamo:</div>

            <div style="display: flex;">
                <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                    <div class="font-bold border w-fit p-2" style="font-weight: normal;
                    border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        {{isset($claim_description)? $claim_description:false}}
                    </div>
                </div>
            </div>
        </div>

        {{-- Block#6 --}}
        <div style="width:100%; margin: auto">
            <div  style="font-weight: bold; border:1px solid black; text-align: center; padding: 8px;"></div>
            <div style="display: flex;">
                <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                    <div class="font-bold border w-fit p-2" style="font-weight: bold;
                    border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        Ingrese nombre de comprador
                        en Factura de SGL:
                    </div>
                    <div class="font-bold border w-fit p-2" style="font-weight: normal;
                    border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        {{isset($buyer_name)? $buyer_name:false}}
                    </div>
                </div>

                <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                    <div class="font-bold border w-fit p-2" style="font-weight: bold;
                    border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        Ingrese numero de Nit:
                    </div>
                    <div class="font-bold border w-fit p-2" style="font-weight: normal;
                    border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        {{isset($nit)? $nit:false}}
                    </div>
                </div>
            </div>
            <div style="display: flex;">
                <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                    <div class="font-bold border w-fit p-2" style="font-weight: bold;
                    border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        Ingrese dirección fiscal:
                    </div>
                    <div class="font-bold border w-fit p-2" style="font-weight: normal;
                    border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        {{isset($fiscal_address)? $fiscal_address:false}}
                    </div>
                </div>
            </div>
        </div>

        {{-- Block#7 --}}
        <div style="width:100%; margin: auto">
            <div  style="font-weight: bold; border:1px solid black; text-align: center; padding: 8px;">Correo electrónico:</div>

            <div style="display: flex;">
                <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                    <div class="font-bold border w-fit p-2" style="font-weight: normal;
                    border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        {{isset($buyer_email)? $buyer_email:false}}
                    </div>
                </div>
            </div>
        </div>

        {{-- Block#8 --}}
        <div style="width:100%; margin: auto">
            <div  style="font-weight: bold; border:1px solid black; text-align: center; padding: 8px;"></div>
            <div style="display: flex;">
                <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                    <div class="font-bold border w-fit p-2" style="font-weight: bold;
                    border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        Medio de pago para su Reintegro
                    </div>
                    <div class="font-bold border w-fit p-2" style="font-weight: normal;
                    border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        {{isset($refund_type)? $refund_type:false}}
                    </div>
                </div>

                <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                    <div class="font-bold border w-fit p-2" style="font-weight: bold;
                    border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        Tipo de moneda para reintegro:
                    </div>
                    <div class="font-bold border w-fit p-2" style="font-weight: normal;
                    border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        {{isset($refund_currency)? $refund_currency:false}}
                    </div>
                </div>
            </div>
            <div style="display: flex;">
                <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                    <div class="font-bold border w-fit p-2" style="font-weight: bold;
                    border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        Seleccione la casilla para descuento
                        del 5% por gastos administrativos:
                    </div>
                    <div class="font-bold border w-fit p-2" style="font-weight: normal;
                    border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                        {{isset($discount)? $discount:false}}
                    </div>
                </div>
            </div>
        </div>

        {{-- <p><span class="">Nombre Completo de solicitante:</span>{{isset($full_name)? $full_name:false}}</p>
        <p><span class="">Número de Identificación CUI: </span>{{isset($cui)? $cui:false}}</p>
        <p><span class="">Empresa para la que labora: </span>{{isset($company)? $company:false}}</p>
        <p><span class="">Puesto que desempeña: </span>{{isset($position)? $position:false}}</p>
        <p><span class="">Numero de Pedido OSC: </span>{{isset($osc_number)? $osc_number:false}}</p>
        <p><span class="">Describa El Tipo De Servicio: </span>{{isset($service_type)? $service_type:false}}</p>
        <p><span class="">Describa el nombre de su asesor de ventas: </span>{{isset($consultant_name)? $consultant_name:false}}</p>
        <p><span class="">Su Reclamo Se Debe A: </span>{{isset($claim_type)? $claim_type:false}}</p>
        <p><span class="">Pago seguro de carga: </span>{{isset($secure_payment)? $secure_payment:false}}</p>
        <p><span class="">No recibió reintegro de pagos adicionales o depósitos en garantía: </span>{{isset($refund_received)? $refund_received:false}}</p>
        <p><span class="">Describa su reclamo: </span>{{isset($claim_description)? $claim_description:false}}</p>
        <p><span class="">Ingrese nombre de comprador en Factura de SGL: </span>{{isset($buyer_name)? $buyer_name:false}}</p>
        <p><span class="">Ingrese numero de Nit: </span>{{isset($nit)? $nit:false}}</p>
        <p><span class="">Ingrese dirección fiscal: </span>{{isset($fiscal_address)? $fiscal_address:false}}</p>
        <p><span class="">Correo electrónico: </span>{{isset($buyer_email)? $buyer_email:false}}</p>
        <p><span class="">Seleccione el medio de pago para su Reintegro: </span>{{isset($refund_type)? $refund_type:false}}</p>
        <p><span class="">Seleccione el tipo de moneda para reintegro: </span>{{isset($refund_currency)? $refund_currency:false}}</p>
        <p><span class="">Seleccione la casilla para descuento del 5% por gastos administrativos: </span>{{isset($discount)? $discount:false}}</p> --}}
    </section>
{{-- @endsection --}}