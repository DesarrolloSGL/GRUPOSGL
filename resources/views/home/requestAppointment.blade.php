@extends('layouts.app')


@section('content')
    <section class="w-fit mx-auto px-2 min-h-screen">
        <h3 class="font-bold text-xl text-center my-5">Agendar Mi Cita</h3>
        <form id="home_request_new_appointment_form" class="" action="/request-new-appointment" method="POST" autocomplete="off">
            @csrf
            <div class="text-sm w-full">
                <h3>Nombre Completo</h3>
                <input type="text" name="name" class="w-full border-gray-200" placeholder="">
            </div>
            <div class="text-sm w-full">
                <h3>Email</h3>
                <input type="text" name="email" class="w-full border-gray-200" placeholder="">
            </div>
            <div class="text-sm w-full">
                <h3>Telefono</h3>
                <input type="text" name="phone" class="w-full border-gray-200" placeholder="">
            </div>
            <div class="text-sm w-full">
                <h3>DPI/CUI</h3>
                <input type="text" name="cui" class="w-full border-gray-200" placeholder="">
            </div>
            <select id="home_new_appointment_department_select" name="department" class="px-1 my-5 border-gray-200 h-10 max-w-full">
                <option value="0">Selecciona El Departamento</option>
                <option value="Contabilidad">Contabilidad</option>
                <option value="Operaciones">Operaciones</option>
                <option value="Comercial">Comercial</option>
                <option value="Administrativo">Administrativo</option>
                <option value="Marketing">Marketing</option>
                <option value="Legal">Legal</option>
                <option value="IT">IT</option>
            </select>

            <select id="home_new_appointment_topic_select" name="topic" class="px-1 border-gray-200 h-10 max-w-full">
                <option value="0">Selecciona El Asunto</option>
            </select>

            <div id="home_new_appointment_BL_input_div" class="my-5 hidden">
                <h3>Ingrese su numero de BL/No.Expediente</h3>
                <input type="text" name="BL" class="w-full border-gray-200" placeholder="">
                <h3 class="text-xs">Si no conoce su número de BL llame al +502 2379-0640 y solicite el mismo.</h3>
            </div>

            <div id="home_new_appointment_topic_textarea_div" class="hidden">
                <h3>Explique su visita.</h3>
                <input type="text" class="rounded-lg w-full p-1 border-gray-200" name="explanation"  maxlength="100" placeholder=""/>
            </div>

            <br>
            <br>
            <h3 class="font-bold">La reunión tiene un duración de 30 Minutos.</h3>
            <h3>Si desea mas tiempo explique su motivo.</h3>
            <textarea class="rounded-lg w-full h-36 p-1 border-gray-200" name="more_time" maxlength="500"></textarea>
            <x-honeypot />

            <button id="home_request_new_appointment_btn" type="button" class="block my-5 ml-auto px-3 py-2 bg-blue-700 text-white">Agendar</button>
        </form>

        <div id="home_request_new_appointment_response" class="text-blue-800 flex h-full text-center rounded-lg border p-5 mx-auto w-fit" style="display:none">
            <div class="my-auto">
                <svg class="w-10 h-10 text-blue-800 mx-auto shadox-xl" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M2 5.6V18c0 1.1.9 2 2 2h16a2 2 0 0 0 2-2V5.6l-.9.7-7.9 6a2 2 0 0 1-2.4 0l-8-6-.8-.7Z"/>
                    <path d="M20.7 4.1A2 2 0 0 0 20 4H4a2 2 0 0 0-.6.1l.7.6 7.9 6 7.9-6 .8-.6Z"/>
                </svg>

                <h3 class="text-xl"> Solicitud Recibida</h3>
                <svg class="w-10 h-10 text-green-500 mx-auto my-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <h3 class="text-sm">Recibiras Un Correo De Nuestros Asesores Con Tu Cita</h3>
            </div>
        </div>
    </section>
@endsection

@push('child-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
@endpush