<section class="md:px-20 lg:flex lg:items-center">
    <div  class="w-fit mx-auto">
        <div class="w-fit rounded-2xl mx-auto my-5 text-white md:ml-auto md:px-5 md:bg-global-500">
            <form action="/track/" method="POST" class="flex items-center text-center w-fit mx-auto p-2 rounded-lg mt-3">
                @csrf
                <span class="hidden ml-auto text-sm tracking-wide md:text-base
                    md:block">Rastrea tu servicio:</span>
                <input name="tracking_number" class="text-sm mx-1 sm:mx-1 md:mx-5 text-gray-900 border
                border-gray-300 rounded-full bg-gray-50 focus:ring-global-500
                focus:border-global-500 px-4 sm:w-96" type="text" placeholder="No. de Tracking">
                <button type="submit" class="bg-global-800 rounded-lg text-xs px-3
                py-3 mr-auto md:text-base md:py-3 align-middle flex hover:bg-global-700 transition-all delay-75">Rastrear</button>
            </form>
        </div>
    </div>
</section>