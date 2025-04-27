<section>
  <style>
    [x-cloak] { display: none !important; }
  </style>
  {{-- x-show="openUploadBankNoteModal" --}}
  <div x-cloak class="relative z-10" x-show="openUploadBankNoteModal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
      <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
      <div class="fixed inset-0 z-10 w-screen overflow-y-auto p-2">
        <div class="flex min-h-full items-end justify-center p-1 text-center sm:items-center sm:p-0">
          <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-3/12 sm:max-w-6xl">
            <div class="bg-white pb-1 pt-1">
              <div class="flex items-center">
                  <section class="mx-auto w-10/12 my-10 h-96 bg-gray-50 rounded-lg">
                    <div class="flex justify-center items-center">
                      <div wire:loading wire:target='getBankStatus'>
                        <div class="w-fit mx-auto my-auto">
                          <svg class="mx-auto w-14 h-14 text-white animate-bounce rounded-full border-2 p-2 bg-blue-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 7.205c4.418 0 8-1.165 8-2.602C20 3.165 16.418 2 12 2S4 3.165 4 4.603c0 1.437 3.582 2.602 8 2.602ZM12 22c4.963 0 8-1.686 8-2.603v-4.404c-.052.032-.112.06-.165.09a7.75 7.75 0 0 1-.745.387c-.193.088-.394.173-.6.253-.063.024-.124.05-.189.073a18.934 18.934 0 0 1-6.3.998c-2.135.027-4.26-.31-6.3-.998-.065-.024-.126-.05-.189-.073a10.143 10.143 0 0 1-.852-.373 7.75 7.75 0 0 1-.493-.267c-.053-.03-.113-.058-.165-.09v4.404C4 20.315 7.037 22 12 22Zm7.09-13.928a9.91 9.91 0 0 1-.6.253c-.063.025-.124.05-.189.074a18.935 18.935 0 0 1-6.3.998c-2.135.027-4.26-.31-6.3-.998-.065-.024-.126-.05-.189-.074a10.163 10.163 0 0 1-.852-.372 7.816 7.816 0 0 1-.493-.268c-.055-.03-.115-.058-.167-.09V12c0 .917 3.037 2.603 8 2.603s8-1.686 8-2.603V7.596c-.052.031-.112.059-.165.09a7.816 7.816 0 0 1-.745.386Z"/>
                          </svg>
                          <h3 class="font-mono text-center">Cargando...</h3>
                        </div>
                      </div>
                    </div>

                      <div wire:loading.remove wire:target='getBankStatus'>
                        <h3 class="font-bold text-center font-mono text-lg">{{$order_number_test}}</h3>
                        @if ($aproval_user)
                          <h3 class="font-bold text-center font-mono text-lg">Pago Aprobado Por {{$aproval_user}}</h3>
                        @endif

                        @if ($uploadedNote)
                          <div class="w-fit mx-auto my-10">
                            <h3 class="font-bold text-center text-blue-800 font-mono text-lg">Boleta Cargada</h3>


                            <button wire:loading wire:target='downloadNote' class="flex mx-auto w-32 rounded-lg px-3 py-2 bg-blue-800 text-white items-center space-x-1">
                              <svg aria-hidden="true" class="w-5 h-5 mx-auto  animate-spin text-blue-800 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                              </svg>
                            </button>

                            <button wire:loading.remove wire:target='downloadNote' wire:click='downloadNote' class="flex mx-auto rounded-lg px-3 py-2 bg-blue-800 text-white items-center space-x-1">
                              <svg   class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M13 11.15V4a1 1 0 1 0-2 0v7.15L8.78 8.374a1 1 0 1 0-1.56 1.25l4 5a1 1 0 0 0 1.56 0l4-5a1 1 0 1 0-1.56-1.25L13 11.15Z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M9.657 15.874 7.358 13H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.358l-2.3 2.874a3 3 0 0 1-4.685 0ZM17 16a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z" clip-rule="evenodd"/>
                              </svg>
                              <h3>Descargar</h3>
                            </button>
                          </div>
                        @endif

                        <form class="mx-auto w-fit my-10" wire:loading.remove wire:target='getBankStatus'>
                          @if (!$uploadedNote)
                            <label for="new_product_image">
                                <div class="w-full py-5 border border-gray-300 rounded-lg transition-all delay-75 bg-gray-100 hover:bg-gray-50">
                                    <svg class="w-6 h-6 text-gray-400 mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd"/>
                                    </svg>
                                    <h3 class="text-2xs font-bold text-center">Click Para Cargar</h3>
                                </div>
                                <input id="new_product_image" wire:model.defer.prevent="file" class="rounded-lg border border-gray-300 h-9" type="file" multiple hidden/>
                            </label>
                            @error('file') <h3 class="text-red-500 text-2xs font-bold">{{ $message }}</h3> @enderror
                          @endif

                          @if($file)
                            <button wire:loading wire:target='uploadFile' class="flex my-5 font-mono w-36 rounded-lg px-3 py-2 bg-blue-700 text-white items-center space-x-1">
                              <svg aria-hidden="true" class="w-5 h-5 mx-auto  animate-spin text-blue-700 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                              </svg>
                            </button>

                            <button wire:loading.remove wire:target='uploadFile' wire:click.prevent='uploadFile()' wire:key='upload_{{$order_number_test}}' type="button" class="bg-blue-700 text-white my-5 px-2 py-2 rounded-lg font-mono">Guardar Archivo</button>
                          @endif

                          <div wire:loading wire:target='file'>
                              <span class="font-bold font-mono animate-ping text-black text-sm">Subiendo...</span>
                          </div>

                          @if ($payment_status != 3)
                            <button wire:loading wire:target='ApprovePayment' class="flex my-5 font-mono w-32 rounded-lg px-3 py-2 bg-green-500 text-white items-center space-x-1">
                              <svg aria-hidden="true" class="w-5 h-5 mx-auto  animate-spin text-green-500 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                              </svg>
                            </button>

                            <button  wire:loading.remove wire:target='ApprovePayment' wire:click.prevent='ApprovePayment()' type="button" class="bg-green-500 text-white my-5 px-3 py-2 rounded-lg font-mono {{$uploadedNote? false:'opacity-50 pointer-events-none'}}">Aprobar Pago</button>
                            <h3 class="text-xs font-mono">Debes cargar la boleta antes de aprobar el pago</h3>
                          @endif

                          @role('super-admin')
                            @if ($payment_status != 3)
                              <button wire:loading wire:target='SuperApprovePayment' class="flex my-5 font-mono w-32 rounded-lg px-3 py-2 bg-purple-600 text-white items-center space-x-1">
                                <svg aria-hidden="true" class="w-5 h-5 mx-auto  animate-spin text-purple-600 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                  <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                </svg>
                              </button>

                              <button wire:loading.remove wire:target='SuperApprovePayment' wire:key='SuperAdminAproval_{{$order_number_test}}' wire:click.prevent='SuperApprovePayment()' type="button" class="bg-purple-600 text-white my-5 px-3 py-2 rounded-lg font-mono">Aprobar Pago (SuperAdmin)</button>
                              <h3 class="text-xs font-mono">Botón para aprobar el pago sin subir la boleta. Unicamente para usuarios SuperAdmin</h3>
                            @endif
                          @endrole
                        </form>
                      </div>
                  </section>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
              <button x-on:click="openUploadBankNoteModal = false" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
  </div>
</section>





