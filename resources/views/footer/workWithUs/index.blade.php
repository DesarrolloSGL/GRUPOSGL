@extends('layouts.app')

@section('content')
    <section >
        <div class="mt-44">
            <h3 class="text-center text-7xl text-gray-600 p-10">CADA PERSONA ES UNA CONEXIÓN A OPORTUNIDADES INFINITAS</h3>
            <h3 class="text-center text-3xl text-gray-600 ">Bolsa de Empleos</h3>
        </div>
        <div class="w-fit mx-auto my-10 flex space-x-2">
            <div>
                <input id="work_with_us_input_departments" name="departments" class="work_with_us_input_value w-96 h-12 rounded-lg border-transparent border-t-gray-200" type="text" placeholder="Departamentos">
                <div id="work_with_us_result_departments" class="bg-white w-96 border-gray-300 text-center  text-gray-500 overflow-auto">

                </div>
            </div>
            <div>
                <input id="work_with_us_input_countries" name="countries" class="work_with_us_input_value w-96 h-12 rounded-lg border-transparent border-t-gray-200" type="text"  placeholder="País">
                <div id="work_with_us_result_countries" class="bg-white w-96 border-gray-300 text-center">

                </div>
            </div>
            <div class="block">
                <button id="work_with_us_btn_search" class="text-white bg-blue-950 rounded-xl px-5 py-3">Buscar</button>
            </div>
        </div>

        <div class="my-96 grid grid-cols-3 gap-10">
            <div class="bg-green-400">
                Valor 1
            </div>
            <div class="bg-green-400">
                Valor 2
            </div>
            <div class="bg-green-400">
                Valor 3
            </div>
            <div>
                Valor 4
            </div>
            <div>
                Valor 5
            </div>
            <div>
                Valor 6
            </div>
            <div>
                Valor 7
            </div>
            <div>
                Valor 8
            </div>
            <div>
                Valor 9
            </div>
        </div>
    </section>

@endsection

@push('child-scripts')
    <script>
        const job_departments = [
             'Administración',
             'Recursos Humanos',
             'Ops Maritimas',
             'Ops Aéreas',
             'Ops Aduana',
             'Contabilidad',
             'Finanzas',
             'Ops Terrestres',
             'Ops Courier',
             'Ventas Jr',
             'Ventas Sr',
             'Informática',
             'Marketing',
             'Pilotos',
             'Servicios Varios'
        ];
        const job_countries = [
            'Guatemala',
            'El Salvador',
            'Honduras',
            'Costa Rica',
            'Nicaragua',
            'México',
            'Belice',
            'R. Dominicana',
            'Colombia',
            'Chile',
            'Jamaica',
            'Brasil',
            'Estados Unidos de America',
            'Panama',
            'Ecuador'
        ];


        $('.work_with_us_input_value').keyup(function(){
            let array;
            const regexp = new RegExp(this.value, 'i');

            this.name == 'countries' ? array = job_countries:array = job_departments;

            const match = array.filter(x => x.toLowerCase().includes((this.value).toLowerCase()));
            // console.log(match);
            let i = 0;

            $('#work_with_us_result_'+this.name).html('');
            while(m = match[i++]) $('#work_with_us_result_'+this.name).append('<h3 class="work_with_us_category'+this.name+' hover:bg-blue-700/50 hover:text-white cursor-pointer">'+m+'</h3>');
            this.value == "" ? $('#work_with_us_result_'+this.name).html(''):false;
        });

        $('#work_with_us_result_departments').on('click','.work_with_us_categorydepartments',function(){
            $('#work_with_us_input_departments').val(this.innerText);
            $('#work_with_us_result_departments').html('');
        });

        $('#work_with_us_result_countries').on('click','.work_with_us_categorycountries',function(){
            $('#work_with_us_input_countries').val(this.innerText);
            $('#work_with_us_result_countries').html('');
        });

        $('#work_with_us_btn_search').click(function(){
            let input_departments = $('#work_with_us_input_departments').val();
            let input_countries = $('#work_with_us_input_countries').val();

            input_countries == "" ?
            $('#work_with_us_input_countries').after('<h3 class="text-red-500 text-sm text-center">Selecciona un pais</h3>')
            :window.location = '/work-with-us/category/'+input_departments+'&'+input_countries;

        });
    </script>
@endpush

