@extends('admin.base')

@section('admin-content')
    <section class="flex h-full">
        <div class="  w-2/12 p-1">
        </div>
        <div class="w-full p-5 relative rounded-lg">
            <div class="">
                @if(isset($orders))
                {{-- NO. de identificación personal --}}
                    @foreach ($orders as $order)
                        <div class="border-b-2 flex py-5">
                                <div class="">
                                    @php
                                        if($order->status == 1){
                                            $status = array('text' => 'Pendiente De Cotizar','text_color' => 'text-sky-800', "bg_color" => "bg-sky-300" ,"icon" => "alert");
                                        }
                                        elseif($order->status == 7){
                                            $status = array('text' => 'Cotizada','text_color' => 'text-green-800', "bg_color" => "bg-green-300" ,"icon" => "alert");
                                        }
                                    @endphp
                                    <h3 class="hover:text-blue-400  cursor-pointer">Cotización#{{$order->order_number}}</h3>
                                    <div class="flex  items-center w-fit space-x-1">
                                        <div class="flex bg-blue-100 rounded-lg justify-evenly py-2 px-2">
                                            <svg class="w-5 h-5 text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                                <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v2H7V2ZM5 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm0-4a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm8 4H8a1 1 0 0 1 0-2h5a1 1 0 0 1 0 2Zm0-4H8a1 1 0 0 1 0-2h5a1 1 0 1 1 0 2Z"/>
                                            </svg>
                                            <h3 class="text-sm text-blue-800  text-center mx-1 font-bold">
                                                Tienda
                                            </h3>
                                        </div>

                                        <h3 class="text-xs">{{$order->created_at}}</h3>
                                    </div>
                                    @foreach ($quotations as $quotation)
                                        @if($quotation->order_idorder == $order->idorder)
                                            <h3 class="text-xs mx-5">{{$quotation->email}}</h3>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="ml-auto space-y-1 text-sm">

                                    <div class="flex text-xs px-2 py-1.5 {{$status['text_color']}} {{$status['bg_color']}} w-fit ml-auto rounded-lg items-center space-x-1">
                                        @if(isset($status))
                                            <svg class="w-5 h-5 {{$status['text_color']}}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
                                            </svg>
                                            <h3 class="">
                                                {{$status['text']}}
                                            </h3>
                                        @endif
                                    </div>

                                    <div class="flex space-x-2 items-center">
                                        @if($today->diff($order->created_at)->d == 0)
                                            @if($today->diff($order->created_at)->h == 0)
                                                <h3>Hace menos de una hora</h3>
                                            @else
                                                <h3>Hace {{$today->diff($order->created_at)->h <= 24 ? $today->diff($order->created_at)->h.' horas':$today->diff($order->created_at)->d.' días'}}</h3>
                                            @endif
                                        @else
                                            @if($today->diff($order->created_at)->m > 0)
                                                <h3>{{'Hace '.$today->diff($order->created_at)->m.' mes '.$today->diff($order->created_at)->d.' días'}}</h3>
                                            @else
                                                <h3>{{'Hace '.$today->diff($order->created_at)->d.' días'}}</h3>
                                            @endif
                                        @endif
                                        <a href="/admin-store-quotation/{{$order->order_number}}" class="p-2 border-2" target="_blank">
                                            Detalle
                                        </a>

                                    </div>
                                </div>
                        </div>
                    @endforeach
                    <br>
                    {{$orders->links()}}
                @endif
            </div>

        </div>

    </section>

@endsection

