<div x-cloak class="relative z-10" x-show="feeDetailModal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
          <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
            <div class="">
                <h3 class="font-bold text-base my-2 text-center">Cost-Center China</h3>
                <div class="grid grid-cols-2 gap-0">
                    <div class="border-2 px-2 py-1">
                        <label class="font-bold text-sm">Orig Country</label>
                        <hr class="border border-gray-200 w-10/12 mr-auto">
                        <h3 class="">China</h3>
                    </div>
                    <div class="border-2 px-2 py-1">
                        <label class="font-bold text-sm">POL</label>
                        <hr class="border border-gray-200 w-10/12 mr-auto">
                        <h3 class="">Ningbo</h3>
                    </div>

                    <div class="border-2 px-2 py-1">
                        <label class="font-bold text-sm">Dest Country</label>
                        <hr class="border border-gray-200 w-10/12 mr-auto">
                        <h3 class="">Guatemala</h3>
                    </div>
                    <div class="border-2 px-2 py-1">
                        <label class="font-bold text-sm">POD</label>
                        <hr class="border border-gray-200 w-10/12 mr-auto">
                        <h3 class="">Puerto Quetzal</h3>
                    </div>

                    <div class="border-2 px-2 py-1">
                        <label class="font-bold text-sm">20 STD</label>
                        <hr class="border border-gray-200 w-10/12 mr-auto">
                        <h3 class="">$600.00</h3>
                    </div>
                    <div class="border-2 px-2 py-1">
                        <label class="font-bold text-sm">40 HC</label>
                        <hr class="border border-gray-200 w-10/12 mr-auto">
                        <h3 class="">$600.00</h3>
                    </div>
                    <div class="border-2 px-2 py-1">
                        <label class="font-bold text-sm">40 NOR</label>
                        <hr class="border border-gray-200 w-10/12 mr-auto">
                        <h3 class="">$6,450.00</h3>
                    </div>
                    <div class="border-2 px-2 py-1">
                        <label class="font-bold text-sm">T/T</label>
                        <hr class="border border-gray-200 w-10/12 mr-auto">
                        <h3 class="">30</h3>
                    </div>
                    <div class="border-2 px-2 py-1">
                        <label class="font-bold text-sm">Route</label>
                        <hr class="border border-gray-200 w-10/12 mr-auto">
                        <h3 class="">Directa</h3>
                    </div>
                    <div class="border-2 px-2 py-1">
                        <label class="font-bold text-sm">Route Description</label>
                        <hr class="border border-gray-200 w-10/12 mr-auto">
                        <h3 class="">Ocean Freight Ningbo - PRQ Guatemala</h3>
                    </div>
                </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
            <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-indigo-400 sm:mt-0 sm:w-auto">Editar</button>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
            <button type="button" x-on:click="feeDetailModal=false" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
</div>
