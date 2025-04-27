<section class="min-h-screen w-full" x-data="{section:1,navbar_level_1_selector:2,navbar_level_2_selector:3,navbar_level_3_selector:1, row_show:0,feeDetailModal:false,accesorialDetailModal:false}">
    <h3 class="text-xl py-5 px-5 text-center">Title Page</h3>

    <div class="p-2 w-full">
        {{-- SUPERIOR NAVBAR --}}
        <section>
            <section class="bg-white w-full rounded-2xl my-3 h-14 flex items-center">
                <div class="mx-5">
                    <button class="py-2 px-3 rounded-2xl hover:bg-indigo-200 hover:text-indigo-600"
                    :class="navbar_level_1_selector == 1? 'text-indigo-100 bg-indigo-600':''"
                    x-on:click="navbar_level_1_selector = 1">FCL</button>
                </div>
                <div class="mx-5">
                    <button class="py-2 px-3 rounded-2xl hover:bg-indigo-200 hover:text-indigo-600"
                    :class="navbar_level_1_selector == 2? 'text-indigo-100 bg-indigo-600':''"
                    x-on:click="navbar_level_1_selector = 2">LCL</button>
                </div>
                <div class="mx-1 ml-auto block" x-show="[1].includes(section)"
                x-on:click="section = 2">
                    <button class="bg-cyan-500 rounded-2xl px-3 py-2 flex items-center text-white space-x-2 hover:bg-cyan-400">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6Zm4.996 2a1 1 0 0 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 8a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 11a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 14a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Z" clip-rule="evenodd"/>
                        </svg>
                        <span class="hidden lg:block">Accesorials</span>
                    </button>
                </div>

                <div x-cloak class="mx-1 ml-auto block" x-show="[2].includes(section)">
                    <button class="bg-orange-500 rounded-2xl px-3 py-2 flex items-center text-white space-x-2 hover:bg-orange-400"
                    x-on:click="section = 1">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm16 7H4v7h16v-7ZM5 8a1 1 0 0 1 1-1h.01a1 1 0 0 1 0 2H6a1 1 0 0 1-1-1Zm4-1a1 1 0 0 0 0 2h.01a1 1 0 0 0 0-2H9Zm2 1a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2H12a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                        </svg>
                        <span class="hidden lg:block">Cost Center</span>
                    </button>
                </div>
            </section>

            <section class="bg-white max-w-xl rounded-2xl my-3 h-14 flex items-center">
                <div class="mx-2">
                    <button class="py-2 px-3 rounded-2xl hover:bg-indigo-200 hover:text-indigo-600"
                    :class="navbar_level_2_selector == 1? 'text-indigo-100 bg-indigo-600':''"
                    x-on:click="navbar_level_2_selector = 1">América</button>
                </div>
                <div class="mx-2">
                    <button class="py-2 px-3 rounded-2xl hover:bg-indigo-200 hover:text-indigo-600"
                    :class="navbar_level_2_selector == 2? 'text-indigo-100 bg-indigo-600':''"
                    x-on:click="navbar_level_2_selector = 2">Europa</button>
                </div>
                <div class="mx-2">
                    <button class="py-2 px-3 rounded-2xl hover:bg-indigo-200 hover:text-indigo-600"
                    :class="navbar_level_2_selector == 3? 'text-indigo-100 bg-indigo-600':''"
                    x-on:click="navbar_level_2_selector = 3">Asia</button>
                </div>
            </section>

            <section class="bg-white max-w-xl rounded-2xl my-3 h-14 flex items-center">
                <div class="mx-5">
                    <button class="py-2 px-3 rounded-2xl hover:bg-indigo-200 hover:text-indigo-600"
                    :class="navbar_level_3_selector == 1? 'text-indigo-100 bg-indigo-600':''"
                    x-on:click="navbar_level_3_selector = 1">China</button>
                </div>
                <div class="mx-5">
                    <button class="py-2 px-3 rounded-2xl hover:bg-indigo-200 hover:text-indigo-600"
                    :class="navbar_level_3_selector == 2? 'text-indigo-100 bg-indigo-600':''"
                    x-on:click="navbar_level_3_selector = 2">Taiwan</button>
                </div>
            </section>
        </section>
        {{-- END SUPERIOR NAVBAR --}}

        {{-- MODALS --}}
        @include('livewire.costcenter.modal.editFee')
        @include('livewire.costcenter.modal.editAccesorial')
        {{-- END MODALS --}}

        {{-- CHINA PRICING TABLE --}}
        <div class="flex w-full" x-show="[1].includes(navbar_level_3_selector)"
            x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0">

            {{-- COST CENTER --}}
            <section x-cloak class="bg-white min-w-[300px] w-full h-fit my-2 rounded-2xl py-4 px-1 lg:px-4" x-show="[1].includes(section)"
                x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0">
                <table class="table-auto rounded-lg w-full hidden xl:inline-table">
                    <thead>
                        <tr class="text-sm bg-indigo-50">
                            <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                <div class="w-fit mx-auto flex items-center font-bold">
                                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                    <h3>POL</h3>
                                </div>
                            </th>
                            <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                <div class="w-fit mx-auto flex items-center font-bold">
                                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                    <h3>Dest.Country</h3>
                                </div>
                            </th>
                            <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                <div class="w-fit mx-auto flex items-center font-bold">
                                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                    <h3>POD</h3>
                                </div>
                            </th>
                            <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                <div class="w-fit mx-auto flex items-center font-bold">
                                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                    <h3>20STD</h3>
                                </div>
                            </th>
                            <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                <div class="w-fit mx-auto flex items-center font-bold">
                                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                    <h3>40HC</h3>
                                </div>
                            </th>
                            <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                <div class="w-fit mx-auto flex items-center font-bold">
                                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                    <h3>40NOR</h3>
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
                                    <h3>Route</h3>
                                </div>
                            </th>
                            <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                <div class="w-fit mx-auto flex items-center font-bold">
                                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                    <h3>Detalle</h3>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i < 10; $i++)
                        <tr class="cursor-pointer hover:bg-blue-100">
                            <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Ningbo
                            </td>
                            <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Guatemala
                            </td>
                            <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Puerto Quetzal
                            </td>
                            <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                $600.00
                            </td>
                            <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                $600.00
                            </td>
                            <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                $6,450.00
                            </td>
                            <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                30
                            </td>
                            <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Direct
                            </td>
                            <td x-on:click="feeDetailModal=true" class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
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

                @for ($i = 1; $i < 10; $i++)
                <section class="border-t border min-w-[300px] max-w-5xl xl:hidden">
                    <div class="flex items-center justify-evenly my-5">
                        <div>
                            <h3 class="text-2xs w-[55px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">China</h3>
                            <h3 class="text-sm w-[55px] truncate text-ellipsis mx-1 sm:w-[100px]">Ningbo</h3>
                        </div>
                        <svg class="w-6 h-6 text-black mt-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                        </svg>
                        <div>
                            <h3 class="text-2xs w-[55px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">Guatemala</h3>
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">Puerto Quetzal</h3>
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
                        <div x-on:click="feeDetailModal=true" class="flex items-center justify-evenly my-5">
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
            </section>
            {{-- END COST CENTER --}}

            {{-- ACCESORIALS --}}
            <section x-cloak class="bg-white min-w-[300px] w-full h-fit my-2 rounded-2xl py-4 px-1 lg:px-4" x-show="[2].includes(section)"
                x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0">

                <h3 class="my-5 font-bold text-xl text-center hidden xl:block">ACCESORIALS GUATEMALA</h3>
                <table class="table-auto rounded-lg w-full hidden xl:inline-table">
                    <thead>
                        <tr class="text-sm bg-indigo-50">
                            <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                <div class="w-fit mx-auto flex items-center font-bold">
                                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                    <h3>Nombre</h3>
                                </div>
                            </th>
                            <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                <div class="w-fit mx-auto flex items-center font-bold">
                                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                    <h3>Valor</h3>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="cursor-pointer hover:bg-blue-100">
                            <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                HBL
                            </td>
                            <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                $125.00
                            </td>
                        </tr>
                        <tr class="cursor-pointer hover:bg-blue-100">
                            <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                DUCA Definitiva
                            </td>
                            <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Q940.50
                            </td>
                        </tr>
                        <tr class="cursor-pointer hover:bg-blue-100">
                            <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Tramite Portuario
                            </td>
                            <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Q650.00
                            </td>
                        </tr>
                        <tr class="cursor-pointer hover:bg-blue-100">
                            <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Marchamo Electronico
                            </td>
                            <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Q115.20
                            </td>
                        </tr>
                        <tr class="cursor-pointer hover:bg-blue-100">
                            <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                R.I. SAT-GT
                            </td>
                            <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Q1,760.00
                            </td>
                        </tr>
                        <tr class="cursor-pointer hover:bg-blue-100">
                            <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Selectivo ROJO SAT-GT
                            </td>
                            <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Q560.00
                            </td>
                        </tr>
                        <tr class="cursor-pointer hover:bg-blue-100">
                            <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Gastos Locales FCL (NAVIERA THS)
                            </td>
                            <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                $ 522.00
                            </td>
                        </tr>
                        <tr class="cursor-pointer hover:bg-blue-100">
                            <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Gastos Locales FCL (NAVIERA DOCS)
                            </td>
                            <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Q1,740.00
                            </td>
                        </tr>
                        <tr class="cursor-pointer hover:bg-blue-100">
                            <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Seguro de carga internacional (Se deposita a la cuenta monetaria BI 8480001570 SGL EXPRESS ZONA 13)
                            </td>
                            <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                1.65%
                            </td>
                        </tr>
                        <tr class="cursor-pointer hover:bg-blue-100">
                            <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Garantia por Contenedor
                            </td>
                            <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                $ 500.00
                            </td>
                        </tr>
                        <tr class="cursor-pointer hover:bg-blue-100">
                            <td class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Detalle
                            </td>
                            <td x-on:click="accesorialDetailModal=true" class="border py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                <div class="flex items-center justify-evenly w-fit mx-auto">
                                    <h3 class="text-sm w-fit truncate text-ellipsis mx-1 font-bold">Detalle</h3>
                                    <div class="text-sm w-fit truncate text-ellipsis mx-1">
                                        <svg class="w-8 h-8 rounded-full p-2 text-white bg-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm.5 5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Zm0 5c.47 0 .917-.092 1.326-.26l1.967 1.967a1 1 0 0 0 1.414-1.414l-1.817-1.818A3.5 3.5 0 1 0 11.5 17Z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>


                <section class="border-t border min-w-[300px] max-w-5xl xl:hidden">
                    <div class="flex items-center justify-evenly my-5">
                        <h3 class="my-2.5 font-bold text-center xl:hidden">ACCESORIALS GUATEMALA</h3>

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
                    <div class="transition-all delay-100 ease-in-out overflow-hidden px-1"
                    :class="row_show == {{$i}}? 'h-[500px]':'h-0'">
                        <div class="flex items-center justify-evenly my-5">
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">HBL</h3>
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">$125.00</h3>
                            <div class="w-8"></div>
                        </div>
                        <div class="flex items-center justify-evenly my-5">
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">DUCA Definitiva</h3>
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">Q940.50</h3>
                            <div class="w-8"></div>
                        </div>
                        <div class="flex items-center justify-evenly my-5">
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">Tramite Portuario</h3>
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">Q650.00</h3>
                            <div class="w-8"></div>
                        </div>
                        <div class="flex items-center justify-evenly my-5">
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">Marchamo Electronico</h3>
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">Q115.20</h3>
                            <div class="w-8"></div>
                        </div>
                        <div class="flex items-center justify-evenly my-5">
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">R.I. SAT-GT</h3>
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">Q1,760.00</h3>
                            <div class="w-8"></div>
                        </div>
                        <div class="flex items-center justify-evenly my-5">
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">Selectivo ROJO SAT-GT</h3>
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">Q560.00</h3>
                            <div class="w-8"></div>
                        </div>
                        <div class="flex items-center justify-evenly my-5">
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">Gastos Locales FCL (NAVIERA THS)</h3>
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">$522.00</h3>
                            <div class="w-8"></div>
                        </div>
                        <div class="flex items-center justify-evenly my-5">
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">Gastos Locales FCL (NAVIERA DOCS)</h3>
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">Q1,740.00</h3>
                            <div class="w-8"></div>
                        </div>
                        <div class="flex items-center justify-evenly my-5">
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">Seguro de carga internacional (Se deposita a la cuenta monetaria BI 8480001570 SGL EXPRESS ZONA 13)</h3>
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">1.65%</h3>
                            <div class="w-8"></div>
                        </div>
                        <div class="flex items-center justify-evenly my-5">
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">Garantia por Contenedor</h3>
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">$500.00</h3>
                            <div class="w-8"></div>
                        </div>

                        <div x-on:click="accesorialDetailModal=true" class="flex items-center justify-evenly my-5">
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">Detalle</h3>
                            <div class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">
                                <svg class="w-8 h-8 rounded-full p-2 text-white bg-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm.5 5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Zm0 5c.47 0 .917-.092 1.326-.26l1.967 1.967a1 1 0 0 0 1.414-1.414l-1.817-1.818A3.5 3.5 0 1 0 11.5 17Z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="w-8"></div>
                        </div>
                    </div>
                </section>

            </section>
            {{-- END ACCESORIALS --}}
        </div>
        {{-- CHINA PRICING TABLE --}}

    </div>
</section>


