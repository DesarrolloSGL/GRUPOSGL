@extends('layouts.app')

@section('content')
    <section class="p-10">
        <div class="w-4/6 mx-auto mt-5 rounded-xl border-2 border-gray-200">
            <h3 class="font-bold ml-5 mt-5 text-2xl cursor-pointer hover:text-blue-600">Titulo / Nombre del Puesto</h3>
            <h3 class="ml-5 mb-5 text-lg">Ciudad de Guatemala</h3>
            <div class="px-5 py-2">
                <div class="flex px-10">
                    <div class="mr-auto">
                        <h3 class="font-bold">Requisitos</h3>
                        <dl>
                            <dd>- Requisito #1</dd>
                            <dd>- Requisito #2</dd>
                            <dd>- Requisito #3</dd>
                            <dd>- Requisito #4</dd>
                            <dd>- Requisito #5</dd>
                        </dl>
                    </div>
                    <div class="mx-auto">
                        <h3 class="font-bold">Beneficios</h3>
                        <dl>
                            <dd>- Beneficio #1</dd>
                            <dd>- Beneficio #2</dd>
                            <dd>- Beneficio #3</dd>
                            <dd>- Beneficio #4</dd>
                            <dd>- Beneficio #5</dd>
                        </dl>
                    </div>
                </div>

                <p class="text-justify p-10">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Totam soluta atquevoluptas, debitis quisquam dolorem officia fugit
                    blanditiis vitae alias. Ut nostrum quibusdam, corporis ab totam similique
                    consequatur tempora eaque Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Eos laudantium alias iure aut dolorem nostrum est quia laboriosam? In enim unde
                    aspernatur facilis quos. Dolor nobis quaerat error vel assumenda.
                </p>
                <h3 class="font-bold text-2xl px-10">Aplicar</h3>
                <div class="px-5 py-3">
                    <div class="grid grid-cols-3 gap-3 p-10">
                        <input class="border-gray-200 rounded-lg" type="text" placeholder="Nombres">
                        <input class="border-gray-200 rounded-lg" type="text" placeholder="Apellidos">
                        <input class="border-gray-200 rounded-lg" type="text" placeholder="CUI,DUI o Pasaporte">
                        <input class="border-gray-200 rounded-lg" type="date" placeholder="Fecha de Nacimiento">
                        <input class="border-gray-200 rounded-lg" type="text" placeholder="Teléfono">
                        <input class="border-gray-200 rounded-lg" type="text" placeholder="Dirección">
                    </div>
                    <div class="flex">
                        <div class="space-x-2 flex">
                            <h3>Fotografía</h3>
                            <input class=" text-gray-400 rounded-xl" type="file">
                            <h3>Envianos tu CV</h3>
                            <input class=" text-gray-400 rounded-xl" type="file">
                        </div>
                    </div>
                    <div class="my-5">
                        <div class="ml-auto w-fit">
                            <button  class="bg-blue-600 text-white px-3 py-2 rounded-xl text-xl
                            ">Aplicar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection