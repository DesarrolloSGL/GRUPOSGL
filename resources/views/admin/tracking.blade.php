@extends('layouts.app')

@section('content')
<section class="h-screen">
    @if($tracker)
        <div style="display:flex; width:70%;">
            <div style="margin: 1%; width:20%; border:1px solid rgb(181, 181, 181);">Nombre</div>
            <div style="margin: 1%; width:20%; border:1px solid rgb(181, 181, 181);">Apellido</div>
            <div style="margin: 1%; width:40%; border:1px solid rgb(181, 181, 181);">Email</div>
            <div style="margin: 1%; width:20%; border:1px solid rgb(181, 181, 181);">Asignar Orden</div>
            <div style="margin: 1%; width:20%; border:1px solid rgb(181, 181, 181);">Ordenes Asignadas</div>
        </div>
        @foreach ($tracker as $t)
            <div style="display:flex; width:70%;">
                <div style="margin: 1%; width:20%; border:1px solid rgb(181, 181, 181);">{{ $t->name }}</div>
                <div style="margin: 1%; width:20%; border:1px solid rgb(181, 181, 181);">{{ $t->last_name }}</div>
                <div style="margin: 1%; width:40%; border:1px solid rgb(181, 181, 181);">{{ $t->email }}</div>
                <div style="margin: 1%; width:20%; border:1px solid rgb(181, 181, 181);">
                    <form action="/admin-tracking-asign" method="POST"  autocomplete="off" style="display: flex;">
                        @csrf
                        <input type="text" name="iduser" value="{{ $t->id }}" hidden>
                        <select name="idorder" class="bg-black">
                        @foreach ($orders as $order)
                            <option value="{{ $order->idorder }}">{{ "Order No".$order->idorder }}</option>
                        @endforeach
                        </select>
                        <button type="submit"> Asignar </button>
                    </form>
                </div>
                <div style="margin: 1%; width:20%; border:1px solid rgb(181, 181, 181);">
                    @foreach ($tracking as $o)
                        @if($o->users_id == $t->id)
                            {{ "No.".$o->order_idorder."," }}
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
    @endisset
</section>
@endsection
