@extends('layouts.app')

@section('content')
    @if(!Session::has('form_success'))
        <section class="m-10 p-5 mx-auto w-11/12 bg-white rounded-xl shadow-lg md:w-6/12">
            <h3 class="text-2xl text-center mt-10 font-bold md:text-4xl">Formulario de Reintegro</h3>
            <form id="refund_form_form" action="/refund-form" method="POST" autocomplete="off" enctype="multipart/form-data" >
                @csrf

                <h3 class="text-xl text-center mt-10 font-bold">Datos Personales</h3>
                <div class="w-full mx-auto py-10 border-b-2 rounded-lg justify-evenly space-x-1 md:flex lg:p-10">
                    <div class="space-y-5">
                        <div>
                            <h3 class="text-sm">*Nombre Completo de solicitante</h3>
                            <input name="full_name" class="w-full rounded-lg" type="text">
                        </div>
                        <div>
                            <h3 class="text-sm">*Número de Identificación CUI</h3>
                            <input name="cui" class="w-full rounded-lg" type="text">
                        </div>
                    </div>
                    <div class="space-y-5">
                        <div>
                            <h3 class="text-sm">*Empresa para la que labora</h3>
                            <input name="company" class="w-full rounded-lg" type="text">
                        </div>
                        <div>
                            <h3 class="text-sm">*Puesto que desempeña</h3>
                            <input name="position" class="w-full rounded-lg" type="text">
                        </div>
                    </div>
                </div>

                <h3 class="text-xl text-center mt-10 font-bold">Detalles del Servicio</h3>
                <div class="w-full mx-auto py-10 border-b-2 rounded-lg justify-evenly space-x-1 md:flex lg:p-10">
                    <div class="space-y-5">
                        <div class="">
                            <h3 class="text-sm">*Numero de Pedido OSC</h3>
                            <input name="osc_number" class="w-full rounded-lg" type="text">
                        </div>
                        <div class="">
                            <h3 class="text-sm">*Describa El Tipo De Servicio:</h3>
                            <select name="service_type" class="w-full rounded-lg p-2.5 text-sm">
                                <option value="0">Seleccione Una Opción</option>
                                <option value="1">Aéreo</option>
                                <option value="2">Courier</option>
                                <option value="3">FCL</option>
                                <option value="4">LCL</option>
                                <option value="5">Terrestre</option>
                                <option value="6">Aduana</option>
                                <option value="7">Seguro</option>
                                <option value="8">Brokerage</option>
                                <option value="9">Tienda en línea</option>
                            </select>
                        </div>
                    </div>
                    <div class="space-y-5">
                        <div class="">
                            <h3 class="text-sm">*Nombre de su asesor de ventas</h3>
                            <input name="consultant_name" class="w-full rounded-lg" type="text">
                        </div>
                    </div>
                </div>

                <h3 class="text-xl text-center mt-10 font-bold">Carga de Archivos</h3>
                <div class="w-full mx-auto py-10 border-b-2 rounded-lg justify-evenly space-x-1 md:flex lg:p-10">
                    <div class="space-y-5">
                        <div class="mx-auto w-fit">
                            <h3 class="text-sm">*Factura de su compra</h3>
                            <div class="mx-auto items-center bg-white">
                                <button type="button" class="upload bg-[rgb(0,100,255)] text-white flex
                                    rounded-md px-3 py-2 hover:bg-[rgb(0,200,255)] border border-gray-400">
                                    Subir Archivo
                                    <svg class="w-6 h-6 mx-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="m14.707 4.793-4-4a1 1 0 0 0-1.416 0l-4 4a1 1 0 1 0 1.416 1.414L9 3.914V12.5a1 1 0 0 0 2 0V3.914l2.293 2.293a1 1 0 0 0 1.414-1.414Z"/>
                                        <path d="M18 12h-5v.5a3 3 0 0 1-6 0V12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                                    </svg>
                                </button>
                                <input name="invoice" type="file" hidden>
                            </div>
                        </div>

                        <div class="mx-auto w-fit">
                            <h3 class="text-sm">*Packing slip</h3>
                            <div class="mx-auto items-center bg-white">
                                <button type="button" class="upload bg-[rgb(0,100,255)] text-white flex
                                    rounded-md px-3 py-2 hover:bg-[rgb(0,200,255)] border border-gray-400">
                                    Subir Archivo
                                    <svg class="w-6 h-6 mx-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="m14.707 4.793-4-4a1 1 0 0 0-1.416 0l-4 4a1 1 0 1 0 1.416 1.414L9 3.914V12.5a1 1 0 0 0 2 0V3.914l2.293 2.293a1 1 0 0 0 1.414-1.414Z"/>
                                        <path d="M18 12h-5v.5a3 3 0 0 1-6 0V12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                                    </svg>
                                </button>
                                <input name="package_slip" type="file" hidden>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-5">
                        <div class="mx-auto w-fit text-center">
                            <h3 class="text-sm">*Factura de cobro por SGL</h3>
                            <div class="mx-auto items-center bg-white">
                                <button type="button" class="upload bg-[rgb(0,100,255)] text-white flex
                                    rounded-md px-3 py-2 hover:bg-[rgb(0,200,255)] border border-gray-400">
                                    Subir Archivo
                                    <svg class="w-6 h-6 mx-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="m14.707 4.793-4-4a1 1 0 0 0-1.416 0l-4 4a1 1 0 1 0 1.416 1.414L9 3.914V12.5a1 1 0 0 0 2 0V3.914l2.293 2.293a1 1 0 0 0 1.414-1.414Z"/>
                                        <path d="M18 12h-5v.5a3 3 0 0 1-6 0V12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                                    </svg>
                                </button>
                                <input name="sgl_invoice" type="file" hidden>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tipo de Reclamo --}}
                <div class="w-full mx-auto py-10 border-b-2 rounded-lg justify-evenly space-x-1 md:flex lg:p-10">
                    <div class="space-y-5">
                        <div class="">
                            <h3 class="text-sm">*Su Reclamo <br>Se Debe A:</h3>
                            <select name="claim_type"  class="w-full rounded-lg p-2.5 text-sm">
                                <option value="0">Seleccione Una Opción</option>
                                <option value="1">Pérdida parcial de mercancías</option>
                                <option value="2">Pérdida total</option>
                                <option value="3">Nunca recibí mi mercancía</option>
                                <option value="4">Se cobro mas de lo cotizado</option>
                                <option value="5">No recibí deposito en garantía</option>
                            </select>
                        </div>

                        <div class="">
                            <h3>*Pago seguro de carga</h3>
                            <select name="secure_payment" class="w-full rounded-lg p-2.5 text-sm">
                                <option value="0">Seleccione Una Opción</option>
                                <option value="1">Sí</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="space-y-5">
                        <div class="">
                            <h3 class="text-sm">*Recibió reintegro de pagos <br> adicionales o depósitos en garantía</h3>
                            <select name="refund_received" class="w-full rounded-lg p-2.5 text-sm">
                                <option value="0">Seleccione Una Opción</option>
                                <option value="1">Sí</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Compras TodoIncluido --}}
                <div class="w-full mx-auto py-10 border-b-2 rounded-lg justify-evenly space-x-1 md:flex lg:p-10">
                    <div class="">
                        <h3>Para compras dentro del servicio TODO INCLUIDO seleccione las fechas de compra y pago de servicio, método de pago utilizado </h3>
                        <div id="refund_form_all_include_div" class="">
                            <div class="flex p-1 space-x-1">
                                <input name="purchase_date[]" class="rounded-lg p-2.5" type="date">
                                <select name="payment_type[]" class="w-full rounded-lg p-2.5 text-sm">
                                    <option value="0">Seleccione Una Opción</option>
                                    <option value="1">tarjeta de credito/debito</option>
                                    <option value="2">efectivo</option>
                                    <option value="3">transferencia bancaria</option>
                                    <option value="4">paypal</option>
                                    <option value="5">puntos bancarios</option>
                                    <option value="6">tarjetas prepago de regalo</option>
                                </select>
                            </div>
                        </div>
                        <button id="refund_form_all_include_btn" type="button" class="px-4 py-2 rounded-xl bg-blue-950 text-white ml-auto block">+</button>
                    </div>
                </div>

                {{-- Reclamo Descripcion --}}
                <div class="w-full mx-auto px-5 py-10 border-b-2 rounded-lg flex justify-evenly text-sm">
                    <div class="">
                        <h3>Describa su reclamo:</h3>
                        <textarea class="w-full" name="claim_description" cols="100"
                            rows="5" maxlength="500">
                        </textarea>
                    </div>
                </div>

                {{-- Datos Fiscales --}}
                <div class="w-full mx-auto py-10 border-b-2 rounded-lg justify-evenly space-x-1 md:flex lg:p-10">
                    <div class="space-y-5">
                        <div class="">
                            <h3 class="text-sm">*Ingrese nombre de comprador <br> en Factura de SGL:</h3>
                            <input name="buyer_name" class="w-full rounded-lg" type="text">
                        </div>
                        <div class="">
                            <h3>*Ingrese numero de Nit:</h3>
                            <input name="nit" class="w-full rounded-lg" type="text">
                        </div>
                    </div>
                    <div class="space-y-5">
                        <div class="">
                            <h3>*Ingrese dirección fiscal:</h3>
                            <input name="fiscal_address" class="w-full rounded-lg" type="text">
                        </div>
                    </div>
                </div>

                {{-- Carga Archivos Fiscales --}}
                <div class="w-full mx-auto py-10 border-b-2 rounded-lg justify-evenly space-x-1 md:flex lg:p-10">
                    <div class="my-5 mx-auto w-fit">
                        <h3 class="text-sm">*Cargue Dpi de propietario o/y <br> Representante Legal:</h3>
                        <div class="mx-auto items-center bg-white">
                            <button type="button" class="upload bg-[rgb(0,100,255)] text-white flex
                                rounded-md px-3 py-2 hover:bg-[rgb(0,200,255)] border border-gray-400">
                                Subir Archivo
                                <svg class="w-6 h-6 mx-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="m14.707 4.793-4-4a1 1 0 0 0-1.416 0l-4 4a1 1 0 1 0 1.416 1.414L9 3.914V12.5a1 1 0 0 0 2 0V3.914l2.293 2.293a1 1 0 0 0 1.414-1.414Z"/>
                                    <path d="M18 12h-5v.5a3 3 0 0 1-6 0V12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                                </svg>
                            </button>
                            <input name="legal_dpi" type="file" hidden>
                        </div>

                    </div>

                    <div class="">
                        <h3>*Correo electrónico:</h3>
                        <input name="buyer_email" class="w-full rounded-lg" type="text">
                    </div>
                </div>

                {{-- Reintegro --}}
                <div class="w-full mx-auto py-10 border-b-2 rounded-lg justify-evenly space-x-1 md:flex lg:p-10">
                    <div class="space-y-5">
                        <div class="">
                            <h3>*Seleccione el medio de pago para su Reintegro</h3>
                            <select name="refund_type" class="w-full rounded-lg p-2.5 text-sm">
                                <option value="0">Seleccione Una Opción</option>
                                <option value="1">Transferencia bancaria</option>
                                <option value="2">Cheque</option>
                            </select>
                        </div>

                        <div class="">
                            <h3>*Seleccione el tipo de moneda para reintegro:</h3>
                            <select id="select_test" name="refund_currency" class="w-full rounded-lg p-2.5 text-sm">
                                <option value="0">Seleccione Una Opción</option>
                                <option value="1">QTZ</option>
                                <option value="2">USD</option>
                            </select>
                        </div>
                    </div>
                    <div class="space-y-5 my-10 md:my-0">
                        <div class="text-center">
                            <input name="discount" type="checkbox">
                            <h3 class="">Seleccione la casilla para descuento <br>del 5% por gastos administrativos:</h3>
                        </div>
                    </div>
                </div>
                <x-honeypot />
                <div class="py-10 ml-auto w-fit">
                    <input id="refund_form_terms_chk" type="checkbox">
                    <a class="underline text-xs md:text-sm" href="/refund-politics" target="_blank">Políticas de Reembolso</a>
                    <br>
                    <button id="refund_form_submit_btn" disabled type="button" class="bg-[rgb(0,100,255)]/100 text-white opacity-50 ml-auto block px-3 py-2 rounded-xl text-lg">Enviar</button>
                </div>
            </form>
        </section>
    @else
        <section class="my-10 p-10 mx-auto w-11/12 sm:w-7/12 md:w-6/12 lg:w-4/12  text-center">
            <img class="mx-auto max-w-[40px]" src="{{asset('images/main/logo.png')}}" alt="">
            <h3 class="font-bold text-xl">Tu formulario ha sido enviado exitosamente.</h3>
            <br><br>
            <div class="md:px-10">
                <h3>El equipo de Grupo SGL se pondrá en contacto contigo por medio de correo electrónico.</h3>
                <br>
                <h3 class="bg-[rgb(0,200,255)] text-sm text-white px-3 py-2 rounded-lg">La satisfacción de nuestros clientes es lo más importante.</h3>
            </div>
        </section>
    @endif
