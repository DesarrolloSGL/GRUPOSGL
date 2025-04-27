<section>
    {{-- <div id="home_request_new_appointment_div" class="mt-5 mb-10 p-5 w-fit mx-auto items-center lg:space-x-4 lg:flex">
        <img class="rounded-lg ml-auto" src="{{asset('images/home/horizontal-calendar.jpg')}}" >
        <div class="w-fit mx-auto my-1">
            <div class="hidden w-full mb-0.5 bg-sky-500 rounded-t-lg lg:p-10 xl:p-12 lg:block"></div>
            <div data-modal-target="AppointmentModal" data-modal-toggle="AppointmentModal" class="bg-sky-500  transition-all delay-100 rounded-lg cursor-pointer p-1 text-white text-center hover:bg-sky-400 lg:rounded-none">
                <svg class="mx-auto w-8 h-8 text-red-50 md:w-12 md:h-12 lg:w-20 lg:h-20" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M5 5c.6 0 1-.4 1-1a1 1 0 1 1 2 0c0 .6.4 1 1 1h1c.6 0 1-.4 1-1a1 1 0 1 1 2 0c0 .6.4 1 1 1h1c.6 0 1-.4 1-1a1 1 0 1 1 2 0c0 .6.4 1 1 1a2 2 0 0 1 2 2v1c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1V7c0-1.1.9-2 2-2ZM3 19v-7c0-.6.4-1 1-1h16c.6 0 1 .4 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm6-6c0-.6-.4-1-1-1a1 1 0 1 0 0 2c.6 0 1-.4 1-1Zm2 0a1 1 0 1 1 2 0c0 .6-.4 1-1 1a1 1 0 0 1-1-1Zm6 0c0-.6-.4-1-1-1a1 1 0 1 0 0 2c.6 0 1-.4 1-1ZM7 17a1 1 0 1 1 2 0c0 .6-.4 1-1 1a1 1 0 0 1-1-1Zm6 0c0-.6-.4-1-1-1a1 1 0 1 0 0 2c.6 0 1-.4 1-1Zm2 0a1 1 0 1 1 2 0c0 .6-.4 1-1 1a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                </svg>
                <span class="text-xs">Agendar Mi Cita</span>
            </div>
            <div class="hidden w-full mt-0.5 bg-sky-500 rounded-b-lg lg:p-10 xl:p-12 lg:block"></div>
        </div>
    </div> --}}

    <div id="AppointmentModal" tabindex="-1" aria-hidden="true" class="fixed hidden top-0 left-0 right-0 z-50 w-full px-4 py-2 overflow-x-hidden md:inset-0 h-[calc(100%-1rem)] backdrop-blur-sm">
        <div class="relative w-full max-w-xl mx-auto mt-[1%]">
            <!-- Modal content -->
            <div class="relative bg-white border-2 border-blue-500 rounded-lg h-[85vh] overflow-y-auto">
                <!-- Modal header -->
                <div class="flex items-start justify-between px-4 py-2 rounded-t">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 ">
                            Agendar Mi Cita
                        </h3>
                    </div>
                    <button type="button" class="text-black bg-blue-200 hover:bg-blue-400 hover:text-gray-900 rounded-lg text-sm w-10 h-10 ml-auto inline-flex justify-center items-center " data-modal-hide="AppointmentModal">
                        <svg class="w-3 h-3 text-blue-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                @guest
                    <div class="w-fit mx-auto text-left font-bold">
                        <h3 class="text-sm">Para Agendar tu Cita:</h3>
                        <div class="flex space-x-1">
                            <a href="/login">
                                <button type="button" class="block my-5  px-3 py-2 underline bg-blue-100 text-blue-800 rounded-lg whitespace-nowrap">Iniciar Sesión</button>
                            </a>
                            <a href="/register">
                                <button type="button" class="block my-5 px-3 py-2 underline bg-blue-100 text-blue-800 rounded-lg whitespace-nowrap">Registrarme</button>
                            </a>
                        </div>
                    </div>
                @endguest
                <hr class="border-gray-300 w-11/12 mx-auto">
                <!-- Modal body -->
                @auth
                    <div class="p-6 text-sm">
                @else
                    <div class="p-6 text-sm blur-sm">
                @endauth
                    <form id="home_request_new_appointment_form" class="" action="/request-new-appointment" method="POST" autocomplete="off" class="disabled:">
                        @csrf
                        <div class="text-sm w-full">
                            <h3>Nombre Completo</h3>
                            <input type="text" name="name" class="w-full rounded-lg border-gray-200" placeholder="">
                        </div>
                        <div class="text-sm w-full">
                            <h3>Email</h3>
                            <input type="text" name="email" class="w-full rounded-lg border-gray-200" placeholder="">
                        </div>
                        <div class="text-sm w-full">
                            <h3>Telefono</h3>
                            <input type="text" name="phone" class="w-full rounded-lg border-gray-200" placeholder="">
                        </div>
                        <div class="text-sm w-full">
                            <h3>DPI/CUI</h3>
                            <input type="text" name="cui" class="w-full rounded-lg border-gray-200" placeholder="">
                        </div>
                        <select id="home_new_appointment_department_select" name="department" class="px-1 rounded-lg my-5 border-gray-200 h-10 max-w-full">
                            <option value="0">Selecciona El Departamento</option>
                            <option value="Contabilidad">Contabilidad</option>
                            <option value="Operaciones">Operaciones</option>
                            <option value="Comercial">Comercial</option>
                            <option value="Administrativo">Administrativo</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Legal">Legal</option>
                            <option value="IT">IT</option>
                        </select>

                        <select id="home_new_appointment_topic_select" name="topic" class="px-1 rounded-lg border-gray-200 h-10 max-w-full">
                            <option value="0">Selecciona El Asunto</option>
                        </select>

                        <div id="home_new_appointment_BL_input_div" class="my-5 hidden">
                            <h3>Ingrese su numero de BL/No.Expediente</h3>
                            <input type="text" name="BL" class="w-full rounded-lg border-gray-200" placeholder="">
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
                        @auth
                            <button id="home_request_new_appointment_btn" type="button" class="block my-5 ml-auto px-3 py-2 bg-blue-700 text-white rounded-lg">Agendar</button>
                        @else
                            <button type="button" class="block my-5 ml-auto px-3 py-2 bg-blue-700 text-white rounded-lg">Agendar</button>
                        @endauth

                    </form>
                    <div id="home_request_new_appointment_response" class="text-blue-800 flex h-full text-center rounded-lg p-1 mx-auto w-11/12 sm:p-5 sm:10/12 md:p-10 lg:w-1/2 " style="display: none">
                        <div class="my-auto">
                            <svg class="w-10 h-10 text-blue-800 mx-auto shadox-xl" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M2 5.6V18c0 1.1.9 2 2 2h16a2 2 0 0 0 2-2V5.6l-.9.7-7.9 6a2 2 0 0 1-2.4 0l-8-6-.8-.7Z"/>
                                <path d="M20.7 4.1A2 2 0 0 0 20 4H4a2 2 0 0 0-.6.1l.7.6 7.9 6 7.9-6 .8-.6Z"/>
                            </svg>

                            <h3 class="text-xl"> Solicitud Recibida</h3>
                            <svg class="w-6 h-6 text-green-500 mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                            <h3 class="text-sm">Recibiras Un Correo De Nuestros Asesores Con Tu Cita</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>