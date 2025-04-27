@extends('layouts.app')

@section('content')
    <section class="bg-white min-h-screen">
        <div class="py-10 md:py-36">
            {{-- Link Paste --}}
            <div id="store_all_include_quoter_div" class="rounded-lg p-1 mx-auto w-11/12 sm:p-5 sm:10/12 md:p-10 lg:w-1/2" style="background-image: url({{asset('images/home/vector_onda.png')}}); background-size: contain; background-repeat: no-repeat;">
                <div class="flex my-0.5">
                    <img class="w-24 lg:w-52" src="{{asset('images/home/Baloo Tienda Online.png')}}" alt="">
                    <img class="w-40 lg:w-96" src="{{asset('images/home/pasame tu link.png')}}" alt="">
                </div>
                <form id="store_all_include_quoter_form" action="/store-quotation-get" method="post" autocomplete="off">
                    @csrf
                    <div class="flex shadow-2xl">
                        <input type="text" name="link" class="rounded-l-lg w-full border-gray-300" placeholder="Pasame Tu Link" autocomplete="off" value="">
                        <x-honeypot />
                        <button type="button" id="store_all_include_quoter_btn" class="bg-blue-700 text-white rounded-r-lg px-3 py-2">Cotizar</button>
                    </div>
                    @guest
                        <input type="text" name="email" class="my-1 mx-auto block sm:mx-0 rounded-lg drop-shadow-2xl border-gray-300" placeholder="Email" autocomplete="off" value="">
                    @endguest
                </form>
            </div>

            {{-- Product Receive --}}
            <div id="store_all_include_response_div" class="text-blue-800 text-center rounded-lg p-1 mx-auto w-11/12 sm:p-5 sm:10/12 md:p-10 lg:w-1/2 hidden">
                <svg class="w-10 h-10 text-blue-800 mx-auto shadow-xl" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.876.517A1 1 0 0 0 17 0H3a1 1 0 0 0-.871.508C1.63 1.393 0 5.385 0 6.75a3.236 3.236 0 0 0 1 2.336V19a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-6h4v6a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V9.044a3.242 3.242 0 0 0 1-2.294c0-1.283-1.626-5.33-2.124-6.233ZM15.5 14.7a.8.8 0 0 1-.8.8h-2.4a.8.8 0 0 1-.8-.8v-2.4a.8.8 0 0 1 .8-.8h2.4a.8.8 0 0 1 .8.8v2.4ZM16.75 8a1.252 1.252 0 0 1-1.25-1.25 1 1 0 0 0-2 0 1.25 1.25 0 0 1-2.5 0 1 1 0 0 0-2 0 1.25 1.25 0 0 1-2.5 0 1 1 0 0 0-2 0A1.252 1.252 0 0 1 3.25 8 1.266 1.266 0 0 1 2 6.75C2.306 5.1 2.841 3.501 3.591 2H16.4A19.015 19.015 0 0 1 18 6.75 1.337 1.337 0 0 1 16.75 8Z"/>
                </svg>

                <h3 class="text-xl"> Producto Recibido</h3>
                <svg class="w-6 h-6 text-green-500 mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                  </svg>
                <h3 class="text-sm">Recibiras Un Correo De Nuestros Asesores Con Tu Cotización</h3>
                <a href="/store-index">
                    <button class="text-white bg-blue-700 px-3 py-2 rounded-lg my-5">
                        Cotizar Nuevo Producto
                    </button>
                </a>
            </div>

            @php
                $products = [
                    [
                        'url'=>'https://www.amazon.com/Xbox-Elite-Wireless-Controller-Core-Controllers/dp/B0B789CGGQ/?_encoding=UTF8&pd_rd_w=x9by7&content-id=amzn1.sym.d7c624db-a896-426f-96a6-06dce9445b3b&pf_rd_p=d7c624db-a896-426f-96a6-06dce9445b3b&pf_rd_r=JANAWX8YSP11HZ9G8FRP&pd_rd_wg=YGiPg&pd_rd_r=6879922a-793b-4e73-bc74-99224a589797&ref_=pd_gw_gcx_gw_per_1',
                        'name'=>'Xbox Elite Series 2 Core Wireless Gaming Controller – White – Xbox Series X|S, Xbox One, Windows PC, Android, and iOS',
                    ],
                    [
                        'url'=>'https://www.nflshop.com/kansas-city-chiefs/mens-kansas-city-chiefs-patrick-mahomes-nike-red-super-bowl-lviii-game-jersey/t-14042514+p-792267340693894+z-9-2496110376?_ref=p-CLP:m-GRID:i-r0c0:po-0',
                        'name'=>"Men's Kansas City Chiefs Patrick Mahomes Nike Red Super Bowl LVIII Game Jersey",
                    ],
                    [
                        'url'=>'https://www.amazon.com/Insignia-43-inch-Class-Smart-Fire/dp/B08X7K3H7K/ref=sr_1_1?adgrpid=82205079595&hvadid=585475090238&hvdev=c&hvlocphy=9077190&hvnetw=g&hvqmt=b&hvrand=5494903008965929857&hvtargid=kwd-1352496809&hydadcr=741_1014988876&keywords=insignia+tv&qid=1705964480&sr=8-1',
                        'name'=>'43-inch Class F30 Series LED 4K UHD Smart Fire TV with Alexa Voice Remote (NS-43F301NA22, 2021 Model)',
                    ],
                    [
                        'url'=>'https://www.amazon.com/5-Inch-Starfighter-Vehicle-Skywalker-Figures/dp/B09PMT8DKC/?_encoding=UTF8&pd_rd_w=rouT4&content-id=amzn1.sym.d7c624db-a896-426f-96a6-06dce9445b3b&pf_rd_p=d7c624db-a896-426f-96a6-06dce9445b3b&pf_rd_r=KDXN34FDGKJKQTP4CDWX&pd_rd_wg=hi3bc&pd_rd_r=270099a3-d1c9-43d5-a36b-3e6b2215f9e0&ref_=pd_gw_gcx_gw_per_1',
                        'name'=>'Star Wars 5-Inch X-Wing Starfighter Vehicle with Luke Skywalker & R2-D2 Micro Figures',
                    ],
                    [
                        'url'=>'https://www.nflshop.com/san-francisco-49ers/brock-purdy-san-francisco-49ers-autographed-fanatics-authentic-riddell-super-bowl-lviii-speed-mini-helmet/t-47159396+p-801178019788173+z-9-176990607?_ref=p-CLP:m-GRID:i-r0c2:po-2',
                        'name'=>'Brock Purdy San Francisco 49ers Autographed Fanatics Authentic Riddell Super Bowl LVIII Speed Mini Helmet',
                    ],
                    [
                        'url'=>'https://www.amazon.com/Starbucks-Pike-Place-Roast-96-Count/dp/B009GDBNF8/ref=zg_m_bs_c_grocery_m_sccl_6/137-2871046-0907967?pd_rd_w=idVX0&content-id=amzn1.sym.309d45c5-3eba-4f62-9bb2-0acdcf0662e7&pf_rd_p=309d45c5-3eba-4f62-9bb2-0acdcf0662e7&pf_rd_r=YRP153ETQS6NHZGDT1RR&pd_rd_wg=rpbY2&pd_rd_r=8ab75356-6d4c-4e25-89d7-a0164a319af0&pd_rd_i=B009GDBNF8&psc=',
                        'name'=>'Starbucks K-Cup Coffee Pods—Medium Roast Coffee—Pike Place Roast for Keurig Brewers—100% Arabica—4 boxes (96 pods total)',
                    ],
                    [
                        'url'=>'https://www.amazon.com/My-First-Library-Boxset-Board/dp/9387779262?ref_=Oct_d_otopr_d_2578998011_0&pd_rd_w=uZAte&content-id=amzn1.sym.472f0888-5e02-4b8b-ac4e-af0d4b63f492&pf_rd_p=472f0888-5e02-4b8b-ac4e-af0d4b63f492&pf_rd_r=43RPY2GCTTZVYY18SD9K&pd_rd_wg=AYYBD&pd_rd_r=689b136a-7983-4189-a205-6dff197b17e5&pd_rd_i=9387779262',
                        'name'=>'My First Library: Boxset of 10 Board Books for Kids',
                    ],
                    [
                        'url'=>'https://www.amazon.com/TP-Link-Deco-Replacement-S4-3-Pack/dp/B084GTH5LL/ref=lp_21217028011_1_8?pf_rd_p=53d84f87-8073-4df1-9740-1bf3fa798149&pf_rd_r=PC9YV9TTSHB0GZTWGET3&sbo=RZvfv%2F%2FHxDF%2BO5021pAnSA%3D%3D&ufe=app_do%3Aamzn1.fos.f5122f16-c3e8-4386-bf32-63e904010ad0&th=1',
                        'name'=>'TP-Link Deco Mesh WiFi System (Deco S4) – Up to 5,500 Sq.ft. Coverage, Replaces WiFi
                                Router and Extender, Gigabit Ports, Works with Alexa, 3-pack',
                    ],
                    [
                        'url'=>'https://www.nflshop.com/san-francisco-49ers/brock-purdy-san-francisco-49ers-autographed-fanatics-authentic-super-bowl-lviii-duke-football/t-25042630+p-917723014244959+z-9-438477033?_ref=p-DLP:m-GRID:i-r0c0:po-0',
                        'name'=>"Brock Purdy San Francisco 49ers Autographed Fanatics Authentic Super Bowl LVIII Duke Football",
                    ],
                    [
                        'url'=>'https://store.nba.com/los-angeles-lakers/mens-los-angeles-lakers-new-era-black/gold-2024-nba-all-star-game-a-frame-9forty-trucker-hat/t-47692991+p-91333336907517+z-8-3534832752?_ref=p-BRLP:m-GRID:i-r3c0:po-9',
                        'name'=>"Men's Los Angeles Lakers New Era Black/Gold 2024 NBA All-Star Game A-Frame 9FORTY Trucker Hat",
                    ],
                    [
                        'url'=>'https://www.nflshop.com/san-francisco-49ers/mens-san-francisco-49ers-majestic-threads-heather-black-super-bowl-lviii-tri-blend-pullover-hoodie/t-36824885+p-35336756757464+z-8-2387965000?_ref=p-GALP:m-GRID:i-r8c0:po-24',
                        'name'=>"Men's San Francisco 49ers Majestic Threads Heather Black Super Bowl LVIII Tri-Blend Pullover Hoodie",
                    ],
                    [
                        'url'=>'https://www.amazon.com/Logitech-Lightweight-Wireless-Gaming-Headset/dp/B08KY2WFGP/ref=sr_1_1_sspa?c=ts&dib=eyJ2IjoiMSJ9.VbZgobhkxGfYyyytuV8o_vjX9CQ5r7GugCRIc5EsgbE2gUzVGoJDBGfU2GC6Q5T9Wmvs8boCpEgGOqpWDFHGM8vpR5Q6sF7K1UB8tNzM2BqoWS8UQYPhWTEObgoRDElddKqcI2tCPHVRurSitx2g2w.EoN1P7Ux_gzI-hVR2W84dLcxWfV_2ElzOTVv_QbpD1w&dib_tag=se&keywords=Computer%2BGame%2BHardware&qid=1705169808&s=pc&sr=1-1-spons&ts_id=172487&sp_csd=d2lkZ2V0TmFtZT1zcF9hdGY&th=1',
                        'name'=>'Logitech G535 Lightspeed Wireless Gaming Headset - Lightweight on-ear headphones, flip to mute mic, stereo, compatible with PC, PS4, PS5, USB rechargeable - Black',
                    ],
                    [
                        'url'=>'https://www.amazon.com/Welchs-Snacks-Gluten-Individual-Single/dp/B0BWSKYV63?_encoding=UTF8&fpw=new&fpl=fresh&ref_=eemb_mb_cat_grocery_m_d_sf_4_3_i&pf_rd_p=60a90678-3a77-43d5-8055-c1be704a1f75&pf_rd_r=N7J2W7DPMEGMQFM4PEDS',
                        'name'=>"Welch's Fruit Snacks, Mixed Fruit, Great Valentines Day Gifts for Kids, Gluten Free, Bulk Pack, Individual Single Serve Bags, 0.8 oz (Pack of 40)",
                    ],
                    [
                        'url'=>'https://store.nba.com/nba-events/mens-new-era-black-2024-nba-all-star-game-allover-logos-59fifty-fitted-hat/t-4501033788+p-57228881348026+z-9-208683392?_ref=p-BRLP:m-GRID:i-r0c0:po-0',
                        'name'=>"Men's New Era Black 2024 NBA All-Star Game Allover Logos 59FIFTY Fitted Hat",
                    ],
                    [
                        'url'=>'https://www.amazon.com/DEWALT-Circular-2-Inch-Cordless-DCS565B/dp/B08KYM6GW6/ref=sr_1_5?c=ts&dib=eyJ2IjoiMSJ9.MEWvR0LFJ9rA-Ke1GfaLxxduEsFloQ-YTenPMC1PJlMb2VQnLMuzqz4dd1RYiyH6Gqh8IKUvsthQaiuF8mNdNNl1TNaLLbadf_jUXieCe_xguuQtpftlVH8rMXMsT2Vbg6Gxjmf0wwiwp5ajngeKw-TJOgsKuplajWc1ux5CAEBVyhvKsy8zJ_2VSSWVBN2CoOyeZ62JeDCHAZoxoYsc9g4CKk9gaJm-vruYYJd0qE0bW_PSRjVy5NNsIDTT8UH8PnlFWsy6QjN2v-CHTijrZCOx8-aZVMP6LPk22fazZHA.7PzLm_EdSRd0oUAKb2v4FvBfC1mC5AhDK2lo5Ck4OjU&dib_tag=se&keywords=Power%2BSaws&qid=1705769045&s=power-hand-tools&sr=1-5&ts_id=552894&th=1',
                        'name'=>'DEWALT 20V MAX* Circular Saw, 6-1/2-Inch, Cordless, Tool Only (DCS565B)',
                    ],
                    [
                        'url'=>'https://store.nba.com/golden-state-warriors/unisex-golden-state-warriors-stephen-curry-nike-royal-swingman-jersey-icon-edition/t-14367374+p-041794221511+z-8-1374959010?_ref=p-DLP:m-GRID:i-r2c1:po-7',
                        'name'=>'Unisex Golden State Warriors Stephen Curry Nike Royal Swingman Jersey - Icon Edition',
                    ],
                    [
                        'url'=>'https://www.amazon.com/KAFEEK-Universal-Microfiber-Breathable-Anti-Slip/dp/B07WNHR1JT/ref=sr_1_7?c=ts&dib=eyJ2IjoiMSJ9.CQ_Zy5LA2L3prZvw2-fPKk9VMaZykvA6StYCGsPDHojdjwleHErlUfC1zvZl7FLXAKLXTGJ5v6LSUR6I0am1Acovpyt0nrlGhRNvj5yZdYjNy-BnX_3VGTWWKN4brOlOHfuDjgslHxWtYAoXOHnSZJhwr8qa_G__44LGlOVXzuIOrrYU_Vp5IhF1LWhHO04Fsksw731o2OwAiSurQRlJBa2-UG0sG1az9f0JQdwzg65ora8qmWN2UnsiOD06KDwg-yWeYFDDxEGk0WjDrJ-7-t-HM7TLw9wTcmsMx0pDznE.cQaWhxeYYDO3H2IVATQga9uh9g1n20GkEgoHrh0OjEA&dib_tag=se&keywords=Steering%2BWheels%2B%26%2BAccessories&qid=1705768933&s=automotive&sr=1-7&ts_id=15737141&th=1',
                        'name'=>'KAFEEK Steering Wheel Cover, Universal 15 inch, Microfiber Leather Viscose, Breathable,
                                Anti-Slip,Warm in Winter and Cool in Summer, Black',
                    ],
                    [
                        'url'=>'https://www.amazon.com/NVIDIA-Shield-Android-Streaming-Performance/dp/B07YP9FBMM/ref=lp_21217026011_1_9?pf_rd_p=53d84f87-8073-4df1-9740-1bf3fa798149&pf_rd_r=V27HFTFNDQFQ6HE1GMJF&sbo=RZvfv%2F%2FHxDF%2BO5021pAnSA%3D%3D&ufe=app_do%3Aamzn1.fos.f5122f16-c3e8-4386-bf32-63e904010ad0&th=1',
                        'name'=>'NVIDIA SHIELD Android TV Pro Streaming Media Player; 4K HDR movies, live sports,
                            Dolby Vision-Atmos, AI-enhanced upscaling, GeForce NOW cloud gaming, Google Assistant
                            Built-In, Works with Alexa',
                    ],
                    [
                        'url'=>'https://www.amazon.com/North-Insulated-550-Down-Puffer-Jacket/dp/B0B5NS9XXB/ref=lp_1045830_1_4?pf_rd_p=53d84f87-8073-4df1-9740-1bf3fa798149&pf_rd_r=5H1A888D0MXV40RR5FDK',
                        'name'=>"The North Face Men's Flare 2 Insulated 550-Down Full Zip Puffer Jacket",
                    ],
                    [
                        'url'=>'https://www.amazon.com/GEONEO-Exercise-Resistance-Stationary-Stationary-black/dp/B0CPYH9917/ref=sxin_14_pa_sp_search_thematic_sspa?c=ts&content-id=amzn1.sym.3f105dd1-731e-46ec-8a78-5849a8226882%3Aamzn1.sym.3f105dd1-731e-46ec-8a78-5849a8226882&cv_ct_cx=Cardio%2BTraining&dib=eyJ2IjoiMSJ9.6XAHnV0W4m0-g94S28HaStUs4fL-SQw8vpSbgxlAGKwzqVRJjPBEcFoHCq6gYWdkpmG6co7DMg-aC6EOv4RlxA.0oZiVZWuw1Qviz8DpRU89E0LRlDXWVd1BITFj16w0o0&dib_tag=se&keywords=Cardio%2BTraining&pd_rd_i=B0CPYH9917&pd_rd_r=2b335070-54c2-44bd-a08d-83847b894701&pd_rd_w=Paebo&pd_rd_wg=9QAqW&pf_rd_p=3f105dd1-731e-46ec-8a78-5849a8226882&pf_rd_r=ZSBJ6M5DQ5WESP12D2YC&qid=1705768894&s=exercise-and-fitness&sbo=RZvfv%2F%2FHxDF%2BO5021pAnSA%3D%3D&sr=1-1-364cf978-ce2a-480a-9bb0-bdb96faa0f61-spons&ts_id=3407741&sp_csd=d2lkZ2V0TmFtZT1zcF9zZWFyY2hfdGhlbWF0aWM&th=1',
                        'name'=>'GEONEO Exercise Bike/Magnetic Resistance Exercise Bike for Home, Stationary Indoor
                            Cycling Bike Cardio Gym with Ipad Holder and LCD Monitor,Silent Belt Drive & 35 LBS
                            Flywheel',
                    ],
                    [
                        'url'=>'https://www.amazon.com/Apple-AirPods-Pro-Generation-Renewed/dp/B0BJQWYLYN/ref=sr_1_1?dib=eyJ2IjoiMSJ9.W_cIICvYpE-CNmTAM9rYUfXgU4ucddZNyNHixxBfNaWsQqXcqQLxt37fJpbDEx5VSNBik98xbSLTMPDYVFAODKOc_vPiPDhJvRPlP5Az3cDtt7Gx0Ey65H7NkDukpRAQgeyuLRZzguqjQRYtKaWmRQ.2HsE58x-LXluOpKOwkxMK4e7aAh7pNTZKdgyy64Euz0&dib_tag=se&pf_rd_i=12653393011&pf_rd_m=ATVPDKIKX0DER&pf_rd_p=b1090729-e20c-4696-a97f-fc68a20b3e8c&pf_rd_r=SKAWMFAJQTFRYQFBVQKM&pf_rd_s=merchandised-search-9&pf_rd_t=101&qid=1705169248&s=electronics&sr=1-1&srs=12653393011&th=1',
                        'name'=>'Apple AirPods Pro (2nd Generation) (Renewed)',
                    ],
                    [
                        'url'=>'https://www.amazon.com/dp/B09V3JJT5D/ref=fs_a_ipt2_us2',
                        'name'=>'Apple iPad Air (5th Generation): with M1 chip, 10.9-inch Liquid Retina Display, 64GB, Wi-Fi
                            6, 12MP front/12MP Back Camera, Touch ID, All-Day Battery Life – Purple',
                    ],
                    [
                        'url'=>'https://www.amazon.com/Apple-Watch-Ultra-Cellular-Titanium/dp/B0BX4XG53Z/ref=sr_1_1?dib=eyJ2IjoiMSJ9.JCjaTycNf5_VaWCDMzrKmnDkImnaCrkKj9o3efD0BEsg4srWPKZgwzxwVAMw4_TbJ88ipTNOqr1BQgHTWULkFY3EqeeiEZ1cNxiyCYx9O6_tSUB8xWvGHK9ZgqCD6wzVLY4-LJYuXiBszyo5At8EBw.8jqUIhgBn3V_YzCUyK1dpnzGu2YDCPVwtXX92q15mRk&dib_tag=se&pf_rd_i=12653393011&pf_rd_m=ATVPDKIKX0DER&pf_rd_p=b1090729-e20c-4696-a97f-fc68a20b3e8c&pf_rd_r=SKAWMFAJQTFRYQFBVQKM&pf_rd_s=merchandised-search-9&pf_rd_t=101&qid=1705169127&s=electronics&sr=1-1&srs=12653393011&th=1',
                        'name'=>'Apple Watch Ultra [GPS + Cellular 49mm] Titanium Case with Midnight Ocean Band, One
                            Size (Renewed)',
                    ],
                    [
                        'url'=>'https://www.google.com/url?q=https://www.amazon.com/Espresso-Professional-Removable-Cappuccino-Macchiato/dp/B09X3WGJ3R/ref%3Dsr_1_5?c%3Dts%26dib%3DeyJ2IjoiMSJ9.pM5w368EVeqH6Umh9NbqtdIUTlxGBzTmcgxPOc2uEcIl7jZv8t6TTsZlJ0BAi3smkPt5ZZMfol-mRmQSioEC77fy2jgLSfnOWt6H1KGrI9PvFT-sXmiUzOKa-Py7gbfIcctUB9Ke_PQylyXSovs3td-2ZaVWkKEoEK6b6EV1qOLGeyjqnhLmu37IZwVqCFZmpM5SCr6J2JreFvhGj17U18tckAtIhTW_fKnTw3ThgU8R7RY3YUJD1_FA-qNrwfrJDy7HvTedRc0kKf2LG-3UUU71wc-Bx_s7uiXvvUp1VH0.hQTbdQaVWAIrWm1ZZ3T916f5aI0xDIEzXbla6WgsC8Q%26dib_tag%3Dse%26keywords%3DEspresso%2BMachines%26qid%3D1705694870%26s%3Dkitchen%26sr%3D1-5%26ts_id%3D289748%26ufe%3Dapp_do%253Aamzn1.fos.f5122f16-c3e8-4386-bf32-63e904010ad0&sa=D&source=apps-viewer-frontend&ust=1706052534244371&usg=AOvVaw161UX2CAzb6uZ3-ZcyNYdg&hl=es',
                        'name'=>'CASABREWS Espresso Machine 20 Bar, Professional Espresso Maker with Milk Frother
                            Steam Wand, Compact Coffee Machine with 34oz Removable Water Tank for Cappuccino,
                            Latte, Gift for Dad or Mom',
                    ],
                    [
                        'url'=>'https://store.nba.com/los-angeles-lakers/youth-los-angeles-lakers-lebron-james-nike-gold-swingman-jersey-icon-edition/t-36587468+p-912255884090472+z-9-3842163010?_ref=p-DLP:m-GRID:i-r0c0:po-0',
                        'name'=>"Youth Los Angeles Lakers LeBron James Nike Gold Swingman Jersey - Icon Edition",
                    ],
                ]

            @endphp

            {{-- Products Grid --}}
            <div class="my-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-5 gap-5 mx-auto w-fit">
                @foreach ($products as $key=>$product)
                    <div class="shadow-lg border rounded-lg p-1 w-fit max-w-2xs transition-all delay-75 cursor-pointer hover:-translate-y-5">
                        <a href="{{$product['url']}}" target="_blank">
                            <svg class="w-6 h-6 text-blue-700 ml-auto hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                <path d="M17 0h-5.768a1 1 0 1 0 0 2h3.354L8.4 8.182A1.003 1.003 0 1 0 9.818 9.6L16 3.414v3.354a1 1 0 0 0 2 0V1a1 1 0 0 0-1-1Z"/>
                                <path d="m14.258 7.985-3.025 3.025A3 3 0 1 1 6.99 6.768l3.026-3.026A3.01 3.01 0 0 1 8.411 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V9.589a3.011 3.011 0 0 1-1.742-1.604Z"/>
                            </svg>
                            <div class="w-48 h-48 mx-auto flex items-center">
                                <img class="mx-auto rounded-lg max-h-full max-w-full" src="{{ asset('images/store/products').'/'.($key+1).'/1.jpg' }}" alt="">
                            </div>
                            <h3 class="py-1 px-2 text-center text-xs text-blue-950 font-bold">{{$product['name']}}</h3>
                        </a>
                    </div>
                @endforeach
                {{-- @endfor --}}
            </div>

        </div>
    </section>
@endsection

@push('child-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
    <script>
        $('#store_all_include_quoter_btn').click(function(){
            let fields = [
                {'name':'link','validation':['blank']},
            ];


            let form = '#'+$(this).closest("form").attr('id');
            let input_email =  $(form + ' input[name=email]').val();
            input_email != undefined ?  fields.push(
                {'name':'email','validation':['@','blank']},
            ):false;
            let validator = Validation(form,fields);

            if(!validator.fail){
                LoadingAnimation(this,'loading');
                // $(form).submit();
                $(form).ajaxSubmit({
                    success: function(res, status, xhr, form) {
                        $('#store_all_include_quoter_div').hide()   ;
                        $('#store_all_include_response_div').fadeIn('slow');
                    }
                });
            }
        })
    </script>
@endpush