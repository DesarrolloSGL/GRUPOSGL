@extends('layouts.app')

@section('content')
    @if(!isset($quotation))
        <section class="bg-gray-50 dark:bg-gray-800">
            <div class="flex flex-col items-center justify-center mx-auto">
                <form action="/national-quoter-quotation" method="POST" class="p-6 space-y-4" accept-charset="UTF-8" autocomplete="off">
                    @csrf
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Origen</label>
                    <select name="departamento_origen" id="D1" onchange="showMunicipios('1')" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="0">Selecciona el Departamento</option>
                    </select>

                    <select name="municipio_origen" id="M1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="0">Selecciona el Municipio</option>
                    </select>

                    <br>
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Destino</label>
                    <select name="departamento_destino" id="D2" onchange="showMunicipios('2')" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="0">Selecciona el Departamento</option>
                    </select>
                    <select name="municipio_destino" id="M2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="0">Selecciona el Municipio</option>
                    </select>
                    <br><br>
                    <div id="cn_package">
                        <input name="pk_1_1" type="radio" onclick="checkedPackage(this);" checked>
                        <label for="">Paquete 1 (15cm3)(3lb)</label>
                        <input name="pk_2_1" type="radio" onclick="checkedPackage(this);">
                        <label for="">Paquete 2 (65cm3)(30lb)</label>
                        <input name="pk_3_1" type="radio" onclick="checkedPackage(this);">
                        <label for="">Paquete 3 (90cm3)(90lb)</label>
                        <input name="pk_4_1" type="radio" onclick="checkedPackage(this);">
                        <label for="">Paquete 4 (Custom)</label>
                        <div id="c_1" hidden>
                            <label for="">Dimensiones</label>
                            <input type="text" name="d_1" placeholder="10x10x10(cm)" class="block w-2/6 p-1 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <input type="text" name="w_1" placeholder="Peso(lb)" class="block w-2/6 p-1 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <select name="t_1" onchange="otherType(this);" class="bg-gray-50 w-2/6 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="0">Selecciona el tipo de paquete</option>
                                <option value="1">Televisores</option>
                                <option value="2">Refrigeradores</option>
                                <option value="3">Estufas</option>
                                <option value="4">Motores</option>
                                <option value="5">Motocicletas</option>
                                <option value="6">Instrumentos</option>
                                <option value="7">Muebles</option>
                                <option value="8">Otro</option>
                            </select>
                        </div>
                        <input name="fr_1" type="checkbox">
                        <label for="">Es fragil</label>
                    </div>
                    <button type="button" onclick="CNAddPackage();" class="mt-4 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-4 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">+</button>
                    <br>
                    <button type="button" onclick="CNValid(this)" class="mt-5 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-4 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Cotizar</button>
                    <div class="error"></div>
                </form>
                <script>
                    quotation =  null;
                    packages =  null;
                </script>
            </div>
        </section>
    @else
        <div class="relative overflow-x-auto p-10">
            <label for="">De :</label>
            <label for="" class="sender"></label>
            <label for="">Entregar a :</label>
            <label for="" class="destination"></label>
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
            <form method="POST" action="/national-quoter-order" accept-charset="UTF-8" autocomplete="off">
                @csrf
                <input type="text" name="idquotation" value="{{ $quotation->idquotation }}" hidden>
                <button type="submit" class="mt-5 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Realizar orden</button>
            </form>
        </div>
        <script>
            quotation =  {!! json_encode($quotation,JSON_HEX_TAG) !!};
            packages =  {!! json_encode($packages,JSON_HEX_TAG) !!};
            translateLocation(quotation);
            getTotal();
        </script>
    @endif

    <script>
        $.each(departamentos,function(index,departamento){
            $('#D1').append('<option value='+departamento.departamento_id+'>'+departamento.nombre+'</option>')
            $('#D2').append('<option value='+departamento.departamento_id+'>'+departamento.nombre+'</option>')
        });

        function showMunicipios(_id){
            departamento_id = $('#D'+_id).val();
            $('#M'+_id).html("");
            $.each(municipios,function(index,municipio){
                if(municipio.departamento_id == departamento_id){
                    $('#M'+_id).append('<option value='+municipio.municipio_id+'>'+municipio.nombre+'</option>')
                }
            });
        }

        // window.onload = function() {
        // }

        let n = 2;
        function CNAddPackage(){
            let html = '<br>'+
                '<input name="pk_1_'+n+'" type="radio" onclick="checkedPackage(this);" checked>'+
                '<label for=""> Paquete 1 (15cm3)(3lb) </label>'+
                '<input name="pk_2_'+n+'" type="radio" onclick="checkedPackage(this);">'+
                '<label for=""> Paquete 2 (65cm3)(30lb) </label>'+
                '<input name="pk_3_'+n+'" type="radio" onclick="checkedPackage(this);">'+
                '<label for=""> Paquete 3 (90cm3)(90lb) </label>'+
                '<input name="pk_4_'+n+'" type="radio" onclick="checkedPackage(this);">'+
                '<label for=""> Paquete 4 (Custom) </label>'+
                '<div id="c_'+n+'" hidden>'+
                    '<label for=""> Dimensiones </label>'+
                    '<input type="text" name="d_'+n+'" placeholder="10x10x10(cm)" class="block w-2/6 p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">'+
                    '<input type="text" name="w_'+n+'" placeholder="Peso(lb)" class="block w-2/6 p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">'+
                    '<select name="t_'+n+'" onchange="otherType(this);" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">'+
                        '<option value="0"> Selecciona el tipo de paquete</option>'+
                        '<option value="1"> Televisores</option>'+
                        '<option value="2"> Refrigeradores</option>'+
                        '<option value="3"> Estufas</option>'+
                        '<option value="4"> Motores</option>'+
                        '<option value="5"> Motocicletas</option>'+
                        '<option value="6"> Instrumentos</option>'+
                        '<option value="7"> Muebles</option>'+
                        '<option value="8"> Otro</option>'+
                    '</select>'+
                '</div>'+
                '<input name="fr_'+n+'" type="checkbox">'+
                '<label for=""> Es fragil </label>';
            $('#cn_package').append(html);
            n += 1;
        }

        function otherType(_this){
            let id = _this.name.split("_")[1]
            _this.value == 8 ? $(_this).parent().append('<input name="p_'+id+'" type="text" placeholder="Tipo de producto" maxlength="45" class="block w-2/6 p-1 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">'):true;
            $(_this).next()[0] && _this.value != 8 ? $(_this).next().remove():true;
        }

        function checkedPackage(_this){
            let div = $('#cn_package :input');
            let name = _this.name.split("_");
            $.each(div, function(index,radio){
                radio.name.split("_")[2] == name[2] ? radio.checked = false:true;
            });
            _this.checked = true;
            name[1] != 4 ? $('#c_'+name[2]).hide():$('#c_'+name[2]).show();
        }

        function CNValid(_this){
            // let div = $('#c_'+(n-1)+' :input');
            let div = $('#cn_package :input');
            let errors = "";
            $.each(div, function(index,input){
                let name = input.name.split("_");
                if(input.type == "radio" && input.checked == true && name[1] == 4){
                    let c = $('#c_'+name[2]+' :input');
                    let m = false;
                    c[0].value == "" ? errors += 'Coloca las dimensiones del paquete No.'+name[2]+'-': m = true;
                    !(/^[0-9]{1,3}[xX][0-9]{1,3}[xX][0-9]{1,3}$/).test(c[0].value) && m ? errors += 'Coloca las dimensiones del paquete No.'+name[2]+' en centimetros separados por una letra "x" Ej. 100x30x50-':true;
                    m = false;
                    c[1].value == "" ? errors += 'Coloca el peso del paquete No.'+name[2]+'-':m = true;
                    !(/^[0-9]{1,3}$/).test(c[1].value) && m ? errors += 'Coloca el peso del paquete No.'+name[2]+' en numeros sin decimales Ej. 10-':m = false;
                    m = false;
                    c[2].value == 0 ? errors += 'Coloca el tipo del paquete No.'+name[2]+'-':true;
                    if(c[2].value == 8){
                        c[3].value == "" ? errors += 'Especifica el tipo del paquete No.'+name[2]+'-':m = true;
                        !(/^[a-zA-Z ]{1,45}$/).test(c[3].value) && m ? errors += 'Especifica el tipo del paquete No.'+name[2]+' utilizando unicamente letras.-':m = true;
                    }
                }
            });

            $('#D1').val() == 0 ? errors += "Coloca el Departamento del Origen.-":true;
            $('#M1').val() == 0 ? errors += "Coloca el Municipio del Origen.-":true;
            $('#D2').val() == 0 ? errors += "Coloca el Departamento del Destino.-":true;
            $('#M2').val() == 0 ? errors += "Coloca el Municipio del Destino.-":true;
            $('.errors').html("");

            errors == "" ? $('.errors').html(""):true;
            errors != "" ? showError(errors):_this.form.submit();
        }

    </script>
@endsection
