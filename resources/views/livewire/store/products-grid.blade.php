<section class="w-full relative border-t-2" x-data="{ cart_open: false , cat_open: false }">

  {{--First Block--}}
  {{-- Cart Nav  --}}
  <section class="my-5 sticky top-10 flex items-center rounded-lg mx-auto w-11/12">
    {{-- Menu --}}
    <button type="button" class=" inline-flex mr-auto items-center p-3 text-sm font-medium text-center text-white bg-global-700 rounded-2xl hover:bg-global-800 focus:ring-4 focus:outline-none focus:ring-global-300 xl:hidden" x-on:click="cat_open = ! cat_open; cart_open = false">
      <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
      </svg>
    </button>
    {{-- Cart --}}
    <button type="button" class="animate-pulse relative inline-flex ml-auto items-center p-3 text-sm font-medium text-center text-white bg-global-700 rounded-2xl hover:bg-global-800 focus:ring-4 focus:outline-none focus:ring-global-300" x-on:click="cart_open = ! cart_open; cat_open = false">
      <svg class="w-6 h-6 text-white {{session('message')? 'animate-bounce':false}}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
        <path fill-rule="evenodd" d="M4 4a1 1 0 0 1 1-1h1.5a1 1 0 0 1 .979.796L7.939 6H19a1 1 0 0 1 .979 1.204l-1.25 6a1 1 0 0 1-.979.796H9.605l.208 1H17a3 3 0 1 1-2.83 2h-2.34a3 3 0 1 1-4.009-1.76L5.686 5H5a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
      </svg>
      <span class="sr-only"></span>
        <div class="{{session('message')? 'animate-bounce':false}} absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-sky-500 border rounded-full -top-2 -end-2">
          {{$cart_items_counter}}
        </div>
      </button>
  </section>
  {{-- End First Block --}}

  <section class="w-fit my-5 mx-auto" x-data="{openDetailProductModal : false}">
    <style>
        [x-cloak] { display: none !important; }
    </style>
    {{-- Second Block --}}
    {{-- Product Grid - Categories --}}
    <section  class="flex" >
        {{-- Left Nav --}}
        <section class="w-3/12 mx-5 hidden xl:block">
          <section class="bg-global-50 text-global-800 w-full h-fit rounded-t-lg border">
              <div class="w-full h-fit" x-data="{ activeButton: ''}">
                  <div wire:click="selectCategory('{{null}}')" :class="activeButton === 'null' ? 'bg-global-300':''" x-on:click="activeButton = 'null'" wire:key="null"
                  class="text-sm text-left cursor-pointer py-2 px-4 text-black tracking-wider rounded-t-lg hover:bg-global-300 hover:text-global-900">
                      All
                  </div>

                  @foreach ($category_list as $key=>$category)
                    @if ($category->idcategory == 156)
                      <div
                      :class="activeButton === '{{ $key }}' ? 'bg-gray-700':''"
                      x-on:click="activeButton = '{{ $key }}'"
                      wire:key="{{ $key }}"
                      wire:click="selectCategory('{{$category->idcategory}}')"
                      class="text-sm text-left cursor-pointer py-2 px-4 bg-black text-white hover:bg-gray-700 tracking-wider">
                          {{$category->name}}
                      </div>
                    @endif

                    @if ($category->idcategory == 163)
                      <div
                      :class="activeButton === '{{ $key }}' ? 'bg-amber-300':''"
                      x-on:click="activeButton = '{{ $key }}'"
                      wire:key="{{ $key }}"
                      wire:click="selectCategory('{{$category->idcategory}}')"
                      class="text-sm text-left cursor-pointer py-2 px-4 bg-amber-400 text-black hover:bg-amber-300 tracking-wider">
                          {{$category->name}}
                      </div>
                    @endif

                    @if ($category->idcategory == 164)
                      <div
                      :class="activeButton === '{{ $key }}' ? 'bg-orange-400':''"
                      x-on:click="activeButton = '{{ $key }}'"
                      wire:key="{{ $key }}"
                      wire:click="selectCategory('{{$category->idcategory}}')"
                      class="text-sm text-left cursor-pointer py-2 px-4 bg-orange-500 text-white hover:bg-orange-400 tracking-wider">
                          {{$category->name}}
                      </div>
                    @endif
                  @endforeach

                  @foreach ($category_list as $key=>$category)
                      @if ($category->nearest_parent == null && $category->idcategory != 156 && $category->idcategory != 163 && $category->idcategory != 164)
                          <div
                          :class="activeButton === '{{ $key }}' ? 'bg-global-300':''"
                          x-on:click="activeButton = '{{ $key }}'"
                          wire:key="{{ $key }}"
                          wire:click="selectCategory('{{$category->idcategory}}')"
                          class="text-sm text-left cursor-pointer py-2 px-4 text-black tracking-wider hover:bg-global-300 hover:text-global-900">
                              {{$category->name}}
                          </div>
                      @endif
                  @endforeach
              </div>
          </section>
          <img class="my-5 rounded-lg" src="{{asset('images/store/baners página web_4.png')}}" alt="">
        </section>
        {{-- End Left Nav --}}


        @include('livewire.store.modal.detailProduct')

        {{-- Center Panel --}}
        <section class="mx-5 w-full">
            <div class="grid grid-cols-1 gap-y-2 gap-x-1 w-full sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4" wire:target="selectCategory,gotoPage,previousPage,nextPage" wire:loading.class.delay = "opacity-50" wire:loading.class = "pointer-events-none">
                @foreach ($products_list as $key => $product)
                  <section  class="border-2 border-gray-100 p-2 rounded-lg  min-w-[180px] max-w-[230px] h-[380px] mx-auto px-4 cursor-pointer bg-white
                    transition-all delay-75 hover:shadow-lg">
                      <a href="/store-product/{{$product->sku}}" wire:key="sku-{{$product->sku}}">
                        <div class="flex items-center h-5">
                            @if((Carbon\Carbon::now())->lte(($product->created_at)->addDays(1)))
                              <div class="ml-auto relative flex h-fit w-fit">
                                  <div class="relative inline-flex w-fit text-2xs px-1 py-1 bg-sky-500 rounded-lg text-white font-bold tracking-wider">Nuevo</div>
                                  <span class="animate-ping-slow absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                              </div>
                            @endif
                        </div>
                        <div class="w-32 h-32 mx-auto my-2 rounded-xl flex items-center xl:w-40 xl:h-40">
                            <img class="max-h-full mx-auto my-2 rounded-xl" src="{{asset('storage/store/'.$product->idproduct.'/0'.$product->img_extension)}}">
                        </div>
                        <div class="h-12 w-40 mx-auto text-center line-clamp-3 text-xs my-3">
                          {{$product->name}}
                        </div>
                        <div class="w-fit ml-auto my-2 flex space-x-1 h-6">
                            @if($product->compare_price)
                              <h3 class="text-xs py-1 opacity-90 rounded-lg text-global-800 font-bold bg-global-100 px-1">
                                -{{ number_format((float)($product->price-$product->compare_price)/$product->price*100, 0, '.', '')}}%
                              </h3>
                              <h3 class="text-xs py-1 opacity-90 rounded-lg text-global-800 font-bold line-through tracking-wider">
                                Q {{ number_format((float)$product->price, 2, '.', '')}}
                              </h3>
                            @endif
                        </div>

                        <div class="ml-auto w-fit">
                            <span class="px-3 py-1 text-lg rounded-lg text-global-700 font-bold">
                                Q {{ $product->compare_price ? (number_format((float)$product->compare_price, 2, '.', '')):(number_format((float)$product->price, 2, '.', ''))}}
                            </span>
                        </div>
                      </a>
                      @if(!($product->variant))
                        <div>
                            <button wire:loading wire:target="addCart({{$product->idproduct}})" wire:key="remove-{{$product->idproduct}}" type="button" class="flex items-center w-full px-3 py-1 bg-global-700 text-white rounded-full">
                                <svg aria-hidden="true" class="w-5 h-5 mx-auto  animate-spin text-global-700 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                </svg>
                            </button>
                            <button wire:loading.remove wire:target="addCart({{$product->idproduct}})" wire:click='addCart({{$product->idproduct}})' wire:key="add-{{$product->idproduct}}" type="button" class="text-center rounded-full px-3 py-1 w-full bg-global-700 text-white hover:bg-global-800 transition-all delay-75">
                                Añadir +
                            </button>
                        </div>
                      @else
                        <a href="/store-product/{{$product->sku}}" wire:key="sku-{{$product->sku}}">
                          <button type="button" class="text-center rounded-full px-3 py-1 w-full bg-global-700 text-white hover:bg-global-800 transition-all delay-75">
                            Ver
                          </button>
                        </a>
                      @endif
                  </section>
                @endforeach
            </div>
            <div class="my-5 w-fit max-w-full mx-auto">
                {{$products_list->onEachSide(1)->links('custom-pagintation-links-view')}}
            </div>
        </section>
        {{-- End Center Panel --}}

        {{-- Right Panel --}}
        <section class="w-3/12 mx-5 hidden xl:block">
          <img class="my-5 rounded-lg" src="{{asset('images/store/baners página web_1.png')}}" alt="">
        </section>
        {{-- End Right Panel --}}
    </section>
    {{-- End Second Block --}}

    {{-- Cart --}}
    <section x-cloak>
      <div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
        <div class="absolute inset-0 overflow-hidden">
          <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
            <div class="pointer-events-auto w-screen max-w-md transform transition ease-in-out duration-500" :class="cart_open ? 'translate-x-0' : 'translate-x-full'">
              <div class="flex h-full flex-col overflow-y-scroll rounded-lg bg-white shadow-xl">
                <div class="flex-1 overflow-y-auto px-2 py-6 sm:px-6">
                  <div class="flex items-start justify-between">
                    <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Shopping cart</h2>
                    <div class="ml-3 flex h-7 items-center">
                      <button type="button" class="relative m-2 p-2 text-gray-400 hover:text-gray-500" x-on:click="cart_open = false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Close panel</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                      </button>
                    </div>
                  </div>

                  <div class="mt-8">
                    <div class="flow-root">
                      <ul role="list" class="-my-6 divide-y divide-gray-200">
                        <li class="py-6" wire:loading wire:target="addCart,addUnits,decreaseUnits,removeCart">
                          <div class="w-fit mx-auto">
                            <svg aria-hidden="true" class="w-10 h-10 text-gray-200 animate-spin  fill-gray-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                            </svg>
                          </div>
                        </li>
                        @foreach ($cart_items as $key=>$item)
                          <li class="flex py-6" wire:loading.class.delay = "opacity-50" wire:loading.class = "pointer-events-none" wire:target="addCart,addUnits,decreaseUnits,removeCart">
                            <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                              <img class="max-w-40 max-h-40 mx-auto my-2 rounded-xl" src="{{asset('storage/store/'.$item['idproduct'].'/0'.$item['img_extension'])}}" alt="">
                            </div>

                            <div class="ml-0.5 flex flex-1 flex-col sm:ml-4">
                              <div>
                                <div class="flex justify-between text-base font-medium text-gray-900">
                                  <div class="line-clamp-3 cursor-pointer" x-on:click="openDetailProductModal = true " wire:click="getProductDetail({{$item['idproduct']}})">
                                    <h3>{{$item['name']}}</h3>
                                    <h3 class="font-bold text-xs">{{$item['selected_variant']}}</h3>
                                  </div>
                                  <div>
                                      <p class="font-bold">Q{{ number_format((float)$item['total'], 2, '.', '')}}</p>
                                    @if ($item['units_cart']>1)
                                      <p class="text-xs">Q{{ number_format((float)$item['total']/$item['units_cart'], 2, '.', '')}}c/u</p>
                                    @endif
                                  </div>
                                </div>
                                <p class="mt-1 text-sm text-gray-500"></p>
                              </div>
                              <div class="flex flex-1 items-end justify-between text-sm">
                                <div class="flex">
                                  <button {{$item['units_cart'] > 1 ? '':'disabled'}} wire:click='decreaseUnits({{$item['idproduct']}})' type="button">
                                    <svg class="w-6 h-6 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm5.757-1a1 1 0 1 0 0 2h8.486a1 1 0 1 0 0-2H7.757Z" clip-rule="evenodd"/>
                                    </svg>
                                  </button>
                                  <p>{{$item['units_cart']}}</p>
                                  <button {{$item['units_cart'] < 10 ? '':'disabled'}}  wire:click='addUnits({{$item['idproduct']}})' type="button">
                                    <svg class="w-6 h-6 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd"/>
                                    </svg>
                                  </button>
                                </div>

                                <div class="flex">
                                  <button wire:click='removeCart({{$item['idproduct']}})' type="button" class="text-center rounded-full px-3 py-1 w-full bg-global-700 text-white hover:bg-global-800 transition-all delay-75">
                                    Remover
                                  </button>
                                </div>
                              </div>
                            </div>
                          </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>

                {{-- Footer --}}
                <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                  <div class="flex text-gray-900">
                    <h3 class="ml-auto text-lg font-bold">Total: Q{{ number_format((float)$total_session, 2, '.', '')}}</h3>
                  </div>
                  <div class="mt-6">
                    <a href="/store-checkout" class="flex items-center justify-center rounded-md border border-transparent bg-global-700 px-6 py-3 text-base font-medium text-white shadow-sm">
                      Completar Compra
                    </a>
                  </div>
                  <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                    <p>
                      o
                      <button type="button" class="font-medium text-global-700" x-on:click="cart_open = false">
                        Continuar Comprando
                        <span aria-hidden="true"> &rarr;</span>
                      </button>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- Categories Menu --}}
    <section x-cloak>
      <div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
            <div class="absolute inset-0 overflow-hidden">
              <div class="pointer-events-none fixed inset-y-0 left-0 flex max-w-full pr-10">
                <div class="pointer-events-auto w-screen max-w-md transform transition ease-in-out duration-500" :class="cat_open ? 'translate-x-0' : '-translate-x-full'">
                  <div class="flex h-full flex-col overflow-y-scroll rounded-lg bg-white shadow-xl">
                    <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                      <div class="flex items-start justify-between">
                        <h2 class="text-lg font-medium text-gray-900" id="slide-over-title"></h2>
                        <div class="ml-3 flex h-7 items-center">
                          <button type="button" class="relative -m-2 p-2 text-gray-400 hover:text-gray-500" x-on:click="cat_open = false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Close panel</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                          </button>
                        </div>
                      </div>

                      <div class="mt-8">
                        <div class="flow-root">
                          <section class="bg-white shadow-sm w-full  h-fit xl:block">
                            <div class="w-full h-fit" x-data="{ activeButton: ''}">
                                <div x-on:click="cat_open = false" wire:click="selectCategory('{{null}}')" :class="activeButton === 'null' ? 'bg-gray-200':''" x-on:click="activeButton = 'null'" wire:key="null" class="text-center cursor-pointer px-2 py-1 text-black hover:bg-gray-100 border-b">
                                    All
                                </div>
                                @foreach ($category_list as $key=>$category)
                                  @if ($category->idcategory == 156)
                                    <div
                                    :class="activeButton === '{{ $key }}' ? 'bg-gray-700':''"
                                    x-on:click="activeButton = '{{ $key }}'"
                                    wire:key="{{ $key }}"
                                    wire:click="selectCategory('{{$category->idcategory}}')"
                                    class="text-sm text-center cursor-pointer px-2 py-1 bg-black text-white hover:bg-gray-700 font-bold tracking-wider border rounded-lg my-0.5">
                                        {{$category->name}}
                                    </div>
                                  @endif

                                  @if ($category->idcategory == 163)
                                    <div
                                    :class="activeButton === '{{ $key }}' ? 'bg-amber-300':''"
                                    x-on:click="activeButton = '{{ $key }}'"
                                    wire:key="{{ $key }}"
                                    wire:click="selectCategory('{{$category->idcategory}}')"
                                    class="text-sm text-center cursor-pointer px-2 py-1 bg-amber-400 text-black hover:bg-amber-300 font-bold tracking-wider border rounded-lg my-0.5">
                                        {{$category->name}}
                                    </div>
                                  @endif

                                  @if ($category->idcategory == 164)
                                    <div
                                    :class="activeButton === '{{ $key }}' ? 'bg-orange-400':''"
                                    x-on:click="activeButton = '{{ $key }}'"
                                    wire:key="{{ $key }}"
                                    wire:click="selectCategory('{{$category->idcategory}}')"
                                    class="text-sm text-center cursor-pointer px-2 py-1 bg-orange-500 text-white hover:bg-orange-400 font-bold tracking-wider border rounded-lg my-0.5">
                                        {{$category->name}}
                                    </div>
                                  @endif
                                @endforeach

                                @foreach ($category_list as $key=>$category)
                                    @if ($category->nearest_parent == null && $category->idcategory != 156 && $category->idcategory != 163 && $category->idcategory != 164)
                                        <div
                                        :class="activeButton === '{{ $key }}' ? 'bg-gray-200':''"
                                        x-on:click="activeButton = '{{ $key }}' ; cat_open = false"
                                        wire:key="{{ $key }}"
                                        wire:click="selectCategory('{{$category->idcategory}}')"
                                        class="border-b text-center cursor-pointer px-2 py-1 text-black hover:bg-gray-100">
                                            {{$category->name}}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </section>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
      </div>
    </section>

  </section>

  @if(session('message'))
    <div class="alert-success fixed bottom-0 z-50 w-full h-10">
      <div class="flex h-full w-full bg-lime-500 text-white">
        <h3 class="mx-auto w-fit my-auto font-bold tracking-wider">{{session('message')}}</h3>
      </div>
    </div>
  @endif
  @push('child-scripts')
    <script>
        $(document).ready(function(){
            window.livewire.on('alert-remove',()=>{
                setTimeout(function(){
                    $(".alert-success").fadeOut('slow');
                    $(".animate-bounce").removeClass('animate-bounce');
                }, 5000);
            });
        });
    </script>
  @endpush

</section>

