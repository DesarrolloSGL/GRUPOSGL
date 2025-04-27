
<div class="relative z-10" x-show="openAddressModal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
          <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
                <form class="w-full">

                    <fieldset
                        class="min-h-[224px] lg:px-10 text-gray-600"
                        x-data="{ deliver_select_js: '0'}"
                    >
                        <div class="my-2">
                            <h3 class="text-xs font-bold tracking-widest">Selecciona Dirección</h3>
                            <select x-model="deliver_select_js" wire:model.defer='deliver_select' class="border-gray-200 block w-full text-center mx-auto rounded-lg py-2 px-1">
                                <option value="0">Selecciona una opción</option>
                                <option value="1">Dirección Guatemala</option>
                                <option value="2">Agencia Zona 13</option>
                            </select>
                            @error('deliver_select') <h3 class="text-red-500 text-center text-2xs font-bold">{{ $message }}</h3> @enderror
                        </div>

                        <div x-show="deliver_select_js == 1">
                            <div class="my-2">
                                <h3 class="text-xs font-bold tracking-widest">Selecciona Departamento</h3>
                                <select wire:model.defer="departamento" class="border-gray-200 block w-full text-center mx-auto rounded-lg py-2 px-1">
                                    <option value="0">Departamento</option>
                                    <option value="1">Guatemala</option>
                                </select>
                                @error('departamento') <h3 class="text-red-500 text-center text-2xs font-bold">{{ $message }}</h3> @enderror
                            </div>
                            <div class="my-2">
                                <h3 class="text-xs font-bold tracking-widest">Selecciona Municipio</h3>
                                <select wire:model.defer="municipio" class="border-gray-200 block w-full text-center mx-auto rounded-lg py-2 px-1">
                                    <option value="0">Municipio</option>
                                    <option value="1">Cda.Guatemala</option>
                                    <option value="2">Santa Catarina Pinula</option>
                                    <option value="3">San José Pinula</option>
                                    <option value="4">San José del Golfo</option>
                                    <option value="5">Palencia</option>
                                    <option value="6">Chinautla</option>
                                    <option value="7">San Pedro Ayampuc</option>
                                    <option value="8">Mixco</option>
                                    <option value="9">San Pedro Sacatepéquez</option>
                                    <option value="10">San Juan Sacatepequez</option>
                                    <option value="11">San Raymundo</option>
                                    <option value="12">Chuarrancho</option>
                                    <option value="13">Fraijanes</option>
                                    <option value="14">Amatitlan</option>
                                    <option value="15">Villa nueva</option>
                                    <option value="16">Villa Canales</option>
                                    <option value="17">San Miguel Petapa</option>
                                </select>
                                @error('municipio') <h3 class="text-red-500 text-center text-2xs font-bold">{{ $message }}</h3> @enderror
                            </div>
                            <div class="my-2">
                                <h3 class="text-xs font-bold tracking-widest">Dirección</h3>
                                <input wire:model.defer="address" class="border-gray-200 block mx-auto w-full rounded-lg" type="text" placeholder="Direccion">
                                @error('address') <h3 class="text-red-500 text-center text-2xs font-bold">{{ $message }}</h3> @enderror
                            </div>
                            <div class="my-2">
                                <h3 class="text-xs font-bold tracking-widest">Referencia(opcional)</h3>
                                <input wire:model.defer="address_reference" class="border-gray-200 block mx-auto w-full rounded-lg" type="text" placeholder="Referencia">
                                @error('address_reference') <h3 class="text-red-500 text-center text-2xs font-bold">{{ $message }}</h3> @enderror
                            </div>
                        </div>
                        <div :class="deliver_select_js != 0 ? 'block':'hidden'">
                            <div class="my-2">
                                <h3 class="text-xs font-bold tracking-widest">Nombre de Quien Recibe</h3>
                                <input wire:model.defer="receiver_name" class="border-gray-200 block mx-auto w-full rounded-lg" type="text" placeholder="Nombre Recibe">
                                @error('receiver_name') <h3 class="text-red-500 text-center text-2xs font-bold">{{ $message }}</h3> @enderror
                            </div>
                            <div class="my-2">
                                <h3 class="text-xs font-bold tracking-widest">Apellido de Quien Recibe</h3>
                                <input wire:model.defer="receiver_lastname" class="border-gray-200 block mx-auto w-full rounded-lg" type="text" placeholder="Apellido Recibe">
                                @error('receiver_lastname') <h3 class="text-red-500 text-center text-2xs font-bold">{{ $message }}</h3> @enderror
                            </div>
                            <div class="my-2">
                                <h3 class="text-xs font-bold tracking-widest">Teléfono</h3>
                                <input wire:model.defer="receiver_phone" class="border-gray-200 block mx-auto w-full rounded-lg" type="text" placeholder="Phone">
                                @error('receiver_phone') <h3 class="text-red-500 text-center text-2xs font-bold">{{ $message }}</h3> @enderror
                            </div>
                            <button wire:loading wire:target="saveAddress" type="button" class="block w-full my-5 px-5 py-3.5 bg-sky-800 text-white rounded-lg hover:bg-sky-900">
                                <svg aria-hidden="true" class="w-5 h-5 mx-auto animate-spin text-blue-800 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                </svg>
                            </button>
                            <button wire:loading.remove wire:click.prevent="saveAddress" class="block mx-auto my-5 w-full rounded-lg px-3 py-3 bg-sky-800 text-white hover:bg-sky-900" type="button">Añadir Contacto</button>
                        </div>
                    </fieldset>
                </form>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
            <button x-on:click="openAddressModal = false" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    @push('child-scripts')
        <script>
            document.addEventListener("alpine:init", () => {
                Alpine.data("AddressModal", (initialOpenState = false) => ({
                    openAddressModal: initialOpenState,
                    close() {
                        this.openAddressModal = false;
                    },
                }));
            });

            // From Livewire $this->emit('alert-remove');
            // $(document).ready(function(){
            //     window.livewire.on('alert-remove',()=>{
            //         setTimeout(function(){
            //             $(".alert-success").fadeOut('fast');
            //         }, 3000);
            //     });
            // });
        </script>
    @endpush
</div>