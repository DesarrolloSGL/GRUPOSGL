@extends('user.base')


@section('user-content')
<section class="min-h-screen xl:px-32">
    <h3 class="font-bold text-xl">Mis Ordenes</h3>
    <div class="overflow-auto  border-r border-l  rounded-md p-1">
        @foreach ($orders as $order)
        @php
            switch ($order->order_type)
            {
                case 1:
                    $courier = 'Courier Nacional';
                    break;
                case 2:
                    $courier = 'Courier Miami';
                    break;
                case 3:
                    $courier = 'Courier China';
                    break;
                case 4:
                    $courier = 'Tienda';
                    break;
                case 5:
                    $courier = 'Tienda';
                    break;
                default:
                    $courier = null;
                    break;
            }
        @endphp
        <a href="/user-order/{{$order->idorder}}">
            <div class="py-1 cursor-pointer flex">
                <div class="mr-auto ml-5 text-xs md:text-sm lg:text-base">
                    <h3 class="">Orden {{$order->order_number}}</h3>
                    <div class="flex space-x-2 items-center bg-blue-100 text-blue-800 py-2 px-2 rounded-lg w-fit">
                        <svg class="w-5 h-5 text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                            <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v2H7V2ZM5 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm0-4a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm8 4H8a1 1 0 0 1 0-2h5a1 1 0 0 1 0 2Zm0-4H8a1 1 0 0 1 0-2h5a1 1 0 1 1 0 2Z"/>
                        </svg>
                        <h3 class="whitespace-nowrap font-bold text-sm">{{$courier}}</h3>
                    </div>
                    <h3 class="text-2xs md:text-xs">{{$order->created_at}}</h3>
                </div>

                <div class="ml-auto text-xs md:text-sm lg:text-lg">
                    <h3 class="border border-blue-100 text-blue-800 font-mono px-1 py-1 rounded-lg">{{$order->currency}}{{number_format((float)$order->total, 2, '.', '')}}</h3>
                </div>
            </div>
        </a>
        <hr class="border-gray-300 w-11/12 mx-auto">
        @endforeach
    </div>

</section>
@endsection
