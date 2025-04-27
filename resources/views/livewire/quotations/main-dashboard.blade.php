<section class="min-h-screen w-full" x-data="{section:2,navbar_level_1_selector:1,navbar_level_2_selector:1,order_show:0}">
    <h3 class="text-xl py-5 px-5 text-center">Title Page</h3>

    <div class="p-2 w-full">
        {{-- SUPERIOR NAVBAR --}}
        <section class="bg-white w-full rounded-2xl my-3 h-14 flex items-center">
            <div class="mx-5">
                <button class="py-2"
                :class="navbar_level_1_selector == 1? 'text-indigo-700 border-b-indigo-700 border-b-2':''"
                x-on:click="navbar_level_1_selector = 1">Courier</button>
            </div>
            <div class="mx-5">
                <button class="py-2"
                :class="navbar_level_1_selector == 2? 'text-indigo-700 border-b-indigo-700 border-b-2':''"
                x-on:click="navbar_level_1_selector = 2">Maritimo</button>
            </div>
            <div class="mx-1 ml-auto block" x-show="[1].includes(section)">
                <button class="bg-red-500 rounded-2xl px-3 py-2 flex items-center text-white"
                x-on:click="section = 2">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="hidden lg:block">Nueva Cotización</span>
                </button>
            </div>
            <div x-cloak class="mx-1 ml-auto block" x-show="[2,3].includes(section)">
                <button class="bg-orange-500 rounded-2xl px-3 py-2 flex items-center text-white"
                x-on:click="section = 1">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm16 7H4v7h16v-7ZM5 8a1 1 0 0 1 1-1h.01a1 1 0 0 1 0 2H6a1 1 0 0 1-1-1Zm4-1a1 1 0 0 0 0 2h.01a1 1 0 0 0 0-2H9Zm2 1a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2H12a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="hidden lg:block">Dashboard</span>
                </button>
            </div>
        </section>
        {{-- END SUPERIOR NAVBAR --}}


        {{-- COURIER --}}
        <div class="flex w-full" x-data="{openAddArticleModal:false, openAddDiscountModal:false}"
            x-show="[1].includes(navbar_level_1_selector)"
            x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0">
            {{-- MAIN DASHBOARD --}}
            <section x-cloak class="w-full" x-show="[1].includes(section)"
                x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0">

                {{-- METRICS --}}
                <section class="min-w-[300px] w-full h-fit mx-auto grid gap-1 grid-cols-1 lg:grid-cols-2">
                    <div class=" grid gap-1 grid-cols-1 sm:grid-cols-2">
                        <section class="bg-white min-w-[200px] max-w-lg w-full rounded-2xl flex h-80">
                            {{-- <div class="mx-auto my-auto w-[140px] h-[140px] relative bg-lime-100 p-1">
                                <svg class="absolute top-0 left-0 right-0 bottom-0" width="140px" height="140px" version="1.1" xmlns="http://www.w3.org/2000/svg"  xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 131.45 131.45">
                                    <circle transform="rotate(0 70 70)" cx="70" cy="70" r="50" fill="none" stroke="#A36EFD"
                                    stroke-width="20" stroke-dasharray="48 265" stroke-linecap="square">
                                    </circle>
                                    <text x="107" y="95" font-family="Verdana" font-size="12" fill="white">25</text>
                                </svg>
                                <svg  class="absolute top-0 left-0 right-0 bottom-0" width="140px" height="140px" version="1.1" xmlns="http://www.w3.org/2000/svg"  xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 131.45 131.45">
                                    <circle transform="rotate(90 70 70)" cx="70" cy="70" r="50" fill="none" stroke="#27ADFE"
                                    stroke-width="20" stroke-dasharray="48 265" stroke-linecap="square">
                                    </circle>
                                    <text x="45" y="120" font-family="Verdana" font-size="12" fill="white">5</text>
                                </svg>
                                <svg  class="absolute top-0 left-0 right-0 bottom-0" width="140px" height="140px" version="1.1" xmlns="http://www.w3.org/2000/svg"  xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 131.45 131.45">
                                    <circle transform="rotate(180 70 70)" cx="70" cy="70" r="50" fill="none" stroke="#FFB44E"
                                    stroke-width="20" stroke-dasharray="48 265" stroke-linecap="square">
                                    </circle>
                                    <text x="20" y="50" font-family="Verdana" font-size="12" fill="white">10</text>
                                </svg>
                                <svg  class="absolute top-0 left-0 right-0 bottom-0" width="140px" height="140px" version="1.1" xmlns="http://www.w3.org/2000/svg"  xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 131.45 131.45">
                                    <circle transform="rotate(270 70 70)" cx="70" cy="70" r="50" fill="none" stroke="#2CDEAE"
                                    stroke-width="20" stroke-dasharray="48 265" stroke-linecap="square">
                                    </circle>
                                    <text x="90" y="30" font-family="Verdana" font-size="12" fill="white">35</text>
                                </svg>
                            </div> --}}
                            <div class="mx-auto my-auto text-gray-500 text-center">
                                <svg class="w-12 h-12 mx-auto animate-[spin_3s_linear_infinite]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M9.586 2.586A2 2 0 0 1 11 2h2a2 2 0 0 1 2 2v.089l.473.196.063-.063a2.002 2.002 0 0 1 2.828 0l1.414 1.414a2 2 0 0 1 0 2.827l-.063.064.196.473H20a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-.089l-.196.473.063.063a2.002 2.002 0 0 1 0 2.828l-1.414 1.414a2 2 0 0 1-2.828 0l-.063-.063-.473.196V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.089l-.473-.196-.063.063a2.002 2.002 0 0 1-2.828 0l-1.414-1.414a2 2 0 0 1 0-2.827l.063-.064L4.089 15H4a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h.09l.195-.473-.063-.063a2 2 0 0 1 0-2.828l1.414-1.414a2 2 0 0 1 2.827 0l.064.063L9 4.089V4a2 2 0 0 1 .586-1.414ZM8 12a4 4 0 1 1 8 0 4 4 0 0 1-8 0Z" clip-rule="evenodd"/>
                                </svg>
                                <h3 class="font-bold text-sm">Work In Progress</h3>
                                <button class="px-3 py-2 bg-indigo-600 text-white rounded-2xl my-5 hover:bg-indigo-400"
                                x-on:click="section=3">Orders</button>
                            </div>
                        </section>
                        <section class="bg-white min-w-[200px] max-w-lg w-full rounded-2xl flex h-20 lg:h-80">
                            <div class="mx-auto my-auto text-gray-500 text-center">
                                <svg class="w-12 h-12 mx-auto animate-[spin_3s_linear_infinite]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M9.586 2.586A2 2 0 0 1 11 2h2a2 2 0 0 1 2 2v.089l.473.196.063-.063a2.002 2.002 0 0 1 2.828 0l1.414 1.414a2 2 0 0 1 0 2.827l-.063.064.196.473H20a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-.089l-.196.473.063.063a2.002 2.002 0 0 1 0 2.828l-1.414 1.414a2 2 0 0 1-2.828 0l-.063-.063-.473.196V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.089l-.473-.196-.063.063a2.002 2.002 0 0 1-2.828 0l-1.414-1.414a2 2 0 0 1 0-2.827l.063-.064L4.089 15H4a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h.09l.195-.473-.063-.063a2 2 0 0 1 0-2.828l1.414-1.414a2 2 0 0 1 2.827 0l.064.063L9 4.089V4a2 2 0 0 1 .586-1.414ZM8 12a4 4 0 1 1 8 0 4 4 0 0 1-8 0Z" clip-rule="evenodd"/>
                                </svg>
                                <h3 class="font-bold text-sm">Work In Progress</h3>
                            </div>
                        </section>
                        <section class="bg-white min-w-[200px] max-w-lg w-full rounded-2xl flex h-20 lg:h-80">
                            <div class="mx-auto my-auto text-gray-500 text-center">
                                <svg class="w-12 h-12 mx-auto animate-[spin_3s_linear_infinite]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M9.586 2.586A2 2 0 0 1 11 2h2a2 2 0 0 1 2 2v.089l.473.196.063-.063a2.002 2.002 0 0 1 2.828 0l1.414 1.414a2 2 0 0 1 0 2.827l-.063.064.196.473H20a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-.089l-.196.473.063.063a2.002 2.002 0 0 1 0 2.828l-1.414 1.414a2 2 0 0 1-2.828 0l-.063-.063-.473.196V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.089l-.473-.196-.063.063a2.002 2.002 0 0 1-2.828 0l-1.414-1.414a2 2 0 0 1 0-2.827l.063-.064L4.089 15H4a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h.09l.195-.473-.063-.063a2 2 0 0 1 0-2.828l1.414-1.414a2 2 0 0 1 2.827 0l.064.063L9 4.089V4a2 2 0 0 1 .586-1.414ZM8 12a4 4 0 1 1 8 0 4 4 0 0 1-8 0Z" clip-rule="evenodd"/>
                                </svg>
                                <h3 class="font-bold text-sm">Work In Progress</h3>
                            </div>
                        </section>
                        <section class="bg-white min-w-[200px] max-w-lg w-full rounded-2xl flex h-20 lg:h-80">
                            <div class="mx-auto my-auto text-gray-500 text-center">
                                <svg class="w-12 h-12 mx-auto animate-[spin_3s_linear_infinite]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M9.586 2.586A2 2 0 0 1 11 2h2a2 2 0 0 1 2 2v.089l.473.196.063-.063a2.002 2.002 0 0 1 2.828 0l1.414 1.414a2 2 0 0 1 0 2.827l-.063.064.196.473H20a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-.089l-.196.473.063.063a2.002 2.002 0 0 1 0 2.828l-1.414 1.414a2 2 0 0 1-2.828 0l-.063-.063-.473.196V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.089l-.473-.196-.063.063a2.002 2.002 0 0 1-2.828 0l-1.414-1.414a2 2 0 0 1 0-2.827l.063-.064L4.089 15H4a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h.09l.195-.473-.063-.063a2 2 0 0 1 0-2.828l1.414-1.414a2 2 0 0 1 2.827 0l.064.063L9 4.089V4a2 2 0 0 1 .586-1.414ZM8 12a4 4 0 1 1 8 0 4 4 0 0 1-8 0Z" clip-rule="evenodd"/>
                                </svg>
                                <h3 class="font-bold text-sm">Work In Progress</h3>
                            </div>
                        </section>
                    </div>
                    <div class=" grid grid-cols-1">
                        {{-- <section class="bg-white min-w-[200px] max-w-lg w-full rounded-2xl flex "> --}}
                        <section class="bg-white min-w-[250px] max-w-5xl w-full rounded-2xl flex h-20 lg:h-[640px]">
                            <div class="mx-auto my-auto text-gray-500 text-center">
                                <svg class="w-12 h-12 mx-auto animate-[spin_3s_linear_infinite]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M9.586 2.586A2 2 0 0 1 11 2h2a2 2 0 0 1 2 2v.089l.473.196.063-.063a2.002 2.002 0 0 1 2.828 0l1.414 1.414a2 2 0 0 1 0 2.827l-.063.064.196.473H20a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-.089l-.196.473.063.063a2.002 2.002 0 0 1 0 2.828l-1.414 1.414a2 2 0 0 1-2.828 0l-.063-.063-.473.196V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.089l-.473-.196-.063.063a2.002 2.002 0 0 1-2.828 0l-1.414-1.414a2 2 0 0 1 0-2.827l.063-.064L4.089 15H4a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h.09l.195-.473-.063-.063a2 2 0 0 1 0-2.828l1.414-1.414a2 2 0 0 1 2.827 0l.064.063L9 4.089V4a2 2 0 0 1 .586-1.414ZM8 12a4 4 0 1 1 8 0 4 4 0 0 1-8 0Z" clip-rule="evenodd"/>
                                </svg>
                                <h3 class="font-bold text-sm">Work In Progress</h3>
                            </div>
                        </section>
                    </div>
                </section>
                {{-- END METRICS --}}
            </section>
            {{-- END MAIN DASHBOARD --}}

            @include('livewire.quotations.modal.newArticleModal')
            @include('livewire.quotations.modal.newDiscountModal')

            {{-- NEW QUOTATION --}}
            <section x-cloak class="w-full" x-show="[2].includes(section)"
                x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0">


                <div class="flex space-x-2">
                    <section class="bg-white w-full drop-shadow-sm rounded-2xl my-3 min-h[100hv] py-5 px-5 lg:w-1/2">
                        <form wire:submit.prevent="miamiPoboxCalculator">
                            <h3 class="font-bold">Cotizar</h3>
                            <div class="relative my-5 mx-auto">
                                <input wire:model.defer='input_price' type="text" class="key-only-number block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
                                <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Precio($)</label>
                                @error('price')<span class="error absolute text-xs text-red-600">{{$message}}</span> @enderror
                            </div>
                            <div class="relative my-5 mx-auto">
                                <input wire:model.defer='input_weight' type="text" class="key-only-number block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=""/>
                                <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Peso(Lb)</label>
                                @error('input_units')<span class="error absolute text-xs text-red-600">{{$message}}</span> @enderror
                            </div>
                            <div class="relative my-5 mx-auto">
                                <input wire:model.defer='input_shipping' type="text" class="key-only-number block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=""/>
                                <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Shipping</label>
                                @error('shipping')<span class="error absolute text-xs text-red-600">{{$message}}</span> @enderror
                            </div>
                            <div class="relative my-5 mx-auto">
                                <select wire:model.defer='input_dai_description' class="block text-sm text-gray-500 rounded-lg py-3 w-full px-1 border-gray-300 focus:ring-0">
                                    <option value="">Selecciona Descripción</option>
                                    <option value='{"name":"Accesorio de Aseo Personal","val":"15"}'>Accesorio de Aseo Personal: 15%</option>
                                    <option value='{"name":"Accesorio de Cámara","val":"15"}'>Accesorio de Cámara: 15%</option>
                                    <option value='{"name":"Accesorio de Carro","val":"15"}'>Accesorio de Carro: 15%</option>
                                    <option value='{"name":"Accesorio de Cocina","val":"15"}'>Accesorio de Cocina: 15%</option>
                                    <option value='{"name":"Accesorio de Computacion","val":"15"}'>Accesorio de Computacion: 15%</option>
                                    <option value='{"name":"Accesorio de Musica","val":"15"}'>Accesorio de Musica: 15%</option>
                                    <option value='{"name":"Accesorio de Oficina","val":"15"}'>Accesorio de Oficina: 15%</option>
                                    <option value='{"name":"Accesorio de Telefonia","val":"15"}'>Accesorio de Telefonia: 15%</option>
                                    <option value='{"name":"Accesorio Deportivo","val":"15"}'>Accesorio Deportivo: 15%</option>
                                    <option value='{"name":"Accesorio Electrico","val":"0"}'>Accesorio Electrico: 0%</option>
                                    <option value='{"name":"Articulos de Cuero","val":"15"}'>Articulos de Cuero: 15%</option>
                                    <option value='{"name":"Articulos de Fiesta","val":"15"}'>Articulos de Fiesta: 15%</option>
                                    <option value='{"name":"Bateria de Carro","val":"15"}'>Batería de Carro: 15%</option>
                                    <option value='{"name":"Bicicleta","val":"15"}'>Bicicleta: 15%</option>
                                    <option value='{"name":"Bocinas de Carro","val":"0"}'>Bocinas de Carro: 0%</option>
                                    <option value='{"name":"Bolsas","val":"15"}'>Bolsas: 15%</option>
                                    <option value='{"name":"Cables","val":"10"}'>Cables: 10%</option>
                                    <option value='{"name":"Camara Fotografica","val":"0"}'>Camara Fotografica: 0%</option>
                                    <option value='{"name":"Cartucho de tinta (Simple)","val":"10"}'>Cartucho de tinta (Simple): 10%</option>
                                    <option value='{"name":"Cartucho de Tinta C/Chip","val":"0"}'>Cartucho de Tinta C/Chip: 0%</option>
                                    <option value='{"name":"Catalogos","val":"15"}'>Catalogos: 15%</option>
                                    <option value='{"name":"CD´s","val":"13"}'>CD´s: 10% +3% IPSA</option>
                                    <option value='{"name":"Celulares","val":"0"}'>Celulares: 0%</option>
                                    <option value='{"name":"Cinta de Impresora","val":"5"}'>Cinta de Impresora: 5%</option>
                                    <option value='{"name":"Computadoras","val":"0"}'>Computadoras: 0%</option>
                                    <option value='{"name":"Consola de Videojuegos","val":"15"}'>Consola de Videojuegos: 15%</option>
                                    <option value='{"name":"Cosmeticos","val":"15"}'>Cosmeticos: 15%</option>
                                    <option value='{"name":"Cuadernos","val":"15"}'>Cuadernos: 15%</option>
                                    <option value='{"name":"Discos Duros Vacios","val":"0"}'>Discos Duros Vacios: 0%</option>
                                    <option value='{"name":"DVD Player","val":"18"}'>DVD Player: 15% +3% IPSA</option>
                                    <option value='{"name":"Edredon","val":"15"}'>Edredon: 15%</option>
                                    <option value='{"name":"Electrodomesticos","val":"15"}'>Electrodomesticos: 15%</option>
                                    <option value='{"name":"Equipo Medico","val":"0"}'>Equipo Medico: 0%</option>
                                    <option value='{"name":"Estuche de Cuero","val":"15"}'>Estuche de Cuero: 15%</option>
                                    <option value='{"name":"Estuche Partes Plasticas","val":"15"}'>Estuche Partes Plasticas: 15%</option>
                                    <option value='{"name":"Etiquetas de Papel o Carton","val":"15"}'>Etiquetas de Papel o Carton: 15%</option>
                                    <option value='{"name":"Etiquetas de Tela","val":"15"}'>Etiquetas de Tela: 15%</option>
                                    <option value='{"name":"Grabadoras","val":"15"}'>Grabadoras: 15%</option>
                                    <option value='{"name":"Herramientas de Mano","val":"0"}'>Herramientas de Mano: 0%</option>
                                    <option value='{"name":"Impresoras","val":"0"}'>Impresoras: 0%</option>
                                    <option value='{"name":"Joyeria/Bisuteria","val":"15"}'>Joyeria/Bisuteria: 15%</option>
                                    <option value='{"name":"Juguetes","val":"15"}'>Juguetes: 15%</option>
                                    <option value='{"name":"Laptop","val":"0"}'>Laptop: 0%</option>
                                    <option value='{"name":"Lentes","val":"15"}'>Lentes: 15%</option>
                                    <option value='{"name":"Lentes (solo aro)","val":"0"}'>Lentes (solo aro): 0%</option>
                                    <option value='{"name":"Lentes de Contacto","val":"5"}'>Lentes de Contacto: 5%</option>
                                    <option value='{"name":"Lentes de Sol","val":"15"}'>Lentes de Sol: 15%</option>
                                    <option value='{"name":"Libros","val":"0"}'>Libros: 0%</option>
                                    <option value='{"name":"Llaves","val":"5"}'>Llaves: 5%</option>
                                    <option value='{"name":"Luces Navideñas","val":"15"}'>Luces Navideñas: 15%</option>
                                    <option value='{"name":"Mascarillas","val":"15"}'>Mascarillas: 15%</option>
                                    <option value='{"name":"Material Impreso","val":"15"}'>Material Impreso: 15%</option>
                                    <option value='{"name":"Material Promocional","val":"15"}'>Material Promocional: 15%</option>
                                    <option value='{"name":"Medicamentos","val":"15"}'>Medicamentos: 15%</option>
                                    <option value='{"name":"MP3 (iPod)","val":"15"}'>MP3 (iPod): 15%</option>
                                    <option value='{"name":"Muebles de Casa","val":"15"}'>Muebles de Casa: 15%</option>
                                    <option value='{"name":"Partes de Bicicleta","val":"10"}'>Partes de Bicicleta: 10%</option>
                                    <option value='{"name":"Partes Industriales","val":"10"}'>Partes Industriales: 10%</option>
                                    <option value='{"name":"Poster","val":"15"}'>Poster: 15%</option>
                                    <option value='{"name":"Radio de Carro","val":"15"}'>Radio de Carro: 15%</option>
                                    <option value='{"name":"Reloj de Pulsera/Pared","val":"15"}'>Reloj de Pulsera/Pared: 15%</option>
                                    <option value='{"name":"Repuestos de Carro","val":"10"}'>Repuestos de Carro: 10%</option>
                                    <option value='{"name":"Repuestos de Helicoptero","val":"0"}'>Repuestos de Helicoptero: 0%</option>
                                    <option value='{"name":"Repuestos de Motor de Carro","val":"0"}'>Repuestos de Motor de Carro: 0%</option>
                                    <option value='{"name":"Repuestos Electronicos","val":"0"}'>Repuestos Electronicos: 0%</option>
                                    <option value='{"name":"Ropa","val":"15"}'>Ropa: 15%</option>
                                    <option value='{"name":"Scanner","val":"0"}'>Scanner: 0%</option>
                                    <option value='{"name":"Software de PC","val":"0"}'>Software de PC: 0%</option>
                                    <option value='{"name":"Tablets (iPad)","val":"0"}'>Tablets (iPad): 0%</option>
                                    <option value='{"name":"Tarjetas de Invitaciones","val":"15"}'>Tarjetas de Invitaciones: 15%</option>
                                    <option value='{"name":"Videocamara","val":"0"}'>Videocamara: 0%</option>
                                    <option value='{"name":"Videocintas","val":"18"}'>Videocintas: 15% +3% IPSA</option>
                                    <option value='{"name":"Videojuegos CD/DVD/BlueRay","val":"18"}'>Videojuegos CD/DVD/BlueRay- 0% +3% IPSA</option>
                                    <option value='{"name":"Videojuegos Cassette","val":"18"}'>Videojuegos Cassette: 15% +3% IPSA</option>
                                    <option value='{"name":"Zapatos","val":"15"}'>Zapatos: 15%</option>
                                </select>
                                @error('dai_description')<span class="error absolute text-xs text-red-600">{{$message}}</span> @enderror
                            </div>
                            <div class="relative my-5 mx-auto">
                                <input wire:model.defer='input_units' type="number" class="key-only-number block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Unidades</label>
                                @error('input_units')<span class="error absolute text-xs text-red-600">{{$message}}</span> @enderror
                            </div>

                            @if (!$quotation_generated)
                                <div class="ml-auto h-10 w-40">
                                    <button wire:loading wire:target="miamiPoboxCalculator" class="bg-indigo-500 text-white block w-full h-full rounded-lg font-bold tracking-wide font-sans transition-all delay-100 hover:bg-indigo-400">
                                        <svg aria-hidden="true" class="w-full h-5 mx-auto animate-spin text-indigo-500 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                        </svg>
                                    </button>
                                    <button wire:loading.remove wire:target="miamiPoboxCalculator" type="submit" class="bg-indigo-500 text-white w-full h-full rounded-lg font-bold tracking-wide font-sans transition-all delay-100 hover:bg-indigo-400">Vista Previa</button>
                                </div>
                            @endif
                        </form>

                        @if (!$quotation_generated)
                            <hr class="border border-gray-200 my-5 mx-auto">
                            <h3 class="font-bold my-2">Extras</h3>
                            <div class="grid grid-cols-2 gap-5">
                                <button x-on:click="openAddArticleModal = true" wire:click='miamiNewArticleLoadData' type="button" class="bg-indigo-500 text-white rounded-lg font-bold tracking-wide font-sans block px-5 py-2 transition-all delay-100 hover:bg-indigo-400 {{$quotation_preview ? '':'opacity-50 pointer-events-non'}}">Añadir Artículo</button>
                                <button x-on:click="openAddDiscountModal = true" wire:click='miamiNewDiscountLoadData' type="button" class="bg-indigo-500 text-white rounded-lg font-bold tracking-wide font-sans block px-5 py-2 transition-all delay-100 hover:bg-indigo-400 {{$quotation_preview ? '':'opacity-50 pointer-events-non'}}">Añadir Descuento</button>
                            </div>
                        @endif

                        <hr class="border border-gray-200 my-5 mx-auto">

                    </section>
                    <section class="bg-white w-1/2 drop-shadow-sm rounded-2xl my-3 min-h-[100vh] py-5 px-5">
                        <table class="table-auto rounded-lg w-full mx-auto">
                            <thead>
                                <tr class="text-sm">
                                <th>Uds</th>
                                <th>Descripción</th>
                                <th>Unitario(Q)</th>
                                <th>Total(Q)</th>
                                </tr>
                            </thead>
                            <tbody wire:loading.class.delay='opacity-50' wire:loading.class='pointer-events-none' wire:target='search,render,clear'>
                                <tr class="text-center hover:bg-blue-50 cursor-pointer">
                                    <td class="border p-1 text-xs text-center">
                                        {{$input_units*$input_units}}
                                    </td>

                                    <td class="border p-1 text-xs text-center">
                                        Courier Miami- Guatemala costo por Libra
                                    </td>

                                    <td class="border p-1 text-xs text-center">
                                        {{number_format((float)$transport/$input_units ,2 , '.', ',')}}
                                    </td>

                                    <td class="border p-1 text-xs text-center font-bold">
                                        {{number_format((float)$transport ,2 , '.', ',')}}
                                    </td>
                                </tr>
                                <tr class="text-center hover:bg-blue-50 cursor-pointer">
                                    <td class="border p-1 text-xs text-center">
                                        {{$input_units}}
                                    </td>

                                    <td class="border p-1 text-xs text-center">
                                        Gastos de desconsolidacion en origen courier miami
                                    </td>

                                    <td class="border p-1 text-xs text-center">
                                        {{number_format((float)$clearance/$input_units ,2 , '.', ',')}}
                                    </td>

                                    <td class="border p-1 text-xs text-center font-bold">
                                        {{number_format((float)$clearance ,2 , '.', ',')}}
                                    </td>
                                </tr>
                                <tr class="text-center hover:bg-blue-50 cursor-pointer">
                                    <td class="border p-1 text-xs text-center">
                                        {{$input_units}}
                                    </td>

                                    <td class="border p-1 text-xs text-center">
                                        SEGURO DE CARGA INTERNACIONAL
                                    </td>

                                    <td class="border p-1 text-xs text-center">
                                        {{number_format((float)$insurance/$input_units ,2 , '.', ',')}}
                                    </td>

                                    <td class="border p-1 text-xs text-center font-bold">
                                        {{number_format((float)$insurance ,2 , '.', ',')}}
                                    </td>
                                </tr>
                                <tr class="text-center hover:bg-blue-50 cursor-pointer">
                                    <td class="border p-1 text-xs text-center">
                                        {{$input_units}}
                                    </td>

                                    <td class="border p-1 text-xs text-center">
                                        Pago de arancel
                                    </td>

                                    <td class="border p-1 text-xs text-center">
                                        {{number_format((float)$dai/$input_units ,2 , '.', ',')}}
                                    </td>

                                    <td class="border p-1 text-xs text-center font-bold">
                                        {{number_format((float)$dai ,2 , '.', ',')}}
                                    </td>
                                </tr>
                                <tr class="text-center hover:bg-blue-50 cursor-pointer">
                                    <td class="border p-1 text-xs text-center">
                                        {{$input_units}}
                                    </td>

                                    <td class="border p-1 text-xs text-center">
                                        Pago De Impuesto De Mercadería
                                    </td>

                                    <td class="border p-1 text-xs text-center">
                                        {{number_format((float)$iva/$input_units ,2 , '.', ',')}}
                                    </td>

                                    <td class="border p-1 text-xs text-center font-bold">
                                        {{number_format((float)$iva,2 , '.', ',')}}
                                    </td>
                                </tr>
                                <tr class="text-center hover:bg-blue-50 cursor-pointer">
                                    <td class="border p-1 text-xs text-center">
                                        {{$input_units}}
                                    </td>

                                    <td class="border p-1 text-xs text-center">
                                        Costo De Envío Del Producto
                                    </td>

                                    <td class="border p-1 text-xs text-center">
                                        {{number_format((float)$shipping/$input_units ,2 , '.', ',')}}
                                    </td>

                                    <td class="border p-1 text-xs text-center font-bold">
                                        {{number_format((float)$shipping ,2 , '.', ',')}}
                                    </td>
                                </tr>
                                <tr class="text-center hover:bg-blue-50 cursor-pointer">
                                    <td class="border p-1 text-xs text-center">
                                        {{$input_units}}
                                    </td>

                                    <td class="border p-1 text-xs text-center">
                                        Envío a Cda. Guatemala
                                    </td>

                                    <td class="border p-1 text-xs text-center">
                                        {{number_format((float)$delivery/$input_units ,2 , '.', ',')}}
                                    </td>

                                    <td class="border p-1 text-xs text-center font-bold">
                                        {{number_format((float)$delivery ,2 , '.', ',')}}
                                    </td>
                                </tr>
                                <tr class="text-center hover:bg-blue-50 cursor-pointer">
                                    <td class="border p-1 text-xs text-center">

                                    </td>

                                    <td class="border p-1 text-xs text-center">

                                    </td>

                                    <td class="border p-1 text-xs text-center font-bold">
                                        Subtotal
                                    </td>

                                    <td class="border p-1 text-xs text-center font-bold">
                                        {{number_format((float)$total ,2 , '.', ',')}}
                                    </td>
                                </tr>
                                <hr>
                                @foreach ($render_extra_cost as $key=>$item)
                                    <tr class="text-center hover:bg-blue-50 cursor-pointer">
                                        <td class="border p-1 text-xs text-center">
                                            {{$input_units}}
                                        </td>

                                        <td class="border p-1 text-xs text-center">
                                            {{$item['name']}}
                                        </td>

                                        <td class="border p-1 text-xs text-center">
                                            {{number_format((float)$item['total']/$input_units ,2 , '.', ',')}}
                                        </td>

                                        <td class="border p-1 text-xs text-center font-bold">
                                            {{number_format((float)$item['total'] ,2 , '.', ',')}}
                                        </td>
                                    </tr>
                                @endforeach
                                <hr>
                                @foreach ($render_extra_discount as $key=>$item)
                                    <tr class="text-center hover:bg-blue-50 cursor-pointer">
                                        <td class="border p-1 text-xs text-center">
                                            {{$input_units}}
                                        </td>

                                        <td class="border p-1 text-xs text-center">
                                            {{$item['name']}}
                                        </td>

                                        <td class="border p-1 text-xs text-center">
                                            {{number_format((float)$item['total']/$input_units ,2 , '.', ',')}}
                                        </td>

                                        <td class="border p-1 text-xs text-center font-bold">
                                            {{number_format((float)$item['total'] ,2 , '.', ',')}}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr class="text-center hover:bg-blue-50 cursor-pointer">
                                    <td class="border p-1 text-xs text-center">

                                    </td>

                                    <td class="border p-1 text-xs text-center">

                                    </td>

                                    <td class="border p-1 text-xs text-center font-bold">
                                        Total
                                    </td>

                                    <td class="border p-1 text-xs text-center font-bold">
                                        {{number_format((float)$global_total ,2 , '.', ',')}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <hr class="border border-gray-200 my-5 mx-auto">

                        <div>
                            <div class="grid grid-cols-1 gap-5">
                                @if ($quotation_generated)
                                    <div class="w-full h-10">
                                        <button wire:loading wire:target="reloadPage" class="bg-indigo-500 text-white block w-full h-full rounded-lg font-bold tracking-wide font-sans transition-all delay-100 hover:bg-indigo-400">
                                            <svg aria-hidden="true" class="w-full h-5 mx-auto animate-spin text-indigo-500 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                            </svg>
                                        </button>
                                        <button wire:loading.remove wire:target="reloadPage" wire:click='reloadPage' type="button" class="bg-indigo-500 text-white w-full h-full rounded-lg font-bold tracking-wide font-sans transition-all delay-100 hover:bg-indigo-400">Nueva Cotización</button>
                                    </div>
                                    <h3 class="font-bold">Cotización Generada</h3>
                                    <div class="w-full h-10">
                                        <button wire:loading wire:target="miamiPoboxDownloadPDf" class="bg-indigo-500 text-white block w-full h-full rounded-lg font-bold tracking-wide font-sans transition-all delay-100 hover:bg-indigo-400">
                                            <svg aria-hidden="true" class="w-full h-5 mx-auto animate-spin text-indigo-500 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                            </svg>
                                        </button>
                                        <button wire:loading.remove wire:target="miamiPoboxDownloadPDf" wire:click='miamiPoboxDownloadPDf' type="button" class="bg-indigo-500 text-white w-full h-full rounded-lg font-bold tracking-wide font-sans transition-all delay-100 hover:bg-indigo-400">Descargar</button>
                                    </div>
                                    <hr class="border border-gray-200 my-5">
                                    @if (!$quotation_sended)
                                        <div class="relative my-1 mx-auto w-full">
                                            <input wire:model.defer='send_quotation_name' type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
                                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nombre</label>
                                        </div>
                                        <div class="relative my-1 mx-auto w-full">
                                            <input wire:model.defer='send_quotation_lastname' type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
                                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Apellido</label>
                                        </div>
                                        <div class="relative my-1 mx-auto w-full">
                                            <input wire:model.defer='send_quotation_email' type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
                                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Email</label>
                                        </div>

                                        <div class="w-full h-10">
                                            <button wire:loading wire:target="miamiPoboxSendQuotation" class="bg-indigo-500 text-white block w-full h-full rounded-lg font-bold tracking-wide font-sans transition-all delay-100 hover:bg-indigo-400">
                                                <svg aria-hidden="true" class="w-full h-5 mx-auto animate-spin text-indigo-500 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                                </svg>
                                            </button>
                                            <button wire:loading.remove wire:target="miamiPoboxSendQuotation" wire:click='miamiPoboxSendQuotation' type="button" class="bg-indigo-500 text-white w-full h-full rounded-lg font-bold tracking-wide font-sans transition-all delay-100 hover:bg-indigo-400">Enviar Cotización</button>
                                        </div>
                                    @else
                                        <div class="w-full h-10">
                                            <button class="bg-lime-500 text-white block w-full h-full rounded-lg font-bold tracking-wide font-sans">
                                                Cotización Enviada
                                            </button>
                                        </div>
                                    @endif

                                    <div class="w-full h-10">
                                        <button wire:loading wire:target="" class="bg-indigo-500 text-white block w-full h-full rounded-lg font-bold tracking-wide font-sans transition-all delay-100 hover:bg-indigo-400">
                                            <svg aria-hidden="true" class="w-full h-5 mx-auto animate-spin text-indigo-500 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                            </svg>
                                        </button>
                                        <button wire:loading.remove wire:target="" wire:click='' type="button" class="bg-indigo-500 text-white w-full h-full rounded-lg font-bold tracking-wide font-sans transition-all delay-100 hover:bg-indigo-400">Generar Orden</button>
                                    </div>
                                @else
                                    <div class="h-10">
                                        <button wire:loading wire:target="miamiPoboxGenerateQuotation" class="bg-indigo-500 text-white block w-full h-full rounded-lg font-bold tracking-wide font-sans transition-all delay-100 hover:bg-indigo-400">
                                            <svg aria-hidden="true" class="w-full h-5 mx-auto animate-spin text-indigo-500 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                            </svg>
                                        </button>
                                        <button wire:loading.remove wire:target="miamiPoboxGenerateQuotation" wire:click='miamiPoboxGenerateQuotation' class="bg-indigo-500 text-white w-full h-full rounded-lg font-bold tracking-wide font-sans transition-all delay-100 hover:bg-indigo-400 {{$quotation_preview ? '':'opacity-50 pointer-events-none'}}">Generar Cotización</button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </section>
                </div>
            </section>
            {{-- END NEW QUOTATION --}}

            {{-- QUOTATIONS --}}
            <section x-cloak class="bg-white min-w-[300px] w-full h-fit my-2 rounded-2xl py-4 px-1 lg:px-4" x-show="[3].includes(section)"
                x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0">
                <table class="table-auto rounded-lg w-full hidden lg:inline-table">
                    <thead>
                        <tr class="text-sm bg-indigo-50">
                            <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                <div class="w-fit mx-auto flex items-center font-bold">
                                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                    <h3>Servicio</h3>
                                </div>
                            </th>
                            <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                <div class="w-fit mx-auto flex items-center font-bold">
                                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                    <h3>No.Cotización</h3>
                                </div>
                            </th>
                            <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                <div class="w-fit mx-auto flex items-center font-bold">
                                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                    <h3>Cliente</h3>
                                </div>
                            </th>
                            <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                <div class="w-fit mx-auto flex items-center font-bold">
                                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                    <h3>Asesor</h3>
                                </div>
                            </th>
                            <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                <div class="w-fit mx-auto flex items-center font-bold">
                                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                    <h3>Estado</h3>
                                </div>
                            </th>
                            <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                <div class="w-fit mx-auto flex items-center font-bold">
                                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                    <h3>Fecha Creación</h3>
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
                        <tr class="cursor-pointer hover:bg-blue-100">
                            <td class="border-b py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Test RowCol
                            </td>
                            <td class="border-b py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Test RowCol
                            </td>
                            <td class="border-b py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Test RowCol
                            </td>
                            <td class="border-b py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Test RowCol
                            </td>
                            <td class="border-b py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Test RowCol
                            </td>
                            <td class="border-b py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Test RowCol
                            </td>
                            <td class="border-b py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Test RowCol
                            </td>
                        </tr>
                    </tbody>
                </table>

                @for ($i = 1; $i < 10; $i++)
                <section class="border-t border-b min-w-[300px] max-w-5xl lg:hidden">
                    <div class="flex items-center justify-evenly my-5">
                        <h3 class="text-sm w-[55px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">No.</h3>
                        <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">SGLQUOMIA_32453454</h3>

                        <svg class="w-8 h-8 rounded-full p-2 text-white bg-indigo-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                        :class="order_show != {{$i}}? 'block':'hidden'"
                        x-on:click="order_show = {{$i}}">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                        </svg>

                        <svg class="w-8 h-8 rounded-full p-2 text-white bg-indigo-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                        :class="order_show == {{$i}}? 'block':'hidden'"
                        x-on:click="order_show = 0">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                        </svg>

                    </div>
                    <div class="transition-all delay-100 ease-in-out overflow-hidden"
                    :class="order_show == {{$i}}? 'h-64':'h-0'">
                        <div class="flex items-center justify-evenly my-5">
                            <h3 class="text-sm w-[55px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">Servicio</h3>
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">Miami P.O.BOX</h3>
                            <div class="w-8"></div>
                        </div>
                        <div class="flex items-center justify-evenly my-5">
                            <h3 class="text-sm w-[55px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">Cliente</h3>
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">Nombre Apellido cliente</h3>
                            <div class="w-8"></div>
                        </div>
                        <div class="flex items-center justify-evenly my-5">
                            <h3 class="text-sm w-[55px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">Asesor</h3>
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">Nombre Apellido Asesor</h3>
                            <div class="w-8"></div>
                        </div>
                        <div class="flex items-center justify-evenly my-5">
                            <h3 class="text-sm w-[55px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">Estado</h3>
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">Envíada</h3>
                            <div class="w-8"></div>
                        </div>
                        <div class="flex items-center justify-evenly my-5">
                            <h3 class="text-sm w-[55px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">Fecha</h3>
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">12/12/2024</h3>
                            <div class="w-8"></div>
                        </div>
                        <div class="flex items-center justify-evenly my-5">
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
            {{-- END QUOTATIONS --}}
        </div>
        {{-- END COURIER --}}

        {{-- SEA --}}
        <div class="flex w-full" x-show="[2].includes(navbar_level_1_selector)"
            x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0">
            {{-- MAIN DASHBOARD --}}
            <section x-cloak class="w-full" x-show="[1].includes(section)"
                x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0">

                {{-- METRICS --}}
                <section class=" min-w-[300px] w-full h-fit mx-auto grid gap-1 grid-cols-1 lg:grid-cols-2">
                    <div class=" grid gap-1 grid-cols-1 sm:grid-cols-2">
                        <section class="bg-white min-w-[200px] max-w-lg w-full rounded-2xl flex h-80">
                            <div class="mx-auto my-auto text-gray-500 text-center">
                                <svg class="w-12 h-12 mx-auto animate-[spin_3s_linear_infinite]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M9.586 2.586A2 2 0 0 1 11 2h2a2 2 0 0 1 2 2v.089l.473.196.063-.063a2.002 2.002 0 0 1 2.828 0l1.414 1.414a2 2 0 0 1 0 2.827l-.063.064.196.473H20a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-.089l-.196.473.063.063a2.002 2.002 0 0 1 0 2.828l-1.414 1.414a2 2 0 0 1-2.828 0l-.063-.063-.473.196V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.089l-.473-.196-.063.063a2.002 2.002 0 0 1-2.828 0l-1.414-1.414a2 2 0 0 1 0-2.827l.063-.064L4.089 15H4a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h.09l.195-.473-.063-.063a2 2 0 0 1 0-2.828l1.414-1.414a2 2 0 0 1 2.827 0l.064.063L9 4.089V4a2 2 0 0 1 .586-1.414ZM8 12a4 4 0 1 1 8 0 4 4 0 0 1-8 0Z" clip-rule="evenodd"/>
                                </svg>
                                <h3 class="font-bold text-sm">Work In Progress</h3>
                                <button class="px-3 py-2 bg-indigo-600 text-white rounded-2xl my-5 hover:bg-indigo-400"
                                x-on:click="section=3">Sea Orders</button>
                            </div>
                        </section>
                        <section class="bg-white min-w-[200px] max-w-lg w-full h-80 rounded-2xl flex">
                            <div class="mx-auto my-auto text-gray-500 text-center">
                                <svg class="w-12 h-12 mx-auto animate-[spin_3s_linear_infinite]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M9.586 2.586A2 2 0 0 1 11 2h2a2 2 0 0 1 2 2v.089l.473.196.063-.063a2.002 2.002 0 0 1 2.828 0l1.414 1.414a2 2 0 0 1 0 2.827l-.063.064.196.473H20a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-.089l-.196.473.063.063a2.002 2.002 0 0 1 0 2.828l-1.414 1.414a2 2 0 0 1-2.828 0l-.063-.063-.473.196V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.089l-.473-.196-.063.063a2.002 2.002 0 0 1-2.828 0l-1.414-1.414a2 2 0 0 1 0-2.827l.063-.064L4.089 15H4a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h.09l.195-.473-.063-.063a2 2 0 0 1 0-2.828l1.414-1.414a2 2 0 0 1 2.827 0l.064.063L9 4.089V4a2 2 0 0 1 .586-1.414ZM8 12a4 4 0 1 1 8 0 4 4 0 0 1-8 0Z" clip-rule="evenodd"/>
                                </svg>
                                <h3 class="font-bold text-sm">Work In Progress</h3>
                            </div>
                        </section>
                        <section class="bg-white min-w-[200px] max-w-lg w-full h-80 rounded-2xl flex">
                            <div class="mx-auto my-auto text-gray-500 text-center">
                                <svg class="w-12 h-12 mx-auto animate-[spin_3s_linear_infinite]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M9.586 2.586A2 2 0 0 1 11 2h2a2 2 0 0 1 2 2v.089l.473.196.063-.063a2.002 2.002 0 0 1 2.828 0l1.414 1.414a2 2 0 0 1 0 2.827l-.063.064.196.473H20a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-.089l-.196.473.063.063a2.002 2.002 0 0 1 0 2.828l-1.414 1.414a2 2 0 0 1-2.828 0l-.063-.063-.473.196V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.089l-.473-.196-.063.063a2.002 2.002 0 0 1-2.828 0l-1.414-1.414a2 2 0 0 1 0-2.827l.063-.064L4.089 15H4a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h.09l.195-.473-.063-.063a2 2 0 0 1 0-2.828l1.414-1.414a2 2 0 0 1 2.827 0l.064.063L9 4.089V4a2 2 0 0 1 .586-1.414ZM8 12a4 4 0 1 1 8 0 4 4 0 0 1-8 0Z" clip-rule="evenodd"/>
                                </svg>
                                <h3 class="font-bold text-sm">Work In Progress</h3>
                            </div>
                        </section>
                        <section class="bg-white min-w-[200px] max-w-lg w-full h-80 rounded-2xl flex">
                            <div class="mx-auto my-auto text-gray-500 text-center">
                                <svg class="w-12 h-12 mx-auto animate-[spin_3s_linear_infinite]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M9.586 2.586A2 2 0 0 1 11 2h2a2 2 0 0 1 2 2v.089l.473.196.063-.063a2.002 2.002 0 0 1 2.828 0l1.414 1.414a2 2 0 0 1 0 2.827l-.063.064.196.473H20a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-.089l-.196.473.063.063a2.002 2.002 0 0 1 0 2.828l-1.414 1.414a2 2 0 0 1-2.828 0l-.063-.063-.473.196V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.089l-.473-.196-.063.063a2.002 2.002 0 0 1-2.828 0l-1.414-1.414a2 2 0 0 1 0-2.827l.063-.064L4.089 15H4a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h.09l.195-.473-.063-.063a2 2 0 0 1 0-2.828l1.414-1.414a2 2 0 0 1 2.827 0l.064.063L9 4.089V4a2 2 0 0 1 .586-1.414ZM8 12a4 4 0 1 1 8 0 4 4 0 0 1-8 0Z" clip-rule="evenodd"/>
                                </svg>
                                <h3 class="font-bold text-sm">Work In Progress</h3>
                            </div>
                        </section>
                    </div>
                    <div class=" grid grid-cols-1">
                        <section class="bg-white min-w-[250px] max-w-5xl w-full h-[640px] rounded-2xl flex">
                            <div class="mx-auto my-auto text-gray-500 text-center">
                                <svg class="w-12 h-12 mx-auto animate-[spin_3s_linear_infinite]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M9.586 2.586A2 2 0 0 1 11 2h2a2 2 0 0 1 2 2v.089l.473.196.063-.063a2.002 2.002 0 0 1 2.828 0l1.414 1.414a2 2 0 0 1 0 2.827l-.063.064.196.473H20a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-.089l-.196.473.063.063a2.002 2.002 0 0 1 0 2.828l-1.414 1.414a2 2 0 0 1-2.828 0l-.063-.063-.473.196V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.089l-.473-.196-.063.063a2.002 2.002 0 0 1-2.828 0l-1.414-1.414a2 2 0 0 1 0-2.827l.063-.064L4.089 15H4a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h.09l.195-.473-.063-.063a2 2 0 0 1 0-2.828l1.414-1.414a2 2 0 0 1 2.827 0l.064.063L9 4.089V4a2 2 0 0 1 .586-1.414ZM8 12a4 4 0 1 1 8 0 4 4 0 0 1-8 0Z" clip-rule="evenodd"/>
                                </svg>
                                <h3 class="font-bold text-sm">Work In Progress</h3>
                            </div>
                        </section>
                    </div>
                </section>
                {{-- END METRICS --}}
            </section>
            {{-- END MAIN DASHBOARD --}}

            {{-- NEW QUOTATION --}}
            <section x-cloak class="w-full" x-show="[2].includes(section)"
                x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0">

                {{-- SUBMENU LEVEL 2 --}}
                <section class="bg-white w-fit rounded-2xl my-1 h-14  flex items-center">
                    <div class="mx-5">
                        <button class="py-2 px-4 rounded-lg"
                        :class="navbar_level_2_selector == 1? 'bg-indigo-300 text-indigo-700 border-b-indigo-700 border-b-2':''"
                        x-on:click="navbar_level_2_selector = 1">FCL</button>
                    </div>
                    <div class="mx-5">
                        <button class="py-2 px-4 rounded-lg"
                        :class="navbar_level_2_selector == 2? 'bg-indigo-300 text-indigo-700 border-b-indigo-700 border-b-2':''"
                        x-on:click="navbar_level_2_selector = 2">LCL</button>
                    </div>
                    <div class="mx-5">
                        <button class="py-2 px-4 rounded-lg"
                        :class="navbar_level_2_selector == 3? 'bg-indigo-300 text-indigo-700 border-b-indigo-700 border-b-2':''"
                        x-on:click="navbar_level_2_selector = 3">Aereo</button>
                    </div>
                </section>
                {{-- END SUBMENU LEVEL 2 --}}

                {{-- FCL --}}
                <div class="flex space-x-2" x-show="[1].includes(navbar_level_2_selector)"
                    x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0">

                    <section class="bg-white w-full drop-shadow-sm rounded-2xl my-3 min-h[100hv] px-5 py-2 lg:w-1/2">
                        <div class="relative my-5 mx-auto">
                            <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Desde: (Ciudad, País, Región)</label>
                        </div>
                        <div class="relative my-5 mx-auto">
                            <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Ingresa dirección de recogida</label>
                        </div>
                        <div class="relative my-5 mx-auto">
                            <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">A: (Ciudad, País, Región)</label>
                        </div>
                        <div class="relative my-5 mx-auto">
                            <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Ingresa dirección de entrega</label>
                        </div>

                        <hr class="border border-gray-200 my-5 mx-auto">
                        <h3 class="font-bold">¿Qué deseas transportar?</h3>
                        <div class="relative my-5 mx-auto">
                            <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Producto</label>
                        </div>
                        <div class="my-5 mx-auto items-center flex space-x-2">
                            <input type="checkbox" class="rounded-md border-2 border-gray-300"/>
                            <label for="">Esta mercancía requiere control de temperatura</label>
                        </div>
                        <div class="my-5 mx-auto items-center flex space-x-2">
                            <input type="checkbox" class="rounded-md border-2 border-gray-300"/>
                            <label for="">Esta mercancía se considera peligrosa</label>
                        </div>

                        <hr class="border border-gray-200 my-5 mx-auto">
                        <h3 class="font-bold">¿Cómo se enviará tu mercancía?</h3>
                        <div class="w-full my-5 grid grid-cols-1 gap-1 lg:grid-cols-3">
                            <div class="my-2.5 mx-auto w-full">
                                <select class="border-gray-300 rounded-lg text-center w-full h-12 px-2.5">
                                    <option value="">Selecciona una opción</option>
                                    <option value="">20DS</option>
                                    <option value="">40DS</option>
                                    <option value="">40DH</option>
                                    <option value="">45DH</option>
                                    <option value="">20Tank</option>
                                    <option value="">40Tank</option>
                                </select>
                            </div>
                            <div class="relative my-2.5 mx-auto w-full">
                                <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Cantidad</label>
                            </div>
                            <div class="relative my-2.5 mx-auto w-full">
                                <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Peso</label>
                            </div>
                        </div>
                        <div class="my-5 mx-auto items-center flex space-x-2">
                            <input type="checkbox" class="rounded-md border-2 border-gray-300"/>
                            <label for="">Deseo utilizar un contenedor propio del expedidor</label>
                        </div>
                        <div class="my-5 mx-auto items-center flex space-x-2">
                            <input type="checkbox" class="rounded-md border-2 border-gray-300"/>
                            <label for="">Deseo utilizar un contenedor de devolución de importación o una opción de triangulación</label>
                        </div>
                        <div class="my-5 mx-auto items-center flex space-x-2">
                            <input type="checkbox" class="rounded-md border-2 border-gray-300"/>
                            <label for="">La mercancía es de gran tamaño</label>
                        </div>
                        <button type="button" class="bg-indigo-500 text-white rounded-lg font-bold tracking-wide font-sans block ml-auto px-5 py-2 transition-all delay-100 hover:bg-indigo-400">Añadir Contenedor</button>

                        <hr class="border border-gray-200 my-5 mx-auto">
                        <h3 class="font-bold">¿Quien es el propietario del precio?</h3>
                        <div class="my-5 mx-auto items-center flex space-x-2">
                            <input type="radio" class="rounded-md border-2 border-gray-300"/>
                            <label for="">Soy el dueño del contrato</label>
                        </div>
                        <div class="my-5 mx-auto items-center flex space-x-2">
                            <input type="radio" class="rounded-md border-2 border-gray-300"/>
                            <label for="">Seleccionar un dueño del contrato</label>
                        </div>

                        <hr class="border border-gray-200 my-5 mx-auto">
                        <div class="my-5">
                            <div class="flex w-full rounded-lg border border-gray-200 min-h-[100px]">
                                <h3 class="text-center text-sm w-fit mx-auto my-auto">Ningun paquete añadido</h3>
                            </div>
                        </div>

                        <hr class="border border-gray-200 my-5 mx-auto">
                        <h3 class="font-bold">Fecha</h3>
                        <div class="my-5">
                            <input type="date" class="rounded-md border-2 border-gray-300"/>
                        </div>

                        <hr class="border border-gray-200 my-5 mx-auto">
                        <div class="relative my-5 mx-auto">
                            <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nombre Cliente</label>
                        </div>
                        <div class="relative my-5 mx-auto">
                            <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Apellido Cliente</label>
                        </div>
                        <div class="relative my-5 mx-auto">
                            <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Email</label>
                        </div>
                        <button type="button" class="bg-indigo-500 text-white rounded-lg font-bold tracking-wide font-sans block ml-auto px-5 py-2 transition-all delay-100 hover:bg-indigo-400">Generar Cotización</button>
                    </section>
                </div>
                {{-- END FCL --}}

                {{-- LCL --}}
                <div class="flex space-x-2" x-show="[2].includes(navbar_level_2_selector)"
                    x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0">
                    <section class="bg-white w-full drop-shadow-sm rounded-2xl my-3 min-h[100hv] px-5 py-2 lg:w-1/2">
                        <div class="relative my-5 mx-auto">
                            <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Desde: (Ciudad, País, Región)</label>
                        </div>
                        <div class="relative my-5 mx-auto">
                            <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Ingresa dirección de recogida</label>
                        </div>
                        <div class="relative my-5 mx-auto">
                            <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">A: (Ciudad, País, Región)</label>
                        </div>
                        <div class="relative my-5 mx-auto">
                            <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Ingresa dirección de entrega</label>
                        </div>

                        <hr class="border border-gray-200 my-5 mx-a">
                        <div class="my-5 mx-auto items-center flex space-x-2">
                            <input type="checkbox" class="rounded-md border-2 border-gray-300"/>
                            <label for="">Estoy reservando un contrato</label>
                        </div>
                        <div class="relative my-5 mx-auto">
                            <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nombre de la empresa</label>
                        </div>


                        <h3 class="font-bold">Incoterms</h3>
                        <div class="my-5 grid grid-cols-1 gap-2 lg:grid-cols-3">
                                <button class="py-2 px-4 rounded-lg bg-indigo-300 text-indigo-700"
                                x-on:click="">Shipper</button>

                                <button class="py-2 px-4 rounded-lg border"
                                x-on:click="">Consignee</button>

                                <button class="py-2 px-4 rounded-lg border"
                                x-on:click="">Booking Party</button>
                        </div>
                        <hr class="border border-gray-200 my-5 mx-auto">

                        <h3 class="font-bold">Paquetes</h3>
                        <div class="relative my-5 mx-auto">
                            <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Producto</label>
                        </div>
                        <div class="my-5 mx-auto items-center flex space-x-2">
                            <input type="checkbox" class="rounded-md border-2 border-gray-300"/>
                            <label for="">Esta carga es considerada peligrosa</label>
                        </div>
                        <div class="my-5 mx-auto items-center flex space-x-2">
                            <input type="checkbox" class="rounded-md border-2 border-gray-300"/>
                            <label for="">Esta mercancía no es aplicable</label>
                        </div>
                        <div class="my-5 mx-auto">
                            <label for="">Tipo de paquete</label>
                            <select class="border-gray-300 rounded-lg text-center w-full h-10">
                                <option value="">Selecciona una opción</option><option value="">Buzón</option><option value="">Palé</option>
                            </select>
                        </div>

                        <div class="my-5 grid grid-cols-1 gap-2 lg:grid-cols-3">
                            <div class="relative">
                                <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Cantidad</label>
                            </div>
                            <div class="relative">
                                <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Volumen Bruto</label>
                            </div>
                            <div class="relative">
                                <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Peso Bruto</label>
                            </div>
                        </div>

                        <div>
                            <button class="py-2 px-4 rounded-lg border border-gray-400 hover:bg-gray-200"
                            x-on:click="">Calculadora</button>
                        </div>

                        <button type="button" class="bg-indigo-500 text-white rounded-lg font-bold tracking-wide font-sans block ml-auto px-5 py-2 transition-all delay-100 hover:bg-indigo-400">Añadir</button>
                        <hr class="border border-gray-200 my-5 mx-auto">

                        <div class="my-5">
                            <div class="flex w-full rounded-lg border border-gray-200 min-h-[100px]">
                                <h3 class="text-center text-sm w-fit mx-auto my-auto">Ningun paquete añadido</h3>
                            </div>
                        </div>

                        <hr class="border border-gray-200 my-5 mx-auto">
                        <h3 class="font-bold">Fecha</h3>
                        <div class="my-5">
                            <input type="date" class="rounded-md border-2 border-gray-300"/>
                        </div>

                        <hr class="border border-gray-200 my-5 mx-auto">
                        <div class="relative my-5 mx-auto">
                            <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nombre Cliente</label>
                        </div>
                        <div class="relative my-5 mx-auto">
                            <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Apellido Cliente</label>
                        </div>
                        <div class="relative my-5 mx-auto">
                            <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Email</label>
                        </div>
                        <button type="button" class="bg-indigo-500 text-white rounded-lg font-bold tracking-wide font-sans block ml-auto px-5 py-2 transition-all delay-100 hover:bg-indigo-400">Generar Cotización</button>
                    </section>
                </div>
                {{-- END LCL --}}

                {{-- Aereo --}}
                <div class="flex space-x-2" x-show="[3].includes(navbar_level_2_selector)"
                    x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0">
                    <section class="bg-white w-full drop-shadow-sm rounded-2xl my-3 min-h[100hv] px-5 py-2 lg:w-1/2">
                        <div class="relative my-5 mx-auto">
                            <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Desde: (Ciudad, País, Región)</label>
                        </div>
                        <div class="relative my-5 mx-auto">
                            <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Ingresa dirección de recogida</label>
                        </div>
                        <div class="relative my-5 mx-auto">
                            <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">A: (Ciudad, País, Región)</label>
                        </div>
                        <div class="relative my-5 mx-auto">
                            <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Ingresa dirección de entrega</label>
                        </div>

                        <hr class="border border-gray-200 my-5 mx-a">
                        <div class="my-5 mx-auto items-center flex space-x-2">
                            <input type="checkbox" class="rounded-md border-2 border-gray-300"/>
                            <label for="">Estoy reservando un contrato</label>
                        </div>
                        <div class="relative my-5 mx-auto">
                            <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nombre de la empresa</label>
                        </div>


                        <h3 class="font-bold">Incoterms</h3>
                        <div class="my-5 grid grid-cols-1 gap-2 lg:grid-cols-3">
                                <button class="py-2 px-4 rounded-lg bg-indigo-300 text-indigo-700"
                                x-on:click="">Shipper</button>

                                <button class="py-2 px-4 rounded-lg border"
                                x-on:click="">Consignee</button>

                        </div>
                        <hr class="border border-gray-200 my-5 mx-auto">

                        <h3 class="font-bold">Paquetes</h3>
                        <div class="relative my-5 mx-auto">
                            <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Producto</label>
                        </div>
                        <div class="my-5 mx-auto items-center flex space-x-2">
                            <input type="checkbox" class="rounded-md border-2 border-gray-300"/>
                            <label for="">Esta carga es considerada peligrosa</label>
                        </div>
                        <div class="my-5 mx-auto items-center flex space-x-2">
                            <input type="checkbox" class="rounded-md border-2 border-gray-300"/>
                            <label for="">Esta carga requiere control de temperatura</label>
                        </div>
                        <div class="my-5 mx-auto items-center flex space-x-2">
                            <input type="checkbox" class="rounded-md border-2 border-gray-300"/>
                            <label for="">Esta mercancía no es aplicable</label>
                        </div>
                        <div class="my-5 mx-auto">
                            <label for="">Tipo de paquete</label>
                            <select class="border-gray-300 rounded-lg text-center w-full h-10">
                                <option value="">Selecciona una opción</option><option value="">Buzón</option><option value="">Palé</option>
                            </select>
                        </div>
                        <div class="relative">
                            <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Cantidad</label>
                        </div>

                        <div class="my-5 grid grid-cols-2 gap-2 lg:grid-cols-4">
                            <div class="relative">
                                <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Longitud</label>
                            </div>
                            <div class="relative">
                                <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Ancho</label>
                            </div>
                            <div class="relative">
                                <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Altura</label>
                            </div>
                            <div class="relative">
                                <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Peso</label>
                            </div>
                        </div>


                        <button type="button" class="bg-indigo-500 text-white rounded-lg font-bold tracking-wide font-sans block ml-auto px-5 py-2 transition-all delay-100 hover:bg-indigo-400">Añadir</button>
                        <hr class="border border-gray-200 my-5 mx-auto">

                        <div class="my-5">
                            <div class="flex w-full rounded-lg border border-gray-200 min-h-[100px]">
                                <h3 class="text-center text-sm w-fit mx-auto my-auto">Ningun paquete añadido</h3>
                            </div>
                        </div>

                        <hr class="border border-gray-200 my-5 mx-auto">

                        <h3 class="font-bold">Fecha</h3>
                        <div class="my-5">
                            <input type="date" class="rounded-md border-2 border-gray-300"/>
                        </div>

                        <div class="relative my-5 mx-auto">
                            <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nombre Cliente</label>
                        </div>
                        <div class="relative my-5 mx-auto">
                            <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Apellido Cliente</label>
                        </div>
                        <div class="relative my-5 mx-auto">
                            <input type="text" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label class="absolute pointer-events-none text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Email</label>
                        </div>
                        <button type="button" class="bg-indigo-500 text-white rounded-lg font-bold tracking-wide font-sans block ml-auto px-5 py-2 transition-all delay-100 hover:bg-indigo-400">Generar Cotización</button>
                    </section>
                </div>
                {{-- END Aereo --}}
            </section>
            {{-- END NEW QUOTATION --}}

            {{-- QUOTATIONS --}}
            <section x-cloak class="bg-white min-w-[300px] w-full h-fit my-2 rounded-2xl py-4 px-1 lg:px-4" x-show="[3].includes(section)"
                x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0">
                <table class="table-auto rounded-lg w-full hidden lg:inline-table">
                    <thead>
                        <tr class="text-sm bg-indigo-50">
                            <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                <div class="w-fit mx-auto flex items-center font-bold">
                                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                    <h3>Servicio</h3>
                                </div>
                            </th>
                            <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                <div class="w-fit mx-auto flex items-center font-bold">
                                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                    <h3>No.Cotización</h3>
                                </div>
                            </th>
                            <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                <div class="w-fit mx-auto flex items-center font-bold">
                                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                    <h3>Cliente</h3>
                                </div>
                            </th>
                            <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                <div class="w-fit mx-auto flex items-center font-bold">
                                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                    <h3>Asesor</h3>
                                </div>
                            </th>
                            <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                <div class="w-fit mx-auto flex items-center font-bold">
                                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                    <h3>Estado</h3>
                                </div>
                            </th>
                            <th class="py-2 cursor-pointer hover:bg-indigo-200">
                                <div class="w-fit mx-auto flex items-center font-bold">
                                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                    <h3>Fecha Creación</h3>
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
                        <tr class="cursor-pointer hover:bg-blue-100">
                            <td class="border-b py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Test RowCol
                            </td>
                            <td class="border-b py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Test RowCol
                            </td>
                            <td class="border-b py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Test RowCol
                            </td>
                            <td class="border-b py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Test RowCol
                            </td>
                            <td class="border-b py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Test RowCol
                            </td>
                            <td class="border-b py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Test RowCol
                            </td>
                            <td class="border-b py-4 px-1 max-w-[100px] text-ellipsis truncate text-sm text-center">
                                Test RowCol
                            </td>
                        </tr>
                    </tbody>
                </table>

                @for ($i = 1; $i < 10; $i++)
                <section class="border-t border-b min-w-[300px] max-w-5xl lg:hidden">
                    <div class="flex items-center justify-evenly my-5">
                        <h3 class="text-sm w-[55px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">No.</h3>
                        <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">SGLQUOMIA_32453454</h3>

                        <svg class="w-8 h-8 rounded-full p-2 text-white bg-indigo-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                        :class="order_show != {{$i}}? 'block':'hidden'"
                        x-on:click="order_show = {{$i}}">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                        </svg>

                        <svg class="w-8 h-8 rounded-full p-2 text-white bg-indigo-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                        :class="order_show == {{$i}}? 'block':'hidden'"
                        x-on:click="order_show = 0">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                        </svg>

                    </div>
                    <div class="transition-all delay-100 ease-in-out overflow-hidden"
                    :class="order_show == {{$i}}? 'h-64':'h-0'">
                        <div class="flex items-center justify-evenly my-5">
                            <h3 class="text-sm w-[55px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">Servicio</h3>
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">Miami P.O.BOX</h3>
                            <div class="w-8"></div>
                        </div>
                        <div class="flex items-center justify-evenly my-5">
                            <h3 class="text-sm w-[55px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">Cliente</h3>
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">Nombre Apellido cliente</h3>
                            <div class="w-8"></div>
                        </div>
                        <div class="flex items-center justify-evenly my-5">
                            <h3 class="text-sm w-[55px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">Asesor</h3>
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">Nombre Apellido Asesor</h3>
                            <div class="w-8"></div>
                        </div>
                        <div class="flex items-center justify-evenly my-5">
                            <h3 class="text-sm w-[55px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">Estado</h3>
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">Envíada</h3>
                            <div class="w-8"></div>
                        </div>
                        <div class="flex items-center justify-evenly my-5">
                            <h3 class="text-sm w-[55px] truncate text-ellipsis mx-1 font-bold sm:w-[100px]">Fecha</h3>
                            <h3 class="text-sm w-[180px] truncate text-ellipsis mx-1 sm:w-[500px]">12/12/2024</h3>
                            <div class="w-8"></div>
                        </div>
                        <div class="flex items-center justify-evenly my-5">
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
            {{-- END QUOTATIONS --}}
        </div>
        {{-- END SEA --}}
    </div>
</section>


