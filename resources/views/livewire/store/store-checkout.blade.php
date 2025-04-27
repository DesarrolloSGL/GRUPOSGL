<section class="min-h-screen block py-10 lg:px-10 lg:py-20 lg:flex">
    {{-- Products Section --}}
    <section class="w-full px-2 lg:w-8/12 xl:w-9/12 max-h-80 lg:max-h-screen overflow-y-auto">
        @foreach ($cart as $key=>$item)
            <div class="w-11/12 max-w-4xl flex mx-auto my-1 rounded-lg border p-1 lg:p-5 lg:w-10/12" wire:loading.class.delay = "opacity-50" wire:loading.class = "pointer-events-none" wire:target="addCart,addUnits,decreaseUnits,removeCart">
                <div class="my-auto w-full flex">
                    {{-- First Section --}}
                    <div class="w-20 h-fit rounded-lg">
                        {{-- img --}}
                        <div class="w-20 h-20 bg-gray- p-1 rounded-lg">
                            <img class="w-auto max-h-16 mx-auto my-auto" src="{{asset('storage/store/'.$item['product_idproduct'].'/0'.$item['img_extension'])}}">
                        </div>
                        {{-- Units --}}
                        <div class="mx-auto w-fit">
                            <div class="flex">
                                <button {{$item['units'] > 1 ? '':'disabled'}} wire:click='decreaseUnits({{$item['idproduct']}})' type="button">
                                    <svg class="w-6 h-6 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm5.757-1a1 1 0 1 0 0 2h8.486a1 1 0 1 0 0-2H7.757Z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                                <p class="mx-1">{{$item['units']}}</p>
                                <button {{$item['units'] < 10 ? '':'disabled'}}  wire:click='addUnits({{$item['idproduct']}})' type="button">
                                    <svg class="w-6 h-6 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    {{-- End First Section --}}
                    {{-- Second Section --}}
                    <div class="w-full px-1 md:flex">
                        {{-- Title --}}
                        <h3 class="text-xs font- text-left line-clamp-2 md:line-clamp-2 lg:line-clamp-3 lg:text-base">{{$item->name}}</h3>
                        {{-- First Subsection --}}
                        <div class="flex my-5 md:my-0 ml-auto w-fit">
                            <div class="my-auto">
                                {{-- Price --}}
                                <div class="ml-auto w-fit">
                                    <div class="w-fit font-bold tracking-wider">Q{{ number_format((float)($item->compare_price > 0 ? $item->compare_price:$item->price)*$item->units, 2, '.', '')}}</div>
                                    @if ($item->units > 1)
                                        <div class="ml-auto w-fit mx-5 text-xs tracking-wider">Q{{ number_format((float)($item->compare_price > 0 ? $item->compare_price:$item->price), 2, '.', '')}}c/u</div>
                                    @endif
                                </div>
                                {{-- Remove --}}
                                <div class="ml-auto w-fit flex items-center">
                                    <button class="underline text-xs" wire:loading.remove wire:target="removeCart({{$item['idproduct']}})" wire:click='removeCart({{$item['idproduct']}})' type="button">
                                        Remover
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{-- End First Subsection --}}
                    </div>
                    {{-- End Section --}}
                </div>
            </div>
        @endforeach
    </section>
    <hr class="mb-5 lg:hidden mx-auto border w-11/12 border-gray-200">

    <style>
        [x-cloak] { display: none !important; }
    </style>


    <section class="w-11/12 mx-auto lg:mx-0 lg:max-w-sm lg:w-4/12 xl:w-3/12">
        @if($client_address)
            <section class="bg-gray-100/60 rounded-lg h-fit p-5" x-data="AddressModal" @modal-address-close.camel.window="close()">
                <h3 class="text-lg">
                    Datos de Contacto
                </h3>
                <div class="flex py-1 text-sm">
                    <h3 class="ml-right block">Nombre:</h3>
                    <h3 class="ml-auto block line-clamp-2">{{$client_address['name']}}</h3>
                </div>
                <hr class="border border-gray-200/70">
                <div class="flex py-1 text-sm">
                    <h3 class="ml-right block">Teléfono:</h3>
                    <h3 class="ml-auto block line-clamp-2">{{$client_address['phone']}}</h3>
                </div>
                <hr class="border border-gray-200/70">
                @if ($client_address['address'])
                    <div class="flex py-1 text-sm">
                        <h3 class="ml-right block">Dirección:</h3>
                        <h3 class="ml-auto block line-clamp-2">{{$client_address['address']}}</h3>
                    </div>
                @endif
                @if ($client_address['departamento'])
                    <div class="flex py-1 text-sm">
                        <h3 class="ml-right block">Departamento:</h3>
                        <h3 class="ml-auto block line-clamp-2">{{$client_address['departamento']}}</h3>
                    </div>
                @endif
                @if ($client_address['municipio'])
                    <div class="flex py-1 text-sm">
                        <h3 class="ml-right block">Municipio:</h3>
                        <h3 class="ml-auto block line-clamp-2">{{$client_address['municipio']}}</h3>
                    </div>
                @endif
                @if ($client_address['comments'])
                    <div class="flex py-1 text-sm">
                        <h3 class="ml-right block">Referencia:</h3>
                        <h3 class="ml-auto block line-clamp-2">{{$client_address['comments']}}</h3>
                    </div>
                @endif
                <div x-cloak>
                    @include('livewire.store.modal.newAddress')
                </div>
                <button class="mx-auto flex my-2 justify-center items-center rounded-lg px-3 py-3 border-2 w-full transition-all delay-75  bg-purple-700 text-purple-100 hover:bg-purple-500 hover:border-purple-500" x-on:click="openAddressModal = true" type="button">Añadir Nueva Dirección</button>
            </section>
        @else
            <section class="bg-gray-100/60 rounded-lg h-fit p-5" x-data="AddressModal" @modal-address-close.camel.window="close()">
                <div x-cloak>
                    @include('livewire.store.modal.newAddress')
                </div>
                <button class="mx-auto flex my-2 justify-center items-center rounded-lg px-3 py-3 border-2 w-full transition-all delay-75  bg-purple-700 text-purple-100 hover:bg-purple-500 hover:border-purple-500" x-on:click="openAddressModal = true" type="button">Añadir Nueva Dirección</button>
            </section>
        @endif
        {{-- Payment Section --}}
        <section class="bg-gray-100/60 rounded-lg h-fit p-10">
            <h3 class="text-lg">
                Resumen de Orden
            </h3>
            <div class="flex py-5 text-sm">
                <h3 class="ml-right block">SubTotal:</h3>
                <h3 class="ml-auto block">{{$payment->currency}}{{ number_format((float)$payment->total*0.12, 2, '.', '')}}</h3>
            </div>
            <hr class="border border-gray-200/70">
            <div class="flex py-5 text-sm">
                <h3 class="ml-right block">IVA:</h3>
                <h3 class="ml-auto block">{{$payment->currency}}{{ number_format((float)$payment->total-$payment->total*0.12, 2, '.', '')}}</h3>
            </div>
            <hr class="border border-gray-200/70">
            <div class="flex py-5 font-bold">
                <h3 class="ml-right block">Total:</h3>
                <h3 class="ml-auto block">{{$payment->currency}}{{ number_format((float)$payment->total, 2, '.', '')}}</h3>
            </div>
            <hr class="border border-gray-200/70">
            <div class="my-5" x-data="{payment_type: [{type: 1, name: ''}], payment_selected: '1'}">
                {{-- <h3 class="font-bold">Metodos de pago disponibles</h3> --}}
                {{-- <template x-for="type in payment_type">
                    <div>
                        <input x-model="payment_selected" type="radio" :value="type.type.toString()">
                        <label :for="type.name" x-text="type.name"></label>
                    </div>
                </template> --}}
            </div>

            {{-- VISA --}}
            <div  :class="payment_selected == 1 ? 'block':'hidden'">
                @php
                    session_start();
                    $_SESSION[$order->order_number] = true;
                    $_SESSION['total'] = $payment->total;
                @endphp
                <div>
                    <form id="payment_form" action="/payment/payment_confirmation.php" method="post" >
                        <input type="hidden" name="access_key" value="ad4c7bd7c796318ca0dc9b8ae9257fa8">
                        <input type="hidden" name="profile_id" value="A75FC721-F40E-4113-BB77-9259531E5324">
                        <input type="hidden" name="transaction_uuid" value="<?php echo uniqid() ?>">
                        <input type="hidden" name="signed_field_names" value="access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency,currency_symbol">
                        <input type="hidden" name="unsigned_field_names" value="card_name,card_last_name,card_number,card_expiry_date,card_cvn">
                        <input type="hidden" name="signed_date_time" value="<?php echo gmdate("Y-m-d\TH:i:s\Z"); ?>">
                        <input type="hidden" name="locale" value="en">
                        <fieldset hidden>
                            <legend>Payment Details</legend>
                            <div id="paymentDetailsSection" class="section">
                                <span>transaction_type:</span><input type="text" name="transaction_type" size="25" value="sale"><br/>
                                <span>reference_number:</span><input type="text" name="reference_number" size="25" value="{{$order->order_number}}"><br/>
                                <span>amount:</span><input type="text" name="amount" size="25" value="{{$payment->total}}"><br/>
                                <span>currency:</span><input type="text" name="currency" size="25" value="{{$payment->currency_text}}"><br/>
                                <span>currency:</span><input type="text" name="currency_symbol" size="25" value="{{$payment->currency}}"><br/>
                                <input name="card_name" type="text" placeholder="Name"  value="" autocomplete="off" >
                                <input name="card_last_name" type="text" placeholder="Last Name"  value="" autocomplete="off" >
                                <input id="card_number" type="text" name="card_number"  placeholder="Card Number" value=""  autocomplete="off" maxlength="19" >
                                <input id="card_expiration" type="text" name="card_expiry_date"  value="" placeholder="MM/YY"  autocomplete="off" maxlength="5" >
                                <input id="card_csv" type="password" name="card_cvn"  placeholder="CSV"  value="" autocomplete="off" maxlength="4" >
                            </div>
                        </fieldset>
                        <button type="submit" class="mx-auto flex my-2 justify-center items-center rounded-lg px-3 py-3 border-2 w-full transition-all delay-75  bg-purple-700 text-purple-100 hover:bg-purple-500 hover:border-purple-500
                        {{$client_address && count($cart) ? '':'opacity-70 pointer-events-none';}}">
                            Finalizar Orden
                        </button>
                    </form>
                </div>
            </div>
            {{-- VISA --}}
        </section>
    </section>

    @if(session('message'))
        <div class="alert-success fixed bottom-0 z-50 w-full h-10 mx-auto rounded-t-lg">
            <div class="flex h-full w-full bg-lime-500 text-white">
                <h3 class="mx-auto w-fit my-auto font-bold tracking-wider">{{session('message')}}</h3>
            </div>
        </div>
    @endif
    @push('child-scripts')
        <script>
            $(document).ready(function(){
                window.livewire.on('modalAddressClose',()=>{
                    setTimeout(function(){
                        $(".alert-success").fadeOut('slow');
                    }, 3000);
                });
            });
        </script>
    @endpush

</section>