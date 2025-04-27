{{-- @extends('layouts.mail')

@section('content') --}}
<section style="padding:20px; line-height:0 ">
    <h3 style="text-align:center; font-size:1.25rem; top:20px; margin-bottom:20px;">Solicitud de depósitos en garantía</h3>

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
        <div  style="font-weight: bold; border:1px solid black; text-align: center; padding: 8px;">Detalles del deposito:</div>
        <div style="display: flex;">
            <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                <div class="font-bold border w-fit p-2" style="font-weight: bold;
                border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    Numero de recibo de caja extendido por SGL:
                </div>
                <div class="border w-fit p-2" style="font-weight: normal;
                border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    {{isset($receipt_number)? $receipt_number:false}}
                </div>
            </div>

            <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                <div class="font-bold border w-fit p-2" style="font-weight: bold;
                border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    Fecha ingreso de solicitud:::
                </div>
                <div class="border w-fit p-2" style="font-weight: normal;
                border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    {{isset($request_date)? $request_date:false}}
                </div>
            </div>
        </div>
        <div style="display: flex;">
            <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                <div class="font-bold border w-fit p-2" style="font-weight: bold;
                border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    Monto depositado en garantía:
                </div>
                <div class="border w-fit p-2" style="font-weight: normal;
                border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    {{isset($deposit_ammount)? $deposit_ammount:false}}
                </div>
            </div>

            <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                <div class="font-bold border w-fit p-2" style="font-weight: bold;
                border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    Moneda:
                </div>
                <div class="border w-fit p-2" style="font-weight: normal;
                border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    {{isset($currency)? $currency:false}}
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
                    MBL al que aplico esta garantía:
                </div>
                <div class="border w-fit p-2" style="font-weight: normal;
                border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    {{isset($mbl)? $mbl:false}}
                </div>
            </div>

            <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                <div class="font-bold border w-fit p-2" style="font-weight: bold;
                border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    HBL extendido por SGL:
                </div>
                <div class="border w-fit p-2" style="font-weight: normal;
                border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    {{isset($hbl)? $hbl:false}}
                </div>
            </div>
        </div>
        <div style="display: flex;">
            <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                <div class="font-bold border w-fit p-2" style="font-weight: bold;
                border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    Total de contenedores:
                </div>
                <div class="border w-fit p-2" style="font-weight: normal;
                border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    {{isset($containers)? $containers:false}}
                </div>
            </div>

            <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                <div class="font-bold border w-fit p-2" style="font-weight: bold;
                border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    Indique el balance a solicitar en moneda depositada:
                </div>
                <div class="border w-fit p-2" style="font-weight: normal;
                border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    {{isset($request_balance)? $request_balance:false}}
                </div>
            </div>
        </div>
    </div>

    {{-- Block#4 --}}
    <div style="width:100%; margin: auto">
        <div  style="font-weight: bold; border:1px solid black; text-align: center; padding: 8px;">Descripción:</div>
        <div style="display: flex;">
            <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                <div class="font-bold border w-fit p-2" style="font-weight: normal;
                border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    {{isset($deposit_description)? $deposit_description:false}}
                </div>
            </div>
        </div>
    </div>

    {{-- Block#5 --}}
    <div style="width:100%; margin: auto">
        <div  style="font-weight: bold; border:1px solid black; text-align: center; padding: 8px;">Email:</div>
        <div style="display: flex;">
            <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                <div class="font-bold border w-fit p-2" style="font-weight: normal;
                border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    {{isset($client_email)? $client_email:false}}
                </div>
            </div>
        </div>
    </div>
</section>
{{-- @endsection --}}