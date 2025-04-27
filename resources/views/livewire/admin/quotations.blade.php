<section class="min-h-screen w-full"
    x-data="{section:2,section_visible:0,navbar_level_1_selector:2,navbar_level_2_selector:3,navbar_level_3_selector:1, row_show:0,feeDetailModal:false,accesorialDetailModal:false}"
    x-resize.document="$width > 1280 ? section_visible='open':false">
    <h3 class="text-4xl py-5 px-5 text-center font-bold tracking-wide">Cotizaciones</h3>

    <div class="p-2 w-full">
        {{-- SUPERIOR NAVBAR --}}
        <section>
            <section class="bg-white w-full rounded-2xl my-3 h-14 flex items-center">
                <div class="mx-2">
                    <input type="text" class="border-gray-300  rounded-2xl bg-white">
                </div>

                <div x-cloak class="mx-1 ml-auto block" x-show="[2].includes(section)">
                    <button class="bg-orange-500 rounded-2xl px-3 py-2 flex items-center text-white space-x-2 hover:bg-orange-400"
                    x-on:click="section = 1">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm16 7H4v7h16v-7ZM5 8a1 1 0 0 1 1-1h.01a1 1 0 0 1 0 2H6a1 1 0 0 1-1-1Zm4-1a1 1 0 0 0 0 2h.01a1 1 0 0 0 0-2H9Zm2 1a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2H12a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                        </svg>
                        <span class="hidden lg:block">Dashboard</span>
                    </button>
                </div>
            </section>
        </section>
        {{-- END SUPERIOR NAVBAR --}}

        {{-- QUOTATIONS --}}
        <div class="flex w-full" x-show="[1].includes(navbar_level_3_selector)"
            x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0">

            {{-- QUOTATIONS TABLE --}}
            <section x-cloak class="bg-white min-w-[300px] w-full h-fit my-2 rounded-2xl py-4 px-1 lg:px-4" x-show="[1].includes(section)"
                x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0">
                @if(!($agent->isMobile()))
                    <table class="table-auto rounded-lg w-full hidden xl:inline-table">
                        <thead>
                            <tr class="text-sm bg-indigo-50">
                                <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                    <div class="w-fit mx-auto flex items-center font-bold">
                                        <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                        <h3>Service</h3>
                                    </div>
                                </th>
                                <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                    <div class="w-fit mx-auto flex items-center font-bold">
                                        <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                        <h3>Origin</h3>
                                    </div>
                                </th>
                                <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                    <div class="w-fit mx-auto flex items-center font-bold">
                                        <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                        <h3>Destination</h3>
                                    </div>
                                </th>
                                <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                    <div class="w-fit mx-auto flex items-center font-bold">
                                        <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                        <h3>No.</h3>
                                    </div>
                                </th>
                                <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                    <div class="w-fit mx-auto flex items-center font-bold">
                                        <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                        <h3>Tracking</h3>
                                    </div>
                                </th>
                                <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                    <div class="w-fit mx-auto flex items-center font-bold">
                                        <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                        <h3>Date</h3>
                                    </div>
                                </th>
                                <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                    <div class="w-fit mx-auto flex items-center font-bold">
                                        <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                        <h3>Buy</h3>
                                    </div>
                                </th>
                                <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                    <div class="w-fit mx-auto flex items-center font-bold">
                                        <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                        <h3>Payment</h3>
                                    </div>
                                </th>
                                <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                    <div class="w-fit mx-auto flex items-center font-bold">
                                        <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                        <h3>Client</h3>
                                    </div>
                                </th>
                                <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                    <div class="w-fit mx-auto flex items-center font-bold">
                                        <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                        <h3>T/T</h3>
                                    </div>
                                </th>
                                <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                    <div class="w-fit mx-auto flex items-center font-bold">
                                        <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                        <h3>Status</h3>
                                    </div>
                                </th>
                                <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                    <div class="w-fit mx-auto flex items-center font-bold">
                                        <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                        <h3>Detail</h3>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i < 10; $i++)
                            <tr class="cursor-pointer hover:bg-blue-100">
                                <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                    Miami P.O.Box
                                </td>
                                <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                    Miami
                                </td>
                                <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                    Guatemala
                                </td>
                                <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                    SGL_134523324
                                </td>
                                <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                    SGLMIA_48932423
                                </td>
                                <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                    9/2/24
                                </td>
                                <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                    Realizada
                                </td>
                                <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                    Pendiente
                                </td>
                                <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                    <h4>Nombre Cliente</h4>
                                    <h4 class=" font-bold text-2xs">GUA_854257233760849</h4>
                                </td>
                                <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                    15d
                                </td>
                                <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                    Enviada
                                </td>
                                <td x-on:click="section = 2" class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                    <div class="text-sm truncate text-ellipsis mx-auto w-fit">
                                        <svg class="w-8 h-8 mx-auto rounded-full p-2 text-white bg-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm.5 5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Zm0 5c.47 0 .917-.092 1.326-.26l1.967 1.967a1 1 0 0 0 1.414-1.414l-1.817-1.818A3.5 3.5 0 1 0 11.5 17Z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                @endif

                @if($agent->isMobile())
                    @for ($i = 1; $i < 10; $i++)
                    <section class="border-t border min-w-[300px] max-w-5xl xl:hidden">
                        <div class="flex items-center justify-evenly my-5">
                            <div>
                                <h3 class="text-2xs w-[55px] truncate text-ellipsis font-bold sm:w-[100px]">China</h3>
                                <h3 class="text-sm w-[55px] truncate text-ellipsis sm:w-[100px]">Ningbo</h3>
                            </div>
                            <svg class="w-5 h-5 text-black mt-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                            </svg>
                            <div>
                                <h3 class="text-2xs w-[55px] truncate text-ellipsis font-bold sm:w-[100px]">Guatemala</h3>
                                <h3 class="text-sm w-[180px] truncate text-ellipsis sm:w-[500px]">Puerto Quetzal</h3>
                            </div>

                            <svg class="w-8 h-8 rounded-full p-2 text-white bg-indigo-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                            :class="row_show != {{$i}}? 'block':'hidden'"
                            x-on:click="row_show = {{$i}}">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                            </svg>

                            <svg class="w-8 h-8 rounded-full p-2 text-white bg-indigo-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                            :class="row_show == {{$i}}? 'block':'hidden'"
                            x-on:click="row_show = 0">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                            </svg>
                        </div>
                        <div class="transition-all delay-100 ease-in-out overflow-hidden"
                        :class="row_show == {{$i}}? 'h-72':'h-0'">
                            <div class="flex items-center justify-evenly my-5">
                                <h3 class="text-sm w-[55px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">20STD</h3>
                                <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">$600.00</h3>
                                <div class="w-8"></div>
                            </div>
                            <div class="flex items-center justify-evenly my-5">
                                <h3 class="text-sm w-[55px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">40HC</h3>
                                <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">$600.00</h3>
                                <div class="w-8"></div>
                            </div>
                            <div class="flex items-center justify-evenly my-5">
                                <h3 class="text-sm w-[55px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">40NOR</h3>
                                <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">$6,450.00</h3>
                                <div class="w-8"></div>
                            </div>
                            <div class="flex items-center justify-evenly my-5">
                                <h3 class="text-sm w-[55px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">T/T</h3>
                                <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">30</h3>
                                <div class="w-8"></div>
                            </div>
                            <div class="flex items-center justify-evenly my-5">
                                <h3 class="text-sm w-[55px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">Route</h3>
                                <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">Direct</h3>
                                <div class="w-8"></div>
                            </div>
                            <div x-on:click="section = 2" class="flex items-center justify-evenly my-5">
                                <h3 class="text-sm w-[55px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">Detalle</h3>
                                <div class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">
                                    <svg class="w-8 h-8 rounded-full p-2 text-white bg-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm.5 5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Zm0 5c.47 0 .917-.092 1.326-.26l1.967 1.967a1 1 0 0 0 1.414-1.414l-1.817-1.818A3.5 3.5 0 1 0 11.5 17Z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="w-8"></div>
                            </div>
                        </div>
                    </section>
                    @endfor
                @endif
            </section>
            {{-- END QUOTATIONS TABLE --}}

            {{-- QUOTATION SUMMARY   --}}
            {{-- Datos Paquetes, sí la propiedad existe se coloca, si la propiedad no existe no se coloca (propiedad:precio,tamaño,tipo--}}
            <section x-cloak class="xl:bg-white min-w-[300px] w-full h-fit my-2 rounded-2xl py-4 px-1 lg:px-4" x-show="[2].includes(section)"
                x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0">
                <h3 class="px-2 font-bold">No.SGL_234234234</h3>
                <div class="grid gap-1 grid-cols-1 xl:grid-cols-2">
                    <section class="w-full border rounded-2xl border-gray-200 xl:rounded-none">
                        <div class="bg-white w-full h-10 border-b border-gray-200 flex xl:hidden"
                        :class="section_visible == 1 || section_visible == 'open'? 'rounded-t-2xl':'rounded-2xl'">
                            <svg class="w-6 h-6 text-slate-700 my-auto ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"/>
                            </svg>
                            <h3 class="my-auto mr-auto ml-2 w-fit font-bold">Información General</h3>
                            <svg class="w-6 h-6 text-gray-800 my-auto ml-auto mr-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                            :class="section_visible == 1 || section_visible == 'open'? 'block':'hidden'"
                            x-on:click="section_visible = 0">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                            </svg>

                            <svg class="w-6 h-6 text-gray-800 my-auto ml-auto mr-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                            :class="section_visible == 1 || section_visible == 'open'? 'hidden':'block'"
                            x-on:click="section_visible = 1">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                            </svg>
                        </div>

                        <section x-cloak class="bg-white text-gray-800 text-sm transition-all delay-100 ease-in-out space-y-2 overflow-auto xl:space-y-3"
                        :class="section_visible == 1 || section_visible == 'open'? 'h-96 p-5':'h-0 p-0'">
                            <div class="font-bold text-lg text-gray-700 hidden xl:flex xl:items-center xl:space-x-1">
                                <svg class="w-6 h-6 text-gray-800 my-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                <h3>Información General</h3>
                            </div>
                            <div><span class="font-bold">No.Cotización: </span><span>SGL_234234234</span></div>
                            <div><span class="font-bold">No.Tracking: </span><span>SGL_3914234234234</span></div>
                            <div><span class="font-bold">Tracking Status: </span><span>En Bodega de Miami</span><a class="underline px-2 mx-2" href="#">Ver</a></div>
                            <div><span class="font-bold">Servicio: </span><span>Miami P.O.Box</span></div>
                            <div><span class="font-bold">Fecha: </span><span>12/12/24</span></div>
                            <div><span class="font-bold">Total: </span><span>Q.120.00</span></div>
                            <div><span class="font-bold">Nombre Cliente: </span><span>Nombre Apellido Cliente</span></div>
                            <div><span class="font-bold">No.Casillero: </span><span>GTM743168247728588</span></div>
                            <div><span class="font-bold">Pago Status: </span><span class="text-red-400 font-bold">Pendiente</span></div>
                        </section>
                    </section>

                    <section class="w-full border rounded-2xl border-gray-200 xl:rounded-none">
                        <div class="bg-white w-full h-10 border-b border-gray-200 flex xl:hidden"
                        :class="section_visible == 2 || section_visible == 'open'? 'rounded-t-2xl':'rounded-2xl'">
                            <svg class="w-6 h-6 text-amber-500 my-auto ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 1 0 0 4h16a2 2 0 1 0 0-4H4Zm0 6h16v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-8Zm10.707 5.707a1 1 0 0 0-1.414-1.414l-.293.293V12a1 1 0 1 0-2 0v2.586l-.293-.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l2-2Z" clip-rule="evenodd"/>
                            </svg>

                            <h3 class="my-auto mr-auto ml-2 w-fit font-bold">Datos Recolección</h3>
                            <svg class="w-6 h-6 text-gray-800 my-auto ml-auto mr-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                            :class="section_visible == 2 || section_visible == 'open'? 'block':'hidden'"
                            x-on:click="section_visible = 0">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                            </svg>

                            <svg class="w-6 h-6 text-gray-800 my-auto ml-auto mr-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                            :class="section_visible == 2 || section_visible == 'open'? 'hidden':'block'"
                            x-on:click="section_visible = 2">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                            </svg>
                        </div>

                        <section x-cloak class="bg-white text-gray-800 text-sm transition-all delay-100 ease-in-out space-y-2 overflow-auto xl:space-y-3"
                        :class="section_visible == 2 || section_visible == 'open'? 'h-96 p-5':'h-0 p-0'">
                            <div class="font-bold text-lg text-gray-700 hidden xl:flex xl:items-center xl:space-x-1">
                                <svg class="w-6 h-6 text-amber-500 my-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 1 0 0 4h16a2 2 0 1 0 0-4H4Zm0 6h16v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-8Zm10.707 5.707a1 1 0 0 0-1.414-1.414l-.293.293V12a1 1 0 1 0-2 0v2.586l-.293-.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l2-2Z" clip-rule="evenodd"/>
                                </svg>
                                <h3>Datos Recolección</h3>
                            </div>
                            <div><span class="font-bold">Nombre: </span><span>Nombre Apellido Cliente</span></div>
                            <div><span class="font-bold">Dirección: </span><span>9 calle 12-23 zona 3 de Guatemala</span></div>
                            <div><span class="font-bold">Teléfono: </span><span>1254-7898</span></div>
                            <div><span class="font-bold">Correo: </span><span>correo@gmail.com</span></div>
                            <div><span class="font-bold">DPI: </span><span>1234567891011</span></div>
                        </section>
                    </section>

                    <section class="w-full border rounded-2xl border-gray-200 xl:rounded-none">
                        <div class="bg-white w-full h-10 border-b border-gray-200 flex xl:hidden"
                        :class="section_visible == 3 || section_visible == 'open'? 'rounded-t-2xl':'rounded-2xl'">
                            <svg class="w-6 h-6 text-sky-800 my-auto ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 0 0-2 2v9a1 1 0 0 0 1 1h.535a3.5 3.5 0 1 0 6.93 0h3.07a3.5 3.5 0 1 0 6.93 0H21a1 1 0 0 0 1-1v-4a.999.999 0 0 0-.106-.447l-2-4A1 1 0 0 0 19 6h-5a2 2 0 0 0-2-2H4Zm14.192 11.59.016.02a1.5 1.5 0 1 1-.016-.021Zm-10 0 .016.02a1.5 1.5 0 1 1-.016-.021Zm5.806-5.572v-2.02h4.396l1 2.02h-5.396Z" clip-rule="evenodd"/>
                            </svg>

                            <h3 class="my-auto mr-auto ml-2 w-fit font-bold">Datos Entrega</h3>
                            <svg class="w-6 h-6 text-gray-800 my-auto ml-auto mr-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                            :class="section_visible == 3 || section_visible == 'open'? 'block':'hidden'"
                            x-on:click="section_visible = 0">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                            </svg>

                            <svg class="w-6 h-6 text-gray-800 my-auto ml-auto mr-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                            :class="section_visible == 3 || section_visible == 'open'? 'hidden':'block'"
                            x-on:click="section_visible = 3">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                            </svg>
                        </div>

                        <section x-cloak class="bg-white text-gray-800 text-sm transition-all delay-100 ease-in-out space-y-2 overflow-auto xl:space-y-3"
                        :class="section_visible == 3 || section_visible == 'open'? 'h-96 p-5':'h-0 p-0'">
                            <div class="font-bold text-lg text-gray-700 hidden xl:flex xl:items-center xl:space-x-1">
                                <svg class="w-6 h-6 text-sky-800 my-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 0 0-2 2v9a1 1 0 0 0 1 1h.535a3.5 3.5 0 1 0 6.93 0h3.07a3.5 3.5 0 1 0 6.93 0H21a1 1 0 0 0 1-1v-4a.999.999 0 0 0-.106-.447l-2-4A1 1 0 0 0 19 6h-5a2 2 0 0 0-2-2H4Zm14.192 11.59.016.02a1.5 1.5 0 1 1-.016-.021Zm-10 0 .016.02a1.5 1.5 0 1 1-.016-.021Zm5.806-5.572v-2.02h4.396l1 2.02h-5.396Z" clip-rule="evenodd"/>
                                </svg>
                                <h3>Datos Entrega</h3>
                            </div>
                            <div><span class="font-bold">Nombre: </span><span>Nombre Apellido Cliente</span></div>
                            <div><span class="font-bold">Dirección: </span><span>9 calle 12-23 zona 3 de Guatemala</span></div>
                            <div><span class="font-bold">Teléfono: </span><span>1254-7898</span></div>
                            <div><span class="font-bold">Correo: </span><span>correo@gmail.com</span></div>
                            <div><span class="font-bold">DPI: </span><span>1234567891011</span></div>
                        </section>
                    </section>

                    <section class="w-full border rounded-2xl border-gray-200 xl:rounded-none">
                        <div class="bg-white w-full h-10 border-b border-gray-200 flex xl:hidden"
                        :class="section_visible == 4 || section_visible == 'open'? 'rounded-t-2xl':'rounded-2xl'">
                            <svg class="w-6 h-6 text-blue-700 my-auto ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M20 10H4v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8ZM9 13v-1h6v1a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                                <path d="M2 6a2 2 0 0 1 2-2h16a2 2 0 1 1 0 4H4a2 2 0 0 1-2-2Z"/>
                            </svg>

                            <h3 class="my-auto mr-auto ml-2 w-fit font-bold">Datos Paquete</h3>
                            <svg class="w-6 h-6 text-gray-800 my-auto ml-auto mr-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                            :class="section_visible == 4 || section_visible == 'open'? 'block':'hidden'"
                            x-on:click="section_visible = 0">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                            </svg>

                            <svg class="w-6 h-6 text-gray-800 my-auto ml-auto mr-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                            :class="section_visible == 4 || section_visible == 'open'? 'hidden':'block'"
                            x-on:click="section_visible = 4">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                            </svg>
                        </div>

                        <section x-cloak class="bg-white text-gray-800 text-sm  transition-all delay-100 ease-in-out space-y-2 overflow-auto xl:space-y-3"
                        :class="section_visible == 4 || section_visible == 'open'? 'h-96 py-5 px-1':'h-0 p-0'">
                            <div class="font-bold px-4 text-lg text-gray-700 hidden xl:flex xl:items-center xl:space-x-1">
                                <svg class="w-6 h-6 text-blue-700 my-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M20 10H4v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8ZM9 13v-1h6v1a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                                    <path d="M2 6a2 2 0 0 1 2-2h16a2 2 0 1 1 0 4H4a2 2 0 0 1-2-2Z"/>
                                </svg>
                                <h3>Datos Paquete</h3>
                            </div>
                            <table class="table-auto rounded-lg w-full">
                                <thead>
                                    <tr class="text-sm bg-slate-200">
                                        <th class="py-1 cursor-pointer">
                                            <div class="w-fit mx-auto flex items-center font-bold">
                                                <h3>No.</h3>
                                            </div>
                                        </th>
                                        <th class="py-1 cursor-pointer">
                                            <div class="w-fit mx-auto flex items-center font-bold">
                                                <h3>Precio</h3>
                                            </div>
                                        </th>
                                        <th class="py-1 cursor-pointer">
                                            <div class="w-fit mx-auto flex items-center font-bold">
                                                <h3>Peso</h3>
                                            </div>
                                        </th>
                                        <th class="py-1 cursor-pointer">
                                            <div class="w-fit mx-auto flex items-center font-bold">
                                                <h3>Unidades</h3>
                                            </div>
                                        </th>
                                        <th class="py-1 cursor-pointer">
                                            <div class="w-fit mx-auto flex items-center font-bold">
                                                <h3>Shipping</h3>
                                            </div>
                                        </th>
                                        <th class="py-1 cursor-pointer">
                                            <div class="w-fit mx-auto flex items-center font-bold">
                                                <h3>DAI</h3>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < 5; $i++)
                                        <tr class="">
                                            <td class="border py-2 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                                {{$i}}
                                            </td>
                                            <td class="border py-2 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                                $1,000.00
                                            </td>
                                            <td class="border py-2 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                                10 lb
                                            </td>
                                            <td class="border py-2 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                                2
                                            </td>
                                            <td class="border py-2 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                                $10.00
                                            </td>
                                            <td class="border py-2 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                                15% Ropa
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </section>
                    </section>

                    <section class="w-full border rounded-2xl border-gray-200 xl:rounded-none">
                        <div class="bg-white w-full h-10 border-b border-gray-200 flex xl:hidden"
                        :class="section_visible == 5 || section_visible == 'open'? 'rounded-t-2xl':'rounded-2xl'">
                            <svg class="w-6 h-6 text-yellow-500 my-auto ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M6 5a2 2 0 0 1 2-2h4.157a2 2 0 0 1 1.656.879L15.249 6H19a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2v-5a3 3 0 0 0-3-3h-3.22l-1.14-1.682A3 3 0 0 0 9.157 6H6V5Z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M3 9a2 2 0 0 1 2-2h4.157a2 2 0 0 1 1.656.879L12.249 10H3V9Zm0 3v7a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2v-7H3Z" clip-rule="evenodd"/>
                            </svg>

                            <h3 class="my-auto mr-auto ml-2 w-fit font-bold">Documentos</h3>
                            <svg class="w-6 h-6 text-gray-800 my-auto ml-auto mr-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                            :class="section_visible == 5 || section_visible == 'open'? 'block':'hidden'"
                            x-on:click="section_visible = 0">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                            </svg>

                            <svg class="w-6 h-6 text-gray-800 my-auto ml-auto mr-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                            :class="section_visible == 5 || section_visible == 'open'? 'hidden':'block'"
                            x-on:click="section_visible = 5">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                            </svg>
                        </div>

                        <section x-cloak class="bg-white text-gray-800 text-sm transition-all delay-100 ease-in-out space-y-2 overflow-auto xl:space-y-3"
                        :class="section_visible == 5 || section_visible == 'open'? 'h-96 py-5 px-1':'h-0 p-0'">
                            <div class="font-bold px-4 text-lg text-gray-700 hidden xl:flex xl:items-center xl:space-x-1">
                                <svg class="w-6 h-6 text-yellow-500 my-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M6 5a2 2 0 0 1 2-2h4.157a2 2 0 0 1 1.656.879L15.249 6H19a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2v-5a3 3 0 0 0-3-3h-3.22l-1.14-1.682A3 3 0 0 0 9.157 6H6V5Z" clip-rule="evenodd"/>
                                    <path fill-rule="evenodd" d="M3 9a2 2 0 0 1 2-2h4.157a2 2 0 0 1 1.656.879L12.249 10H3V9Zm0 3v7a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2v-7H3Z" clip-rule="evenodd"/>
                                </svg>
                                <h3>Documentos</h3>
                            </div>
                            <table class="table-auto rounded-lg w-full">
                                <thead>
                                    <tr class="text-sm bg-slate-200">
                                        <th class="py-1 cursor-pointer">
                                            <div class="w-fit mx-auto flex items-center font-bold">
                                                <h3>No.</h3>
                                            </div>
                                        </th>
                                        <th class="py-1 cursor-pointer">
                                            <div class="w-fit mx-auto flex items-center font-bold">
                                                <h3>Documentos</h3>
                                            </div>
                                        </th>
                                        <th class="py-1 cursor-pointer">
                                            <div class="w-fit mx-auto flex items-center font-bold">
                                                <h3>Accion</h3>
                                            </div>
                                        </th>
                                        <th class="py-1 cursor-pointer">
                                            <div class="w-fit mx-auto flex items-center font-bold">
                                                <h3></h3>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < 5; $i++)
                                        <tr class="">
                                            <td class="border py-2 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                                {{$i}}
                                            </td>
                                            <td class="border py-2 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                                Factura Paquete #1
                                            </td>
                                            <td class="border py-2 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                                <select><option value="">-</option><option value="">Correcto</option><option value="">Incorrecto</option></select>
                                            </td>
                                            <td class="border py-2 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                                <a href="#" class="underline px-2">Ver</a>
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                            <div class="px-2">
                                <span class="text-xs font-bold">Sí hay mas de una factura por paquete, ambas deben incluirse en una misma imagen o archivo PDF, tienes dudas has</span>
                                <span><a href="#" class="underline px-3">click aquí</a></span>
                            </div>
                        </section>
                    </section>

                    <section class="w-full border rounded-2xl border-gray-200 xl:rounded-none">
                        <div class="bg-white w-full h-10 border-b border-gray-200 flex xl:hidden"
                        :class="section_visible == 6 || section_visible == 'open'? 'rounded-t-2xl':'rounded-2xl'">
                            <svg class="w-6 h-6 text-indigo-600 my-auto ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm2-2a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2h-3Zm0 3a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2h-3Zm-6 4a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-6Zm8 1v1h-2v-1h2Zm0 3h-2v1h2v-1Zm-4-3v1H9v-1h2Zm0 3H9v1h2v-1Z" clip-rule="evenodd"/>
                            </svg>

                            <h3 class="my-auto mr-auto ml-2 w-fit font-bold">Datos Facturación y Pago</h3>
                            <svg class="w-6 h-6 text-gray-800 my-auto ml-auto mr-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                            :class="section_visible == 6 || section_visible == 'open'? 'block':'hidden'"
                            x-on:click="section_visible = 0">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                            </svg>

                            <svg class="w-6 h-6 text-gray-800 my-auto ml-auto mr-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                            :class="section_visible == 6 || section_visible == 'open'? 'hidden':'block'"
                            x-on:click="section_visible = 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                            </svg>
                        </div>

                        <section x-cloak class="bg-white text-gray-800 text-sm transition-all delay-100 ease-in-out space-y-2 overflow-auto xl:space-y-3"
                        :class="section_visible == 6 || section_visible == 'open'? 'h-96 p-5':'h-0 p-0'">
                            <div class="font-bold text-lg text-gray-700 hidden xl:flex xl:items-center xl:space-x-1">
                                <svg class="w-6 h-6 text-indigo-600 my-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm2-2a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2h-3Zm0 3a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2h-3Zm-6 4a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-6Zm8 1v1h-2v-1h2Zm0 3h-2v1h2v-1Zm-4-3v1H9v-1h2Zm0 3H9v1h2v-1Z" clip-rule="evenodd"/>
                                </svg>
                                <h3>Datos Facturación y Pago</h3>
                            </div>
                            <div><span class="font-bold">Nombre: </span><span>Nombre Apellido Cliente</span></div>
                            <div><span class="font-bold">Nit: </span><span>45878965</span></div>
                            <div><span class="font-bold">Dirección: </span><span>9 calle 12-23 zona 3 de Guatemala</span></div>
                            <div><span class="font-bold">Orden de Servicio: </span><span><a href="#" class="underline px-3">Ver</a></span></div>
                            <br>
                            <div><span class="font-bold">Total de esta Orden: </span><span>Q.120.00</span></div>
                            <div><span class="font-bold">Método de Pago: </span><span>Tarjeta de Crédito</span></div>
                            <div><span class="font-bold">Estado del Pago: </span><span>Completado</span></div>
                            <div><span class="font-bold">Comprobante de Pago: </span><span><a href="#" class="underline px-3">Ver</a></span></div>
                        </section>
                    </section>

                    <section class="w-full border rounded-2xl border-gray-200 xl:rounded-none">
                        <div class="bg-white w-full h-10 border-b border-gray-200 flex xl:hidden"
                        :class="section_visible == 7 || section_visible == 'open'? 'rounded-t-2xl':'rounded-2xl'">
                            <svg class="w-6 h-6 text-teal-600 my-auto ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z" clip-rule="evenodd"/>
                            </svg>

                            <h3 class="my-auto mr-auto ml-2 w-fit font-bold">Comentarios</h3>
                            <svg class="w-6 h-6 text-gray-800 my-auto ml-auto mr-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                            :class="section_visible == 7 || section_visible == 'open'? 'block':'hidden'"
                            x-on:click="section_visible = 0">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                            </svg>

                            <svg class="w-6 h-6 text-gray-800 my-auto ml-auto mr-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                            :class="section_visible == 7 || section_visible == 'open'? 'hidden':'block'"
                            x-on:click="section_visible = 7">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                            </svg>
                        </div>

                        <section x-cloak class="bg-white text-gray-800 text-sm transition-all delay-100 ease-in-out space-y-2 overflow-auto xl:space-y-3"
                        :class="section_visible == 7 || section_visible == 'open'? 'h-96 p-5':'h-0 p-0'">
                            <div class="font-bold text-lg text-gray-700 hidden xl:flex xl:items-center xl:space-x-1">
                                <svg class="w-6 h-6 text-teal-600 my-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z" clip-rule="evenodd"/>
                                </svg>
                                <h3>Comentarios</h3>
                            </div>
                            <div>
                                <textarea cols="30" rows="3" class="rounded-sm w-full"></textarea>
                                <button class="bg-indigo-700 text-white rounded-2xl px-3 py-2 block ml-auto">Comentar</button>
                            </div>

                            <div class="my-1"><span class="text-xs font-bold">12/12/24 5:18PM</span> <span class="font-bold">Rolando Bautista: </span><span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia non quae quibusdam sint odit corporis porro cumque ipsum totam, repudiandae incidunt, laudantium saepe unde pariatur maiores reprehenderit impedit tenetur. Unde.</span></div>
                            <div class="my-1"><span class="text-xs font-bold">12/12/24 5:18PM</span> <span class="font-bold">María Guzman: </span><span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia non quae quibusdam sint odit corporis porro cumque ipsum totam.</span></div>
                            <div class="my-1"><span class="text-xs font-bold">12/12/24 5:18PM</span> <span class="font-bold">Heidy Serrano: </span><span>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</span></div>


                        </section>
                    </section>

                    <section class="w-full border rounded-2xl border-gray-200 xl:rounded-none">
                        <div class="bg-white w-full h-10 border-b border-gray-200 flex xl:hidden"
                        :class="section_visible == 8 || section_visible == 'open'? 'rounded-t-2xl':'rounded-2xl'">
                            <svg class="w-6 h-6 text-lime-500 my-auto ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15v4m6-6v6m6-4v4m6-6v6M3 11l6-5 6 5 5.5-5.5"/>
                            </svg>

                            <h3 class="my-auto mr-auto ml-2 w-fit font-bold">Progreso</h3>
                            <svg class="w-6 h-6 text-gray-800 my-auto ml-auto mr-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                            :class="section_visible == 8 || section_visible == 'open'? 'block':'hidden'"
                            x-on:click="section_visible = 0">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                            </svg>

                            <svg class="w-6 h-6 text-gray-800 my-auto ml-auto mr-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                            :class="section_visible == 8 || section_visible == 'open'? 'hidden':'block'"
                            x-on:click="section_visible = 8">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                            </svg>
                        </div>

                        <section x-cloak class="bg-white text-gray-800 text-sm transition-all delay-100 ease-in-out space-y-5 overflow-auto xl:space-y-10"
                        :class="section_visible == 8 || section_visible == 'open'? 'h-96 p-5':'h-0 p-0'">
                            <div class="font-bold text-lg text-gray-700 hidden xl:flex xl:items-center xl:space-x-1">
                                <svg class="w-6 h-6 text-lime-500 my-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15v4m6-6v6m6-4v4m6-6v6M3 11l6-5 6 5 5.5-5.5"/>
                                </svg>
                                <h3>Progreso</h3>
                            </div>
                            <div class="my-28 h-5 w-full relative">
                                <div class="bg-white absolute border my-auto h-5 w-full rounded-2xl"></div>
                                <div class="bg-sky-500 absolute my-auto h-5 w-[50%] rounded-2xl"></div>
                            </div>
                            <div>
                                <h3 class="text-xs font-bold text-lime-500">Envío de Cotización(completado)</h3>
                                <h3 class="text-xs font-bold text-lime-500">Carga de Archivos(completado)</h3>
                                <h3 class="text-xs font-bold text-red-500">Pago(pendiente)</h3>
                                <h3 class="text-xs font-bold text-red-500">Entrega(pendiente)</h3>
                            </div>
                            <div>
                                <select class="px-2 py-1 text-center rounded-2xl"><option value="">Motivo de Anulación</option><option value="">Asesor Cancela</option><option value="">Cliente Cancela</option><option value="">Producto Agotado</option></select>
                                <button class="bg-red-600 text-red-200 rounded-2xl px-2 py-1 block my-2">Cancelar Orden</button>
                                <h3 class="text-2xs">Se envíara un correo al cliente con el motivo de la cancelación</h3>
                            </div>
                        </section>
                    </section>

                    <section class="w-full border rounded-2xl border-gray-200 xl:rounded-none">
                        <div class="bg-white w-full h-10 border-b border-gray-200 flex xl:hidden"
                        :class="section_visible == 9 || section_visible == 'open'? 'rounded-t-2xl':'rounded-2xl'">
                            <svg class="w-6 h-6 text-green-500 my-auto ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 0 0-1 1H6a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-2a1 1 0 0 0-1-1H9Zm1 2h4v2h1a1 1 0 1 1 0 2H9a1 1 0 0 1 0-2h1V4Zm5.707 8.707a1 1 0 0 0-1.414-1.414L11 14.586l-1.293-1.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                            </svg>

                            <h3 class="my-auto mr-auto ml-2 w-fit font-bold">Estado de Cotización</h3>
                            <svg class="w-6 h-6 text-gray-800 my-auto ml-auto mr-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                            :class="section_visible == 9 || section_visible == 'open'? 'block':'hidden'"
                            x-on:click="section_visible = 0">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                            </svg>

                            <svg class="w-6 h-6 text-gray-800 my-auto ml-auto mr-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                            :class="section_visible == 9 || section_visible == 'open'? 'hidden':'block'"
                            x-on:click="section_visible = 9">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                            </svg>
                        </div>

                        <section x-cloak class="bg-white text-gray-800 text-sm transition-all delay-100 ease-in-out space-y-5 overflow-auto xl:space-y-10"
                        :class="section_visible == 9 || section_visible == 'open'? 'h-96 p-5':'h-0 p-0'">
                            <div class="font-bold text-lg text-gray-700 hidden xl:flex xl:items-center xl:space-x-1">
                                <svg class="w-6 h-6 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 0 0-1 1H6a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-2a1 1 0 0 0-1-1H9Zm1 2h4v2h1a1 1 0 1 1 0 2H9a1 1 0 0 1 0-2h1V4Zm5.707 8.707a1 1 0 0 0-1.414-1.414L11 14.586l-1.293-1.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                                </svg>
                                <h3>Estado de Cotización</h3>
                            </div>
                            <div>
                                <h3>Enviar cotización al cliente</h3>
                                <input type="email" class="rounded-2xl">
                                <button class="bg-indigo-600 text-indigo-200 rounded-2xl px-2 py-1 block my-2">Enviar</button>
                                <h3>Envíada al cliente "Nombre Apellido Cliente"</h3>
                                <h3>Orden No:SGL_24353445345</h3>
                            </div>
                        </section>
                    </section>
                </div>
            </section>
            {{-- END QUOTATION SUMMARY --}}
        </div>
        {{-- END QUOTATIONS --}}
    </div>
</section>


