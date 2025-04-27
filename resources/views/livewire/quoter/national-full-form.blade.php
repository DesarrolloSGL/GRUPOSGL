<div id="home_cn_base_div" class="home_quoters_base mb-10">

    {{-- Location  Packages -> Quotation --}}
    <div id="home_cn_location_package_div" class="home_quoters_base h-auto">
        <form id="home_cn_packages_form" action="/national-quoter-quotation" method="POST" autocomplete="off">
            @csrf
            {{-- Location --}}
            <div class="bg-white w-11/12 mx-auto
                rounded-t-lg items-center  sm:flex">
                {{-- Route Select --}}
                <div id="home_select_route_btn" data-modal-target="defaultModalMap"  data-modal-toggle="defaultModalMap" class="border-2 bg-global-500 flex items-center text-sky-100 space-x-1 w-full
                    whitespace-nowrap cursor-pointer rounded-t-lg text-xs sm:text-xs md:w-fit md:rounded-t-none
                    md:rounded-tl-lg md:text-base hover:bg-global-600">
                    <svg class="w-8 h-8   text-red-700 rounded-md p-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                        <path d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
                    </svg>
                    <span class="px-2 py-3">
                        Haz Click Aquí Y Selecciona Nueva Ruta
                    </span>
                </div>

                <div class="flex w-full bg-green-200">
                    <input id="home_cn_sender_city_select" name="sender_city" type="text" hidden>
                    <input id="home_cn_sender_zone_select" name="sender_zone" type="text" hidden>

                    <div class="w-full mx-auto">
                        <input id="home_cn_origin_select" name="sender_location" type="text" hidden>
                        <input id="home_cn_origin_text" name="sender_text" readonly class="validation-error  text-global-800 border-none outline-none focus:ring-0  text-center
                            h-full text-xs w-full sm:text-xs md:text-sm lg:text-base"
                            type="text">
                    </div>
                </div>

                <div class="bg-green-200 flex w-full">
                    <input id="home_cn_destination_city_select" name="destination_city" type="text" hidden>
                    <input id="home_cn_destination_zone_select" name="destination_zone" type="text" hidden>

                    <div class="w-full mx-auto">
                        <input id="home_cn_destination_select" name="destination_location" type="text" hidden>
                        <input id="home_cn_destination_text" readonly name="destination_text" class="validation-error text-global-800 border-none outline-none focus:ring-0  text-center
                            h-full text-xs w-full sm:text-xs md:text-sm lg:text-base"
                            type="text">
                    </div>
                </div>
            </div>

            <div id="home_cn_package_div" class="home_quoters_bas">
                {{-- Packages Cotizador Nacional--}}
                <div id="home_cn_package_add" class="max-h-56 w-11/12 mx-auto overflow-y-auto">
                    <div class="bg-white border-t h-fit p-5">
                        <h3 class="text-global-600 font-bold">Paquete # 1</h3>
                        <div class="lg:flex">
                            <div class="mx-auto grid gap-4 grid-cols-2 sm:gap-x-10 md:grid-cols-5">
                                <div class="text-center">
                                    <img class="w-14 h-8 mx-auto mt-2.5" src="{{ asset('images/quoter/envelope.jpg')}}" alt="">
                                    <div class="items-center">
                                        <h3 class="text-global-900 text-sm font-bold lg:text-md whitespace-nowrap">Documentos</h3>
                                    </div>
                                    <input name="pk_1_4" class="rounded-sm" type="checkbox">
                                </div>

                                <div class="text-center">
                                    <img class="w-14 h-10 mx-auto" src="{{ asset('images/quoter/box1.png')}}" alt="">
                                    <div class="items-center">
                                        <h3 class="text-global-900 text-sm font-bold lg:text-md whitespace-nowrap">Paquete</h3>
                                        <h3 class="text-global-900 text-sm font-bold lg:text-md whitespace-nowrap">(15cm3)</h3>
                                        <h3 class="text-global-900 text-sm font-bold lg:text-md whitespace-nowrap">(3lb)</h3>
                                    </div>
                                    <input name="pk_1_1" class="rounded-sm" type="checkbox" checked>
                                </div>

                                <div class="text-center">
                                    <img class="w-14 h-10 mx-auto" src="{{ asset('images/quoter/box2.png')}}" alt="">
                                    <div class="items-center">
                                        <h3 class="text-global-900 text-sm font-bold whitespace-nowrap">Paquete</h3>
                                        <h3 class="text-global-900 text-sm font-bold whitespace-nowrap">(65cm3)</h3>
                                        <h3 class="text-global-900 text-sm font-bold whitespace-nowrap">(30lb)</h3>
                                    </div>
                                    <input name="pk_1_2" class="rounded-sm" type="checkbox">
                                </div>

                                <div class="text-center">
                                    <img class="w-14 h-10 mx-auto" src="{{ asset('images/quoter/box3.png')}}" alt="">
                                    <div class="items-center">
                                        <h3 class="text-global-900 text-sm font-bold whitespace-nowrap">(1 Pallet)</h3>
                                    </div>
                                    <input name="pk_1_3" class="rounded-sm" type="checkbox">
                                </div>

                                <div class="text-center">
                                    <div class="items-center">
                                        <input  name="units_1" class="key-only-number w-2/6 rounded-lg mt-5 sm:mt-0" type="text" placeholder="" value="1">
                                        <div>
                                            <h2 class="text-global-900 text-2xs font-bold whitespace-nowrap">Unidades(50 max)</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mx-auto mt-5 font-bold ml-2 grid grid-cols-3 lg:grid-cols-1
                                text-center items-end text-xs lg:mt-0">
                                <div class="lg:flex">
                                    <h3 class="lg:hidden">Fragil</h3>
                                    <input name="fr_1" type="checkbox">
                                    <h3 class="hidden lg:grid lg:ml-4 whitespace-nowrap">Fragil</h3>
                                </div>
                                <div class="lg:flex">
                                    <h3 class="lg:hidden">Contenido Peligroso</h3>
                                    <input name="dg_1" type="checkbox">
                                    <h3 class="hidden lg:grid lg:ml-4 whitespace-nowrap">Contenido Peligroso</h3>
                                </div>
                                <div class="lg:flex">
                                    <h3 class="lg:hidden">Perecedero</h3>
                                    <input name="ps_1" type="checkbox">
                                    <h3 class="hidden lg:grid lg:ml-4 whitespace-nowrap">Perecedero</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="{{ asset('js/jquery.min.js') }}" ></script>
                <script>
                    $('body').on('click','.home_national_quoter_delete_package',function(){
                        let id = this.id.split('_')[5];
                        $('#home_national_quoter_delete_pk_'+id).parent().remove();
                    });
                </script>
                {{-- Add Quotation --}}
                <div class="bg-white border-t rounded-b-lg w-11/12 mx-auto h-fit
                    p-5">
                    <button id="home_cn_btn_add_package" type="button" class="block  bg-global-700 px-4 py-2 mr-auto rounded-lg text-white">+</button>
                    <button id="home_cn_btn_quotation" type="button" class="flex bg-global-700 px-4 py-2 ml-auto  rounded-lg text-white">Cotizar</button>
                </div>
            </div>
        </form>
    </div>

    {{-- Quotation -> Order --}}
    <div id="home_cn_quotation" class="home_quoters_base flex bg-white border rounded-lg
        w-11/12 h-[450px] mx-auto p-5 lg:h-96 items-center" style="display:none;">
        {{-- CN Set Packages  --}}
        <form id="home_cn_form_quotation_order" action="/national-quoter-order" class="w-fit mx-auto text-center" method="POST">
            @csrf
            <div class="md:flex mx-auto w-fit">
                <div class="text-justify text-lg md:text-base font-bold p-10 md:p-5 w-fit mx-auto ">
                    <h3 id="home_cn_span_subtotal" class="">Subtotal: Q.0.00</h3>
                    <h3 id="home_cn_span_iva" class="">IVA: Q.0.00</h3>
                    <hr class="border border-global-600">
                    <h3 id="home_cn_span_total" class="font-bold">Total: Q.0.00</h3>
                </div>
            </div>
            @auth
                <div class="items-center flex space-x-2 mx-auto w-fit mt-5">
                    <input id="home_cn_chk_terms" type="checkbox" name="terms">
                    <span class="text-sm">
                        ACEPTO LAS CONDICIONES DE SERVICIO</span>
                </div>
                <h3 class="underline cursor-pointer text-sm mt-5 sm:mt-0 hover:text-global-600" data-modal-target="defaultModalCn" data-modal-toggle="defaultModalCn">
                    VER CONDICIONES DE SERVICIO</h3>

                <button id="home_cn_btn_quotation_order" type="button" class="wait flex mx-auto mt-5 bg-global-700 px-4 py-2
                    rounded-lg text-white cursor-pointer opacity-70" disabled>Realizar Orden</button>
            @else
                <div class="text-justify text-global-700 font-bold md:p- w-fit ">
                    <div class="flex my-10">
                        <img class="w-10 h-10" src="{{asset('images/main/logo.png')}}" alt="">
                        <div class="text-base px-10 bg-white font-bold">
                            <h3 class="text-left">Inicia Sesión</h3>
                            <h3>para continuar</h3>
                        </div>
                    </div>
                    <h3 class="text-sm md:text-base px-11 sm:px-5 lg:px-0"></h3>
                </div>
                <a href="/login" id="home_cn_btn_quotation_order" class="block mx-auto mt-5 w-fit bg-global-500 text-global-100 px-4 py-2
                rounded-lg transition-all delay-75 cursor-pointer hover:bg-global-600">Iniciar Sesión</a>
            @endauth
        </form>
    </div>

    {{-- Order -> OSC --}}
    <div id="home_cn_order" class="home_quoters_base hidden bg-white border rounded-lg
        w-11/12 h-auto mx-auto py-5 lg:min-h-96 lg:max-h-fit">
        <div class="mx-auto rounded-xl">
            <form id="home_cn_form_order_osc" action="/national-quoter-osc" method="POST">
                @csrf
                <div class="w-fit mx-auto px-2 lg:flex ">
                    {{-- Recoger --}}
                    <div id="home_cn_order_sender" class="space-y-1 max-w-[470px]">
                            {{-- City Section --}}
                            <h3 class="font-bold text-center">Entregar</h3>
                            <div class="items-center lg:flex lg:space-x-1">
                                <h3 class="mr-auto">Cda. Guatemala, Guatemala: </h3>
                                <input name="address_'+_location+'" class="rounded-lg h-10 w-full border-gray-200" type="text"  placeholder="Dirección" value="">
                            </div>
                            <div class="items-center space-y-2 sm:flex sm:space-x-1 sm:space-y-0">
                                <input name="name_'+_location+'" class="rounded-lg h-10 w-full border-gray-200" type="text"  placeholder="Nombre">
                                <input name="phone_'+_location+'" class="rounded-lg h-10 w-full border-gray-200" type="text"  placeholder="Telefono">
                            </div>
                            <div class="items-center lg:flex lg:space-x-1">
                                <input name="email_'+_location+'" class="rounded-lg h-10 w-full border-gray-200" type="text" placeholder="Email">
                            </div>
                            <div class="items-center lg:flex lg:space-x-1">
                                <textarea name="comments_'+_location+'"  class="rounded-lg w-full p-1 border-gray-200" placeholder="Comentarios"></textarea>
                            </div>
                            <span class="">Fecha de Recolección</span>
                            <input name="date_'+_location+'" class="rounded-lg h-10 mx-1 border-gray-200" type="date">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input name="time_'+_location+'" type="checkbox" class="sr-only peer" checked>
                                <div class="flex px-2 w-20 h-6 bg-global-600 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-transparent rounded-lg peer peer-checked:after:translate-x-full peer-checked:after:border-gray-400  after:absolute after:top-[0px] after:left-[0px] after:bg-white after:border-gray-400 after:border after:rounded-full after:h-6 after:w-10 after:transition-all  peer-checked:bg-global-600">
                                    <span class="mr-auto text-white">AM</span>
                                    <span class="ml-auto text-white">PM</span>
                                </div>
                            </label>
                    </div>
                    {{-- Animación Horizontal --}}
                    <div class="hidden items-center lg:grid">
                        <svg class="mx-5 w-5 h-5 text-green-500"  fill="none" viewBox="0 0 12 10"
                            style="  animation-name: animate-color;
                            animation-duration: 0.5s;
                            animation-iteration-count: infinite;
                            animation-direction: alternate;">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
                        </svg>
                    </div>
                    {{-- Animación Vertical --}}
                    <div class="lg:hidden">
                        <svg class="mx-auto my-3 w-5 h-5 text-green-500 rotate-90"  fill="none" viewBox="0 0 12 10"
                            style="  animation-name: animate-color;
                            animation-duration: 0.5s;
                            animation-iteration-count: infinite;
                            animation-direction: alternate;">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
                        </svg>
                    </div>

                    {{-- Entregar --}}
                    <div id="home_cn_order_destination" class="space-y-1 max-w-[470px]">

                            <h3 class="font-bold">'+location+'</h3>
                            <div class="flex space-x-1 items-center">
                                <h3 class="mr-auto">'+_municipio+', '+_departamento+': '+_address+'</h3>
                            </div>
                            <div class="items-center space-y-2 sm:flex sm:space-x-1 sm:space-y-0">
                                <input name="name_'+_location+'" class="rounded-lg h-10 w-full border-gray-200" type="text"  placeholder="Nombre">
                                <input name="phone_'+_location+'" class="rounded-lg h-10 w-full border-gray-200" type="text"  placeholder="Telefono">
                            </div>
                            <div class="flex my-2 space-x-1">
                                <input name="email_'+_location+'" class="rounded-lg h-10 mx-auto w-full border-gray-200" type="text"  placeholder="Email">
                            </div>
                            <div class="flex my-2 space-x-1">
                                <input type="checkbox" id="home_cn_destination_profile_data_chk" class="chk_profile_data">
                                <span>Utilizar Datos De Perfil</span>
                            </div>
                    </div>
                </div>

                <button id="home_cn_btn_order" type="button" class="flex bg-global-600
                    px-3 py-2 mt-3 mx-auto rounded-lg text-white">Siguiente</button>
            </form>
        </div>
    </div>

    <!-- Condiciones Modal -->
    <div id="defaultModalCn" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow ">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t ">
                    <h3 class="text-xl font-semibold text-gray-900 ">
                        Condiciones de Courier Nacional
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center " data-modal-hide="defaultModalCn">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-3">
                    <div class="text-xs text-justify px-2 space-y-2 md:text-sm">
                        <h3><span class="font-bold">A)</span> No manejamos carga peligrosa e ilícita.</h3>
                        <h3><span class="font-bold">B)</span> Manejamos y cumplimos con los reglamentos de transito de Guatemala y Centro América, por lo que sugerimos declarar y prever los excedentes ya que International Developing Logistics, S.A., no se hace responsable por multas y mal balance de mercadería.</h3>
                        <h3><span class="font-bold">C)</span> Ninguna cotización incluye seguridad armada o GPS, si desea contratar estos servicios debera solicitarlo a su asesor comercial, los cuales serán adicionales. X</h3>
                        <h3><span class="font-bold">D)</span> No se cubren gastos por cuentas ajenas, maniobras de carga o descarga y/o lavado.</h3>
                        <h3><span class="font-bold">E)</span> En servicio de chasis para contenedores, será responsable el cliente del pago de demoras para la devolución del vacio, en caso de no poder entregar el mismo por demoras pendiente, quedara sujeto a costo por estadias de forma diaria.</h3>
                        <h3><span class="font-bold">F)</span> Grupo SGL no se responsabiliza por daños casuados a contenedores.</h3>
                        <h3><span class="font-bold">G)</span> Toda carga es transportada bajo cuenta y riesgo de cliente, por lo que sugerimos que su carga cuente con seguro de mercadería y contra todo riesgo, International Developing Logistics, S.A. , no se hace responsable de la mercadería en por robos, hurtos, casos fortuitos o de fuerza mayor.</h3>
                        <h3><span class="font-bold">H)</span> Tarifas no incluyen cargos especiales ni trámites aduanales. Este servicio debe ser cotizado de forma independiente.</h3>
                        <h3><span class="font-bold">I)</span> La tarifa incluye traslados de origen a destino según se indica.</h3>
                        <h3><span class="font-bold">J)</span> Se otorgará un tiempo libre de estadías el cual será indicado por su asesor comercial y costo por día o fracción.</h3>
                        <h3><span class="font-bold">K)</span> Se solicita que sus pedidos sean realizados con un tiempo previo de 24 HRS para carga general y 72 HRS para carga afianzada, incluyendo en formato REQUERIMIENTO DE SERVICIO TERRESTRE, proporcionado por su agente comercial.</h3>
                        <h3><span class="font-bold">L)</span> Por seguridad nuestras unidades no circulan en horarios nocturnos, si esto es requerido deberá de proporcionar una EXONERACION DE RESPONSABILIDAD, a su agente comercial.</h3>
                        <h3><span class="font-bold">M)</span> Los extra stop dentro de perímetro ciudad tienen un costo adicional de $.100.00 y para destinos fuera de perímetro seria el costo mínimo ($.150.00 + el costo por kilometro de venta), consultar a su asesor comercial cualquier duda.</h3>
                        <h3><span class="font-bold">N)</span> Para todo tipo de carga se solicita que se cumpla con las condiciones de crédito establecidas por su asesor comercial y financiero. International Developing Logistics, S.A. puede retener carga por falta de pago en nuestras bodegas bajo resguardo jurídico.</h3>
                        <h3><span class="font-bold">Ñ)</span> El cliente se da por enterado y acepta las condiciones al momento de requerir el servicio.</h3>
                        <h3><span class="font-bold">O)</span> Tarifa valida por 30 días.</h3>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Map Modal -->
    <div id="defaultModalMap" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow py-5">
                <!-- Modal header -->
                <div class="flex items-start justify-between px-4 pb-5 border-b rounded-t">
                    <h3 class="text-lg font-bold">Seleccionar Mi Ruta</h3>
                    <button class="bg-global-700 text-white p-3 rounded-lg hover:bg-global-600 ml-auto" data-modal-hide="defaultModalMap">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
                <div class="my-5 px-5 space-y-1 items-center md:flex md:justify-evenly md:space-y-0 md:space-x-1">
                    <div class="relative">
                        <h3>Escribe El Origen</h3>
                        <input id="origin" type="text" class="text-xs rounded-lg w-full border-gray-200 focus:ring-0 sm:text-sm md:text-base md:min-w-[320px]" autocomplete="off" placeholder="Escribe municipio y/o zona">
                        <div id="suggest-origin" class="overflow-y-auto z-40 absolute left-0 right-0 bg-white border rounded-md shadow-md hidden"></div>
                    </div>
                    <svg class="w-8 h-8 text-green-500 animate-pulse rotate-90 md:rotate-0 md:w-14 md:h-14" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                        <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                    </svg>
                    <div class="relative">
                        <h3>Escribe El Destino</h3>
                        <input id="destination" type="text" class="text-xs rounded-lg w-full border-gray-200 focus:ring-0 sm:text-sm md:text-base md:min-w-[320px]"  autocomplete="off" placeholder="Escribe municipio y/o zona">
                        <div id="suggest-destination" class="overflow-y-auto z-40 absolute left-0 right-0 bg-white border rounded-md shadow-md hidden"></div>
                    </div>
                </div>

                <button class="bg-global-700 text-white px-3 py-2 rounded-lg block mx-auto mt-5" data-modal-hide="defaultModalMap">
                    Aceptar
                </button>

            </div>
        </div>
    </div>

    {{-- CN OSC -> Finish --}}
    <div id="home_cn_osc" class="home_quoters_base hidden bg-white border rounded-xl
        mx-auto h-auto w-11/12 lg:h-auto">
        <form id="home_cn_form_osc" action="/national-quoter-finish" method="POST" class="mx-auto">
            @csrf
            <div class="lg:flex">
                <div class="bg-white lg:p-2 lg:w-2/3">
                    <div class="h-full hidden lg:flex">
                        <div class="w-80 mx-auto my-auto px-1 text-center">
                            <h3 class="font-bold">Pasos Para Completar Tu Pago</h3><br>
                            <h3><span class="font-bold">Paso 1:</span> Finaliza Tu Orden</h3>
                            <h3 class="text-xs">Haz click en el boton "Finalizar Orden"</h3><br>
                            <h3><span class="font-bold">Paso 2:</span> Revisa el detalle de tu orden en "Mis Ordenes"</h3><br>
                            <h3><span class="font-bold">Paso 3:</span> Realiza tu pago con las opciones disponibles</h3>
                            <h3 class="text-xs">Haz click en el boton "Realizar Pago"</h3><br>
                            <h3><span class="font-bold text-sm">Necesitas Ayuda:</span></h3>
                            <h3 class="text-sm">Escribenos a atencionclientes@gruposgl.com</h3>
                        </div>
                    </div>
                </div>

                {{-- Resumen Orden --}}
                <div class="border p-1 lg:p-2 lg:w-1/3">
                    {{-- Utilizar Datos de Perfil --}}
                    <div class="flex my-2 space-x-1 items-center">
                        <input type="checkbox"  class="chk_profile_data rounded-sm border-gray-400">
                        <span>Utilizar Datos De Perfil</span>
                    </div>

                    {{-- Facturacion --}}
                    <div class="mx-auto py-1  space-y-1 grid px-1">
                        <h3 class="text-base">Datos de Facturación: </h3>
                        <input class="key-only-alpha rounded-lg h-10 border-gray-200 "
                            name="bill_name"  type="text" placeholder="Nombre">
                        <input class="key-only-alpha rounded-lg h-10 border-gray-200 "
                            name="bill_lastname"  type="text" placeholder="Apellido">
                        <input class="rounded-lg h-10 border-gray-200"
                            name="bill_address" type="text" placeholder="Dirección">
                        <input class="key-only-number rounded-lg h-10 border-gray-200"
                            name="bill_nit" type="text" placeholder="NIT">
                        <div class="flex items-center space-x-1">
                            <input class="invoice_cf rounded-md" name="bill_cf" type="checkbox">
                            <span class="text-sm font-bold">CF</span>
                        </div>
                    </div>

                    <hr class="h-px my-5 bg-gray-300 border-0">

                    <div>
                        <div class="flex items-center space-x-1 w-fit mx-auto my-1 ">
                            <input id="home_cn_accept_cod_charge_chk" class="rounded-md" type="checkbox" name="accept_cod_charge">
                            <h3 class="text-center text-sm">Quiero que cobren la mercadería por mi.(Contra Entrega)</h3>
                        </div>
                        <input  class="mx-auto block h-10 rounded-lg border-gray-200" disabled type="number" name="cod_price" placeholder="Total a cobrar(Q)">
                    </div>

                    <hr class="h-px my-5 bg-gray-300 border-0">
                    <h3 class="">Resumen de Orden</h3>
                    <span class="home_cn_osc_total">Total:$0.00</span>
                    <button id="home_cn_btn_osc" type="button" class="flex justify-center bg-global-600 rounded-lg
                        py-3 w-11/12 text-white hover:bg-global-900 my-3
                        mx-auto text-sm font-bold">
                        Finalizar Orden
                        {{-- <span class="home_cn_osc_total mx-1">$0.00</span> --}}
                    </button>

                </div>
            </div>
        </form>
    </div>

    {{-- Success --}}
    <div id="home_cn_success" class="home_quoters_base hidden bg-white border-2 rounded-xl
        w-11/12 mx-auto p-5">
        <div class="bg-white w-11/12 mx-auto rounded-xl p-10  text-center">
            <svg class="mx-auto w-10 h-10 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
            </svg>
            <h3 id="home_cn_order_success" class="text-xl"></h3>
            <h3 class="text-base mt-5">Revisa tus órdenes</h3>
            <h3 class="text-sm">Haz clic en el botón  de abajo para revisar tus órdenes</h3>
            <a href="/user-orders">
                <button class="text-white bg-green-500 hover:bg-green-600 transition-all delay-75
                px-3 py-2 rounded-lg my-2">MIS ORDENES</button>
            </a>
            <h3 class="font-bold text-sm">Para completar tu pago, ingresa al resumen de tu orden en el botón de arriba</h3>
        </div>
    </div>

</div>