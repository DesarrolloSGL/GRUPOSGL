@extends('layouts.app')

@section('content')
    <section class="bg-white">
        @if(isset($order))
            <a href="{{ url()->previous() }}">
                <button class="bg-blue-100 mt-5 ml-5 px-3 py-2 rounded-lg">
                    <svg class="w-6 h-6 text-blue-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                    </svg>
                </button>
            </a>
        @endif
        <div class="lg:flex">

            <div class="w-11/12 mx-auto p-5 my-10 rounded-md border text-sm overflow-auto sm:w-10/12 xl:w-4/12">
                <h3 class="text-center text-lg text-white font-bold bg-blue-800 w-fit
                rounded-lg mx-auto px-2 py-1">BalooTips</h3>
                <div class="my-2">
                    <h3 class="tip text-blue-800  p-1  rounded-md cursor-pointer hover:bg-blue-300">¿Cómo realizo la carga de mi factura si mi proveedor dividió el envío en varios paquetes?</h3>
                    <div id="upload_invoice_tip_1" class="hidden">
                        <p class="text-blue-800 bg-blue-100 rounded-lg p-2">
                            <br>
                            Si tu paquete fue dividido en 2 envíos, debes declarar únicamente el monto de lo que incluye
                            cada paquete, no del monto total de la compra.
                            <br><br>
                            Ejemplo: Si tu paquete número 1 contiene un producto únicamente  presentas el costo
                            de este producto, si tu paquete número 2 contiene 3 productos, presentas el total de
                            los tres productos.
                            <br>
                            Puedes subir la misma factura para ambos paquetes cuidando el total a declarar.
                            <br>
                            Importante que tomes en cuenta lo siguiente:
                            <br>
                            -Verifica el número de tracking del envío<br>
                            -Verifica la descripcion del articulo según su número de tracking<br>
                            -Carga únicamente el valor correspondiente del paquete no el total de tú compra.<br>
                        </p>
                    </div>
                </div>

                <div class="my-2">
                    <h3 class="tip text-blue-800  p-1  rounded-md cursor-pointer hover:bg-blue-300">¿Qué datos debe tener mi factura de compra?</h3>
                    <div class="hidden">
                        <p class="text-blue-800 bg-blue-100 rounded-lg p-2">
                            <br>
                            Tú factura o comprobante de compra debe contar con los siguientes datos:
                                <br>
                                -Proveedor<br>
                                -Destinatario<br>
                                -Descripción del artículo<br>
                                -Total de la compra<br>
                            NOTA: puedes subir una captura de pantalla que contenga la información de tu compra.
                        </p>
                    </div>
                </div>

                <div class="my-2">
                    <h3 class="tip text-blue-800  p-1  rounded-md cursor-pointer hover:bg-blue-300">¿Cómo obtengo mi factura de compra?</h3>
                    <div class="hidden">
                        <p class="text-blue-800 bg-blue-100 rounded-lg p-2">
                            <br>
                            Si tu compra fue realizada en Amazon tu factura la obtienes
                            ingresando a la opción mis pedidos seguido de ver recibo de compra.
                            Si tu proveedor no te brinda una factura o comprobante de compra. Puedes
                            utilizar una captura de pantalla que contenga toda la información de tu compra.
                        </p>
                    </div>
                </div>

                <div class="my-2">
                    <h3 class="tip text-blue-800  p-1  rounded-md cursor-pointer hover:bg-blue-300">¿Cómo cargo mi factura, si no cuento con número de tracking?</h3>
                    <div class="hidden">
                        <p class="text-blue-800 bg-blue-100 rounded-lg p-2">
                            <br>
                            Si no cuentas con número de tracking, debes esperar a que tu
                            paquete llegue a nuestro Centro de distribución de Miami o China para
                            que podamos asignarle un número de guía a tu paquete, al momento de
                            nosotros brindarte este número puedes cargar la factura de tu servicio.
                            <br><br>
                        </p>
                    </div>
                </div>

                <div class="my-2">
                    <h3 class="tip text-blue-800  p-1  rounded-md cursor-pointer hover:bg-blue-300">¿Cuál es el valor que debo declarar?</h3>
                    <div class="hidden">
                        <p class="text-blue-800 bg-blue-100 rounded-lg p-2">
                            <br>
                            El valor que debes declarar es el monto total de los
                            productos que incluye shipping y taxes de tu paquete.
                            *Si tu paquete viene de China, debes declarar el valor
                            en dólares americanos ($)
                            <br><br>
                        </p>
                    </div>
                </div>

                <div class="my-2">
                    <h3 class="tip text-blue-800  p-1  rounded-md cursor-pointer hover:bg-blue-300">¿Con qué precio son calculados los impuestos?</h3>
                    <div class="hidden">
                        <p class="text-blue-800 bg-blue-100 rounded-lg p-2">
                            <br>
                            ¿Con qué precio son calculados los impuestos?
                            La base utilizada para el cálculo de impuestos es el precio CIF
                            (Cost, Insurance and Freight). Costo + Seguro + Flete.
                            <br><br>
                            Aplicado de la siguiente manera:
                            <br><br>
                            Precio del producto + (2.2% del valor de tu producto) + $2 por cada
                            libra de peso de tu paquete. El precio CIF se multiplica por el IVA y
                            Arancel correspondiente a tu producto.
                            <br><br>
                        </p>
                    </div>
                </div>

                <div class="my-2">
                    <h3 class="tip text-blue-800  p-1  rounded-md cursor-pointer hover:bg-blue-300">¿Qué procede si mi compra es mayor a $1,000.00?</h3>
                    <div class="hidden">
                        <p class="text-blue-800 bg-blue-100 rounded-lg p-2">
                            <br>
                            Si tu paquete tiene valor declarado mayor a $1,000.00 CIF, para poder realizar el trámite de liberación de aduana es indispensable que tomes en cuenta lo siguiente:
                            <br><br>
                            <ul class="list-disc text-blue-800 px-5">
                                <li>
                                    Estar registrado como importador si ya has realizado más de una importación.
                                </li>
                                <li>
                                    RTU que esté actualizado en los últimos 6 meses.
                                </li>
                                <li>
                                    Indicar la descripción exacta del contenido de tu paquete para colocar la fracción arancelaria correspondiente.
                                </li>
                                <li>
                                    Factura comercial del proveedor en donde realizaste tu compra.
                                </li>
                            </ul>
                            <br><br>
                        </p>
                    </div>
                </div>

                <div class="my-2">
                    <h3 class="tip text-blue-800  p-1  rounded-md cursor-pointer hover:bg-blue-300">Política sobre productos usados o adquiridos en ebay</h3>
                    <div class="hidden">
                        <p class="text-blue-800 bg-blue-100 rounded-lg p-2">
                            <br>
                            Para cubrir el total de tu producto debes contratar el Seguro de
                            Cobertura Total. Productos usados, versiones refurbished o adquiridos
                            en ebay no aplican a los $200 de cobertura incluidos en la tarifa por
                            libra, tampoco podrán contratar el servicio de Cobertura Total.
                            En caso de que se verifique que el producto importado es usado y el
                            usuario ha activado la Cobertura Total, se realizará el reintegro
                            correspondiente al pago de “Cobertura Total” (equivalente al 1% del
                            valor de la mercadería y deducciones aplicables por gastos administrativos).
                            Es importante destacar que GrupoSGL no brinda garantías para productos usados,
                            el usuario realiza la compra de artículos usados bajo su propia cuenta y riesgo.
                        </p>
                    </div>
                </div>

                <div class="my-2">
                    <h3 class="tip text-blue-800  p-1  rounded-md cursor-pointer hover:bg-blue-300">Política sobre Derechos de Autor y Propiedad Industrial DERECHOS DE AUTOR Y PROPIEDAD INDUSTRIAL.</h3>
                    <div class="hidden">
                        <p class="text-blue-800 bg-blue-100 rounded-lg p-2">
                            <br>
                            El Cliente garantiza que todos los productos importados o exportados
                            son genuinos y no constituyen imitaciones o falsificaciones.
                            Además, se compromete a cumplir con las leyes y regulaciones aplicables,
                            incluyendo las relacionadas con la propiedad intelectual, aduanas y
                            comercio internacional. Queda prohibida la importación o exportación de
                            productos falsos o imitaciones y el Cliente asume toda la responsabilidad
                            civil o penal que pueda derivar del incumplimiento de lo aquí establecido.
                            La violación a los derechos de propiedad industrial es penada por la
                            legislación guatemalteca y otras legislaciones. Introducir en el comercio,
                            almacenar o distribuir productos siendo estos imitaciones o falsificaciones
                            de signos distintivos con relación a productos protegidos por registros es
                            constitutivo de delito y es sancionado con prisión. GrupoSGL se reserva el
                            derecho de denunciar ante autoridad competente si se descubre dicha
                            infracción. Ambas partes reconocen las consecuencias legales graves y
                            se comprometen a cooperar en cualquier investigación o procedimiento
                            legal relacionado con la importación o exportación de productos falsos.
                        </p>
                    </div>
                </div>

            </div>

            <div class="w-11/12 mx-auto p-5 my-10 rounded-md border sm:w-10/12 xl:w-1/2 2xl:w-5/12">
                <br>
                <form id="upload_invoice_form" action="/upload-invoice" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf

                    <div class="my-2">
                        <h3 class="text-blue-800 font-bold">No. Orden</h3>
                        <input name="order_number" class=" rounded-3xl ring-0 border-gray-300 w-full lg:w-1/2 focus:ring-0" {{isset($order)? "readonly":false}}  type="text" value="{{isset($order)? $order->order_number:false}}">
                    </div>

                    {{-- Input Text --}}
                    <div class="grid grid-cols-1 gap-5 text-center sm:grid-cols-2 md:grid-cols-3">
                        <div>
                            <h3 class="text-blue-800 font-bold">Valor a declarar($)</h3>
                            <input name="value" class=" rounded-3xl ring-0 border-gray-300 w-full focus:ring-0" {{isset($value)? "readonly":false}} type="text" value="{{isset($value)? $value:false}}">
                        </div>

                        <div>
                            <h3 class="text-blue-800 font-bold">Tracking de compra</h3>
                            <input name="tracking" class=" rounded-3xl ring-0 border-gray-300 w-full focus:ring-0" type="text">
                        </div>

                        <div>
                            <h3 class="text-blue-800 font-bold">Codigo/Palabra Clave</h3>
                            <input name="keyword" class="rounded-3xl ring-0 border-gray-300 w-full focus:ring-0" type="text">
                        </div>
                    </div>

                    {{-- Select --}}
                    <div class="grid grid-cols-1 gap-5 my-10 sm:grid-cols-2">
                        <div>
                            <h3>Tú producto es nuevo</h3>
                            <select id="product_is_new" name="new"  class="bg-gray-300 rounded-3xl ring-0
                                border-none px-5 py-1 focus:ring-0">
                                <option value="1" selected>Si</option>
                                <option value="2">No</option>
                            </select>
                            <div class="">
                            <ul class=" text-blue-800  space-y-1 list-disc list-inside my-1">
                                <li>
                                    El costo del seguro es de 1.6% adicional
                                </li>
                                <li>
                                    5 días hábiles para tu reembolso (Daño o perdida)
                                </li>
                                <li>
                                    Cobertura en todas las categorías
                                </li>
                                <li>
                                    Deducible del 1.2% en el reembolso
                                </li>
                            </ul>
                            <h3 class="mt-5">Desea la cobertura Total de sus paquetes</h3>
                            <select id="add_insurance" name="insurance"  class="bg-gray-300 rounded-3xl ring-0
                                border-none px-5 py-1 focus:ring-0">
                                <option value="1">Si</option>
                                <option value="2" selected>No</option>
                            </select>
                            </div>
                        </div>

                        {{-- File - Enviar  --}}
                        <div>
                            <h3>Tú proveedor dividió tus compras en varios paquetes</h3>
                            <select name="divided" id="" class="bg-gray-300 rounded-3xl ring-0
                                border-none px-5 py-1 focus:ring-0">
                                <option value="1">Si</option>
                                <option value="2" selected>No</option>
                            </select>

                            {{-- File --}}
                            <div class="w-fit my-10">
                                <div class="mx-auto items-center bg-white">
                                    <button type="button" class="upload bg-blue-800 text-white flex
                                        rounded-md px-3 py-2 hover:bg-blue-500 border border-gray-400">
                                        Subir Factura
                                        <svg class="w-6 h-6 mx-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="m14.707 4.793-4-4a1 1 0 0 0-1.416 0l-4 4a1 1 0 1 0 1.416 1.414L9 3.914V12.5a1 1 0 0 0 2 0V3.914l2.293 2.293a1 1 0 0 0 1.414-1.414Z"/>
                                            <path d="M18 12h-5v.5a3 3 0 0 1-6 0V12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                                        </svg>
                                    </button>
                                    <input name="invoice" type="file" hidden>
                                </div>
                            </div>

                            <div class="w-fit mt-20">
                                <button id="upload_invoice_btn" type="button" class="flex mx-auto mt-5 bg-blue-600 px-4 py-2
                                    rounded-md text-white cursor-pointer" >Enviar Factura
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </section>
@endsection

@push('child-scripts')
    <script>
        $('.tip').click(function(){
            $('.tip').next().slideUp("slow");

            $(this).next().hasClass('hidden') ?
            $(this).next().slideDown("slow"):
            false;

            $(this).next().hasClass('hidden') ?
            $(this).next().removeClass('hidden'):
            $(this).next().addClass('hidden');
        });

        $('#product_is_new').change(function(){
            this.value == 1?
            $(this).next().slideDown('fast'):
            $(this).next().slideUp('fast');

            this.value == 1?
            true:
            $('#add_insurance').val('2');
        });

        $('#upload_invoice_btn').click(function(){
            let fields = [
                {'name':'order_number','validation':['blank']},
                {'name':'value','validation':['blank']},
                {'name':'tracking','validation':['blank']},
                {'name':'keyword','validation':['blank']},
                {'name':'invoice','validation':['isFile']},
            ]

            let form = '#'+$(this).closest("form").attr('id');
            let validator = Validation(form,fields);
            if(!validator.fail){
                $(form).submit();
            }
        });
    </script>
@endpush