<nav class="p-1 md:p-2">
    <div class="flex lg:px-20 items-center">
        {{-- Logo --}}
        <a href="/">
            <div class="flex">
                <div class="flex w-fit space-x-1 cursor-pointer">
                    <img class="block h-12 md:h-12 xl:h-14 min-h-10 min-w-10" src="{{asset('images/main/logo.png')}}"/>
                    <div>
                        <div class="text-sm font-bold text-global-500 text-center h-fit mt-auto">
                            <h3>Beta</h3>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        {{-- Tabs --}}
        <div class="hidden mx-auto md:flex items-center bg-global-700 text-global-100 rounded-lg">
            <ul class="rounded-lg flex">
                @role('super-admin|admin|operator|accounting')
                    <li class="hidden lg:flex items-center rounded-lg px-3 py-1 transition-all delay-75 hover:bg-global-500">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                            <path d="M7.324 9.917A2.479 2.479 0 0 1 7.99 7.7l.71-.71a2.484 2.484 0 0 1 2.222-.688 4.538 4.538 0 1 0-3.6 3.615h.002ZM7.99 18.3a2.5 2.5 0 0 1-.6-2.564A2.5 2.5 0 0 1 6 13.5v-1c.005-.544.19-1.072.526-1.5H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h7.687l-.697-.7ZM19.5 12h-1.12a4.441 4.441 0 0 0-.579-1.387l.8-.795a.5.5 0 0 0 0-.707l-.707-.707a.5.5 0 0 0-.707 0l-.795.8A4.443 4.443 0 0 0 15 8.62V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.12c-.492.113-.96.309-1.387.579l-.795-.795a.5.5 0 0 0-.707 0l-.707.707a.5.5 0 0 0 0 .707l.8.8c-.272.424-.47.891-.584 1.382H8.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1.12c.113.492.309.96.579 1.387l-.795.795a.5.5 0 0 0 0 .707l.707.707a.5.5 0 0 0 .707 0l.8-.8c.424.272.892.47 1.382.584v1.12a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1.12c.492-.113.96-.309 1.387-.579l.795.8a.5.5 0 0 0 .707 0l.707-.707a.5.5 0 0 0 0-.707l-.8-.795c.273-.427.47-.898.584-1.392h1.12a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5ZM14 15.5a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5Z"/>
                        </svg>
                        <a href="/admin-index" class="block py-1 ml-1">{{Auth::user()->role}}</a>
                    </li>
                @endrole
                <li class="flex items-center cursor-pointer rounded-lg px-10 py-2 transition-all delay-75 hover:bg-global-500">
                    <a href="/" class="block py-1 ">Home</a>
                </li>
                <li class="flex items-center cursor-pointer rounded-lg px-10 py-2 transition-all delay-75 hover:bg-global-500">
                    <a href="/store-marketplace-index" class="block py-1 ">Tienda</a>
                </li>
                <li class="flex items-center cursor-pointer rounded-lg px-10 py-2 transition-all delay-75 hover:bg-global-500">
                    <a href="/membership-table" class="block py-1 ">Membresía</a>
                </li>
                @guest
                    @if (Route::has('login'))
                        <li class="flex items-center cursor-pointer rounded-lg px-10 py-3 transition-all delay-75 hover:bg-global-500">
                            <a class="" href="{{ route('login') }}">
                                {{ __('Acceder') }}
                            </a>
                        </li>
                    @endif
                @endguest

                @role('client')
                <li class="flex items-center rounded-lg px-3 py-1 transition-all delay-75 hover:bg-global-500">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                        <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z"/>
                        </svg>
                    <a href="/user-orders" class="block py-1 ml-1 whitespace-nowrap">Mis Ordenes</a>
                </li>
                @endrole

            </ul>
        </div>

        {{-- Profile --}}
        @auth
            <div class="flex mr-5 items-center md:flex ml-auto">
                {{-- Profile --}}
                <a href="/profile">
                    <div class="hidden w-fit space-x-1 hover:bg-global-200
                        rounded-lg cursor-pointer md:flex ">
                        <div>
                            <div class="text-sm text-global-900 text-center font-bold rounded-lg h-fit">
                                <span class=" ">{{ Auth::user()->name}} {{ Auth::user()->last_name }}</span>
                            </div>
                            <div class="flex items-center justify-center text-xs bg-global-700 text-yellow-400 rounded-md text-center h-fit p-1">
                                <span>0 SGL Points</span>
                                <svg class="ml-1 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 17 20">
                                    <path d="M7.958 19.393a7.7 7.7 0 0 1-6.715-3.439c-2.868-4.832 0-9.376.944-10.654l.091-.122a3.286 3.286 0 0 0 .765-3.288A1 1 0 0 1 4.6.8c.133.1.313.212.525.347A10.451 10.451 0 0 1 10.6 9.3c.5-1.06.772-2.213.8-3.385a1 1 0 0 1 1.592-.758c1.636 1.205 4.638 6.081 2.019 10.441a8.177 8.177 0 0 1-7.053 3.795Z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>

                {{-- Logout --}}
                <a class="hidden text-global-900 font-bold items-center ml-2 md:flex" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <svg class="w-4 h-4 text-global-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3"/>
                    </svg>
                </a>

                {{-- Movil Open Menu --}}
                <button id="home_movil_menu_btn" class="md:hidden">
                    <svg class="w-6 h-6 text-global-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

                {{-- Movil Menu --}}
                <div id="home_movil_menu_div" class="fixed top-0 z-50 w-full h-screen bg-white" style="display: none">
                    <button id="home_movil_menu_close_btn" class="ml-auto block mx-5 mt-5">
                        <svg class="w-5 h-5 text-global-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>

                    <div class="mx-auto flex w-fit space-x-1
                        rounded-lg cursor-pointer">
                        <div>
                            <div class="text-sm text-global-900 text-center font-bold rounded-lg h-fit">
                                <span class=" ">{{ Auth::user()->name}} {{ Auth::user()->last_name }}</span>
                            </div>
                            <div class="flex items-center text-xs bg-global-700 text-yellow-400 rounded-md text-center h-fit p-1">
                                <span>0 SGL Points</span>
                                <svg class="ml-1 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 17 20">
                                    <path d="M7.958 19.393a7.7 7.7 0 0 1-6.715-3.439c-2.868-4.832 0-9.376.944-10.654l.091-.122a3.286 3.286 0 0 0 .765-3.288A1 1 0 0 1 4.6.8c.133.1.313.212.525.347A10.451 10.451 0 0 1 10.6 9.3c.5-1.06.772-2.213.8-3.385a1 1 0 0 1 1.592-.758c1.636 1.205 4.638 6.081 2.019 10.441a8.177 8.177 0 0 1-7.053 3.795Z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="border-gray-100 bg-white min-h-screen h-full rounded-xl py-5 ">
                        <a href="/">
                            <div class="px-5 py-5 cursor-pointer whitespace-nowrap">
                                Home
                            </div>
                        </a>
                        <hr class="border-gray-300 w-5/6 mx-auto">

                        <a href="/store-marketplace-index">
                            <div class="px-5 py-5 cursor-pointer whitespace-nowrap">
                                Tienda
                            </div>
                        </a>
                        <hr class="border-gray-300 w-5/6 mx-auto">

                        <a href="/store-index">
                            <div class="px-5 py-5 cursor-pointer whitespace-nowrap">
                                Pasamé Tu Link
                            </div>
                        </a>
                        <hr class="border-gray-300 w-5/6 mx-auto">
                        <br><br>

                        <a href="/profile">
                            <div class="px-5 py-5 cursor-pointer whitespace-nowrap">
                                Mis Datos
                            </div>
                        </a>
                        <hr class="border-gray-300 w-5/6 mx-auto">
                        <a href="/user-orders">
                            <div class="px-5 py-3 cursor-pointer whitespace-nowrap">
                                Mis Ordenes
                            </div>
                        </a>
                        <hr class="border-gray-300 w-5/6 mx-auto">
                        <a href="/locker">
                            <div class="px-5 py-3 cursor-pointer whitespace-nowrap">
                                Mi Casillero
                            </div>
                        </a>
                        <hr class="border-gray-300 w-5/6 mx-auto">
                        <a href="/membership">
                            <div class="px-5 py-3 cursor-pointer whitespace-nowrap">
                                Membresia
                            </div>
                        </a>
                        <hr class="border-gray-300 w-5/6 mx-auto">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <div class="p-2 text-center font-bold">
                                {{ __('Cerrar Sesión') }}
                            </div>
                        </a>
                        <hr class="border-gray-300 w-5/6 mx-auto">
                    </div>
                </div>


        @else
            <div class="items-center  ml-auto flex md:hidden">
                @if (Route::has('login'))
                    <li class="flex items-center bg-global-500 mx-1 text-sm cursor-pointer rounded-lg px-10 py-3 transition-all delay-75">
                        <a class="text-white" href="{{ route('login') }}">
                            {{ __('Acceder') }}
                        </a>
                    </li>
                @endif
            </div>
        @endauth
    </div>
</nav>

