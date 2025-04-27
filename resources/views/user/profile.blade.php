@extends('user.base')

@section('user-content')
<section class="min-h-screen">
    <h3 class="font-bold text-xl">Mis Datos</h3>
    @if (isset($user))
        <form id="profile_update_form" action="/profile-update" method="POST">
            @csrf
            <div class="mt-5 space-y-3">
                <div class="flex space-x-1">
                    <input name="name" class="border-gray-200 rounded-lg w-full" type="text" value="{{ $user->name }}" placeholder="Nombre">
                    <input name="last_name" class="border-gray-200 rounded-lg w-full" type="text" value="{{ $user->last_name }}" placeholder="Apellido">
                </div>
                <input class="border-gray-200 rounded-lg w-full" readonly type="text" value="{{ $user->email }}" placeholder="Correo Electrónico">
                {{-- <div class="space-y-1 md:flex md:space-x-1">
                    <input name="address" class="border-gray-200 rounded-lg w-full" type="text" value="{{ $user->address->address }}" placeholder="Dirección">
                    <select name="departamento" class="border-gray-200 rounded-lg w-fit px-3 py-1">
                        <option value="Guatemala">Guatemala</option>
                    </select>
                    <select name="municipio" class="border-gray-200 rounded-lg w-fit px-3 py-1">
                        <option {{$user->address->municipio == 'Cda.Guatemala' ? 'selected':false}} value="Cda.Guatemala">Cda.Guatemala</option>
                        <option {{$user->address->municipio == 'Santa Catarina Pinula' ? 'selected':false}} value="Santa Catarina Pinula">Santa Catarina Pinula</option>
                        <option {{$user->address->municipio == 'San José Pinula' ? 'selected':false}} value="San José Pinula">San José Pinula</option>
                        <option {{$user->address->municipio == 'San José Del Golfo' ? 'selected':false}} value="San José Del Golfo">San José Del Golfo</option>
                        <option {{$user->address->municipio == 'Palencia' ? 'selected':false}} value="Palencia">Palencia</option>
                        <option {{$user->address->municipio == 'Chinautla' ? 'selected':false}} value="Chinautla">Chinautla</option>
                        <option {{$user->address->municipio == 'San Pedro Ayampuc' ? 'selected':false}} value="San Pedro Ayampuc">San Pedro Ayampuc</option>
                        <option {{$user->address->municipio == 'Mixco' ? 'selected':false}} value="Mixco">Mixco</option>
                        <option {{$user->address->municipio == 'San Pedro Sacatepéquez' ? 'selected':false}} value="San Pedro Sacatepéquez">San Pedro Sacatepéquez</option>
                        <option {{$user->address->municipio == 'San Juan Sacatepéquez' ? 'selected':false}} value="San Juan Sacatepéquez">San Juan Sacatepéquez</option>
                        <option {{$user->address->municipio == 'Chuarrancho' ? 'selected':false}} value="Chuarrancho">Chuarrancho</option>
                        <option {{$user->address->municipio == 'Villa Nueva' ? 'selected':false}} value="Villa Nueva">Villa Nueva</option>
                        <option {{$user->address->municipio == 'Villa Canales' ? 'selected':false}} value="Villa Canales">Villa Canales</option>
                        <option {{$user->address->municipio == 'Amatitlán' ? 'selected':false}} value="Amatitlán">Amatitlán</option>
                        <option {{$user->address->municipio == 'Fraijanes' ? 'selected':false}} value="Fraijanes">Fraijanes</option>
                        <option {{$user->address->municipio == 'San Miguel Petapa' ? 'selected':false}} value="San Miguel Petapa">San Miguel Petapa</option>
                        <option {{$user->address->municipio == 'San Raymundo' ? 'selected':false}} value="San Raymundo">San Raymundo</option>
                    </select>
                </div> --}}
                <input name="phone" class="border-gray-200 rounded-lg w-full max-w-lg" type="text" value="{{ $user->phone }}" placeholder="Teléfono">
                <input name="cui" class="border-gray-200 rounded-lg w-full max-w-lg" type="text" value="{{ $user->cui }}" placeholder="Número de identificación personal">
                <div class="flex space-x-1">
                    <input name="nit" class="border-gray-200 rounded-lg w-full max-w-lg" type="text" value="{{ $user->nit }}" placeholder="NIT">
                </div>
            </div>
            <button id="profile_update_btn" type="button" class="bg-blue-800 text-white px-3 py-2 rounded-xl mt-5 ml-auto block">
                Guardar Cambios
            </button>
        </form>

        <a href="/password/reset">
            <button class="bg-blue-900 text-white px-3 py-2 rounded-xl mt-5 ml-auto block">
                Restablecer Contraseña
            </button>
        </a>
    @endif

</section>

@endsection