@endsection
@push('child-scripts')
<script>
    $('#refund_form_submit_btn').click(function(){
        let fields = [
            {'name':'full_name','validation':['blank']},
            {'name':'cui','validation':['blank']},
            {'name':'company','validation':['blank']},
            {'name':'position','validation':['blank']},
            {'name':'osc_number','validation':['blank']},
            {'name':'service_type','validation':['isSelect']},
            {'name':'consultant_name','validation':['blank']},
            {'name':'invoice','validation':['isFile']},
            {'name':'package_slip','validation':['isFile']},
            {'name':'sgl_invoice','validation':['isFile']},
            {'name':'claim_type','validation':['isSelect']},
            {'name':'secure_payment','validation':['isSelect']},
            {'name':'refund_received','validation':['isSelect']},
            // {'name':'','validation':['blank']},
            {'name':'claim_description','validation':['blank']},
            {'name':'buyer_name','validation':['blank']},
            {'name':'nit','validation':['blank']},
            {'name':'fiscal_address','validation':['blank']},
            {'name':'legal_dpi','validation':['isFile']},
            {'name':'buyer_email','validation':['blank']},
            {'name':'refund_type','validation':['isSelect']},
            {'name':'refund_currency','validation':['isSelect']},
        ]


        let form = '#'+$(this).closest("form").attr('id');
        let validator = Validation(form,fields);

        if(!validator.fail){
            $(form).submit();
        }
    });

    let n=1;
    $('#refund_form_all_include_btn').click(function(){
        n+=1;
        let html =
                '<div class="flex p-1 space-x-1">'+
                    '<input name="purchase_date[]" class="rounded-lg p-2.5" type="date">'+
                    '<select name="payment_type[]" class="w-full rounded-lg p-2.5 text-sm">'+
                        '<option value="0">Seleccione Una Opción</option>'+
                        '<option value="1">tarjeta de credito/debito</option>'+
                        '<option value="2" selected>efectivo</option>'+
                        '<option value="3">transferencia bancaria</option>'+
                        '<option value="4">paypal</option>'+
                        '<option value="5">puntos bancarios</option>'+
                        '<option value="6">tarjetas prepago de regalo</option>'+
                    '</select>'+
                '</div>';
        $('#refund_form_all_include_div').append(html);
    });



    $('#refund_form_terms_chk').change(function(){
        console.log($('#refund_form_all_include_btn').prop('disabled'));
        this.checked ? $('#refund_form_submit_btn').prop('disabled',false):$('#refund_form_submit_btn').prop('disabled',true);
        this.checked ? $('#refund_form_submit_btn').removeClass('opacity-50'):$('#refund_form_submit_btn').addClass('opacity-50');
    });

</script>
@endpush
