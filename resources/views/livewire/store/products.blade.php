
<section class="p-1 w-full">
    {{-- First Panel --}}
    <section class="flex w-full overflow-x-auto" x-data="{openNewCategoryModal : false}">
        {{-- Calculator --}}
        <section class="w-5/12 p-5">
            <fieldset class="flex mx-auto w-fit">
                <div class="flex my-10">
                    <div>
                        <div class="text-center">
                            <h3 class="text-sm font-bold">Valor de mercadería en US$:</h3>
                            <input id="home_mg_price" name="price" class="home_quotation_keyup w-11/12 sm:w-8/12 lg:w-11/12 xl:w-auto rounded h-10 border-none bg-gray-100" type="text" placeholder="Precio" required>
                        </div>
                        <div class="text-center">
                            <h3 class="text-sm font-bold">Shipping en US$:</h3>
                            <input id="home_mg_shipping" name="shipping" class="home_quotation_keyup w-11/12 sm:w-8/12 lg:w-11/12 xl:w-auto rounded h-10 border-none bg-gray-100" type="text" placeholder="Shipping" required>
                        </div>
                        <div class="text-center">
                            <h3 class="text-sm font-bold">Peso en libras: </h3>
                            <input id="home_mg_weight" name="weight" class="home_quotation_keyup w-11/12 sm:w-8/12 lg:w-11/12 xl:w-auto rounded h-10 border-none bg-gray-100 " type="text" placeholder="Peso" required>
                        </div>
                        <div class="text-center ">
                            <h3 class="text-sm font-bold">Descripción:</h3>
                            <select id="home_mg_description" name="description" class="home_quotation_change max-w-[226px] lg:w-11/12 xl:w-auto rounded h-10 border-none bg-gray-100  text-center text-sm text-gray-500" required>
                                <option value="-" selected>Selecciona Descripción</option>
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

                    <div>
                        <div class="p-2">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input id="home_mg_exchange_btn" name="currency" type="checkbox" class="sr-only peer" checked>
                                <div class="flex px-2 w-11 h-6  bg-yellow-400 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-transparent rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-gray-300 after:content-[''] after:absolute after:top-[0px] after:left-[1px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-5 after:transition-all  peer-checked:bg-green-500">
                                    <span class="mr-auto font-bold text-green-800">$</span>
                                    <span class="ml-auto font-bold text-yellow-600">Q</span>
                                </div>
                            </label>

                            <h3>Flete SGL: <span id="home_mg_transport">0.00</span></h3>
                            <h3>Desaduanaje SGL: <span id="home_mg_desaduanaje">0.00</span></h3>
                            <h3 class="">Servicios SGL: <span id="home_mg_services">0.00</span></h3>
                            <h3>DAI: <span id="home_mg_dai">0.00</span></h3>
                            <h3>IVA: <span id="home_mg_iva">0.00</span></h3>
                            <h3 class="">Impuestos: <span id="home_mg_taxes">0.00</span></h3>
                            <h3 class="">Subtotal: Servicio SGL + Impuestos: <span id="home_mg_total_pobox">0.00</span></h3>
                            <hr class="border-gray-300">
                            <h3 class="">Comisión: <span id="home_mg_commission">0.00</span></h3>
                            <h3 class="font-bold">Total: Mercadería + Comisión + Servicio SGL + Impuestos: <span class="font-bold text-lg" id="home_mg_total_include">0.00</span></h3>
                        </div>
                    </div>
                </div>
            </fieldset>
        </section>

        {{-- New Product --}}
        <section class="w-8/12 2xl:w-7/12 p-5 rounded border">
            <form class="mx-auto w-fit space-y-1.5">
                <h3 class="text-center font-bold">Nuevo Producto</h3>
                <div class="flex space-x-2">
                    <div>
                        <h3 class="uppercase tracking-wide text-gray-700 text-xs font-bold">Nombre(max 100)</h3>
                        <input wire:model.defer="name" class="rounded border border-gray-300 h-9 bg-gray-100" type="text" maxlength="100">
                        @error('name') <h3 class="text-red-500 text-2xs font-bold">{{ $message }}</h3> @enderror
                    </div>
                    <div>
                        <h3 class="uppercase tracking-wide text-gray-700 text-xs font-bold">Categoria</h3>
                        <div class="flex space-x-2">
                            <select wire:model.defer="category" class="rounded border border-gray-300 w-52 h-9 text-center px-2 bg-gray-100 text-gray-600">
                                <option value="0" selected>Selecciona Categoría</option>
                                @foreach ($categories as $key=>$category)
                                    <option value="{{$category->idcategory}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <button x-on:click="openNewCategoryModal = true" type="button" class="flex items-center ml-auto w-fit px-2 py-2 bg-sky-400 text-white rounded">
                                <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
                                </svg>
                            </button>
                        </div>
                        @error('category') <h3 class="text-red-500 text-2xs font-bold">{{ $message }}</h3> @enderror
                    </div>
                    <div class="my-auto w-full">
                        <div wire:loading wire:target="cleanFormCreateProduct" class="inline-block w-full">
                            <button type="button" class="flex items-center ml-auto w-fit px-3 py-4 bg-sky-400 text-white rounded">
                                <svg aria-hidden="true" class="w-5 h-5 mx-auto  animate-spin text-sky-400 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                </svg>
                            </button>
                        </div>

                        <button wire:loading.remove type="button" wire:click="cleanFormCreateProduct" class="ml-auto w-fit block px-3 py-2 bg-sky-400 text-white rounded hover:bg-sky-500 ">
                            <svg class="w-6 h-6 text-white font-bold" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-5-4v4h4V3h-4Z"/>
                            </svg>
                            <h3 class="text-2xs">Clear</h3>
                        </button>

                    </div>
                </div>
                <div>
                    <div>
                        <h3 class="uppercase tracking-wide text-gray-700 text-xs font-bold">Descripción(max 1400)</h3>
                        <textarea wire:model.defer="description" class="rounded border border-gray-300 bg-gray-100" cols="70" rows="2" maxlength="1400"></textarea>
                        @error('description') <h3 class="text-red-500 text-2xs font-bold">{{ $message }}</h3> @enderror
                    </div>
                </div>
                <div class="space-x-2">
                    <div>
                        <h3 class="uppercase tracking-wide text-gray-700 text-xs font-bold">Variantes</h3>
                        <input wire:model.defer="variant" class="rounded border border-gray-300 h-9 bg-gray-100" type="text">
                        @error('variant') <h3 class="text-red-500 text-2xs font-bold">{{ $message }}</h3> @enderror
                    </div>
                </div>
                <div class="flex space-x-2">
                    <div>
                        <h3 class="uppercase tracking-wide text-gray-700 text-xs font-bold">Precio(Q)</h3>
                        <input wire:model.defer="price" class="rounded border border-gray-300 h-9 bg-gray-100" type="text">
                        @error('price') <h3 class="text-red-500 text-2xs font-bold">{{ $message }}</h3> @enderror
                    </div>
                    <div>
                        <h3 class="uppercase tracking-wide text-gray-700 text-xs font-bold">Precio en Oferta(Q)</h3>
                        <input wire:model.defer="compare_price" class="rounded border border-gray-300 h-9 bg-gray-100" type="text">
                        @error('compare_price') <h3 class="text-red-500 text-2xs font-bold">{{ $message }}</h3> @enderror
                    </div>
                    <div>
                        <h3 class="uppercase tracking-wide text-gray-700 text-xs font-bold">Link</h3>
                        <input wire:model.defer="link" class="rounded border border-gray-300 h-9 bg-gray-100" type="text">
                        @error('link') <h3 class="text-red-500 text-2xs font-bold">{{ $message }}</h3> @enderror
                    </div>
                </div>

                <div class="flex">
                    <div class="flex space-x-2">
                        <div>
                            <div
                                class="flex justify-center items-center"
                                x-data="drop_file_component()">
                                <div
                                    class=" p-1 rounded border-dashed border-2 flex flex-col justify-center items-center"
                                    x-bind:class="dropingFile ? 'bg-gray-400 border-gray-500' : 'border-gray-500 bg-gray-200'"
                                    x-on:drop="dropingFile = false"
                                    x-on:drop.prevent="
                                        handleFileDrop($event)
                                    "
                                    x-on:dragover.prevent="dropingFile = true"
                                    x-on:dragleave.prevent="dropingFile = false">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                    </svg>
                                    <div class="text-center" wire:loading.remove wire.target="files">Drop Your Files Here</div>
                                    <div class="mt-1" wire:loading.flex wire.target="files">
                                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        <div>Processing Files</div>
                                    </div>
                                </div>
                            </div>
                            <h3>{{count($files)}} Archivos</h3>
                        </div>


                        <div class="mx-5 flex">
                            <button type="button" onclick="clearFiles()" wire:click="clearFilesServer" class="ml-auto my-auto w-fit block px-3 py-2 bg-sky-400 text-white rounded hover:bg-sky-500 ">
                                <svg class="w-6 h-6 text-white font-bold" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-5-4v4h4V3h-4Z"/>
                                </svg>
                                <h3 class="text-2xs">Clear</h3>
                            </button>
                        </div>
                    </div>
                    <div class="flex mx-5">
                        <div class="my-auto">
                            <h3 class="uppercase tracking-wide text-gray-700 text-xs font-bold">Visibilidad</h3>
                            <input wire:model.defer="visible" type="checkbox" class="rounded-md mx-auto block" checked><br><br>
                        </div>
                    </div>
                    <div class="ml-auto mt-5">
                        <div>
                            <div>
                                <button wire:loading wire:target="createProduct" type="button" class="flex items-center ml-auto px-5 py-2 bg-blue-800 text-white rounded hover:bg-blue-900">
                                    <svg aria-hidden="true" class="w-5 h-5 mx-auto  animate-spin text-blue-800 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                    </svg>
                                </button>
                                <button wire:loading.remove wire:click.prevent="createProduct" type="button" class="mx-auto w-full block px-3 py-2 bg-blue-700 text-white rounded hover:bg-blue-800">Crear/Actualizar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>

        {{-- New Category --}}
        @include('livewire.store.modal.newCategory')
    </section>

    {{-- Products List --}}
    <section class="min-h-screen my-5 max-w-screen-2xl border-2 px-5 rounded mx-auto overflow-x-scroll">
        <div>
            <input class="mx-5 my-5 rounded border-gray-200" type="text" wire:model="search" placeholder="Buscar Producto...">
            <select wire:model="selected_category" class="home_quotation_change max-w-[226px] lg:w-11/12 xl:w-auto rounded h-10 border-none bg-gray-100  text-center text-sm text-gray-500">
                <option value="0">Todas las categorías</option>
                @foreach ($categories as $key=>$category)
                    @if ($category->nearest_parent == "")
                        <option value="{{$category->idcategory}}">{{$category->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <table class="table-auto rounded w-full" wire:loading.class.delay = "opacity-50">
            <thead>
              <tr class="text-sm h-10 bg-gray-100">
                <th class="px-5"></th>
                <th class="hover:bg-gray-200 cursor-pointer px-5">Imagenes</th>
                <th class="hover:bg-gray-200 cursor-pointer px-5">Nombre</th>
                <th class="hover:bg-gray-200 cursor-pointer px-5">Descripción</th>
                <th class="hover:bg-gray-200 cursor-pointer px-5">Categoría</th>
                <th class="hover:bg-gray-200 cursor-pointer px-5">Precio(Q)</th>
                <th class="hover:bg-gray-200 cursor-pointer px-5">Precio Oferta(Q)</th>
                <th class="hover:bg-gray-200 cursor-pointer px-5">Link</th>
                <th class="hover:bg-gray-200 cursor-pointer px-5">Visibilidad</th>
                <th class="px-5"></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="text-center border-b h-16 cursor-pointer">
                        <td class="mx-auto"><input class="rounded-sm" type="checkbox"></td>
                        <td><img class="w-10 h-10 mx-auto" src="{{asset('storage/store/'.$product->idproduct.'/'.'0'.$product->img_extension)}}" alt=""></td>
                        <td class="max-w-xs truncate whitespace-nowrap">{{$product->name}}</td>
                        <td class="max-w-xs truncate whitespace-nowrap">{{$product->description}}</td>
                        <td class="max-w-[100px] truncate whitespace-nowrap">{{$product->category_name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->compare_price}}</td>
                        <td>
                            <div class="flex items-center border p-1 rounded hover:bg-gray-100" data-value="{{$product->link}}" onclick="navigator.clipboard.writeText(this.dataset.value); ">
                                <h3 class="max-w-xs truncate whitespace-nowrap">{{$product->link}}</h3>
                                <svg class="w-6 h-6 text-black rounded border " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M18 3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1V9a4 4 0 0 0-4-4h-3a1.99 1.99 0 0 0-1 .267V5a2 2 0 0 1 2-2h7Z" clip-rule="evenodd"/>
                                    <path fill-rule="evenodd" d="M8 7.054V11H4.2a2 2 0 0 1 .281-.432l2.46-2.87A2 2 0 0 1 8 7.054ZM10 7v4a2 2 0 0 1-2 2H4v6a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3Z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </td>
                        <td>
                            @if ($product->visible)
                                <svg class="w-6 h-6 mx-auto text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                                </svg>
                            @else
                                <svg class="w-6 h-6 mx-auto text-red-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z" clip-rule="evenodd"/>
                                </svg>
                            @endif
                        </td>
                        <td><button wire:click="updateProduct({{$product->idproduct}})"  class="mx-5 px-3 py-2 bg-blue-800 text-white hover:bg-blue-900">Editar</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </section>

    @push('child-scripts')
        <script>
            const rates = {{ Js::from($rates) }};
        </script>
        <script src="{{asset('js/quoter.js')}}"></script>
        <script>
            let files_array = [];
            function drop_file_component() {
                return {
                    dropingFile: false,
                    handleFileDrop(e) {
                        files_array.push(e.dataTransfer.files[0]);
                        if (event.dataTransfer.files.length > 0) {
                            const files = files_array;
                            @this.uploadMultiple('files', files,
                                (uploadedFilename) => {}, () => {}, (event) => {}
                            )
                        }
                    }
                };
            }

            function clearFiles(){
                files = '';
                files_array = [];
            }
        </script>
    @endpush
</section>
