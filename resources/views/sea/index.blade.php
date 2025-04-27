@extends('layouts.app')


@section('content')
    <section class="min-h-screen ">
        <div class="p-3 overflow-x-auto">
            <table class='w-full text-xs'>
                @foreach ($sea_rates as $key=>$rate)
                <tr class="hover:bg-sky-200 cursor-pointer">
                    @foreach ($rate->toArray() as $column => $value)
                        <td>
                            <div class="rounded-md border-2 py-1 px-4 whitespace-nowrap
                            hover:bg-sky-400
                                {{$column == '20_std_buy' || $column == '40_std_buy'
                                || $column == '40_hq_buy' || $column == '40_nor_buy'
                                || $column == '20_std_sale' || $column == '40_std_sale'
                                || $column == '40_hq_sale' || $column == '40_nor_sale'
                                ? 'bg-green-500':false}}
                                {{$column == '20_std_buy' || $column == '40_std_buy'
                                || $column == '40_hq_buy' || $column == '40_nor_buy'
                                || $column == 'margin'
                                || $column == '20_std_sale' || $column == '40_std_sale'
                                || $column == '40_hq_sale' || $column == '40_nor_sale'
                                ? 'text-green-200':false}}

                                {{$column == 'margin' ? 'bg-green-700':false}}
                            ">
                                {{$value}}
                            </div>
                        </td>
                    @endforeach
                </tr>
                @endforeach
            </table>
        </div>
    </section>
@endsection