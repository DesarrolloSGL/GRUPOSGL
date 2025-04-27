<div class="w-11/12 mx-auto">
    <style>
        [x-cloak] { display: none !important; }
    </style>
    <div
        class="relative"
        x-data="{ activeSlide: 1, slides: [1, 2, 3] ,openEventModal:false}">

        <!-- Slides -->
        {{-- <template x-for="slide in slides" :key="slide"> --}}
        <div x-cloak
            x-show="activeSlide == 1"
            class="h-80 md:h-[500px]">
            <img src="{{asset('images/home/terrestre-home-page-d.png')}}"
            class="object-cover w-full h-full rounded-lg" alt="Slide 2">
            <div class="absolute right-10 top-[40%]">
                <h3 class="text-xl font-bold text-white text-right sm:text-3xl md:text-5xl">LOS EXPERTOS DE LA</h3>
                <h3 class="text-xl text-white text-right sm:text-3xl md:text-5xl">LA LOGÍSTICA INTERNACIONAL</h3>
                <a href="/about-us">
                    <button class="ml-auto block px-3 py-2 rounded-lg text-white bg-global-400">Conócenos</button>
                </a>
            </div>
        </div>
        <div x-cloak
            x-show="activeSlide == 2"
            class="h-80 md:h-[500px]">
            <img src="{{asset('images/home/Aereo-home-page-d.png')}}"
            class="object-cover w-full h-full rounded-lg" alt="Slide 3">
            <div class="absolute right-10 top-[40%]">
                <h3 class="text-xl font-bold text-white text-right sm:text-3xl md:text-5xl">LOS EXPERTOS DE LA</h3>
                <h3 class="text-xl text-white text-right sm:text-3xl md:text-5xl">LA LOGÍSTICA INTERNACIONAL</h3>
                <a href="/about-us">
                    <button class="ml-auto block px-3 py-2 rounded-lg text-white bg-global-400">Conócenos</button>
                </a>
            </div>
        </div>
        <div x-cloak
            x-show="activeSlide == 3"
            class="h-80 md:h-[500px]">
            <img src="{{asset('images/home/maritimo-home-page-d.png')}}"
            class="object-cover w-full h-full rounded-lg" alt="Slide 4">
            <div class="absolute right-10 top-[40%]">
                <h3 class="text-xl font-bold text-white text-right sm:text-3xl md:text-5xl">LOS EXPERTOS DE LA</h3>
                <h3 class="text-xl text-white text-right sm:text-3xl md:text-5xl">LA LOGÍSTICA INTERNACIONAL</h3>
                <a href="/about-us">
                    <button class="ml-auto block px-3 py-2 rounded-lg text-white bg-global-400">Conócenos</button>
                </a>
            </div>
        </div>
        <h3 class="text-xl font-bold" x-data='carrousel'></h3>
        {{-- </template> --}}
        {{-- <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"> --}}


        <!-- Buttons -->
        <div class="absolute w-full flex items-center justify-center px-4">
            <template x-for="slide in slides" :key="slide">
                <button
                class="w-4 h-2 mt-4 mx-1 mb-0 rounded-full overflow-hidden transition-colors duration-200 ease-out hover:bg-global-600"
                :class="{
                    'bg-global-600': activeSlide === slide,
                    'bg-global-200': activeSlide !== slide
                }"
                x-on:click="activeSlide = slide"
                ></button>
            </template>
        </div>
    </div>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('carrousel', () => ({
                timer: null,
                init() {
                // Register an event handler that references the component instance
                this.timer = setInterval(() => {
                    this.activeSlide < 3 ? ++this.activeSlide : this.activeSlide = 1;
                }, 5000);
                },
                destroy() {
                    // Detach the handler, avoiding memory and side-effect leakage
                    clearInterval(this.timer);
                },
            }))
        })
    </script>
</div>