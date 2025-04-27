@extends('layouts.app')

@section('content')
    {{-- <h3 class="font-bold ml-10 text-2xl py-5">Preguntas Frecuentes</h3> --}}
    <div class="px-10 mt-5">
        {{-- <div class="w-full h-72  bg-gray-200 rounded-xl items-center flex ">
            <span class="text-2xl mx-auto font-bold text-gray-500">1840 X 288</span>
        </div> --}}
        <img src="../images/Tienes alguna duda.jpg" class="mx-auto rounded-xl">
    </div>
    <div class="py-10">
        <div class="mx-auto w-4/6 border-2 border-gray-300">
            <h3 class="font-bold p-5 text-2xl ">Pregunta</h3>
        </div>
        <div class="mx-auto w-4/6 border-2 border-gray-300">
            <h3 class="font-bold p-5 text-2xl ">Pregunta</h3>
            <h3 class="bg-gray-300 p-5 text-lg text-justify">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Molestiae cumque provident autem cum explicabo tempore neque.
                Laborum incidunt neque exercitationem. At, laborum. Quo, consequuntur iure
                aut alias deleniti ex repellat.</h3>
        </div>
        <div class="mx-auto w-4/6 border-2 border-gray-300">
            <h3 class="font-bold p-5 text-2xl ">Pregunta</h3>
            <h3 class="bg-gray-300 p-5 text-lg text-justify">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Molestiae cumque provident autem cum explicabo tempore neque.
                Laborum incidunt neque exercitationem. At, laborum. Quo, consequuntur iure
                aut alias deleniti ex repellat.</h3>
        </div>
    </div>
@endsection
