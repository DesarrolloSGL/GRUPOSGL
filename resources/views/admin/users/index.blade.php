@extends('admin.base')

@section('admin-content')
    <section class="min-h-screen">
        <div class="grid grid-cols-1 py-5 w-11/12 mx-auto gap-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            {{-- Just Copy This Block --}}
            <div class="p-5 rounded-lg border border-gray-200 w-fit text-center min-w-[310px] h-56">
                <svg class="w-10 h-10 text-blue-700 mx-auto m-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                    <path d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z"/>
                    <path d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z"/>
                </svg>
                <h3 class="text-lg font-bold">Clientes</h3>
                <div class="bg-blue-900 text-white rounded-full w-fit mx-auto">
                    <h3 class="px-3 py-0.5 text-4xl">{{$clients->count()}}</h3>
                </div>
            </div>
        </div>

        <div class="w-full flex p-5 justify-evenly">
            <div class="border border-gray-300 rounded-lg p-10 w-4/12 h-36">

            </div>
            <div class="border border-gray-300 rounded-lg w-7/12 overflow-auto max-h-96">
                <div class="">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-blue-800 uppercase font-bold bg-blue-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Apellido
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Phone
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    CUI
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    NIT
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Created At
                                </th>
                            </tr>
                        </thead>
                        <tbody class="uppercase">
                            @foreach ($clients as $client)
                                <tr class="font-bold border-b bg-gray-100 text-blue-900">
                                    <td scope="row" class="px-6 py-4">
                                        {{$client->name}}
                                    </td>
                                    <td  class="px-6 py-4">
                                        {{$client->last_name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$client->email}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$client->phone}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$client->cui}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$client->nit}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$client->created_at}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
@endsection