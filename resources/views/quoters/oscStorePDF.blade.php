<!DOCTYPE html>
<html>
<head>
    <title>OSC No.{{ $order_number }}</title>
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
    <div style="display: block">
        <div style=" float: left;">
            <img src="{{ public_path('images/main/sgl_express.jpg') }}" width="110" height="110">
        </div>
        <br>
        <p style="text-align: right;">
            Fecha: {{ $created_at }} <br>
            OSC No: {{ $order_number }}<br>
        </p>
    </div>
    <br><br><br>
    <div>
        <div>Grupo SGL</div>
        <div>5ª Avenida 15-45 Zona 10 Centro Empresarial torre 1 nivel 9</div>
        <div>Cda Guatemala, Guatemala</div>
        {{-- <div>email: sales11@gruposgl.com</div> --}}
        {{-- <div>Tel: +502 2379-0640</div> --}}
    </div>

    <div style="height: 150px;">
        <p style="float: left;">
            Facturar a: <br>
            @if(isset($billing))
                NIT: {{$billing->nit}} <br>
                {{$billing->name}}{{$billing->last_name}} <br>
                {{$billing->address}} <br>
            @endif
        </p>

    </div>

    @php
        $total_iva = $insurance*0.12 + $transport*0.12 + $clearance*0.12;
    @endphp

    <table>
        <tr>
          <th>Cant.</th>
          <th>Articulo</th>
          <th>Descripción</th>
          <th></th>
          <th>Total</th>
        </tr>
        <tr>
          <td>{{ $weight }}</td>
          <td>AERCM1</td>
          <td>Courier Miami- Guatemala costo por Libra</td>
          <td>{{$currency}}{{ number_format((float) $transport/$weight, 2, '.', '')}}</td>
          <td>{{$currency}}{{ number_format((float)$transport, 2, '.', '')}}</td>
        </tr>
        <tr>
            <td>1</td>
            <td>DESCCC</td>
            <td>Gastos de desconsolidacion en origen <br> courier miami</td>
            {{-- clearance --}}
            <td>{{$currency}}{{ number_format((float)$clearance, 2, '.', '')}}</td>
            <td>{{$currency}}{{ number_format((float)$clearance, 2, '.', '')}}</td>
        </tr>
        <tr>
            <td>1</td>
            <td>INSURANCE</td>
            <td>SEGURO DE CARGA INTERNACIONAL</td>
            <td>{{$currency}}{{ number_format((float)$insurance, 2, '.', '')}}</td>
            <td>{{$currency}}{{ number_format((float)$insurance, 2, '.', '')}}</td>
        </tr>
        <tr>
            <td>1</td>
            <td>DAI</td>
            <td>Pago de arancel</td>
            <td>{{$currency}}{{ number_format((float)$dai, 2, '.', '')}}</td>
            <td>{{$currency}}{{ number_format((float)$dai, 2, '.', '')}}</td>
        </tr>
        <tr>
            <td>1</td>
            <td>IVA</td>
            <td>Pago De Impuesto De Mercadería</td>
            <td>{{$currency}}{{ number_format((float)$iva, 2, '.', '')}}</td>
            <td>{{$currency}}{{ number_format((float)$iva, 2, '.', '')}}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Costo De Envío Del Producto</td>
            <td>{{$currency}}{{ number_format((float)$package->shipping, 2, '.', '')}}</td>
            <td>{{$currency}}{{ number_format((float)$package->shipping, 2, '.', '')}}</td>
        </tr>

        <tr>
            <td></td>
            <td></td>
            <td>Costo De Mercadería</td>
            <td>{{$currency}}{{ number_format((float)$package->price, 2, '.', '')}}</td>
            <td>{{$currency}}{{ number_format((float)$package->price, 2, '.', '')}}</td>
        </tr>

        <tr>
            <td>1</td>
            <td></td>
            <td>Comisión 12%</td>
            <td>{{$currency}}{{ number_format((float)$package->price*0.12, 2, '.', '')}}</td>
            <td>{{$currency}}{{ number_format((float)$package->price*0.12, 2, '.', '')}}</td>
        </tr>
        @if ($duca)
        <tr>
            <td>1</td>
            <td>DUCA ID</td>
            <td>Pago de Impuestos</td>
            <td>{{$currency}}{{ number_format((float)$duca, 2, '.', '')}}</td>
            <td>{{$currency}}{{ number_format((float)$duca, 2, '.', '')}}</td>
        </tr>
        @endif
        @if($sed)
        <tr>
            <td>1</td>
            <td>SED</td>
            <td>Pago de Impuestos</td>
            <td>{{$currency}}{{ number_format((float)$sed, 2, '.', '')}}</td>
            <td>{{$currency}}{{ number_format((float)$sed, 2, '.', '')}}</td>
        </tr>
        @endif

        @foreach ($payments['payments'] as $extra_payment)
            @if($extra_payment->type == 5)
                <tr>
                    <td class=""></td>
                    <td class=""></td>
                    <td class="">{{$extra_payment->comments}}</td>
                    <td></td>
                    <td>{{$extra_payment->currency}}{{ number_format((float)$extra_payment->total, 2, '.', '')}}</td>
                </tr>
            @endif
        @endforeach


        <tr>
            <td class="blank"></td>
            <td class="blank"></td>
            <td class="blank"></td>
            <td>Total</td>
            <td>{{$currency}}{{ number_format((float)$payments['total'], 2, '.', '')}}</td>
        </tr>
    </table>

    <div style="height: 150px;">
        <p style="float: left;">
            Enviar a: <br>
            {{$address->departamento}} {{$address->municipio}} {{$address->address}} <br>
            <span style="font-weight: bold"> Nombre: {{$address->name}} </span> <br>
            Email: {{$address->email}} <br>
            <span style="font-weight: bold"> Teléfono: {{$address->phone}} </span> <br>
        </p>
    </div>

</body>
</html>


