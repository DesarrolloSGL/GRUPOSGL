@extends('layouts.app')

@section('content')
    <section class="p-20">
        <form action="/tracking-add" method="POST" autocomplete="off">
            @csrf
            <div class="bg-white w-fit p-5 border rounded-lg mx-auto space-y-1">
                <h3>Servicio</h3>
                <select name="service" class="bg-gray-300 rounded-3xl ring-0
                    border-none px-5 py-1 focus:ring-0">
                    <option value="0">Selecciona el servicio</option>
                    <option value="1">Courier Nacional</option>
                    <option value="2">Courier Miami</option>
                    <option value="3">Courier China</option>
                </select>
                <h3>No. Tracking</h3>
                <input name="tracking_number" type="text" class="bg-gray-300 rounded-3xl ring-0 border-none w-full focus:ring-0">
                <h3>HBL</h3>
                <input name="hbl" type="text" class="bg-gray-300 rounded-3xl ring-0 border-none w-full focus:ring-0">
                <h3>MBL</h3>
                <input name="mbl" type="text" class="bg-gray-300 rounded-3xl ring-0 border-none w-full focus:ring-0">
                <h3>AWB</h3>
                <input name="awb" type="text" class="bg-gray-300 rounded-3xl ring-0 border-none w-full focus:ring-0">
                <h3>No. Orden</h3>
                <input name="order_number" type="text" class="bg-gray-300 rounded-3xl ring-0 border-none w-full focus:ring-0">

                <button type="submit" class="bg-blue-700 text-white flex
                    rounded-md px-3 py-2 hover:bg-blue-500 border border-gray-400">
                    Añadir tracking</button>
            </div>
        </form>
    </section>
@endsection