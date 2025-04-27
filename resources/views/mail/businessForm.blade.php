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
        <div  style="font-weight: bold; border:1px solid black; text-align: center; padding: 8px;">Datos Empresa:</div>
        <div style="display: flex;">
            <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                <div class="font-bold border w-fit p-2" style="font-weight: bold;
                border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    Nombre de representante legal o Propietario:
                </div>
                <div class="border w-fit p-2" style="font-weight: normal;
                border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    {{isset($legal_company_name)? $legal_company_name:false}}
                </div>
            </div>

            <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                <div class="font-bold border w-fit p-2" style="font-weight: bold;
                border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    Razón social:
                </div>
                <div class="border w-fit p-2" style="font-weight: normal;
                border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    {{isset($social_company_name)? $social_company_name:false}}
                </div>
            </div>
        </div>
        <div style="display: flex;">
            <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                <div class="font-bold border w-fit p-2" style="font-weight: bold;
                border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    Dirección Fiscal:
                </div>
                <div class="border w-fit p-2" style="font-weight: normal;
                border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    {{isset($legal_company_address)? $legal_company_address:false}}
                </div>
            </div>

            <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                <div class="font-bold border w-fit p-2" style="font-weight: bold;
                border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    Dirección de oficinas:
                </div>
                <div class="border w-fit p-2" style="font-weight: normal;
                border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    {{isset($company_address)? $company_address:false}}
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
                    Indique el nombre de su ejecutivo a cargo:
                </div>
                <div class="border w-fit p-2" style="font-weight: normal;
                border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    {{isset($adviser_name)? $adviser_name:false}}
                </div>
            </div>

            <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                <div class="font-bold border w-fit p-2" style="font-weight: bold;
                border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    Indique fecha de aprobación:
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
                </div>
                <div class="border w-fit p-2" style="font-weight: normal;
                border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                </div>
            </div>

            <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                <div class="font-bold border w-fit p-2" style="font-weight: bold;
                border:1px solid black; width:fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    Email Cliente:
                </div>
                <div class="border w-fit p-2" style="font-weight: normal;
                border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    {{isset($client_email)? $client_email:false}}
                </div>
            </div>
        </div>
    </div>

    {{-- Block#4 --}}
    <div style="width:100%; margin: auto">
        <div  style="font-weight: bold; border:1px solid black; text-align: center; padding: 8px;">Haga un breve relato de lo sucedido:</div>
        <div style="display: flex;">
            <div class="flex items-center" style="display: flex; align-items: center; width: 100%;">
                <div class="font-bold border w-fit p-2" style="font-weight: normal;
                border:1px solid black; width: fit-content; padding: 8px; width: 100%; white-space: nowrap;">
                    {{isset($description)? $description:false}}
                </div>
            </div>
        </div>
    </div>
</section>
{{-- @endsection --}}