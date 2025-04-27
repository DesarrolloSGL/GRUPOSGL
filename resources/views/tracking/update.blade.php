@extends('admin.base')

@section('admin-content')

        {{-- <div class="ml-10 my-5">
            <a href="/tracking-index" class="underline">Inicio Tracking</a>
        </div> --}}
    <section class="px-5 py-10 min-h-screen flex space-x-5 font-mono">
        {{-- Tracking Info --}}
        <div class="w-4/12">
            <div class="bg-white w-fit p-5 border rounded-lg mx-auto space-y-1">
                <input name="tracking_id" type="text" value="{{$tracking->idtracking}}" hidden>
                <h3>Servicio</h3>
                <select name="service" class="bg-blue-950 text-white rounded-3xl ring-0
                border-none px-5 py-1 focus:ring-0" disabled>
                    <option value="0">Selecciona el servicio</option>
                    <option value="1" {{$tracking->service == 1? 'selected':false}}>Courier Nacional</option>
                    <option value="2" {{$tracking->service == 2? 'selected':false}}>Courier Miami</option>
                    <option value="3" {{$tracking->service == 3? 'selected':false}}>Courier China</option>
                </select>
                <h3>No. Tracking</h3>
                <input name="tracking_number" type="text" disabled class="bg-gray-300 rounded-3xl ring-0 border-none w-full focus:ring-0" value="{{$tracking->tracking_number}}">
                <h3>HBL</h3>
                <input name="hbl" type="text" disabled class="bg-gray-300 rounded-3xl ring-0 border-none w-full focus:ring-0" value="{{$tracking->hbl}}">
                <h3>MBL</h3>
                <input name="mbl" type="text" disabled class="bg-gray-300 rounded-3xl ring-0 border-none w-full focus:ring-0" value="{{$tracking->mbl}}">
                <h3>AWB</h3>
                <input name="awb" type="text" disabled class="bg-gray-300 rounded-3xl ring-0 border-none w-full focus:ring-0" value="{{$tracking->awb}}">
                <h3>No. Orden</h3>
                <input name="order_number" disabled type="text" class="bg-gray-300 rounded-3xl ring-0 border-none w-full focus:ring-0" value="{{$tracking->order_number}}">
            </div>
        </div>

        {{-- Change Status --}}
        <div class="w-4/12">
            <form action="/tracking-update-status" method="POST" autocomplete="off" >
                @csrf
                <input name="tracking_id" type="text" value="{{$tracking->idtracking}}" hidden>
                <div>
                    <h3>Estados del tracking</h3>
                    <select name="tracking_state" class="bg-blue-900 text-white rounded-lg ring-0
                    border-none px-3 py-2 focus:ring-0">
                        @foreach ($tracking_states as $key=>$ts)
                            <option value="{{$key}}">
                                {{$ts}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="bg-blue-900 text-white flex
                    rounded-md px-3 py-2 hover:bg-blue-600 border border-gray-400
                    my-5">
                    Añadir Estado</button>
            </form>
        </div>

        <div class="w-5/12">
            <div class="bg-white w-fit h-fit p-5 border rounded-lg space-y-1">
                <div class="flex-col">
                    @foreach ($tracking_status as $ts)
                        <div class="flex w-max-[300px] text-center items-center">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <div class=" rounded-xl px-2 py-2">
                                    <h3 class="">{{$ts->state}}</h3>
                                </div>
                            </div>
                            <h3 class="text-xs">{{$ts->created_at}}</h3>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- <div class="w-8/12 my-10">
            <form action="/tracking-delete" method="POST" autocomplete="off">
                @csrf
                <input name="tracking_id" type="text" value="{{$tracking->idtracking}}" hidden>
                <button type="submit" class="bg-red-700 text-white flex
                    rounded-md px-3 py-2 hover:bg-red-800">
                    Eliminar tracking</button>
            </form>
        </div> --}}
    </section>
@endsection