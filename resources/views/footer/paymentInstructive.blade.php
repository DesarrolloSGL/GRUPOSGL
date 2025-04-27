@extends('layouts.app')
@section('content')
    <section class="p-5 md:p-20">

        <h3 class="px-5 text-lg md:text-4xl text-blue-900 text-justify font-bold">Instructivo De Pagos</h3>

        <p class="mx-auto w-fit p-5  md:p-10 text-justify">Estimado Cliente, Sirva encontrar las instrucciones de pago para sus
            servicios. Todos los acreditamientos ACH, Cheque de Caja y Tarjetas se
            aplicará 24hrs después de realizado el pago.
        </p>

        <div class="mx-auto w-fit px-5 md:px-10 md:w-auto">
            <h3 class="">Metodos de pago</h3>
            <ul class="list-disc">
                <li>Depósito bancario directo</li>
                <li>Depósito bancario ACH</li>
                <li>Deposito con cheque de caja</li>
                <li>Deposito en efectivo</li>
                <li>Tarjeta de Crédito</li>
            </ul>
        </div>

        <button class="px-3 py-2 mt-10 rounded-lg bg-blue-700 text-white hover:bg-blue-500 block mx-auto" data-modal-target="PaymentPoliticsModal"  data-modal-toggle="PaymentPoliticsModal">
            POLITICAS DE PAGOS
        </button>
        <h3 class="text-center text-sm mb-5 font-bold">Haz Click Aquí Para Ver Las Políticas de Pago</h3>

        <div class="">
            <div id="accordions" class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-2 xl:max-w-6xl max-w-4xl mx-auto my-8">
            </div>
        </div>

        <div id="modal" class="hidden fixed  top-0 left-0 w-full h-full flex justify-center items-center">
            <div id="modal-content" class="bg-white border-2 border-blue-800 p-8 rounded-lg text-center">
                <p id="carousel-text"></p>
                <div id="carousel" class="relative"></div>
                <button id="closeModal" class="mt-2 bg-blue-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Cerrar
                </button>
            </div>
        </div>

    </section>


    <div id="PaymentPoliticsModal" tabindex="-1" aria-hidden="true" class="fixed hidden top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class=" relative w-full max-w-xl max-h-full mx-auto mt-[8%]">
            <!-- Modal content -->
            <div class="relative bg-white border-2 border-blue-500 rounded-lg ">
                <!-- Modal header -->
                <div class="flex items-start justify-between px-4 py-2 rounded-t">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 ">
                            POLITICAS DE COBRANZA Y PAGOS DE SUS SERVICIOS
                        </h3>
                    </div>
                    <button type="button" class="text-black bg-blue-200 hover:bg-blue-400 hover:text-gray-900 rounded-lg text-sm w-10 h-10 ml-auto inline-flex justify-center items-center " data-modal-hide="PaymentPoliticsModal">
                        <svg class="w-3 h-3 text-blue-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <hr class="border-gray-300 w-11/12 mx-auto">
                <!-- Modal body -->
                <div class="p-6 h-[60vh] overflow-y-auto text-sm text-justify space-y-2">
                    <p>
                        <span class="font-bold mx-1 text-base">a)</span>Todos los servicios prestados por Grupo SGL y sus representadas es un servicio directo el cuál no terceriza o maneja
                        cuentas ajenas con alguno de sus proveedores por lo que sugerimos pueda leer detenidamente las políticas de cobros y
                        modalidades de pagos puestos a su disposición por cada servicio adquirido.
                    </p>
                    <p>
                        <span class="font-bold mx-1 text-base">b)</span> Todos los pagos que realiza son directamente a Grupo SGL y sus empresas representadas.
                    </p>

                    <p>
                        <span class="font-bold mx-1 text-base">c)</span> Para los cobros en moneda local en todo momento se emitirá factura contable por los montos requeridos.
                    </p>

                    <p>
                        <span class="font-bold mx-1 text-base">d)</span> Para los cobros emitidos por concepto de manejo de cuentas con terceros tendrán una recarga adicional del 45% sobre
                        el monto a manejar por Grupo SGL y sus representadas. Los pagos efectuados por concepto de Demoras y Almacenajes
                        serán únicamente pagados de forma directa a Grupo SGL y sus representadas y recibirá factura contable por los montos
                        requeridos.
                    </p>
                    <p class="ml-5">
                        <span class="font-bold mx-1 text-base">d.1)</span> No se permite el pago por los conceptos anteriores a Navieras, terminales Portuarias y predios de almacenaje.
                    </p>

                    <p>
                        <span class="font-bold mx-1 text-base">e)</span> Los cargos de almacenaje fiscal y general son pagos que se efectúan de forma directa a Grupo SGL y sus representadas.
                    </p>

                    <p>
                        <span class="font-bold mx-1 text-base">f)</span> Los días libres por concepto de Demoras y Almacenajes son los anunciados en su notificación de arribo emitida por Grupo
                        SGL y sus representadas estos, podrán variar según el operador.
                    </p>

                    <p>
                        <span class="font-bold mx-1 text-base">g)</span> Todas las cargas movilizadas por Grupo SGL y sus representadas se arriban al país por medio de consignación OOC
                        (Own Operator Consolídate)
                    </p>

                    <p class="ml-5">
                        <span class="font-bold mx-1 text-base">g.1)</span> El cambio de propiedad se realizará por medio de Endoso de mercancías totales o parciales según lo considere el
                            tipo y modalidad de servicio contratado.
                        <br>
                        <span class="font-bold mx-1 text-base">g.2)</span> El cliente será responsable hasta la culminación del servicio de cancelar todos los saldos en su cuenta previo a
                        la devolución de equipo o entrega de mercancías.
                    </p>

                    <p class="my-1">
                        <span class="font-bold mx-1 text-base">h)</span> Si el cliente cuenta con saldos en su Estado de cuenta no podrá retirar sus mercancías u obtener liberación documental
                        y financiera.
                    </p>

                    <p class="my-1">
                        <span class="font-bold mx-1 text-base">i)</span> Los retrasos ocasionados por falta de pago podrán incurrir en más gastos los cuales serán total responsabilidad del
                        consignatario o propietario de carga según lo indique el endoso de mercancías.
                    </p>

                    <p class="my-1">
                        <span class="font-bold mx-1 text-base">j)</span>Si el cliente cuenta con saldo a favor en su Estado de Cuenta podrá solicitar la aplicación de este a sus próximos
                        embarques.
                    </p>

                    <p class="my-1">
                        <span class="font-bold mx-1 text-base">k)</span> Los retrasos causados por entidades ajenas, falta de documentos, licencias y otros a Grupo SGL y sus representadas
                        que causen costos adicionales de Demoras, Almacenajes, Estadías, Bodegaje o cualquier otro será total responsabilidad
                        del cliente consignado o endosado como propietario.
                    </p>

                    <p class="my-1">
                        <span class="font-bold mx-1 text-base">l)</span> Estas políticas aplican para todos los clientes que han aceptado un servicio a Grupo SGL y sus representadas por
                        medio escrito, electrónico y desde que se ha realizado la coordinación del mismo.
                    </p>

                    <img class="absolute bottom-5 right-5 w-[56px] opacity-20" src="{{asset('images/main/logo.png')}}" alt="">
                </div>

            </div>
        </div>
    </div>
