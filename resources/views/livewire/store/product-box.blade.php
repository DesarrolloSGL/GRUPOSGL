<section class="grid grid-cols-1 gap-10 w-11/12 mx-auto sm:grid-cols-2 lg:grid-cols-5 2xl:grid-cols-6">
    @foreach ($products as $product)
        <section  class="border-2 border-gray-100 p-2 rounded-lg  min-w-[180px] max-w-[230px] h-[380px] mx-auto px-4 cursor-pointer bg-white shadow-lg
            transition-all delay-75 hover:shadow-2xl">
            <div class="flex items-center h-5">
                @if((Carbon\Carbon::now())->lte(($product->created_at)->addDays(1)))
                <div class="ml-auto relative flex h-fit w-fit">
                    <div class="relative inline-flex w-fit text-2xs px-1 py-1 bg-sky-500 rounded-lg text-white font-bold tracking-wider">Nuevo</div>
                    <span class="animate-ping-slow absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                </div>
                @endif
            </div>
            <div class="w-32 h-32 mx-auto my-2 rounded-xl flex items-center xl:w-40 xl:h-40">
                <img class="mx-auto my-2 rounded-xl" src="{{asset('storage/store/'.$product->idproduct.'/0'.$product->img_extension)}}">
            </daiv>
            <div class="h-12 w-40 mx-auto text-center line-clamp-3 font-bold text-xs my-3">
            {{$product->name}}
            </div>
            <div class="w-fit ml-auto my-2 flex space-x-1 h-6">
                @if($product->compare_price)
                <h3 class="text-xs py-1 opacity-90 rounded-lg text-blue-800 font-bold bg-blue-100 px-1">
                    -{{ number_format((float)($product->price-$product->compare_price)/$product->price*100, 0, '.', '')}}%
                </h3>
                <h3 class="text-xs py-1 opacity-90 rounded-lg text-blue-800 font-bold line-through tracking-wider">
                    Q {{ number_format((float)$product->price, 2, '.', '')}}
                </h3>
                @endif
            </div>
            <div class="ml-auto w-fit">
                <span class="px-3 py-1 text-lg rounded-lg text-blue-700 font-bold">
                    Q {{ $product->compare_price ? (number_format((float)$product->compare_price, 2, '.', '')):(number_format((float)$product->price, 2, '.', ''))}}
                </span>
            </div>
            <div>
                <a href="/store-product/{{$product->sku}}" wire:key="sku-{{$product->sku}}"  target="_blank">
                    <button type="button" class="text-center rounded-full px-3 py-1 w-full bg-global-700 text-white hover:bg-global-800 transition-all delay-75">
                        Ver Producto
                    </button>
                </a>
            </div>
        </section>
    @endforeach
</section>

