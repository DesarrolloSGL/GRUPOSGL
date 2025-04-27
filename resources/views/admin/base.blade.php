@extends('layouts.app')

@section('content')


<section class="bg-slate-100 flex w-full"
x-data="{navbar_horizontal:$persist(true),navbar_hidden:$persist(false), active_link:$persist(1), width: 0, height: 0}"
x-resize="$width < 1024 ? navbar_horizontal=false:false"
x-resize.document="$width > 1024 ? navbar_hidden=false:false">
    {{-- LATERAL NAVBAR --}}
    <section x-cloak class="w-fit h-fit z-10 sticky top-0 bg-slate-100 lg:bg-white lg:border-r lg:h-[100vh]"
    :class="navbar_horizontal ? 'w-3/12  2xl:w-2/12 transition-all delay-100':'xl:w-fit transition-all delay-100'">

        <div class="absolute py-5 px-2 lg:static">
            {{-- MOVIL BUTTON --}}
            <button class="block lg:hidden">
                <svg class="w-10 h-10 font-bold bg-indigo-200 text-indigo-700 rounded-lg" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                :class="navbar_hidden ? 'transition-all delay-75':'-rotate-90 transition-all delay-75'"
                x-on:click="navbar_hidden=!navbar_hidden">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 6h.01M12 12h.01M12 18h.01"/>
                </svg>
            </button>
            {{-- END MOVIL BUTTON --}}

            {{-- ORIENTATION BUTTON --}}
            <button class="hidden lg:block">
                <svg class="w-10 h-10 font-bold bg-indigo-200 text-indigo-700 rounded-lg" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                :class="navbar_horizontal ? 'transition-all delay-75':'rotate-90 transition-all delay-75'"
                x-on:click="navbar_horizontal=!navbar_horizontal">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 6h.01M12 12h.01M12 18h.01"/>
                </svg>
            </button>
            {{-- END ORIENTATION BUTTON --}}

            {{-- NAVBAR LIST --}}
            {{-- -translate-x-full doesn't work because of px-2 in parent --}}
            <section class="text-indigo-700 transition ease-in-out duration-500" :class="navbar_hidden ? '-translate-x-14':'translate-x-0'">
                <a href="/admin-index">
                    <button class="mx-auto rounded-lg flex h-11 py-3 px-3 my-2 w-full hover:bg-gray-300"
                    :class="active_link == 1 ? 'bg-indigo-400':'bg-indigo-200'" x-on:click="active_link=1">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-3 5h3m-6 0h.01M12 16h3m-6 0h.01M10 3v4h4V3h-4Z"/>
                        </svg>
                        <span x-cloak class="ml-5 whitespace-nowrap font-semibold text-sm" :class="navbar_horizontal ? 'block':'hidden'">Ordenes</span>
                    </button>
                </a>

                <a href="/admin-store-quotations">
                    <button class="mx-auto rounded-lg flex h-11 py-3 px-3 my-2 w-full hover:bg-gray-300"
                    :class="active_link == 2 ? 'bg-indigo-400':'bg-indigo-200'" x-on:click="active_link=2">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.213 9.787a3.391 3.391 0 0 0-4.795 0l-3.425 3.426a3.39 3.39 0 0 0 4.795 4.794l.321-.304m-.321-4.49a3.39 3.39 0 0 0 4.795 0l3.424-3.426a3.39 3.39 0 0 0-4.794-4.795l-1.028.961"/>
                        </svg>
                        <span x-cloak class="ml-5 whitespace-nowrap font-semibold text-sm" :class="navbar_horizontal ? 'block':'hidden'">Tienda Link</span>
                    </button>
                </a>

                {{-- <a href="/tracking-index">
                    <button class="mx-auto rounded-lg flex h-11 py-3 px-3 my-2 w-full hover:bg-gray-300"
                    :class="active_link == 3 ? 'bg-indigo-400':'bg-indigo-200'" x-on:click="active_link=3">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z"/>
                        </svg>
                        <span x-cloak class="ml-5 whitespace-nowrap font-semibold text-sm" :class="navbar_horizontal ? 'block':'hidden'">Tracking</span>
                    </button>
                </a> --}}

                <a href="/admin-store-index">
                    <button class="mx-auto rounded-lg flex h-11 py-3 px-3 my-2 w-full hover:bg-gray-300"
                    :class="active_link == 4 ? 'bg-indigo-400':'bg-indigo-200'" x-on:click="active_link=4">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 12c.263 0 .524-.06.767-.175a2 2 0 0 0 .65-.491c.186-.21.333-.46.433-.734.1-.274.15-.568.15-.864a2.4 2.4 0 0 0 .586 1.591c.375.422.884.659 1.414.659.53 0 1.04-.237 1.414-.659A2.4 2.4 0 0 0 12 9.736a2.4 2.4 0 0 0 .586 1.591c.375.422.884.659 1.414.659.53 0 1.04-.237 1.414-.659A2.4 2.4 0 0 0 16 9.736c0 .295.052.588.152.861s.248.521.434.73a2 2 0 0 0 .649.488 1.809 1.809 0 0 0 1.53 0 2.03 2.03 0 0 0 .65-.488c.185-.209.332-.457.433-.73.1-.273.152-.566.152-.861 0-.974-1.108-3.85-1.618-5.121A.983.983 0 0 0 17.466 4H6.456a.986.986 0 0 0-.93.645C5.045 5.962 4 8.905 4 9.736c.023.59.241 1.148.611 1.567.37.418.865.667 1.389.697Zm0 0c.328 0 .651-.091.94-.266A2.1 2.1 0 0 0 7.66 11h.681a2.1 2.1 0 0 0 .718.734c.29.175.613.266.942.266.328 0 .651-.091.94-.266.29-.174.537-.427.719-.734h.681a2.1 2.1 0 0 0 .719.734c.289.175.612.266.94.266.329 0 .652-.091.942-.266.29-.174.536-.427.718-.734h.681c.183.307.43.56.719.734.29.174.613.266.941.266a1.819 1.819 0 0 0 1.06-.351M6 12a1.766 1.766 0 0 1-1.163-.476M5 12v7a1 1 0 0 0 1 1h2v-5h3v5h7a1 1 0 0 0 1-1v-7m-5 3v2h2v-2h-2Z"/>
                        </svg>
                        <span x-cloak class="ml-5 whitespace-nowrap font-semibold text-sm" :class="navbar_horizontal ? 'block':'hidden'">Marketplace</span>
                    </button>
                </a>

                <a href="/admin-generate-quotation">
                    <button class="mx-auto rounded-lg flex h-11 py-3 px-3 my-2 w-full hover:bg-gray-300"
                    :class="active_link == 5 ? 'bg-indigo-400':'bg-indigo-200'" x-on:click="active_link=5">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4a1 1 0 0 1-1 1H5m4 6 2 2 4-4m4-8v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z"/>
                        </svg>
                        <span x-cloak class="ml-5 whitespace-nowrap font-semibold text-sm" :class="navbar_horizontal ? 'block':'hidden'">(Work in Progress)</span>
                    </button>
                </a>


                <a href="/admin-cost-center">
                    <button class="mx-auto rounded-lg flex h-11 py-3 px-3 my-2 w-full hover:bg-gray-300"
                    :class="active_link == 6 ? 'bg-indigo-400':'bg-indigo-200'" x-on:click="active_link=6">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M9 15a6 6 0 1 1 12 0 6 6 0 0 1-12 0Zm3.845-1.855a2.4 2.4 0 0 1 1.2-1.226 1 1 0 0 1 1.992-.026c.426.15.809.408 1.111.749a1 1 0 1 1-1.496 1.327.682.682 0 0 0-.36-.213.997.997 0 0 1-.113-.032.4.4 0 0 0-.394.074.93.93 0 0 0 .455.254 2.914 2.914 0 0 1 1.504.9c.373.433.669 1.092.464 1.823a.996.996 0 0 1-.046.129c-.226.519-.627.94-1.132 1.192a1 1 0 0 1-1.956.093 2.68 2.68 0 0 1-1.227-.798 1 1 0 1 1 1.506-1.315.682.682 0 0 0 .363.216c.038.009.075.02.111.032a.4.4 0 0 0 .395-.074.93.93 0 0 0-.455-.254 2.91 2.91 0 0 1-1.503-.9c-.375-.433-.666-1.089-.466-1.817a.994.994 0 0 1 .047-.134Zm1.884.573.003.008c-.003-.005-.003-.008-.003-.008Zm.55 2.613s-.002-.002-.003-.007a.032.032 0 0 1 .003.007ZM4 14a1 1 0 0 1 1 1v4a1 1 0 1 1-2 0v-4a1 1 0 0 1 1-1Zm3-2a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1Zm6.5-8a1 1 0 0 1 1-1H18a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-.796l-2.341 2.049a1 1 0 0 1-1.24.06l-2.894-2.066L6.614 9.29a1 1 0 1 1-1.228-1.578l4.5-3.5a1 1 0 0 1 1.195-.025l2.856 2.04L15.34 5h-.84a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                        </svg>
                        <span x-cloak class="ml-5 whitespace-nowrap font-semibold text-sm" :class="navbar_horizontal ? 'block':'hidden'">(Work in Progress)</span>
                    </button>
                </a>


                @role('super-admin')
                <a href="/admin-users-index">
                    <button class="mx-auto rounded-lg flex h-11 py-3 px-3 my-2 w-full hover:bg-gray-300"
                    :class="active_link == 7 ? 'bg-indigo-400':'bg-indigo-200'" x-on:click="active_link=7">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
                        </svg>
                        <span x-cloak class="ml-5 whitespace-nowrap font-semibold text-sm" :class="navbar_horizontal ? 'block':'hidden'">Usuarios</span>
                    </button>
                </a>
                @endrole
            </section>
            {{-- END NAVBAR LIST --}}
        </div>

    </section>
    {{-- ENDLATERAL NAVBAR --}}

    @yield('admin-content')

</section>
@endsection

