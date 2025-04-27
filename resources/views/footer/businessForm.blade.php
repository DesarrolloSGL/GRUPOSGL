

@extends('layouts.app')

@section('content')
    @if(!Session::has('form_success'))
        <section class="m-10 p-5 mx-auto w-11/12 bg-white rounded-xl shadow-lg md:w-6/12">
            <h3 class="text-2xl text-center mt-10 font-bold md:text-4xl">Formulario de Disputas</h3>
            <form id="business_form_form" action="/business-form" method="POST" autocomplete="off" enctype="multipart/form-data" >
                @csrf

                {{-- PERSONAL DATA --}}
                <h3 class="text-xl text-center mt-10 font-bold">Datos Personales</h3>
                <div class="w-full mx-auto py-10 border-b-2 rounded-lg justify-evenly space-x-1 md:flex lg:p-10">
                    <div class="space-y-5">
                        <div>
                            <h3 class="text-sm">*Nombre Completo <br> de solicitante</h3>
                            <input name="full_name" class="w-full rounded-lg" type="text">
                        </div>
                        <div>
                            <h3 class="text-sm">*Número de Identificación <br> CUI(ID)</h3>
                            <input name="cui" class="w-full rounded-lg" type="text">
                        </div>
                    </div>
                    <div class="space-y-5">
                        <div>
                            <h3 class="text-sm">*Empresa que <br> representa:</h3>
                            <input name="company" class="w-full rounded-lg" type="text">
                        </div>
                        <div>
                            <h3 class="text-sm">*Puesto que <br> desempeña:</h3>
                            <input name="position" class="w-full rounded-lg" type="text">
                        </div>
                    </div>
                </div>
                {{-- END PERSONAL DATA --}}

                {{-- COMPANY DATA --}}
                <h3 class="text-xl text-center mt-10 font-bold">Detalles de la empresa</h3>
                <div class="w-full mx-auto py-10 border-b-2 rounded-lg justify-evenly space-x-1 md:flex lg:p-10">
                    <div class="space-y-5">
                        <div>
                            <h3 class="text-sm">*Nombre de representante <br> legal o Propietario:</h3>
                            <input name="legal_company_name" class="w-full rounded-lg" type="text">
                        </div>

                        <div class="">
                            <h3 class="text-sm">*Razón social:</h3>
                            <input name="social_company_name" class="w-full rounded-lg" type="text">
                        </div>
                    </div>
                    <div class="space-y-5">
                        <div class="">
                            <h3 class="text-sm">*Dirección <br> Fiscal:</h3>
                            <input name="legal_company_address" class="w-full rounded-lg" type="text">
                        </div>

                        <div class="">
                            <h3 class="text-sm">*Dirección de oficinas:</h3>
                            <input name="company_address" class="w-full rounded-lg" type="text">
                        </div>
                    </div>
                </div>
                {{-- END COMPANY DATA --}}

                {{-- FILES --}}
                <div class="w-full mx-auto py-10 border-b-2 rounded-lg justify-evenly space-x-1 md:flex lg:p-10">
                    <div class="">
                        <h3 class="text-sm">*Cargue su factura a disputar:</h3>
                        <div class="mx-auto items-center bg-white">
                            <button type="button" class="upload bg-[rgb(0,100,255)] text-white flex
                                rounded-md px-3 py-2 hover:bg-[rgb(0,200,255)] border border-gray-400">
                                Subir Archivo
                                <svg class="w-6 h-6 mx-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="m14.707 4.793-4-4a1 1 0 0 0-1.416 0l-4 4a1 1 0 1 0 1.416 1.414L9 3.914V12.5a1 1 0 0 0 2 0V3.914l2.293 2.293a1 1 0 0 0 1.414-1.414Z"/>
                                    <path d="M18 12h-5v.5a3 3 0 0 1-6 0V12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                                </svg>
                            </button>
                            <input name="invoice_file" type="file" hidden>
                        </div>
                    </div>

                    <div class="">
                        <h3 class="text-sm">*Cargue su cotización:</h3>
                        <div class="mx-auto items-center bg-white">
                            <button type="button" class="upload bg-[rgb(0,100,255)] text-white flex
                                rounded-md px-3 py-2 hover:bg-[rgb(0,200,255)] border border-gray-400">
                                Subir Archivo
                                <svg class="w-6 h-6 mx-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="m14.707 4.793-4-4a1 1 0 0 0-1.416 0l-4 4a1 1 0 1 0 1.416 1.414L9 3.914V12.5a1 1 0 0 0 2 0V3.914l2.293 2.293a1 1 0 0 0 1.414-1.414Z"/>
                                    <path d="M18 12h-5v.5a3 3 0 0 1-6 0V12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                                </svg>
                            </button>
                            <input name="quotation_file" type="file" hidden>
                        </div>
                    </div>
                </div>

                <div class="w-full mx-auto py-10 border-b-2 rounded-lg justify-evenly space-x-1 md:flex lg:p-10">
                    <div class="">
                        <h3 class="text-sm">*Cargue autorización <br> de compra OCAP proporcionada:</h3>
                        <div class="mx-auto items-center bg-white">
                            <button type="button" class="upload bg-[rgb(0,100,255)] text-white flex
                                rounded-md px-3 py-2 hover:bg-[rgb(0,200,255)] border border-gray-400">
                                Subir Archivo
                                <svg class="w-6 h-6 mx-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="m14.707 4.793-4-4a1 1 0 0 0-1.416 0l-4 4a1 1 0 1 0 1.416 1.414L9 3.914V12.5a1 1 0 0 0 2 0V3.914l2.293 2.293a1 1 0 0 0 1.414-1.414Z"/>
                                    <path d="M18 12h-5v.5a3 3 0 0 1-6 0V12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                                </svg>
                            </button>
                            <input name="ocap_file" type="file" hidden>
                        </div>
                    </div>

                    <div class="">
                        <h3 class="text-sm">Archivo <br> adicional:</h3>
                        <div class="mx-auto items-center bg-white">
                            <button type="button" class="upload bg-[rgb(0,100,255)] text-white flex
                                rounded-md px-3 py-2 hover:bg-[rgb(0,200,255)] border border-gray-400">
                                Subir Archivo
                                <svg class="w-6 h-6 mx-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="m14.707 4.793-4-4a1 1 0 0 0-1.416 0l-4 4a1 1 0 1 0 1.416 1.414L9 3.914V12.5a1 1 0 0 0 2 0V3.914l2.293 2.293a1 1 0 0 0 1.414-1.414Z"/>
                                    <path d="M18 12h-5v.5a3 3 0 0 1-6 0V12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                                </svg>
                            </button>
                            <input name="aditional_file" type="file" hidden>
                        </div>
                    </div>
                </div>
                {{-- END FILES --}}

                {{-- EXTRA DATA --}}
                <h3 class="text-xl text-center mt-5 font-bold"></h3>
                <div class="w-full mx-auto py-10 border-b-2 rounded-lg justify-evenly space-x-1 md:flex lg:p-10">
                    <div class="space-y-5">
                        <div>
                            <h3 class="text-sm">*Indique el nombre de su ejecutivo a cargo:</h3>
                            <input name="adviser_name" class="w-full rounded-lg" type="text">
                        </div>
                        <div>
                            <h3 class="text-sm">*Indique fecha de aprobación:</h3>
                            <input name="request_date" class="w-full rounded-lg" type="date">
                        </div>
                    </div>
                </div>
                {{-- END EXTRA DATA --}}


                {{-- DESCRIPTION --}}
                <div class="w-full mx-auto px-5 py-10 border-b-2 rounded-lg flex justify-evenly text-sm">
                    <div class="">
                        <h3 class="text-sm">Haga un breve relato de lo sucedido.</h3>
                        <textarea class="w-full" name="description" cols="100"
                            rows="5" maxlength="2500">
                        </textarea>
                    </div>
                </div>
                {{-- END DESCRIPTION --}}

                {{-- EMAIL --}}
                <div class="w-full mx-auto py-10 border-b-2 rounded-lg space-x-1 md:flex lg:p-10">
                    <div class="space-y-5">
                        <div>
                            <h3 class="text-sm">*Email</h3>
                            <input name="client_email" class="w-full rounded-lg" type="text">
                        </div>
                    </div>
                </div>
                {{-- END EMAIL --}}

                <x-honeypot />
                {{-- BUTTON --}}
                <div class="py-10 ml-auto w-fit">
                    <input id="business_form_terms_chk" type="checkbox">
                    <a class="underline text-xs md:text-sm" href="/business-politics" target="_blank">Políticas de negocios</a>
                    <br>
                    <button id="business_form_submit_btn" type="button" disabled class="bg-[rgb(0,100,255)]/100 opacity-50 text-white ml-auto block px-3 py-2 rounded-xl text-lg">Enviar</button>
                    <h3 class="text-xs text-red-500 p-1"></h3>
                </div>
                {{-- END BUTTON --}}

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
    $('#business_form_submit_btn').click(function(){

        let fields = [
            {'name':'full_name','validation':['blank']},
            {'name':'cui','validation':['blank']},
            {'name':'company','validation':['blank']},
            {'name':'position','validation':['blank']},
            {'name':'legal_company_name','validation':['blank']},
            {'name':'social_company_name','validation':['blank']},
            {'name':'legal_company_address','validation':['blank']},
            {'name':'company_address','validation':['blank']},
            {'name':'invoice_file','validation':['isFile']},
            {'name':'quotation_file','validation':['isFile']},
            {'name':'ocap_file','validation':['isFile']},
            {'name':'adviser_name','validation':['blank']},
            {'name':'request_date','validation':['date']},
            {'name':'client_email','validation':['blank']},
        ]


        let form = '#'+$(this).closest("form").attr('id');
        let validator = Validation(form,fields);

        $('#business_form_submit_btn').next().html('');
        if(!validator.fail){
            $(form).submit();
        }else{
            $('#business_form_submit_btn').next().html('Revisa los campos en rojo y'+'<br>'+' que los archivos hayan sido cargados');
        }
    });


    $('#business_form_terms_chk').change(function(){
        this.checked ? $('#business_form_submit_btn').prop('disabled',false):$('#business_form_submit_btn').prop('disabled',true);
        this.checked ? $('#business_form_submit_btn').removeClass('opacity-50'):$('#business_form_submit_btn').addClass('opacity-50');
    });

</script>
@endpush
