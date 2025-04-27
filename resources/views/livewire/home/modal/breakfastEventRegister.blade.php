<section>
  <style>
    [x-cloak] { display: none !important; }
  </style>
  <section x-cloak class="relative z-10" x-show="openEventModal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
      <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
      <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
          <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
              <div class="sm:flex sm:items-start">
                @if($register_success)
                  <section class="flex h-96 min-w-[250px] mx-auto">
                    <div class="my-auto w-fit mx-auto text-center">
                      <svg class="w-10 mx-auto h-10 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                      </svg>
                      <h3 class="text-center mx-auto">
                        !! Registro Exitoso
                      </h3>
                      <h3 class="text-xs font-bold">Recuerda llevar tu DPI el día del evento</h3>
                    </div>
                  </section>
                @else
                  <form class="w-full my-auto">
                      <h3 class="font-bold text-center my-5">Te gustaría saber mas sobre este evento</h3>
                      <fieldset class="min-h-[224px] lg:px-10 text-gray-600">
                          <div class="my-2">
                              <h3 class="text-xs font-bold tracking-widest">Nombre</h3>
                              <input wire:model.defer="name" class="border-gray-200 block mx-auto w-full rounded-lg" type="text" placeholder="Nombre" required>
                              @error('name') <h3 class="text-red-500 text-center text-2xs font-bold">{{ $message }}</h3> @enderror
                          </div>
                          <div class="my-2">
                              <h3 class="text-xs font-bold tracking-widest">Apellido</h3>
                              <input wire:model.defer="lastname" class="border-gray-200 block mx-auto w-full rounded-lg" type="text" placeholder="Apellido" required>
                              @error('lastname') <h3 class="text-red-500 text-center text-2xs font-bold">{{ $message }}</h3> @enderror
                          </div>
                          <div class="my-2">
                              <h3 class="text-xs font-bold tracking-widest">Teléfono</h3>
                              <input wire:model.defer="phone" class="border-gray-200 block mx-auto w-full rounded-lg" type="text" placeholder="Teléfono" required>
                              @error('phone') <h3 class="text-red-500 text-center text-2xs font-bold">{{ $message }}</h3> @enderror
                          </div>
                          <div class="my-2">
                              <h3 class="text-xs font-bold tracking-widest">Email</h3>
                              <input wire:model.defer="email" class="border-gray-200 block mx-auto w-full rounded-lg" type="text" placeholder="Email" required>
                              @error('email') <h3 class="text-red-500 text-center text-2xs font-bold">{{ $message }}</h3> @enderror
                          </div>


                          <div id="my_name_6oDb0ciz1AXZeGh7_wrap" style="display: none" aria-hidden="true">
                            <input id="my_name_6oDb0ciz1AXZeGh7"
                                   wire:model.defer="my_name_6oDb0ciz1AXZeGh7"
                                   type="text"
                                   value=""
                                   autocomplete="nope"
                                   tabindex="-1">
                            <input name="valid_from"
                                   type="text"
                                   value="eyJpdiI6Im9BQkVGSTVXRHM0TFp0K1l5UEpFS3c9PSIsInZhbHVlIjoibm1oSUZJeHBFUFEwbTR2cFpuZEhaUT09IiwibWFjIjoiY2Q1NWJkZjU1MTJmMDU2Nzg5MjM5YTBhNWJjNDhhY2MzNTVkNmNhN2ZhYmM5NjE2MWEyNWIxODk2ZDY4M2UzMyIsInRhZyI6IiJ9"
                                   autocomplete="off"
                                   tabindex="-1">
                          </div>

                          <button wire:loading wire:target="registerEvent" type="button" class="block w-full my-5 px-5 py-3.5 bg-blue-800 text-white rounded-lg hover:bg-blue-900">
                              <svg aria-hidden="true" class="w-5 h-5 mx-auto animate-spin text-blue-800 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                  <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                              </svg>
                          </button>
                          <button wire:loading.remove wire:click.prevent="registerEvent" class="block mx-auto my-5 w-full rounded-lg px-3 py-3 bg-blue-800 text-white hover:bg-blue-900" type="button">Registrarme</button>
                      </fieldset>
                  </form>
                @endif
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
              <button x-on:click="openEventModal = false" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
  </section>
</section>