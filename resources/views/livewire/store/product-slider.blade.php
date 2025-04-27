{{-- w-[1760px] --}}
<section class="w-11/12 mx-auto overflow-x-auto overflow-y-hidden">

    <a href="/store-marketplace-index" class="flex w-fit mx-auto hover:text-global-500">
        <h3 class="font-bold tracking-wide text-center">{{$category_name->name}}</h3>
        <h3 class="mx-2 underline text-xs mt-2">Ver mas</h3>
    </a>

    <div class="w-fit mx-auto flex">
        <style>
            [x-cloak] { display: none !important; }
        </style>
        <div class="flex w-fit mx-auto">
            @foreach ($products as $product)
                <a href="/store-product/{{$product->sku}}" target="_blank">
                    <section class="border-2 border-gray-100 p-2 rounded-xl w-[230px] h-[330px] px-4 cursor-pointer bg-white shadow-lg
                        relative mx-1">

                        <div class="w-40 h-40 mx-auto my-2 rounded-xl  flex items-center">
                            <img class="max-w-40 max-h-40 mx-auto my-2 rounded-xl" src="{{asset('storage/store/'.$product->idproduct.'/0'.$product->img_extension)}}">
                        </div>

                        <div class="h-12 text-center line-clamp-3 font-bold text-xs my-3">
                            <a href="/store-product/{{$product->sku}}" target="_blank">
                                {{$product->name}}
                            </a>
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
                    </section>
                </a>
            @endforeach
        </div>
    </div>
</section>
