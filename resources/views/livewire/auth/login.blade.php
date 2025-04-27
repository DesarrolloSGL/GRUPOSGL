<div class="hidden ml-auto min-w-[300px] w-[310px] rounded-xl  bg-global-700 text-center xl:block">
    <form action="/login" method="POST">
        @csrf

        <h3 class="font-bold text-white text-xl py-5 border-white text-center underline
            underline-offset-8 decoration-sky-400 rounded-lg">Iniciar sesión</h3>

        <input class="w-64 mt-5 p-2 text-sm text-gray-900 border
        border-gray-300 rounded-lg bg-gray-50 focus:ring-global-400
        focus:border-global-400" name="email" type="email" placeholder="Email">

        <input class="togglePasswordField w-64 mt-5 p-2 text-sm text-gray-900 border
        border-gray-300 rounded-lg bg-gray-50 focus:ring-global-400
        focus:border-global-400" name="password" type="password" placeholder="Password">

        <div class="text-xs mx-auto text-white flex items-center space-x-1 p-2 w-fit">
            <input class="togglePasswordChk" type="checkbox">
            <h3>Mostrar Contraseña</h3>
        </div>

        @if(count($errors) > 0)
            <div class="text-red-600 text-xs p-5">
                @foreach ($errors->all() as $error)
                    <h3>{{$error}}</h3>
                @endforeach
            </div>
        @endif

        <div class="py-5 px-3 text-white">
            <button class="bg-white rounded-full text-global-800
            px-10 py-2">Entrar</button>
            <div class="text-xs">
                <div class="flex items-center mx-auto w-fit my-5">
                    <input type="checkbox" name="remember">
                    <h3 class="ml-1 ">Recordar</h3>
                </div>
                @if (Route::has('password.request'))
                    <a class="ml-auto underline" href="{{ route('password.request') }}" >
                        Recuperar Contraseña</a>
                @endif
            </div>
        </div>
    </form>

    <div class="py-5 px-3 text-xs text-white">
        <h3 class="ml-auto">Aún no tienes cuenta?</h3>
        <a class="underline" href="/register">Registrarme</a>
    </div>
</div>