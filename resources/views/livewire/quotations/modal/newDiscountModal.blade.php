
<div x-cloak class="relative z-10" x-show="openAddDiscountModal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
  <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
      <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-4xl">
        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
          <div>
              <div class="pointer-events-none opacity-50 border border-gray-300 p-2 my-2">
                  <h3>Work In Progress</h3>
                  <div class="flex space-x-1 my-2.5">
                      <input type="text" class="h-10 rounded-lg border-gray-300" placeholder="Nombre">
                      <input type="text" class="h-10 rounded-lg border-gray-300" placeholder="Descripción">
                      <input type="text" class="h-10 rounded-lg border-gray-300" placeholder="Valor(Q)">
                      <button class="bg-indigo-500 text-white rounded-lg font-bold tracking-wide font-sans block px-5 py-2 transition-all delay-100 hover:bg-indigo-400">Añadir</button>
                  </div>
                  <div class="flex space-x-1 my-2.5">
                      <input type="text" class="h-10 rounded-lg border-gray-300">
                      <button class="bg-indigo-500 text-white rounded-lg font-bold tracking-wide font-sans block px-5 py-2 transition-all delay-100 hover:bg-indigo-400">Buscar</button>
                  </div>
              </div>
              <table class="table-auto rounded-lg w-full mx-auto">
                  <thead>
                      <tr class="text-xs text-center">
                      <th>No.</th>
                      <th>Nombre</th>
                      <th>Descripción</th>
                      <th>Total(Q)</th>
                      <th></th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($extra_discount as $key=>$item)
                          <tr class="text-center">
                              <td class="border p-1 text-xs text-center">
                                  {{$key}}
                              </td>

                              <td class="border p-1 text-xs text-center">
                                  {{$item->name}}
                              </td>

                              <td class="border p-1 text-xs text-center">
                                  {{$item->description}}
                              </td>

                              <td class="border p-1 text-xs text-center font-bold">
                                  {{number_format((float)$item->total ,2 , '.', ',')}}
                              </td>

                              <td class="border p-1 text-base text-center">
                                  <div class="mx-auto h-10 w-10">
                                      <button wire:loading wire:target="miamiNewDiscountAdd({{$item->idcourier_extra_cost}})" wire:key='NewDiscountLoad_{{$item->idcourier_extra_cost}}' class="bg-indigo-500 text-white block w-full h-full rounded-lg font-bold tracking-wide font-sans transition-all delay-100 hover:bg-indigo-400">
                                          <svg aria-hidden="true" class="w-full h-5 mx-auto animate-spin text-indigo-500 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                              <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                              <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                          </svg>
                                      </button>
                                      <button wire:loading.remove wire:target="miamiNewDiscountAdd({{$item->idcourier_extra_cost}})" wire:key='NewDiscount_{{$item->idcourier_extra_cost}}' wire:click='miamiNewDiscountAdd({{$item->idcourier_extra_cost}})' class="bg-indigo-500 text-white w-full h-full rounded-lg font-bold tracking-wide font-sans transition-all delay-100 hover:bg-indigo-400">+</button>
                                  </div>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>

              @if (!$extra_discount)
                  <div class="mx-auto w-10 my-5">
                      <div wire:loading wire:target="miamiNewDiscountLoadData" class="bg-white block w-full h-full rounded-lg font-bold tracking-wide font-sans transition-all delay-100 hover:bg-indigo-400">
                          <svg aria-hidden="true" class="w-full h-10 my-auto mx-auto animate-spin text-indigo-500 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                              <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                          </svg>
                      </div>
                  </div>
              @endif
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
          <button x-on:click="openAddDiscountModal = false" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>