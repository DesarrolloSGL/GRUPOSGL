<!DOCTYPE html>
<html>
<head>
    <title>Cotización No.{{$order_number}}</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #111111;
            text-align: left;
            padding: 8px;
            font-size: 0.8rem;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .blank{
            border:none;
            background-color: white;
        }
    </style>
</head>
<body>
    @php
        $currency = $payments['payments'][0]->currency;
    @endphp
    <hr style="height:5px;border-width:0;color:rgb(0, 98, 255);background-color:rgb(0, 98, 255);">
    <hr style="height:5px;border-width:0;color:rgb(0, 98, 255);background-color:rgb(0, 98, 255);">
    <div>
        <div style=" float: left;">
            <img src="{{ public_path('images/main/sgl_express.jpg') }}" width="110" height="110">
        </div>
        <br>
        <p style="text-align: right;">
            Fecha: {{ $created_at }} <br>
            Cotización No.{{ $order_number }}<br>
        </p>
    </div>
    <br><br>
    <div>
        <div>GRUPO SGL</div>
        <div>5ª Avenida 15-45 Zona 10 Centro Empresarial torre 1 nivel 9</div>
        <div>Cda Guatemala, Guatemala</div>

    </div>

    <div style="height: 150px;">
        <p style="float: left;">
            Facturar a: <br>
            NIT: {{$billing->nit}} <br>
            {{$billing->name}} <br>
            {{$billing->address}} <br>
        </p>

    </div>

    <table>
        <tr>
            <th>Cant.</th>
            <th>Articulo</th>
            <th>Descripción</th>
            <th>Frágil</th>
            <th>Peligroso</th>
            <th>Perecedero</th>
            <th>Costo<br> Unitario </th>
            <th></th>
        </tr>

        @foreach ($packages as $key=>$package)
            <tr>
                <td>{{$package->units}}</td>
                <td>{{$package->detail}}</td>
                <td>Courier Nacional</td>
                <td>{{$package->fragile? 'Sí':'-'}}</td>
                <td>{{$package->dangerous? 'Sí':'-'}}</td>
                <td>{{$package->perishable? 'Sí':'-'}}</td>
                <td>Q{{ number_format((float)$package->price, 2, '.', '')}}</td>
                <td>Q{{ number_format((float)$package->price*$package->units, 2, '.', '')}}</td>
            </tr>
        @endforeach



        @foreach ($payments['payments'] as $extra_payment)
            @if($extra_payment->type == 5)
                <tr>
                    <td class=""></td>
                    <td class=""></td>
                    <td class="">{{$extra_payment->comments}}</td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                    <td>{{$extra_payment->currency}}{{ number_format((float)$extra_payment->total, 2, '.', '')}}</td>
                    <td></td>
                </tr>
            @endif
        @endforeach

        @if($payments['extra_total'])
            <tr>
                <td class=""></td>
                <td class=""></td>
                <td class="">COSTO TOTAL A COBRAR(COD)</td>
                <td class=""></td>
                <td class=""></td>
                <td class=""></td>
                <td></td>
                <td>{{$extra_payment->currency}}{{ number_format((float)$payments['extra_total'], 2, '.', '')}}</td>
            </tr>
        @endif

        <tr>
            <td class="blank"></td>
            <td class="blank"></td>
            <td class="blank"></td>
            <td class="blank "></td>
            <td class="blank"></td>
            <td class="blank"></td>
            <td class="blank"></td>
            <td class="blank" style="font-size:0.9rem; font-weight: bold">Total: Q{{ number_format((float)$payments['total'], 2, '.', '')}}</td>
        </tr>
    </table>

    @foreach ($addresses as $address)
        <div style="height: 150px;">
            <p style="float: left;">
                @if($address->type == 1)
                    Recolectar en: <br>
                @else
                    Enviar a: <br>
                @endif
                {{$address->departamento}} {{$address->municipio}} {{$address->address}} <br>
                <span style="font-weight: bold"> Nombre: {{$address->name}} </span> <br>
                Email: {{$address->email}} <br>
                <span style="font-weight: bold"> Teléfono: {{$address->phone}} </span> <br>
                DPI: {{$address->cui}} <br>
            </p>
        </div>
    @endforeach


</body>
</html>


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CotizaciónNO#53454345</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <h3 class="text-2xl font-bold ml-auto">Cotización No. 4324234</h3>
    <h3 class="text-2xl font-bold ml-auto">Fecha: 1/8/2023</h3>
    <h3 class="text-2xl font-bold ml-auto">Origen : </h3>
    <h3 class="text-2xl font-bold ml-auto">Destino: </h3>
    <div>Paquetes</div>
    <div>Condiciones de Servicio</div>

</body>
</html> --}}
