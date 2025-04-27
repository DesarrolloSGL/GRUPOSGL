

@extends('layouts.app')

@section('content')
    @if(!Session::has('form_success'))
        <section class="m-10 p-5 mx-auto w-11/12 bg-white rounded-xl shadow-lg md:w-6/12">
            <h3 class="text-2xl text-center mt-10 font-bold md:text-4xl">Formulario solicitud de depósitos en garantía</h3>
            <form id="deposit_form_form" action="/deposit-form" method="POST" autocomplete="off" enctype="multipart/form-data" >
                @csrf

                <h3 class="text-xl text-center mt-10 font-bold">Datos Personales</h3>
                <div class="w-full mx-auto py-10 border-b-2 rounded-lg justify-evenly space-x-1 md:flex lg:p-10">
                    <div class="space-y-5">
                        <div>
                            <h3 class="text-sm">*Nombre Completo de solicitante</h3>
                            <input name="full_name" class="w-full rounded-lg" type="text">
                        </div>
                        <div>
                            <h3 class="text-sm">*Número de Identificación CUI(ID)</h3>
                            <input name="cui" class="w-full rounded-lg" type="text">
                        </div>
                    </div>
                    <div class="space-y-5">
                        <div>
                            <h3 class="text-sm">*Empresa::</h3>
                            <input name="company" class="w-full rounded-lg" type="text">
                        </div>
                        <div>
                            <h3 class="text-sm">*Puesto que desempeña</h3>
                            <input name="position" class="w-full rounded-lg" type="text">
                        </div>
                    </div>
                </div>

                <h3 class="text-xl text-center mt-10 font-bold">Detalles del Deposito</h3>
                <div class="w-full mx-auto py-10 border-b-2 rounded-lg justify-evenly space-x-1 md:flex lg:p-10">
                    <div class="space-y-5">
                        <div class="">
                            <h3 class="text-sm">*Indique el numero de recibo de caja <br> extendido por SGL:</h3>
                            <input name="receipt_number" class="w-full rounded-lg" type="text">
                        </div>

                        <div class="">
                            <h3 class="text-sm">*Fecha ingreso de solicitud::</h3>
                            <input name="request_date" class="w-full rounded-lg" type="date">
                        </div>
                    </div>
                    <div class="space-y-5">
                        <div class="">
                            <h3 class="text-sm">*Monto depositado <br> en garantía:</h3>
                            <input name="deposit_ammount" class="w-full rounded-lg" type="text">
                        </div>

                        <div class="">
                            <h3 class="text-sm">*Moneda:</h3>
                            <select name="currency" class="w-full rounded-lg p-2.5 text-sm">
                                <option value="0">Seleccione Una Opción</option>
                                <option value="1">Q</option>
                                <option value="2">$</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Contenedores --}}
                <h3 class="text-xl text-center mt-10 font-bold"></h3>
                <div class="w-full mx-auto py-10 border-b-2 rounded-lg justify-evenly space-x-1 md:flex lg:p-10">
                    <div class="space-y-5">
                        <div>
                            <h3 class="text-sm">MBL al que aplico esta garantía:</h3>
                            <input name="mbl" class="w-full rounded-lg" type="text">
                        </div>
                        <div>
                            <h3 class="text-sm">*HBL extendido <br> por SGL:</h3>
                            <input name="hbl" class="w-full rounded-lg" type="text">
                        </div>
                    </div>
                    <div class="space-y-5">
                        <div class="">
                            <h3 class="text-sm">*Total de contenedores/Palettes:</h3>
                            <select name="containers" class="w-full rounded-lg p-2.5 text-sm">
                                <option value="0">Seleccione Una Opción</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                                <option value="32">32</option>
                                <option value="33">33</option>
                                <option value="34">34</option>
                                <option value="35">35</option>
                                <option value="36">36</option>
                                <option value="37">37</option>
                                <option value="38">38</option>
                                <option value="39">39</option>
                                <option value="40">40</option>
                                <option value="41">41</option>
                                <option value="42">42</option>
                                <option value="43">43</option>
                                <option value="44">44</option>
                                <option value="45">45</option>
                                <option value="46">46</option>
                                <option value="47">47</option>
                                <option value="48">48</option>
                                <option value="49">49</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                        <div>
                            <h3 class="text-sm">*Indique el balance <br>a solicitar en moneda depositada:</h3>
                            <input name="request_balance" class="w-full rounded-lg" type="text">
                        </div>
                    </div>
                </div>

                {{-- Descripcion --}}
                <div class="w-full mx-auto px-5 py-10 border-b-2 rounded-lg flex justify-evenly text-sm">
                    <div class="">
                        <h3>Descripción:</h3>
                        <textarea class="w-full" name="deposit_description"
                            cols="100" rows="5" maxlength="2500">
                        </textarea>
                    </div>
                </div>

                {{-- Carga Archivos --}}
                <div class="w-full mx-auto py-10 border-b-2 rounded-lg justify-evenly space-x-1 md:flex lg:p-10">
                    <div class="">
                        <h3 class="text-sm">*Cargue soporte de deposito bancario:</h3>
                        <div class="mx-auto items-center bg-white">
                            <button type="button" class="upload bg-[rgb(0,100,255)] text-white flex
                                rounded-md px-3 py-2 hover:bg-[rgb(0,200,255)] border border-gray-400">
                                Subir Archivo
                                <svg class="w-6 h-6 mx-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="m14.707 4.793-4-4a1 1 0 0 0-1.416 0l-4 4a1 1 0 1 0 1.416 1.414L9 3.914V12.5a1 1 0 0 0 2 0V3.914l2.293 2.293a1 1 0 0 0 1.414-1.414Z"/>
                                    <path d="M18 12h-5v.5a3 3 0 0 1-6 0V12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                                </svg>
                            </button>
                            <input name="bank_deposit" type="file" hidden>
                        </div>
                    </div>

                    <div class="">
                        <h3 class="text-sm">*Cargue carta de solicitud de reintegro:</h3>
                        <div class="mx-auto items-center bg-white">
                            <button type="button" class="upload bg-[rgb(0,100,255)] text-white flex
                                rounded-md px-3 py-2 hover:bg-[rgb(0,200,255)] border border-gray-400">
                                Subir Archivo
                                <svg class="w-6 h-6 mx-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="m14.707 4.793-4-4a1 1 0 0 0-1.416 0l-4 4a1 1 0 1 0 1.416 1.414L9 3.914V12.5a1 1 0 0 0 2 0V3.914l2.293 2.293a1 1 0 0 0 1.414-1.414Z"/>
                                    <path d="M18 12h-5v.5a3 3 0 0 1-6 0V12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                                </svg>
                            </button>
                            <input name="request_letter" type="file" hidden>
                        </div>
                    </div>
                </div>

                {{-- Email --}}
                <div class="w-full mx-auto py-10 border-b-2 rounded-lg space-x-1 md:flex lg:p-10">
                    <div class="space-y-5">
                        <div>
                            <h3 class="text-sm">*Email</h3>
                            <input name="client_email" class="w-full rounded-lg" type="text">
                        </div>
                    </div>
                </div>
                <x-honeypot />
                <div class="py-10 ml-auto w-fit">
                    <input id="deposit_form_terms_chk" type="checkbox">
                    <a class="underline text-xs md:text-sm" href="/deposit-politics" target="_blank">Políticas de Reintegro</a>
                    <br>
                    <button id="deposit_form_submit_btn" type="button" disabled class="bg-[rgb(0,100,255)]/100 opacity-50 text-white ml-auto block px-3 py-2 rounded-xl text-lg">Enviar</button>
                    <h3 class="text-xs text-red-500 p-1"></h3>
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
    $('#deposit_form_submit_btn').click(function(){
        let fields = [
            {'name':'full_name','validation':['blank']},
            {'name':'cui','validation':['blank']},
            {'name':'company','validation':['blank']},
            {'name':'position','validation':['blank']},
            {'name':'receipt_number','validation':['blank']},
            {'name':'request_date','validation':['blank']},
            {'name':'currency','validation':['isSelect']},
            {'name':'deposit_ammount','validation':['blank']},
            // {'name':'mbl','validation':['blank']},
            {'name':'hbl','validation':['blank']},
            {'name':'containers','validation':['isSelect']},
            {'name':'request_balance','validation':['blank']},
            {'name':'refund_received','validation':['isSelect']},
            {'name':'bank_deposit','validation':['isFile']},
            {'name':'request_letter','validation':['isFile']},
            {'name':'client_email','validation':['blank']},
        ]


        let form = '#'+$(this).closest("form").attr('id');
        let validator = Validation(form,fields);

        $('#deposit_form_submit_btn').next().html('');
        if(!validator.fail){
            $(form).submit();
        }else{
            $('#deposit_form_submit_btn').next().html('Revisa los campos en rojo');
        }
    });


    $('#deposit_form_terms_chk').change(function(){
        this.checked ? $('#deposit_form_submit_btn').prop('disabled',false):$('#deposit_form_submit_btn').prop('disabled',true);
        this.checked ? $('#deposit_form_submit_btn').removeClass('opacity-50'):$('#deposit_form_submit_btn').addClass('opacity-50');
    });

</script>
@endpush
