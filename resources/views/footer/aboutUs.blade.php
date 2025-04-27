@extends('layouts.app')

@section('content')
    <section>
        <div class="w-full mx-auto h-fit" style="background-image: url({{asset('images/footer/Acerca_de_nosotros.png')}}); background-size: cover;">
            <div class="w-fit mx-auto">
                <div class="p-5 md:p-10 lg:p-20">
                    <h3 class="text-white text-3xl font-bold tracking-wider">Acerca de Nosotros</h3>
                    <br>
                    <h3 class="text-white">Grupo SGL los expertos de la logística internacional</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                    <div class="p-5 h-80 max-w-md">
                        <div class="bg-sky-500/60 p-5 h-full text-white">
                            <img class="w-10 h-10" src="{{asset('images/footer/Icono Holding.png')}}" alt="">
                            <h3 class="my-2 font-bold">Holding</h3>
                            <p class="text-xs text-justify">
                                Grupo SGL cuenta con un conglomerado de 8 empresas dedicadas a servicios
                                logísticos que van desde el Supply Chain hasta el Recurso Humano y Financiero.
                                Con presencia y desarrollo de negocios en los principales mercados del mundo.
                            </p>
                        </div>
                    </div>
                    <div class="p-5 h-80 max-w-md">
                        <div class="bg-sky-500/60 p-5 h-full text-white">
                            <img class="w-10 h-10" src="{{asset('images/footer/Icono Holding.png')}}" alt="">
                            <h3 class="my-2 font-bold">Internacional</h3>
                            <p class="text-xs text-justify">
                                Con Hub´s logísticos desarrollados en China, La India, Brasil, USA, El Salvador, Honduras, Panama, Chile, R. Dominicana,
                                España, Mexico, Alemania. Mantenemos un crecimiento y desarrollo sostenible y a la vanguardia, siendo la empresa con capital
                                100% guatemalteco liderando el desarrollo de plataformas de conexión propia y alcanzando acuerdos contractuales que garantizan
                                la sinergia común entre los puntos de conexión establecidos.
                            </p>
                        </div>
                    </div>
                    <div class="p-5 h-80 max-w-md">
                        <div class="bg-sky-500/60 p-5 h-full text-white">
                            <img class="w-10 h-10" src="{{asset('images/footer/Icono Holding.png')}}" alt="">
                            <h3 class="my-2 font-bold">Colaboradores</h3>
                            <p class="text-xs text-justify">
                                Nuestra cartera de colaboradores en un 85% egresados de las mejores
                                universidades de Ciudad de Guatemala con especializaciones en Comercio
                                Internacional y Aduanas, Financistas, Mercadologos y Relacionistas Publicos
                                marcan un hito en el cambio de mano de obra especializada en el sector y hacen
                                de cada uno de nuestros servicios algo diferente.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-5">
            <h3 class="text-center text-3xl font-bold tracking-wider text-blue-800 my-5">Puntos de Enlace</h3>
            {{-- Mapa --}}
            <div class="w-12/12 border-4 border-blue-800 mx-auto rounded-xl h-[600px] md:w-10/12" id="map">
            </div>
        </div>
    </section>
@endsection


@push('child-scripts')
        <script type="text/javascript">

            let markers = [
                ['Guatemala',14.594928, -90.512465],
                ['USA',39.006076, -101.469862],
                ['El Salvador',13.618454, -88.819959],
                ['China',39.901944, 116.411556],
                ['India',28.613917, 77.208806],
                ['Germany',52.520056, 13.404806],
                ['Spain',40.416667, -3.703889],
                ['Brazil',-15.797861, -47.891972],
                ['Chile',-33.448333, -70.669306],
                ['Colombia',4.710194, -74.071944],
                ['Panama',8.988528, -79.532694],
                ['Honduras',14.064306, -87.202000],
                ['Dominican Republic',18.462639, -69.936028],
                ['México',19.432634, -99.133205],
            ]

            function initMap() {
                let lng;
                window.screen.width < 800 ? lng = -81.109895:lng = -41.109895;

                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 3,
                    center:{lat:15.305477, lng: lng},
                });

                markers.forEach(element => {

                    const contentString =
                            '<div id="content">' +
                                element[0]+
                            "</div>";

                    const infowindow = new google.maps.InfoWindow({
                        content: contentString,
                        ariaLabel: "",
                    });

                    const marker = new google.maps.Marker({
                        position: {lat: element[1], lng: element[2]},
                        map,
                        title: element[0],
                    });

                    marker.addListener("click", () => {
                        infowindow.open({
                            anchor: marker,
                            map,
                        });
                    });
                });


            }

            window.initMap = initMap;

        </script>
        <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyCPBMMcd2C8UcxwA_QfvH3K9ZSEJ5yTdlg&callback=initMap" ></script>
@endpush