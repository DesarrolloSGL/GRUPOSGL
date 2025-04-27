@extends('user.base')

@section('user-content')
    <h3 class="font-bold text-xl">Mi Casillero</h3>
    <div class="mt-5 space-y-3">
        <div class="flex space-x-2 items-center">
            <img class="max-w-[40px]" src="{{asset('images/flags/'.$country->country.'.jpg')}}" alt="">
            <h3>{{$locker->number}}</h3>
        </div>
    </div>

    <div class="p-2 rounded-lg font-bold px-2 my-10 text-justify md:px-20">
        {{-- <h3 class="text-sm">
            Al momento de registrar nuestras direcciones le solicitamos que puedan agregar su Id de cliente / SGL Express esto
            debido a que si los paquetes llegan sin identificar puede dificultar su registro y vuelo o/y extraviarse en bodega.
        </h3> --}}
    </div>

    <h3 class="text-2xl font-bold">
        Nuestras Bodegas
    </h3>

    <div class="min-w-[320px] w-full space-y-3">
        <div class="cursor-pointer  rounded-lg p-5 hover:bg-gray-50 transition-all delay-75 lg:flex">
            <div>
                <div class="flex w-full mx-auto space-x-1 items-center">
                    <img class="rounded-lg max-w-[40px]" src="{{asset('images/flags/usa.jpg')}}" alt="">
                    <h3 class="font-bold">USA</h3>
                </div>
                <div class="p-10 space-y-5">
                    <h3 class="font-bold">Address: </h3>
                    <h3>SGL Express / Nombre de cliente</h3>
                    <h3>8200 NW 93 Street Suite # 4 Miami, FL. 33166</h3>
                    <h3 class="font-bold">From: 8:00 to 18:00</h3>
                </div>
            </div>

            <div class="w-full h-56 ml-auto rounded-lg lg:w-[60%]" id="map_miami"></div>
        </div>
        <div class="cursor-pointer  rounded-lg p-5 hover:bg-gray-50 transition-all delay-75 lg:flex">
            <div>
                <div class="flex w-full mx-auto space-x-1 items-center">
                    <img class="rounded-lg max-w-[40px]" src="{{asset('images/flags/china.png')}}" alt="">
                    <h3 class="font-bold">China</h3>
                </div>
                <div class="p-10 space-y-5">
                    <h3>跨境物流1号仓：深圳市宝安区福永街道怀德社区路干头一巷7-1号</h3>
                    <h3 class="font-bold">Warehouse Add: </h3>
                    <h3>No. 7-1, Lane 1, Gantou, Huaide Community Road,</h3>
                    <h3>Fuyong Street, Bao'an District, Shenzhen, GUANGDONG, China.</h3>
                </div>
            </div>
            <div class="w-full h-56 ml-auto rounded-lg lg:w-[60%]" id="map_china"></div>
        </div>

    </div>
@endsection
@push('child-scripts')
        <script type="text/javascript">
            function initMap() {
                const myLatLng = [{ lat: 25.820913847572143, lng:-80.31921074597591},{lat:22.668101913139424, lng:113.81837820954759}];

                const map = new google.maps.Map(
                    document.getElementById("map_miami"),
                    {
                    zoom: 17,
                    center: myLatLng[0],
                    }
                );

                const map1 = new google.maps.Map(
                    document.getElementById("map_china"),
                    {
                    zoom: 19,
                    center: myLatLng[1],
                    }
                );

                new google.maps.Marker({
                    position: myLatLng[0],
                    map,
                });

                new google.maps.Marker({
                    position: myLatLng[1],
                    map1,
                });
            }
            window.initMap = initMap;
        </script>
        <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyCPBMMcd2C8UcxwA_QfvH3K9ZSEJ5yTdlg&callback=initMap" ></script>
@endpush