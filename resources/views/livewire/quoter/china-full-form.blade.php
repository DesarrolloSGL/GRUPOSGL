<div id="home_cg_base_div" class="home_quoters_base ">

    {{-- Location  Packages -> Quotation -> Order --}}
    <div id="home_cg_location_package_div" class="home_quoters_base hidden">
        {{-- Location --}}
        <div class="flex bg-white w-11/12 mx-auto h-12 rounded-t-lg
            items-center py-1 relative">
            <img class="w-6 h-4 ml-5 mr-5 lg:w-8
            lg:h-6" src="{{asset('images/flags/China.png')}}" alt="">

            <span class="h-12 text-gray-500 text-center text-xs w-5/12
            grid items-center
            sm:text-xl">
            China</span>

            <svg class="mx-0 w-5 h-5 text-green-500"  fill="none" viewBox="0 0 12 10"
                style="  animation-name: animate-color;
                animation-duration: 0.5s;
                animation-iteration-count: infinite;
                animation-direction: alternate;">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
            </svg>

            <img class="w-6 h-4 ml-5 mr-5 lg:w-8
            lg:h-6" src="{{asset('images/flags/Guatemala.jpg')}}" alt="">
            <span class="h-12 text-gray-500 text-center text-xs w-5/12
            grid items-center
            sm:text-xl">
            Guatemala</span>

        </div>

        <form id="home_cg_form_packages" action="/china-quoter-quotation" method="POST" autocomplete="off">
            @csrf
            {{-- Packages China  Guatemala--}}
            <div id="home_cg_package_div" class="home_quoters_base hidden  bg-white border rounded-b-lg w-11/12 mx-auto h-fit shadow-xl
                p-5">
                <div class="md:grid md:gap-8 md:grid-cols-2">
                    <div>
                        <div class="text-center py-3 mx-auto w-fit">
                            <span class="">Seleccione el Servicio: </span>
                            <select id="home_cg_service_select" name="service" class="py-1 px-2 rounded-lg h-10 border-none bg-gray-100
                            text-gray-500 text-sm">
                                <option class="font-bold" value="1" selected>P.O. BOX</option>
                            </select>
                        </div>
                        <div class="text-center p-1 hidden">
                            <input id="home_cg_link" name="link" class="home_quotation_keyup rounded-lg h-10 bg-gray-100" type="text" placeholder="Pasame Tu Link">
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-1">
                            <div class="text-center">
                                <h3 class="text-sm font-bold">Valor de mercadería en US$:</h3>
                                <input id="home_cg_price" name="price" class="home_quotation_keyup w-11/12 sm:w-8/12 lg:w-11/12 xl:w-auto rounded-lg h-10 border-none bg-gray-100" type="text" placeholder="Precio">
                            </div>
                            <div class="text-center">
                                <h3 class="text-sm font-bold">Shipping en US$:</h3>
                                <input id="home_cg_shipping" name="shipping" class="home_quotation_keyup w-11/12 sm:w-8/12 lg:w-11/12 xl:w-auto rounded-lg h-10 border-none bg-gray-100" type="text" placeholder="Shipping">
                            </div>
                            <div class="text-center">
                                <h3 class="font-bold text-sm">Peso en libras: </h3>
                                <input id="home_cg_weight" name="weight" class="home_quotation_keyup w-11/12 sm:w-8/12 lg:w-11/12 xl:w-auto rounded-lg h-10 border-none bg-gray-100" type="text" placeholder="Peso">
                                <h3 class="font-bold text-sm">Peso Volumétrico: </h3>
                                <div class="flex mx-auto w-fit  space-x-1">
                                    <input id="home_cg_volumetric_height" name="volumetric_height" class="home_quotation_keyup mx-auto w-[70px]  rounded-lg h-10 border-none bg-gray-100 mt-1" type="text" placeholder="10cm">
                                    <input id="home_cg_volumetric_width" name="volumetric_width" class="home_quotation_keyup mx-auto w-[70px]  rounded-lg h-10 border-none bg-gray-100 mt-1" type="text" placeholder="10cm">
                                    <input id="home_cg_volumetric_depth" name="volumetric_depth" class="home_quotation_keyup mx-auto w-[70px] rounded-lg h-10 border-none bg-gray-100 mt-1" type="text" placeholder="10cm">
                                </div>
                                <h3 class="font-bold text-2xs">(ancho-alto-profundidad)</h3>
                            </div>
                            <div class="text-center ">
                                <h3 class="font-bold text-sm">Descripción:</h3>
                                <select id="home_cg_description" name="description" class="home_quotation_change max-w-[226px] lg:w-11/12 xl:w-auto rounded-lg h-10 border-none bg-gray-100 text-center text-sm text-gray-500">
                                    <option value="-" selected="selected">Seleccione Descripción</option>
                                    <option value="15">Accesorio de Aseo Personal: 15%</option>
                                    <option value="15">Accesorio de Cámara: 15%</option>
                                    <option value="15">Accesorio de Carro: 15%</option>
                                    <option value="15">Accesorio de Cocina: 15%</option>
                                    <option value="15">Accesorio de Computacion: 15%</option>
                                    <option value="15">Accesorio de Musica: 15%</option>
                                    <option value="15">Accesorio de Oficina: 15%</option>
                                    <option value="15">Accesorio de Telefonia: 15%</option>
                                    <option value="15">Accesorio Deportivo: 15%</option>
                                    <option value="0">Accesorio Electrico: 0%</option>
                                    <option value="15">Articulos de Cuero: 15%</option>
                                    <option value="15">Articulos de Fiesta: 15%</option>
                                    <option value="15">Bateria de Carro: 15%</option>
                                    <option value="15">Bicicleta: 15%</option>
                                    <option value="0">Bocinas de Carro: 0%</option>
                                    <option value="15">Bolsas: 15%</option>
                                    <option value="10">Cables: 10%</option>
                                    <option value="0">Camara Fotografica: 0%</option>
                                    <option value="10">Cartucho de tinta (Simple): 10%</option>
                                    <option value="0">Cartucho de Tinta C/Chip: 0%</option>
                                    <option value="15">Catalogos: 15%</option>
                                    <option value="13">CD´s: 10% +3% IPSA</option>
                                    <option value="0">Celulares: 0%</option>
                                    <option value="5">Cinta de Impresora: 5%</option>
                                    <option value="0">Computadoras: 0%</option>
                                    <option value="15">Consola de Videojuegos: 15%</option>
                                    <option value="15">Cosmeticos: 15%</option>
                                    <option value="15">Cuadernos: 15%</option>
                                    <option value="0">Discos Duros Vacios: 0%</option>
                                    <option value="18">DVD Player: 15% +3% IPSA</option>
                                    <option value="15">Edredon: 15%</option>
                                    <option value="15">Electrodomesticos: 15%</option>
                                    <option value="0">Equipo Medico: 0%</option>
                                    <option value="15">Estuche de Cuero: 15%</option>
                                    <option value="15">Estuche Partes Plasticas: 15%</option>
                                    <option value="15">Etiquetas de Papel o Carton: 15%</option>
                                    <option value="15">Etiquetas de Tela: 15%</option>
                                    <option value="15">Grabadoras: 15%</option>
                                    <option value="0">Herramientas de Mano: 0%</option>
                                    <option value="0">Impresoras: 0%</option>
                                    <option value="15">Joyeria/Bisuteria: 15%</option>
                                    <option value="15">Juguetes: 15%</option>
                                    <option value="0">Laptop: 0%</option>
                                    <option value="15">Lentes: 15%</option>
                                    <option value="0">Lentes (solo aro): 0%</option>
                                    <option value="5">Lentes de Contacto: 5%</option>
                                    <option value="15">Lentes de Sol: 15%</option>
                                    <option value="0">Libros: 0%</option>
                                    <option value="5">Llaves: 5%</option>
                                    <option value="15">Luces Navideñas: 15%</option>
                                    <option value="15">Mascarillas: 15%</option>
                                    <option value="15">Material Impreso: 15%</option>
                                    <option value="15">Material Promocional: 15%</option>
                                    <option value="15">Medicamentos: 15%</option>
                                    <option value="15">MP3 (iPod): 15%</option>
                                    <option value="15">Muebles de Casa: 15%</option>
                                    <option value="10">Partes de Bicicleta: 10%</option>
                                    <option value="10">Partes Industriales: 10%</option>
                                    <option value="15">Poster: 15%</option>
                                    <option value="15">Radio de Carro: 15%</option>
                                    <option value="15">Reloj de Pulsera/Pared: 15%</option>
                                    <option value="10">Repuestos de Carro: 10%</option>
                                    <option value="0">Repuestos de Helicoptero: 0%</option>
                                    <option value="0">Repuestos de Motor de Carro: 0%</option>
                                    <option value="0">Repuestos Electronicos: 0%</option>
                                    <option value="15">Ropa: 15%</option>
                                    <option value="0">Scanner: 0%</option>
                                    <option value="0">Software de PC: 0%</option>
                                    <option value="0">Tablets (iPad): 0%</option>
                                    <option value="15">Tarjetas de Invitaciones: 15%</option>
                                    <option value="0">Videocamara: 0%</option>
                                    <option value="18">Videocintas: 15% +3% IPSA</option>
                                    <option value="3">Videojuegos CD/DVD/BlueRay- 0% +3% IPSA</option>
                                    <option value="18">Videojuegos Cassette: 15% +3% IPSA</option>
                                    <option value="15">Zapatos: 15%</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="p-2">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input id="home_cg_exchange_btn" name="currency" type="checkbox" class="sr-only peer" checked>
                            <div class="flex px-2 w-11 h-6  bg-yellow-400 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-transparent rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-gray-300 after:content-[''] after:absolute after:top-[0px] after:left-[1px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-5 after:transition-all  peer-checked:bg-green-500">
                                <span class="mr-auto font-bold text-green-800">$</span>
                                <span class="ml-auto font-bold text-yellow-600">Q</span>
                            </div>
                        </label>
                        <h3>Flete SGL: <span id="home_cg_transport">0.00</span></h3>
                        <h3>Desaduanaje SGL: <span id="home_cg_desaduanaje">0.00</span></h3>
                        <h3 class="font-bold">Servicios SGL: <span id="home_cg_services">0.00</span></h3>
                        <h3>DAI: <span id="home_cg_dai">0.00</span></h3>
                        <h3>IVA: <span id="home_cg_iva">0.00</span></h3>
                        <h3 class="font-bold">Impuestos: <span id="home_cg_taxes">0.00</span></h3>
                        <h3 class="font-bold">*Total P.O. BOX: Servicio SGL + Impuestos: <span id="home_cg_total_pobox">0.00</span></h3>
                        <hr class="border-gray-300">
                        <h3 class="font-bold hidden">Comisión: <span id="home_cg_commission">0.00</span></h3>
                        <h3 class="font-bold hidden">Total Todo Incluido: Mercadería + Comisión + Servicio SGL + Impuestos: <span id="home_cg_total_include">0.00</span></h3>
                        <h3 class="text-2xs text-red-500 my-1 text-justify">*Si la factura de productos excede el monto de USD.1,000.00 aplica factura mayor y realización de DUCA</h3>
                        <h3 class="text-2xs text-red-500 my-1 text-justify">*Si la factura de productos excede el monto de USD.2,500.00 aplica impuesto SED</h3>
                    </div>
                </div>

                <div id="home_cg_conditions_order_div" class="home_quoters text-center mt-5 hidden">
                    @auth
                        <div class="items-center flex w-fit mx-auto" >
                            <input id="home_cg_chk_terms" class="mx-2" type="checkbox" name="terms">
                            <span class="text-sm cursor-pointer">
                                ACEPTO LAS CONDICIONES DE SERVICIO</span>
                        </div>
                        <span data-modal-target="defaultModalCg" data-modal-toggle="defaultModalCg" class="underline text-sm mt-5 sm:mt-0 cursor-pointer hover:text-global-700">
                            VER CONDICIONES DE SERVICIO</span>
                        <button id="home_cg_btn_quotation_order" type="button" class="flex mx-auto mt-5 bg-global-950 px-4 py-2
                            rounded-xl text-white cursor-pointer opacity-70" disabled>Realizar Orden</button>
                    @else
                        <div class="text-justify text-global-700 font-bold w-fit mx-auto">
                            <div class="flex my-10">
                                <img class="max-w-[40px]" src="{{asset('images/main/logo.png')}}" alt="">
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
                </div>
            </div>

        </form>
    </div>

    <!-- Condiciones Modal -->
    <div id="defaultModalCg" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow ">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t ">
                    <h3 class="text-xl font-semibold text-gray-900 ">
                        Condiciones de Servicio POBOX
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center " data-modal-hide="defaultModalCg">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-5">
                    <div class="text-xs text-justify px-2 space-y-2 md:text-sm">
                        <h3 class="font-bold text-lg text-center">P.O.BOX</h3>
                        <h3><span class="font-bold">A)</span> Nuestras tarifas incluyen IVA.</h3>
                        <h3><span class="font-bold">B)</span> Costo por desconsolidacion se cobara paquete ingresado a bodegas.</h3>
                        <h3><span class="font-bold">C)</span> Costo de mercadería declara mediante INVOICE, sujeta a revalorización y ajuste de conformidad con Art. 349 del RECAUCA.</h3>
                        <h3><span class="font-bold">D)</span> El empaque o embalaje es responsabilidad del proveedor, GRUPO SGL no abre ni revisa la paquetería previa a su embarque en líneas aéreas. Paquetes recibidos en bodega dañados, deberán ser reempacados y se debera consultar con asesor comercial el costo del mismo.</h3>
                        <h3><span class="font-bold">E)</span> Las entregas se realizan en oficinas de destino únicamente.</h3>
                        <h3><span class="font-bold">F)</span> GRUPO SGL (y su corporativo) no se responsabilizan por daños ocurridos en el transito debido a mal empaque o embalaje de la misma.</h3>
                        <h3><span class="font-bold">G)</span> Cotización sujeta a variaciones por medidas mayores a 122 cm lineales, 300 centímetros volumétricos o peso mayor a 35 kg por paquete.</h3>
                        <h3><span class="font-bold">H)</span> En caso de extravió de mercadería el cliente deberá de ingresar un reclamo por medio de FORMULARIO DE RECLAMOS COURIER, en un tiempo máximo de 3 días hábiles, después de notificado el mismo por servicio al cliente.</h3>
                        <h3><span class="font-bold">I)</span> La cobertura por reclamos únicamente aplica a un valor máximo del 70% de la mercadería declarada al momento de despacho con soporte de factura contable y documentos requeridos en FORMULARIO DE RECLAMOS COURIER.</h3>
                        <h3><span class="font-bold">J)</span> Los productos con baterías están sujetos a restricción de vuelo por normas internacionales.</h3>
                        <h3><span class="font-bold">J.1)</span> Los paquetes están sujetos a aceptación de aerolínea, por lo que de no cumplir con las normas de vuelo pueden ser retenidos o retornados a nuestras oficinas de origen.</h3>
                        <h3><span class="font-bold">K)</span> Los tiempos de tránsito ofertados pueden variar por disposición de vuelo de aerolínea en las cuales GRUPO SGL, no es responsable de las mismas.</h3>
                        <h3><span class="font-bold">L)</span> GRUPO SGL, no se responsabiliza por el mal funcionamiento o calidad de los productos transportados.</h3>
                        <h3><span class="font-bold">M)</span> GRUPO SGL, podrá notificar los daños visuales de paquetes que presenten daños, sin embargo, no se revisar ni abren los paquetes previos a vuelos.</h3>
                        <h3><span class="font-bold">N)</span> Los paquetes con contrabando o mercaderías no declaradas podrán ser confiscados por las autoridades.</h3>
                        <h3><span class="font-bold">Ñ)</span> GRUPO SGL. no se responsabiliza por las demoras, en vuelos ocasionadas por instrucciones gubernamentales, huelgas, desastres naturales, congestiones en aduanas, tránsitos aéreos tardíos por aerolíneas y/o retenciones por aduana de origen o destino.</h3>
                        <h3><span class="font-bold">O)</span> El cliente acepta las condiciones al momento de requerir el servicio.</h3>
                        <h3><span class="font-bold">P)</span> Tarifa valida por 8 días.</h3>
                    </div>

                    <div class="text-xs text-justify px-2 space-y-2 md:text-sm">
                        <h3 class="font-bold text-lg text-center">Todo Incluido</h3>
                        <h3><span class="font-bold">A)</span> Todas nuestras tarifas incluyen IVA.</h3>
                        <h3><span class="font-bold">B)</span> Costo por desconsolidacion se cobara paquete ingresado a bodegas.</h3>
                        <h3><span class="font-bold">C)</span> Costo de mercadería declara mediante INVOICE, sujeta a revalorización y ajuste de conformidad con Art. 349 del RECAUCA.</h3>
                        <h3><span class="font-bold">D)</span> La mercadería cuenta con una protección valorada hasta USD.500.00 cubierta por seguro incluido en esta cotización. Aplica restricciones.</h3>
                        <h3><span class="font-bold">E)</span> Si desea cobertura extendida el valor de la misma será de 2.2% sobre el valor de su factura.</h3>
                        <h3><span class="font-bold">F)</span> Garantía 20 días calendario sujeta a disposición del proveedor.</h3>
                        <h3><span class="font-bold">G)</span> Cotización sujeta a variaciones por medidas mayores a 122 cm lineales, 300 centímetros volumétricos o peso mayor a 35 kg por paquete.</h3>
                        <h3><span class="font-bold">H)</span> El empaque o embalaje es responsabilidad del proveedor, GRUPO SGL no abre ni revisa la paquetería previa a su embarque en líneas aéreas. Paquetes recibidos en bodega dañados, deberán ser reempacados y se debera consultar con asesor comercial el costo del mismo.</h3>
                        <h3><span class="font-bold">I)</span> Entrega gratuita en el perímetro de la capital (sujeto a aéreas de cobertura por parte de la empresa).</h3>
                        <h3><span class="font-bold">J)</span> El cliente puede solicitar su paquete en puerta de entrega, bajo un costo adicional, que debe de ser consultado con su asesor comercial.</h3>
                        <h3><span class="font-bold">K)</span> Si la factura de productos excede el monto de USD.1,000.00 aplica factura mayor y realización de DUCA.</h3>
                        <h3><span class="font-bold">L)</span> GRUPO SGL. no se responsabiliza por las demoras, en vuelos ocasionadas por instrucciones gubernamentales, huelgas, desastres naturales, congestiones en aduanas, tránsitos aéreos tardíos por aerolíneas y/o retenciones por aduana de origen o destino.</h3>
                        <h3><span class="font-bold">M)</span> Cliente acepta las condiciones de servicio al momento de hacer el requerimiento.</h3>
                        <h3><span class="font-bold">N)</span> Tarifa valida por 48 horas.</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Order -> OSC --}}
    <div id="home_cg_order" class="home_quoters_base bg-white  border rounded-b-lg
        w-11/12 min-h-[384px] max-h-auto mx-auto py-5 items-center flex" style="display:none;">
        <div class="mx-auto rounded-xl">
            <form id="home_cg_form_order_osc" action="/china-quoter-osc" method="POST" autocomplete="off">
                @csrf
                <div class="w-fit mx-auto px-2 lg:flex">
                    {{-- Recoger --}}
                    <div class="w-fit items-center flex text-center mx-auto">
                        <img class="w-6 h-4 ml-5 mr-5 lg:w-8
                        lg:h-6" src="{{asset('images/flags/China.png')}}" alt="">

                        <span class="h-12 text-gray-500 text-center text-lg w-5/12
                        rounded-xlborder-none outline-none grid items-center
                        sm:text-xl">
                        China</span>
                    </div>
                    {{-- Animación --}}
                    <div class="flex items-center">
                        {{-- Horizontal --}}
                        <svg class="hidden mx-5 w-5 h-5 text-green-500 lg:block"  fill="none" viewBox="0 0 12 10"
                            style="  animation-name: animate-color;
                            animation-duration: 0.5s;
                            animation-iteration-count: infinite;
                            animation-direction: alternate;">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
                        </svg>
                        {{-- Vertical --}}
                        <svg class="block mx-auto w-5 h-5 text-green-500 rotate-90 lg:hidden"  fill="none" viewBox="0 0 12 10"
                            style="  animation-name: animate-color;
                            animation-duration: 0.5s;
                            animation-iteration-count: infinite;
                            animation-direction: alternate;">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
                        </svg>
                    </div>
                    {{-- Entregar --}}
                    <div class="text-center">
                        <h3 class="font-bold">Entregar En:</h3>
                        {{-- Select Destination --}}
                        <select name="destination" id="home_cg_destination_select" class="p-2 mt-1 mb-1 rounded-lg
                        border-gray-200">
                            <option value="0">Seleccione punto de entrega</option>
                            <option value="1">Ciudad de Guatemala</option>
                            <option value="23">Agencia Zona 13</option>
                        </select>
                        {{-- Destination Form --}}
                        <div id="home_cg_order_destination">

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{--  OSC -> Finish --}}
    <div id="home_cg_osc" class="home_quoters_base hidden bg-white border rounded-xl
        mx-auto h-auto w-11/12 lg:h-auto">
        <form id="home_cg_form_osc" action="/china-quoter-finish" method="POST" class="mx-auto">
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

                    <h3 class="">Resumen de Orden</h3>
                    <span class="home_cg_osc_total">Total:$0.00</span>
                    <button id="home_cg_btn_osc" type="button" class="flex justify-center bg-global-600 rounded-lg
                        py-3 w-11/12 text-white hover:bg-global-900 my-3
                        mx-auto text-sm font-bold">
                        Finalizar Orden
                    </button>

                </div>
            </div>
        </form>
    </div>

    {{-- Success --}}
    <div id="home_cg_success" class="home_quoters_base hidden bg-white border-2 rounded-xl
        w-11/12 mx-auto p-5">
        <div class="bg-white w-11/12 mx-auto rounded-xl p-10  text-center">
            <svg class="mx-auto w-10 h-10 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
            </svg>
            <h3 id="home_cg_order_success" class="text-xl"></h3>
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