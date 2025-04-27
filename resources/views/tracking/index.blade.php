@extends('admin.base')

@inject('carbon', 'Carbon\Carbon')
@section('admin-content')
    <section class="px-5 py-10 min-h-screen flex space-x-5 font-mono ">

        <div class="w-9/12 mx-auto">
            <form action="/tracking-search" method="POST" autocomplete="off">
                @csrf
                <input name="tracking_number" class="border-gray-200 rounded-lg" type="text" placeholder="Buscar Tracking">
                <button type="submit" class=" bg-blue-800 text-white whitespace-nowrap
                rounded-md px-3 py-2 hover:bg-blue-500 border border-gray-400">
                    Buscar
                </button>
            </form>

            <div class="my-10 border rounded-xl px-2">
                @foreach ($tracking as $t)
                    <div class="flex py-3 text-center">
                        <h3 class="font-bold w-3/12 ">
                            {{$t->service == 1? 'Courier Nacional':false}}
                            {{$t->service == 2? 'Courier Miami':false}}
                            {{$t->service == 3? 'Courier China':false}}
                        </h3>
                        <h3 class="w-3/12">No.Tracking: <br><span class="font-bold">{{$t->tracking_number}}</span></h3>
                        <h3 class="w-3/12">No.Orden: <br><span class="font-bold">{{$t->order_number}}</span></h3>
                        <h3 class="w-3/12"><span class="text-sm">{{$t->created_at}}</span></h3>
                        <div class="ml-auto">
                            <a href="/tracking-update/{{$t->idtracking}}">
                                <button type="button" class=" bg-blue-700 text-white whitespace-nowrap
                                    rounded-md px-3 py-2 hover:bg-blue-500 border border-gray-400">
                                    Ver Detalle
                                </button>
                            </a>
                        </div>
                    </div>
                    <hr class=" border-2 border-gray-300 border-dotted">
                @endforeach
                <div class="my-1 mx-auto w-fit">
                    @for ($i = 1; $i <= $last_page; $i++)
                        <a href="/tracking-paginate/{{$i}}?page={{$i}}">
                            <span class="underline cursor-pointer">{{$i}}</span>
                        </a>
                    @endfor
                </div>
            </div>
        </div>

        {{-- Add --}}
        <div class="hidden w-3/12 lg:block">
            <form id="tracking_add_tracking_form" action="/tracking-add" method="POST" autocomplete="off">
                @csrf
                <div class="bg-white py-5 px-10 border rounded-3xl mx-auto space-y-1">
                    <div>
                        <h3>Servicio</h3>
                    </div>
                    <select name="service" class="bg-blue-950 text-white rounded-xl ring-0
                        border-none px-5 py-1 focus:ring-0">
                        <option value="0">Selecciona el servicio</option>
                        <option value="1">Courier Nacional</option>
                        <option value="2">Courier Miami</option>
                        <option value="3">Courier China</option>
                    </select>
                    <div>
                        <h3>No. Tracking</h3>
                    </div>
                    <input name="tracking_number" type="text" class="bg-gray-200 rounded-xl ring-0 border-none w-full focus:ring-0">
                    <div>
                        <h3>HBL</h3>
                    </div>
                    <input name="hbl" type="text" class="bg-gray-200 rounded-xl ring-0 border-none w-full focus:ring-0">
                    <div>
                        <h3>MBL</h3>
                    </div>
                    <input name="mbl" type="text" class="bg-gray-200 rounded-xl ring-0 border-none w-full focus:ring-0">
                    <div>
                        <h3>AWB</h3>
                    </div>
                    <input name="awb" type="text" class="bg-gray-200 rounded-xl ring-0 border-none w-full focus:ring-0">
                    <div>
                        <h3>No. Orden</h3>
                    </div>
                    <input name="order_number" type="text" class="bg-gray-300 rounded-xl ring-0 border-none w-full focus:ring-0">

                    <button id="tracking_add_tracking_btn" type="button" class="bg-blue-900 text-white flex
                        rounded-xl px-3 py-2 hover:bg-blue-600 border border-gray-400
                        ">
                        Añadir tracking</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('child-scripts')
    <script>
        $('#tracking_add_tracking_btn').click(function(){
            fields = [
                {'name':'service','validation':['isSelect']},
                {'name':'tracking_number','validation':['blank']},
                {'name':'order_number','validation':['blank']},
            ]

            let form = '#'+$(this).closest("form").attr('id');
            let validator = Validation(form,fields);
            console.log(validator);
            if(!validator.fail){
                $(form).submit();
            }
        });
    </script>
@endpush