
<section class="flex h-fullmax-w-[1150px] overflow-x-auto" x-data="{openUploadBankNoteModal : false, alpineOrderNumber:''}">
    {{-- Left Panel --}}
    <div class="h-screen w-2/12 p-3 space-y-5">
        <div class="flex items-center space-x-1">
            <div class="flex text-xs px-2 py-1.5 text-yellow-800 bg-yellow-300 rounded-lg items-center">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
                </svg>
            </div>
            <h3 class="text-xs">
                Pendiente De Confirmar
            </h3>
        </div>

        <div class="flex items-center space-x-1">
            <div class="flex text-xs px-2 py-1.5 text-blue-800 bg-blue-300 rounded-lg items-center">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
            </div>
            <h3 class="text-xs">
                Confirmada
            </h3>
        </div>

        <div class="flex items-center space-x-1">
            <div class="flex text-xs px-2 py-1.5 text-green-800 bg-green-300 rounded-lg items-center">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
            </div>
            <h3 class="text-xs">
                Completada
            </h3>
        </div>

        <div class="flex items-center space-x-1">
            <div class="flex text-xs px-2 py-1.5 text-red-800 bg-red-300 rounded-lg items-center">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
                </svg>
            </div>
            <h3 class="text-xs">
                Cancelada
            </h3>
        </div>
    </div>

    {{-- New Category --}}
    @include('livewire.admin.modal.paymentDetail')

    {{-- Main Panel --}}
    <div class="w-full p-5">
        {{-- Filter Nav --}}
        <nav>
            <div>
                <input wire:model="search" class="rounded-lg border-gray-200 h-10 w-96" type="text">
                <select wire:model.defer="type" class="rounded-lg border-gray-200 h-10 px-2 text-center">
                    <option value="0">Selecciona Tipo</option>
                    <option value="1">Nacional</option>
                    <option value="2">Miami</option>
                    <option value="3">China</option>
                    <option value="4">Tienda</option>
                </select>
                <select wire:model.defer="status" class="rounded-lg border-gray-200 h-10 px-2 text-center">
                    <option value="0">Selecciona Estado</option>
                    <option value="2">Pendiente de confirmar</option>
                    <option value="3">Confirmada</option>
                    <option value="4">Completada</option>
                </select>
                <input wire:model.defer="created" class="rounded-lg border-gray-200 h-10" type="date">
                <input wire:model.defer="finish" class="rounded-lg border-gray-200 h-10" type="date">
                <button wire:click="render" class="px-3 py-2 bg-blue-500 text-white">Search</button>
                <button wire:click="clear" class="px-3 py-2 bg-blue-500 text-white">Limpiar Busqueda</button>
            </div>
        </nav>
        {{-- List --}}
        <div class="overflow-x-auto">
            <table class="table-auto rounded-lg">
                <thead>
                    <tr class="text-sm">
                    <th>Servicio</th>
                    <th>No.Orden</th>
                    <th>Tracking</th>
                    <th>Ultimo Estado</th>
                    <th>Fecha Creación</th>
                    <th>Compra</th>
                    <th>Pago</th>
                    <th>Total <br> <span class="text-2xs">no incluye envios</span></th>
                    <th>Cliente</th>
                    <th>Tiempo Transcurrido</th>
                    <th>Estado</th>
                    <th>Detalle</th>
                    </tr>
                </thead>
                <tbody wire:loading.class.delay='opacity-50' wire:loading.class='pointer-events-none' wire:target='search,render,clear'>
                @if(isset($orders))
                    @foreach ($orders as $key=>$order)
                        @php
                            switch ($order->order_type) {
                                case 1:
                                    $courier_name = 'Courier Nacional';
                                    break;
                                case 2:
                                    $courier_name = 'Courier Miami(P.O.BOX)';
                                    break;
                                case 3:
                                    $courier_name = 'Courier China(P.O.BOX)';
                                    break;
                                case 4:
                                    $courier_name = 'Tienda Link';
                                    break;
                                case 5:
                                    $courier_name = 'Tienda Marketplace';
                                    break;
                                default:
                                    $courier_name = null;
                                    break;
                            }

                            if($order->status == 2){
                                $status = array('text' => 'Pendiente De Confirmar','text_color' => 'text-yellow-800', "bg_color" => "bg-yellow-300" ,"icon" => "alert");
                            }elseif($order->status == 3){
                                $status = array('text' => 'Confirmada','text_color' => 'text-blue-800', "bg_color" => "bg-blue-300","icon" => "check");
                            }
                            elseif($order->status == 4){
                                $status = array('text' => 'Completada','text_color' => 'text-green-800', "bg_color" => "bg-green-300","icon" => "check");
                            }
                            elseif($order->status == 0){
                                $status = array('text' => 'Cancelada','text_color' => 'text-red-800', "bg_color" => "bg-red-300","icon" => "check");
                            }

                        @endphp

                        <tr class="text-center hover:bg-blue-50 cursor-pointer">
                            {{-- Tipo de servicio --}}
                            <td class="border px-5 py-1 text-xs text-center font-bold mx-1">{{$courier_name}}</td>
                            {{-- Order Number --}}
                            <td class="border px-5 py-1 underline text-blue-800 mx-1 text-sm hover:bg-blue-500 hover:text-blue-100">
                                <a href="/admin-order/{{$order->idorder}}" target="_blank">
                                    {{$order->order_number}}
                                </a>
                            </td>
                            {{-- Tracking Number --}}
                            <td class="border px-5 py-1 underline text-blue-800 mx-1 text-sm hover:bg-blue-500 hover:text-blue-100">
                                <a href="/tracking-update/{{$order->idtracking}}" target="_blank">
                                    {{$order->tracking_number}}
                                </a>
                            </td>
                            {{-- Last Status --}}
                            <td class="border px-5 py-1 text-xs mx-1 whitespace-nowrap">
                                {{-- {{$order->tracking_status}} --}}
                            </td>
                            {{-- Created at --}}
                            <td class="border px-5 py-1 text-xs mx-1 whitespace-nowrap">{{$order->created_at}}</td>
                            {{-- Buy Status --}}
                            <td class="border px-5 py-1 text-2xs">
                                    @if($order->invoice_order)
                                        <svg class="mx-auto" height="30" width="30" xmlns="http://www.w3.org/2000/svg">
                                            <circle  r="5" cx="15" cy="15" fill="green" stroke-width="1" />
                                        </svg>
                                    @else
                                        <svg class="mx-auto" height="30" width="30" xmlns="http://www.w3.org/2000/svg">
                                            <circle class="status-animate-red" r="5" cx="15" cy="15"  stroke-width="1" />
                                        </svg>
                                    @endif
                                <h3>Compra</h3>
                            </td>
                            {{-- Pay Status --}}
                            <td class="border px-5 py-1  text-2xs items-center">
                                @if($order->payment_status == 3)
                                    <svg class="mx-auto" height="30" width="30" xmlns="http://www.w3.org/2000/svg">
                                        <circle  r="5" cx="15" cy="15" fill="green" stroke-width="1" />
                                    </svg>
                                @else
                                    <svg class="mx-auto" height="30" width="30" xmlns="http://www.w3.org/2000/svg">
                                        <circle class="status-animate-red" r="5" cx="15" cy="15" stroke-width="1" />
                                    </svg>
                                @endif
                                <h3>Pago</h3>
                            </td>
                            {{-- Total --}}
                            <td class="border px-5 py-1 text-sm font-bold bg-green-100 text-green-700 whitespace-nowrap">
                                @role('super-admin|accounting')
                                <button wire:click="getBankStatus('{{$order->order_number}}')"  x-on:click="openUploadBankNoteModal = true">
                                    <svg class="w-8 h-8 text-green-900 hover:text-green-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                                @endrole
                                {{-- {{$order->currency. number_format((float)$order->total, 2, '.', '')}} --}}
                            </td>
                            {{-- Client --}}
                            <td class="border px-5 py-1 text-2xs mx-auto xl:text-xs">{{$order->user_name.' '.$order->user_lastname}}</td>
                            {{-- Created at text --}}
                            <td class="border px-5 py-1 space-x-2 items-center text-sm ml-auto">
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
                            </td>
                            {{-- Status  --}}
                            <td class="border px-5 py-1">
                                <div class="text-xs p-3 rounded-lg {{$status['text_color']}} {{$status['bg_color']}}">
                                    @if(isset($status))
                                        @if($status['icon'] == 'check')
                                            <svg class="w-5 h-5 {{$status['text_color']}}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                            </svg>
                                        @elseif($status['icon'] == 'alert')
                                            <svg class="w-5 h-5 {{$status['text_color']}}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
                                            </svg>
                                        @endif
                                    @endif
                                </div>
                            </td>
                            {{-- Detail --}}
                            <td class="border px-5 py-1">
                                <a href="/admin-order/{{$order->idorder}}" target="_blank">
                                    <button class="bg-blue-500 text-blue-100 whitespace-nowrap px-5 rounded-lg py-3 text-sm border mx-1 hover:bg-blue-700">
                                        Ver Detalle
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <br>
        </div>
        {{$orders->links()}}
    </div>

    {{-- $(document).on("click", ".showFile", function() {
        $('#fileAction' + $(this).parent().attr('id')).attr('method', 'GET');
        $('#fileAction' + $(this).parent().attr('id')).attr('action', '/main-intranet-show-file');
        $('#fileAction' + $(this).parent().attr('id')).ajaxSubmit({
            success: function(res, status, xhr, form) {
                var a = document.createElement('a');
                a.href = res;
                a.target = '_blank';
                document.body.appendChild(a);
                a.click();
                asyncCall();
            }
        });
    }); --}}
</section>



