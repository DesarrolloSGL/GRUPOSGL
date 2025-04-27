@extends('layouts.app')


@section('content')
    <section class="bg-global-100 w-full py-10 sm:px-2 h-full min-h-screen">
        <section id="register_new_event_template_1" class="bg-white mx-auto py-5 px-10 min-h-screen text-black w-fit max-w-2xl rounded-lg">
            <h3 class="font-bold text-xl text-left my-5">Formulario de Inscripción
                Desayuno Conferencia: Crisis en la cadena de suministros, descubre como los servicios LCL pueden salvar tu negocio
            </h3>

            <img src="{{asset('images/home/evento.png')}}"
            class="max-h-[500px] max-w-full md:object-cover">

            <h3 class="text-left text-sm my-5">
                Apreciamos su interés en nuestro evento. Por favor, complete la siguiente información para registrarse:
            </h3>
            <form id="register_new_event_form" class="my-10 space-y-5" action="/register-new-event" method="POST" autocomplete="off">
                @csrf
                <h3 class="font-bold">Datos de Contacto</h3>
                <input type="text" name="event_number" value="{{$event_number}}" class="hidden pointer-events-none">
                <div class="text-xs w-full">
                    <h3>Nombre(s)</h3>
                    <input type="text" name="name" class="key-only-alpha w-full border-gray-300 h-10 rounded-lg" onchange="onChangeInputRevalidate()">
                </div>
                <div class="text-xs w-full">
                    <h3>Apellido(s)</h3>
                    <input type="text" name="lastname" class="key-only-alpha w-full border-gray-300 h-10 rounded-lg" onchange="onChangeInputRevalidate()">
                </div>
                </div>
                <div class="text-xs w-full">
                    <h3>DPI</h3>
                    <input type="text" name="dpi" class="key-only-number w-full border-gray-300 h-10 rounded-lg" onchange="onChangeInputRevalidate()">
                </div>
                <div class="text-xs w-full">
                    <h3>Empresa o Negocio</h3>
                    <input type="text" name="business" class="key-only-alpha w-full border-gray-300 h-10 rounded-lg" onchange="onChangeInputRevalidate()">
                </div>
                <div class="text-xs w-full">
                    <h3>Cargo o Puesto</h3>
                    <input type="text" name="job" class="key-only-alpha w-full border-gray-300 h-10 rounded-lg" onchange="onChangeInputRevalidate()">
                </div>
                <div class="text-xs w-full">
                    <h3>Telefono</h3>
                    <input type="text" name="phone" class="key-only-number w-full border-gray-300 h-10 rounded-lg" onchange="onChangeInputRevalidate()">
                </div>
                <div class="text-xs w-full">
                    <h3>Email</h3>
                    <input type="text" name="email" class="w-full border-gray-300 h-10 rounded-lg" onchange="onChangeInputRevalidate()">
                </div>

                <h3 class="font-bold">Información general</h3>
                <div class="text-sm w-full">
                    <h3>
                        ¿Cuál es el giro de su negocio?
                        (Ejemplo: textil, alimentos, tecnología, otros. Por favor, especifique.)
                    </h3>
                    <input type="text" name="question_1" class="w-full border-gray-300 h-10 rounded-lg" onchange="onChangeInputRevalidate()">
                </div>
                <div class="text-sm w-full">
                    <h3>
                        ¿En qué zona se encuentra ubicada su operación principal?
                        (Ejemplo: Zona 1 de Guatemala, Escuintla, Quetzaltenango, otros.)
                    </h3>
                    <input type="text" name="question_2" class="w-full border-gray-300 h-10 rounded-lg" onchange="onChangeInputRevalidate()">
                </div>
                <div class="text-sm w-full">
                    <h3>
                        ¿Ha realizado importaciones o exportaciones anteriormente?
                    </h3>
                    <select name="question_3" class="px-1 my-5 border-gray-300 h-10 max-w-full rounded-lg" onchange="onChangeInputRevalidate()">
                        <option value="0">Selecciona una opción</option>
                        <option value="1">Sí, Importación</option>
                        <option value="2">Sí, Exportación</option>
                        <option value="3">Ambas</option>
                        <option value="4">No</option>
                    </select>
                </div>
                <div class="text-sm w-full">
                    <h3>
                        ¿Qué servicios de logística le interesan explorar más? (Seleccione todas las que correspondan)
                    </h3>
                    <select id="register_new_event_question_4" name="question_4" class="px-1 my-5 border-gray-200 h-10 max-w-full rounded-lg" onchange="onChangeInputRevalidate()">
                        <option value="0">Selecciona una opción</option>
                        <option value="1">Consolidado Maritimo (LCL)</option>
                        <option value="2">Contenedor Completo (FCL)</option>
                        <option value="3">Courier</option>
                        <option value="4">Transporte terrestre</option>
                        <option value="5">Otro (especifique)</option>
                    </select>
                    <div id="register_new_event_question_4_extra" class="text-xs w-full hidden">
                        <input type="text" name="question_4_extra" class="w-full border-gray-300 h-10 rounded-lg" onchange="onChangeInputRevalidate()">
                    </div>
                </div>
                <div class="text-xs w-full">
                    <h3 class="font-bold text-sm">
                        Consentimiento
                    </h3>
                    <div class="flex items-center space-x-2">
                        <input name="authorization" type="checkbox" onchange="onChangeInputRevalidate()">
                        <h3>
                            Autorizo a Grupo SGL International a contactarme con información relevante sobre sus servicios y eventos.
                        </h3>
                    </div>
                </div>
                <x-honeypot />
            </form>

            <section>
                @php
                    session_start();
                    $_SESSION['Evento_15_Ene_'.$event_number] = true;
                    $_SESSION['total'] = 450;
                @endphp
                <form id="register_new_event_payment_form" action="/payment/payment_confirmation.php" method="post" >
                    <input type="hidden" name="access_key" value="ad4c7bd7c796318ca0dc9b8ae9257fa8">
                    <input type="hidden" name="profile_id" value="A75FC721-F40E-4113-BB77-9259531E5324">
                    <input type="hidden" name="transaction_uuid" value="<?php echo uniqid() ?>">
                    <input type="hidden" name="signed_field_names" value="access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency,currency_symbol">
                    <input type="hidden" name="unsigned_field_names" value="card_name,card_last_name,card_number,card_expiry_date,card_cvn">
                    <input type="hidden" name="signed_date_time" value="<?php echo gmdate("Y-m-d\TH:i:s\Z"); ?>">
                    <input type="hidden" name="locale" value="en">
                    <fieldset hidden>
                        <legend>Payment Details</legend>
                        <div id="paymentDetailsSection" class="section">
                            <span>transaction_type:</span><input type="text" name="transaction_type" size="25" value="sale"><br/>
                            <span>reference_number:</span><input type="text" name="reference_number" size="25" value="Evento_15_Ene_{{$event_number}}"><br/>
                            <span>amount:</span><input type="text" name="amount" size="25" value="450"><br/>
                            <span>currency:</span><input type="text" name="currency" size="25" value="GTQ"><br/>
                            <span>currency:</span><input type="text" name="currency_symbol" size="25" value="Q"><br/>
                            <input name="card_name" type="text" placeholder="Name"  value="" autocomplete="off" >
                            <input name="card_last_name" type="text" placeholder="Last Name"  value="" autocomplete="off" >
                            <input id="card_number" type="text" name="card_number"  placeholder="Card Number" value=""  autocomplete="off" maxlength="19" >
                            <input id="card_expiration" type="text" name="card_expiry_date"  value="" placeholder="MM/YY"  autocomplete="off" maxlength="5" >
                            <input id="card_csv" type="password" name="card_cvn"  placeholder="CSV"  value="" autocomplete="off" maxlength="4" >
                        </div>
                    </fieldset>
                    <h3 class="text-right font-bold text-lg">Q450.00</h3>
                    <button id="register_new_event_btn" type="button" class="w-full flex items-center px-3 py-2 rounded-lg transition-all delay-75  bg-global-700 text-global-100 hover:bg-global-500 hover:border-global-500">
                        <div class="w-fit mx-auto flex items-center">
                            <svg class="w-5 h-5 mx-1 text-red-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12 14a3 3 0 0 1 3-3h4a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-4a3 3 0 0 1-3-3Zm3-1a1 1 0 1 0 0 2h4v-2h-4Z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M12.293 3.293a1 1 0 0 1 1.414 0L16.414 6h-2.828l-1.293-1.293a1 1 0 0 1 0-1.414ZM12.414 6 9.707 3.293a1 1 0 0 0-1.414 0L5.586 6h6.828ZM4.586 7l-.056.055A2 2 0 0 0 3 9v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2h-4a5 5 0 0 1 0-10h4a2 2 0 0 0-1.53-1.945L17.414 7H4.586Z" clip-rule="evenodd"/>
                            </svg>
                            Completar Registro y Pago
                        </div>
                    </button>
                </form>
            </section>
        </section>

    </section>
