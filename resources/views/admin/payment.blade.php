@extends('layouts.app')

@section('content')
<section class="h-screen">
    @if($payments)

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Tipo
                </th>
                <th scope="col" class="px-6 py-3">
                    Estado
                </th>
                <th scope="col" class="px-6 py-3">
                    Comentario
                </th>
                <th scope="col" class="px-6 py-3">
                    Total
                </th>
                <th scope="col" class="px-6 py-3">
                    Comisión
                </th>
                <th scope="col" class="px-6 py-3">
                    Devolución
                </th>
                <th scope="col" class="px-6 py-3">
                    Acción
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $p)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $p->idpayment }}
                </th>
                <td class="px-6 py-4">
                    {{ $p->type}}
                </td>
                @if($p->status == 2)
                    <td class="px-6 py-4">
                        Pendiente
                    </td>
                @else
                    <td class="px-6 py-4">
                        Completado
                    </td>
                @endif
                <td class="px-6 py-4">
                    {{ $p->comments}}
                </td>

                @if ($p->status == 2)
                    <td class="px-6 py-4">
                        {{ $p->total}}
                    </td>
                    <td class="px-6 py-4">
                        {{$p->total*0.05}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $p->total-$p->total*0.05}}
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Realizar Pago</a>
                    </td>
                @else
                    <td class="px-6 py-4">
                        {{ $p->total}}
                    </td>
                    <td class="px-6 py-4">
                        -
                    </td>
                    <td class="px-6 py-4">
                        -
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Completado</a>
                    </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

    @endif
</section>
@endsection
