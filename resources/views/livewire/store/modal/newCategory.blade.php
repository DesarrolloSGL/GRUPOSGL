
<style>
    [x-cloak] { display: none !important; }
</style>
{{-- x-show="openNewCategoryModal" --}}
<div x-cloak class="relative z-10" x-show="openNewCategoryModal"  aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto p-2">
      <div class="flex min-h-full items-end justify-center p-1 text-center sm:items-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-11/12 sm:max-w-6xl">
          <div class="bg-white pb-1 pt-1">
            <div class="flex items-center">
                <section class=" mx-auto my-10">
                    <form class="mx-auto w-fit">
                        <div>
                            <h3 class="uppercase tracking-wide text-gray-700 text-xs font-bold">Nombre</h3>
                            <input wire:model.defer="category_name" class="rounded border w-full border-gray-300 h-9 bg-gray-100" type="text">
                            @error('category_name') <h3 class="text-red-500 text-2xs font-bold">{{ $message }}</h3> @enderror
                        </div>

                        <div>
                            <h3 class="uppercase tracking-wide text-gray-700 text-xs font-bold">Categoría Padre</h3>
                            <select wire:model.defer="category_parent" class="rounded border border-gray-300  h-9 text-center px-2 w-full bg-gray-100">
                                <option value="0" selected>Selecciona Categoría</option>
                                @foreach ($categories as $key=>$category)
                                    <option value="{{$category->idcategory}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_parent') <h3 class="text-red-500 text-2xs font-bold">{{ $message }}</h3> @enderror
                        </div>

                        <div>
                            <div class="flex items-center my-5">
                                <button wire:loading wire:target="createCategory" type="button" class="my-auto block items-center ml-auto px-5 py-2 bg-blue-800 text-white rounded hover:bg-blue-900">
                                    <svg aria-hidden="true" class="w-5 h-5 mx-auto  animate-spin text-blue-800 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                    </svg>
                                </button>
                                <button wire:loading.remove wire:click.prevent="createCategory" type="button" class="ml-auto my-auto  px-3 py-2 bg-blue-800 text-white rounded hover:bg-blue-900">Crear</button>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
            <button x-on:click="openNewCategoryModal = false" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
</div>