@endsection

@push('child-scripts')
    <script>
        var data = [{
                title: "Servicio LCL (Consolidado Marítimo)",
                content: "En esta cuenta podrá depositar los servicios de fletamento, GRI, Port Congestions, Seasonal Charges y gastos de origen únicamente.",
                image: "{{ asset('images/payment/icon1.png') }}",
                accounts: [1,2]
            },
            {
                title: "Gastos Locales (Aduana, Manejos, Tramites, cuenta de terceros)",
                content: "",
                image: "{{ asset('images/payment/icon1.png') }}",
                accounts: [3]
            },
            {
                title: "Servicio FCL (Full container Load)",
                content: "En esta cuenta podrá depositar los servicios de fletamento, GRI, Port Congestions, Seasonal Charges, gastos de origen.",
                image: "{{ asset('images/payment/icon2.png') }}",
                accounts: [1,2]
            },
            {
                title: "Demoras (Full container Load)",
                content: "En esta cuenta podrá depositar los gastos de demoras navieras, le recordamos que no se pueden hacer pagos directos a Navieras.",
                image: "{{ asset('images/payment/icon1.png') }}",
                accounts: [1,2]
            },
            {
                title: "Almacenajes (Generales & Fiscales)",
                content: "Le recordamos que su Estado de Cuenta puede cambiar todos los días después de las 14hrs si su carga no fue retirada por lo que solicitamos pueda consultar con su asesor previo a intentar el retiro de las mercancías.",
                image: "{{ asset('images/payment/icon1.png') }}",
                accounts: [3]
            },
            {
                title: "Servicios Aéreos (Carga General Fletes)",
                content: "",
                image: "{{ asset('images/payment/icon3.png') }}",
                accounts: [1, 2]
            },
            {
                title: "Servicios Aéreos (Carga General Gastos Locales)",
                content: "En esta cuenta podrá depositar todos los gastos referentes a Almacenaje Combex, Manejo, Tramites Aduanales y cuenta de terceros.",
                image: "{{ asset('images/payment/icon3.png') }}",
                accounts: [3]
            },
            {
                title: "Servicios Courier Nacional",
                content: "En esta cuenta podrá depositar todos los gastos referentes a traslados de paquetería nacional únicamente.",
                image: "{{ asset('images/payment/icon5.png') }}",
                accounts: [3]
            },
            {
                title: "Servicios Transporte Terrestre (nacional e internacional)",
                content: "En esta cuenta podrá depositar todos los gastos referentes a traslados de carga por la vía terrestre, estadías de piloto y equipo, cuentas de terceros. Para los fletes nacionales deberá de cancelar en moneda Quetzales y para los fletes en Centroamérica y México deberá de cancelar en moneda USD.",
                image: "{{ asset('images/payment/icon2.png') }}",
                accounts: [1, 2, 3]
            },
            {
                title: "Servicios Courier Miami & China",
                content: "",
                image: "{{ asset('images/payment/icon4.png') }}",
                accounts: [3]
            }
        ];

        var accounts = [{
                bank: "Promerica Monetaria",
                name: "Grupo SGL International, S.A",
                currency: "(Q) QUETZAL",
                number: "1-2335070020256",
                icon: ""
            },
            {
                bank: "Promerica Monetaria",
                name: "Grupo SGL International, S.A",
                currency: "($) US DOLLAR",
                number: "2-2331530060568",
                icon: ""
            },
            {
                bank: "Banrural Monetaria",
                name: "Grupo SGL International, S.A",
                currency: "(Q) QUETZAL",
                number: "3723034119",
                icon: ""
            },
        ];

        $(document).ready(function() {
            fillAccordions();
            $('button').on('click', function() {
                if(!isNaN(this.id)){
                    fillCarousel(this.id);
                }
            });
            $('.modal').click(openModal);
            $('#closeModal').click(closeModal);
            $(document).mouseup(function(e){
                if ($('#modal').is(e.target)) {
                    $('#modal').addClass("hidden");
                }
            })
        });

        function fillAccordions() {
            let index = 0;
            data.forEach(dat => {
                index += 1;
                let html =
                    `<div class="border-2 mx-auto border-text-black rounded-lg p-8 w-11/12 max-w-6xl space-y-5">
                        <h4 class="text-base">` + dat.title + `</h4>
                        <h4 class="text-sm text-justify">` + dat.content + `</h4>
                        <button id="` + index + `" class="modal bg-blue-800 text-white px-3 py-2 rounded-lg">Detalle</button>
                    </div>`;

                $('#accordions').append(html);
            });
        }

        function fillCarousel(id) {
            $('#carousel').empty();

            data[id - 1].accounts.forEach(function(account) {
                account -= 1;
                let html =
                    `<div>
                        <h3 class="font-bold">Banco: ` + accounts[account].bank + `</h3>
                        <h3 class="">Moneda: ` + accounts[account].currency + `</h3>
                        <h3 class="text-xs sm:text-base">Numero de cuenta: ` + accounts[account].number + `</h3>
                        <br>
                    </div>`;
                $('#carousel').append(html);
            });
        }
        function openModal() {
            $('#modal').removeClass('hidden');
        }
        function closeModal() {
            $('#modal').addClass('hidden');
        }
    </script>
@endpush