@endsection

@push('child-scripts')
    <script>
        $('#register_new_event_question_4').on('change', function() {
            if(this.value == 5)
            {
                $('#register_new_event_question_4_extra').show();
            }else
            {
                $('#register_new_event_question_4_extra').hide();
            }
        });

        $('#register_new_event_btn').click(function(){
            let fields = [
                {'name':'name','validation':['blank']},
                {'name':'lastname','validation':['blank']},
                {'name':'dpi','validation':['blank','number:13-13']},
                {'name':'business','validation':['blank']},
                {'name':'job','validation':['blank']},
                {'name':'phone','validation':['blank','number:8-10']},
                {'name':'email','validation':['blank']},
                {'name':'question_1','validation':['blank']},
                {'name':'question_2','validation':['blank']},
                {'name':'question_3','validation':['isSelect']},
                {'name':'question_4','validation':['isSelect']},
                {'name':'question_4_extra','validation':['']},
            ]
            let form = '#register_new_event_form';

            // Conditional Validations
            $('#register_new_event_question_4').val() == 5 ? fields[11].validation = ['blank']:fields[11].validation = [''];

            let validator = Validation(form,fields,'');

            if(!validator.fail){
                LoadingAnimation(this,'loading');
                // $('#register_new_event_form').submit();
                $('#register_new_event_form').ajaxSubmit({
                    success: function(res, status, xhr, form) {
                        $('#register_new_event_payment_form').submit();
                    }
                });
            }
        });

        function onChangeInputRevalidate()
        {
            let fields = [
                {'name':'name','validation':['blank']},
                {'name':'lastname','validation':['blank']},
                {'name':'dpi','validation':['blank','number:2']},
                {'name':'business','validation':['blank']},
                {'name':'job','validation':['blank']},
                {'name':'phone','validation':['blank']},
                {'name':'email','validation':['blank']},
                {'name':'question_1','validation':['blank']},
                {'name':'question_2','validation':['blank']},
                {'name':'question_3','validation':['isSelect']},
                {'name':'question_4','validation':['isSelect']},
                {'name':'question_4_extra','validation':['blank']},
            ]
            let form = '#register_new_event_form';
            // let validator = Validation(form,fields,'');
        }

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
@endpush