@extends('admin.base')

@section('admin-content')
<section class="min-h-screen p-5">
    <div class="mr-auto w-fit">
        <form action="/admin-update-rates" method="POST" autocomplete="off">
            @csrf
            <div class="bg-white w-fit p-5 border rounded-lg mx-auto space-y-3">
                <h3 class="font-bold text-lg">Free Tier</h3>
                <div>
                    <h3>Costo Por Libra Miami($)</h3>
                    <input name="cost_per_pound_miami" type="text" class="bg-gray-200 rounded-lg ring-0 border-none w-full focus:ring-0" value="{{$rates->cost_per_pound_miami}}">
                </div>
                <div>
                    <h3>Costo Por Libra China($)</h3>
                    <input name="cost_per_pound_china" type="text" class="bg-gray-200 rounded-lg ring-0 border-none w-full focus:ring-0" value="{{$rates->cost_per_pound_china}}">
                </div>
                <div>
                    <h3>Desconsolidación($)</h3>
                    <input name="clearance" type="text" class="bg-gray-200 rounded-lg ring-0 border-none w-full focus:ring-0" value="{{$rates->clearance}}">
                </div>
                <div>
                    <h3>Costo Envio(Q)</h3>
                    <input name="shipping" type="text" class="bg-gray-200 rounded-lg ring-0 border-none w-full focus:ring-0" value="{{$rates->shipping}}">
                </div>
                <div>
                    <h3>Multiplicador de Puntos</h3>
                    <input name="points" type="text" class="bg-gray-200 rounded-lg ring-0 border-none w-full focus:ring-0" value="{{$rates->points}}">
                </div>
                <div>
                    <h3>Tipo De Cambio Global</h3>
                    <input name="exchange" type="text" class="bg-gray-200 rounded-lg ring-0 border-none w-full focus:ring-0" value="{{$rates->exchange}}">
                </div>
                <button type="submit" class="bg-blue-900 text-white flex
                rounded-md px-3 py-2 hover:bg-blue-600 border border-gray-400">
                Actualizar</button>
            </div>
        </form>
    </div>
</section>
@endsection