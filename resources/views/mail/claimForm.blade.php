{{-- @extends('layouts.mail')

@section('content') --}}
<section style="padding:20px; line-height:0 ">
    <h3 style="text-align:center; font-size:1.25rem; top:20px; margin-bottom:20px;">Formularío de Reclamo</h3>

    {{-- Block#1 --}}
    <div style="width:100%; margin: auto">
        <div  style="font-weight: bold; border:1px solid black; text-align: center; padding: 8px;">Datos Personales:</div>
        <div style="display: flex;">
            <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                <div class="font-bold border w-fit p-2" style="font-weight: bold;
                border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    Tipo de reclamo:
                </div>
                <div class="border w-fit p-2" style="font-weight: normal;
                border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    {{isset($claim_type)? $claim_type:false}}
                </div>
            </div>

            <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                <div class="font-bold border w-fit p-2" style="font-weight: bold;
                border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    País:
                </div>
                <div class="border w-fit p-2" style="font-weight: normal;
                border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    {{isset($country)? $country:false}}
                </div>
            </div>
        </div>
        <div style="display: flex;">
            <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                <div class="font-bold border w-fit p-2" style="font-weight: bold;
                border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    Nombre del asesor que lo atendió:
                </div>
                <div class="border w-fit p-2" style="font-weight: normal;
                border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    {{isset($name)? $name:false}}
                </div>
            </div>

            <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                <div class="font-bold border w-fit p-2" style="font-weight: bold;
                border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    Tipo de servicio que ha adquirido:
                </div>
                <div class="border w-fit p-2" style="font-weight: normal;
                border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    {{isset($service_type)? $service_type:false}}
                </div>
            </div>
        </div>
    </div>

    {{-- Block#2 --}}
    <div style="width:100%; margin: auto">
        <div  style="font-weight: bold; border:1px solid black; text-align: center; padding: 8px;">Considera que su asesor cuenta con conocimientos básicos o profesionales:</div>
        <div style="display: flex;">
            <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                <div class="font-bold border w-fit p-2" style="font-weight: bold;
                border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    Calificación de 1 a 5:
                </div>
                <div class="border w-fit p-2" style="font-weight: normal;
                border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    {{isset($consultant)? $consultant:false}}
                </div>
            </div>

        </div>
    </div>

    {{-- Block#3 --}}
    <div style="width:100%; margin: auto">
        <div  style="font-weight: bold; border:1px solid black; text-align: center; padding: 8px;">Los precios han sido los esperados:</div>
        <div style="display: flex;">
            <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                <div class="font-bold border w-fit p-2" style="font-weight: bold;
                border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    Calificación de 1 a 5:
                </div>
                <div class="border w-fit p-2" style="font-weight: normal;
                border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    {{isset($price)? $price:false}}
                </div>
            </div>

        </div>
    </div>

    {{-- Block#4 --}}
    <div style="width:100%; margin: auto">
        <div  style="font-weight: bold; border:1px solid black; text-align: center; padding: 8px;">El seguimiento ha sido de su satisfacción:</div>
        <div style="display: flex;">
            <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                <div class="font-bold border w-fit p-2" style="font-weight: bold;
                border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    Calificación de 1 a 5:
                </div>
                <div class="border w-fit p-2" style="font-weight: normal;
                border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    {{isset($folloUp)? $folloUp:false}}
                </div>
            </div>

        </div>
    </div>

    {{-- Block#5 --}}
    <div style="width:100%; margin: auto">
        <div  style="font-weight: bold; border:1px solid black; text-align: center; padding: 8px;">Las herramientas de comunicación y trazabilidad le han ayudado a tener control de su carga:</div>
        <div style="display: flex;">
            <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                <div class="font-bold border w-fit p-2" style="font-weight: bold;
                border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    Calificación de 1 a 5:
                </div>
                <div class="border w-fit p-2" style="font-weight: normal;
                border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    {{isset($tools)? $tools:false}}
                </div>
            </div>

        </div>
    </div>

    {{-- Block#6 --}}
    <div style="width:100%; margin: auto">
        <div  style="font-weight: bold; border:1px solid black; text-align: center; padding: 8px;">Descripción:</div>
        <div style="display: flex;">
            <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                <div class="font-bold border w-fit p-2" style="font-weight: normal;
                border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    {{isset($claim_description)? $claim_description:false}}
                </div>
            </div>
        </div>
    </div>

    {{-- Block#7 --}}
    <div style="width:100%; margin: auto">
        <div  style="font-weight: bold; border:1px solid black; text-align: center; padding: 8px;">Datos de cliente:</div>
        <div style="display: flex;">
            <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                <div class="font-bold border w-fit p-2" style="font-weight: bold;
                border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    Nombre registrado:
                </div>
                <div class="border w-fit p-2" style="font-weight: normal;
                border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    {{isset($client_name)? $client_name:false}}
                </div>
            </div>

            <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                <div class="font-bold border w-fit p-2" style="font-weight: bold;
                border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    Email:
                </div>
                <div class="border w-fit p-2" style="font-weight: normal;
                border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    {{isset($client_email)? $client_email:false}}
                </div>
            </div>
        </div>
    </div>

</section>
{{-- @endsection --}}