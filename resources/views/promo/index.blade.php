@extends('layouts.app')

@section('content')
<label> Añadir codigo promocional
    <div class="box">
        <form method='POST' action='/promo-add' accept-charset='UTF-8'  autocomplete='off'>
            @csrf
            {{-- <input type="text" placeholder="code" name="code" value="GRJ28"><br>
            <input type="text" placeholder="discount" name="discount" value="100"><br>
            <input type="text" placeholder="description" name="description" value="Esta promocion da un descuento del 45% al usar el codigo"><br> --}}
            <input type="text" placeholder="codigo" name="code"><br>
            <input type="text" placeholder="descuento ej. 10" name="discount"><br>
            <input type="text" placeholder="description" name="description"><br>
            <input type="submit">
        </form>
    </div>
</label>
@endsection
