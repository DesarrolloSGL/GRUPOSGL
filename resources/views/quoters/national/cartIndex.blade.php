@extends('layouts.app')

@section('content')
    @if($order)
    <section class="h-screen">
        <div class="p-10 h-screen">
            <form method="POST" action="/national-quoter-buy" accept-charset="UTF-8" autocomplete="off">
                @csrf
                <label for="">De :</label>
                <label for="" class="sender"></label>
                <input type="text" name="sender"  placeholder="Direccion Origen" class="w-auto p-1 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <input type="text" name="phone_sender"  placeholder="Telefono" onkeypress="return checkKey(event);" maxlength="8" class="w-auto p-1 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <input type="text" name="comments_sender"  placeholder="Comentarios" class="w-auto p-1 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <input type="text" name="receiver_sender"  placeholder="Receptor" class="w-auto p-1 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <br><br>
                <label for="">Entregar a :</label>
                <label for="" class="destination"></label>
                <input type="text" name="destination"  placeholder="Direccion Destino" class="w-auto p-1 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <input type="text" name="phone_destination"  placeholder="Telefono" onkeypress="return checkKey(event);" maxlength="8" class="w-auto p-1 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <input type="text" name="comments_destination"  placeholder="Comentarios" class="w-auto p-1 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <input type="text" name="receiver_destination"  placeholder="Receptor" class="w-auto p-1 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <br><br>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                NO.
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ancho(cm)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Alto(cm)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Profundidad(cm)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Peso(lb)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Detalle
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Frágil
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Costo
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($packages as $key=>$p)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ ($key+1) }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $p->width }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $p->height}}
                            </td>
                            <td class="px-6 py-4">
                                {{ $p->depth }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $p->weight }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $p->detail }}
                            </td>
                            @if($p->fragile == 1)
                                <td class="px-6 py-4">
                                    SI
                                </td>
                            @else
                                <td class="px-6 py-4">
                                    NO
                                </td>
                            @endif
                            <td class="px-6 py-4">
                                {{ $p->total }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <label>Total:</label>
                <label class="total_cotizacion"></label>
                <br><br>
                <input type="text" name="idquotation" value="{{ $order->idquotation }}" hidden>
                <input type="text" name="nit"  placeholder="nit" maxlength="8" onkeypress="return checkKey(event);" class="w-auto p-1 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <input type="text" name="comments"  placeholder="Comentarios" class="w-auto p-1 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <br><br>

                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de Pago</label>
                <select name="payment" class="w-100 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="0" selected>Selecciona el tipo de pago</option>
                    <option value="1">Pago Envio</option>
                    <option value="2">Pago Contra Entrega</option>
                </select>
                <br>
                <p class="error text-s text-red-600 dark:text-red-400"></p>
                <button type="button" onclick="CNValid(this);" class="mt-3 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Finalizar</button>
            </form>
        </div>
    </section>
        <script>
            order =  {!! json_encode($order,JSON_HEX_TAG) !!};
            packages =  {!! json_encode($packages,JSON_HEX_TAG) !!};
            translateLocation(order);
            getTotal();
        </script>

    @endif
        <script>
            function CNValid(_this){
                let form = _this.form.elements;

                let errors = "";
                let m = false;

                form['sender'].value == "" ? errors += "Coloca la direccion de Origen.-":true;
                form['phone_sender'].value == "" ? errors += "Coloca el telefono del Origen.-":m = true;
                !(/^[0-9]{8,8}$/).test(form['phone_sender'].value) && m ? errors += "Coloca el telefono del Origen en un formato valido.-":true;m = false;
                form['destination'].value == "" ? errors += "Coloca la direccion de Destino.-":true;
                form['phone_destination'].value == "" ? errors += "Coloca el telefono del Destino.-":m = true;
                !(/^[0-9]{8,8}$/).test(form['phone_destination'].value) && m ? errors += "Coloca el telefono del Destino en un formato valido.-":true;m = false;
                form['payment'].value == 0 ? errors += "Selecciona el tipo de pago.-":true;
                // !(/^[0-9]{8,8}$/).test(form['nit'].value) ? errors += "Coloca el nit en un formato valido.-":true;

                $('.errors').html("");

                // errors != "" ? showError(errors):true;
                errors != "" ? showError(errors):_this.form.submit();

            }

            function checkKey(event) {
                let aCode = event.which ? event.which : event.keyCode;
                let allow = false;
                aCode > 47 && aCode < 58 ? allow = true:allow = false;
                return allow;
            }

        </script>
@endsection

