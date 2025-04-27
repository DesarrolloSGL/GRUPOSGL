@extends('layouts.clean')

@section('content')
    <section class="w-full h-auto min-h-screen p-1.5 bg-slate-100" x-data={step:1,section_visible:1,height:0,width:0,form_visible:1}>
        <h3 class="w-fit mx-auto px-5 rounded-lg my-5 text-center font-bold text-3xl">Supplier Form</h3>

        {{-- PROGRESS BAR --}}
        <section class="w-fit mx-auto rounded-lg my-5 flex p-1 space-x-20">
            <div class="flex items-center relative">
                <div class="h-10 flex items-center">
                    <div class="h-10 w-10 border-blue-700 border-2 text-center align-middle justify-center items-center flex rounded-full"
                    :class="step >= 1 ? 'bg-white':'bg-blue-400'"><h3>1</h3></div>
                </div>
                <div class="border-blue-700 absolute left-[38px] border-t-2 border-b-2 w-[42px] h-2"
                :class="step >= 1 ? 'bg-white':'bg-blue-400'"></div>
            </div>
            <div class="flex items-center relative">
                <div class="border-blue-700 absolute right-[38px] border-t-2 border-b-2 w-[42px] h-2"
                :class="step >= 2 ? 'bg-white':'bg-blue-400'"></div>
                <div class="h-10 flex items-center">
                    <div class="h-10 w-10 border-blue-700 border-2 text-center align-middle justify-center items-center flex rounded-full"
                    :class="step >= 2 ? 'bg-white':'bg-blue-400'"><h3>2</h3></div>
                </div>
                <div class="border-blue-700 absolute left-[38px] border-t-2 border-b-2 w-[42px] h-2"
                :class="step >= 2 ? 'bg-white':'bg-blue-400'"></div>
            </div>
            <div class="flex items-center relative">
                <div class="border-blue-700 absolute right-[38px] border-t-2 border-b-2 w-[42px] h-2"
                :class="step >= 3 ? 'bg-white':'bg-blue-400'"></div>
                <div class="h-10 flex items-center">
                    <div class="h-10 w-10 border-blue-700 border-2 text-center align-middle justify-center items-center flex rounded-full"
                    :class="step >= 3 ? 'bg-white':'bg-blue-400'"><h3>3</h3>
                    </div>
                </div>
            </div>
        </section>
        {{-- END PROGRESS BAR --}}

        <section class="my-5">
            <h3 class="font-bold mx-auto text-sm text-center">Please enter the information requested below, and attach the information required, for validation and uploading to our system.</h3>
        </section>


        {{-- FORM 1 --}}
        <section class="min-w-[300px] max-w-7xl h-fit mx-auto space-y-2.5"
        :class="step == 1 ? 'block':'hidden'">

            <section>
                <div class="bg-white w-full h-10 border border-b-0 flex">
                    <h3 class="my-auto mr-auto ml-5 w-fit font-bold">Section 1</h3>
                    <h3 class="my-auto ml-auto mr-5 w-fit font-bold text-sm text-lime-500">Completed 6/6</h3>
                    <svg class="w-6 h-6 text-gray-800 my-auto ml-auto mr-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                    :class="section_visible == 1? 'block':'hidden'"
                    x-on:click="section_visible = 0">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                    </svg>

                    <svg class="w-6 h-6 text-gray-800 my-auto ml-auto mr-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                    :class="section_visible == 1? 'hidden':'block'"
                    x-on:click="section_visible = 1">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                    </svg>
                </div>

                <section class="transition-all delay-100 ease-in-out overflow-hidden bg-white border"
                :class="section_visible == 1 ? 'h-fit lg:h-72':'h-0'">

                    <div class="lg:flex">

                        <div class="w-full">
                            <section class="p-5">
                                <h3 class="font-bold mb-5">Title 1 Form</h3>
                                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 my-5">
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">1. Rame</h3>
                                        <select class="w-60 h-8 rounded-none border-gray-500"><option value=""></option></select>
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">2. Indicate other finished product or service</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">3. Date of application</h3>
                                        <input type="date" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">4. Merchant Type</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                </div>
                            </section>
                        </div>

                        <div class="w-full border-t lg:border-t-0 lg:border-l">
                            <section class="p-5">
                                <h3 class="font-bold mb-5 h-4 hidden lg:block"></h3>
                                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 my-5">
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">5. Is there a relationship with any person or area of IDL Corporation?</h3>
                                        <select class="w-60 h-8 rounded-none border-gray-500"><option value=""></option></select>
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">6. Indicate who or which</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                </div>
                            </section>
                        </div>

                    </div>
                </section>
            </section>

            <section>
                <div class="bg-white w-full h-10 border border-b-0 flex">
                    <h3 class="my-auto mr-auto ml-5 w-fit font-bold">Section 2</h3>
                    <h3 class="my-auto ml-auto mr-5 w-fit font-bold text-sm text-red-500">Incomplete 4/8</h3>
                    <svg class="w-6 h-6 text-gray-800 my-auto ml-auto mr-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                    :class="section_visible == 2? 'block':'hidden'"
                    x-on:click="section_visible = 0">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                    </svg>

                    <svg class="w-6 h-6 text-gray-800 my-auto ml-auto mr-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                    :class="section_visible == 2? 'hidden':'block'"
                    x-on:click="section_visible = 2">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                    </svg>
                </div>

                <section x-cloak class="transition-all delay-100 ease-in-out overflow-hidden bg-white border"
                :class="section_visible == 2 ? 'h-fit lg:h-72':'h-0'">

                    <div class="lg:flex">

                        <div class="w-full">
                            <section class="p-5">
                                <h3 class="font-bold mb-5">Title 2 Form</h3>
                                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 my-5">
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">7. NIT</h3>
                                        <select class="w-60 h-8 rounded-none border-gray-500"><option value=""></option></select>
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">8. Social Reason</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">9. Commercial Name</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">10. Address</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                </div>
                            </section>
                        </div>

                        <div class="w-full border-t lg:border-t-0 lg:border-l">
                            <section class="p-5">
                                <h3 class="font-bold mb-5 h-4 hidden lg:block"></h3>
                                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 my-5">
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">11. Website</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">12. Country</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">13. Región</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">14. Language</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                </div>
                            </section>
                        </div>

                    </div>
                </section>
            </section>

            <section>
                <div class="bg-white w-full h-10 border border-b-0 flex">
                    <h3 class="my-auto mr-auto ml-5 w-fit font-bold">Section 3</h3>
                    <h3 class="my-auto ml-auto mr-5 w-fit font-bold text-sm text-red-500">Incomplete 0/6</h3>
                    <svg class="w-6 h-6 text-gray-800 my-auto ml-auto mr-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                    :class="section_visible == 3? 'block':'hidden'"
                    x-on:click="section_visible = 0">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                    </svg>

                    <svg class="w-6 h-6 text-gray-800 my-auto ml-auto mr-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                    :class="section_visible == 3? 'hidden':'block'"
                    x-on:click="section_visible = 3">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                    </svg>
                </div>

                <section x-cloak class="transition-all delay-100 ease-in-out overflow-hidden bg-white border"
                :class="section_visible == 3 ? 'h-fit lg:h-72':'h-0'">

                    <div class="lg:flex">

                        <div class="w-full">
                            <section class="p-5">
                                <h3 class="font-bold mb-5">Title 3 Form</h3>
                                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 my-5">
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">15. Contact Name</h3>
                                        <select class="w-60 h-8 rounded-none border-gray-500"><option value=""></option></select>
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">16. Contact Email</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">17. Phone 1</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">18. Phone 2</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                </div>
                            </section>
                        </div>

                        <div class="w-full border-t lg:border-t-0 lg:border-l">
                            <section class="p-5">
                                <h3 class="font-bold mb-5 h-4 hidden lg:block"></h3>
                                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 my-5">
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">19. Contact Phone</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">20. Contact Position</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                </div>
                            </section>
                        </div>

                    </div>
                </section>
            </section>

            <section>
                <div class="bg-white w-full h-10 border border-b-0 flex">
                    <h3 class="my-auto mr-auto ml-5 w-fit font-bold">Section 4</h3>
                    <h3 class="my-auto ml-auto mr-5 w-fit font-bold text-sm text-red-500">Incomplete 0/8</h3>
                    <svg class="w-6 h-6 text-gray-800 my-auto ml-auto mr-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                    :class="section_visible == 4? 'block':'hidden'"
                    x-on:click="section_visible = 0">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                    </svg>

                    <svg class="w-6 h-6 text-gray-800 my-auto ml-auto mr-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                    :class="section_visible == 4? 'hidden':'block'"
                    x-on:click="section_visible = 4">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                    </svg>
                </div>

                <section x-cloak class="transition-all delay-100 ease-in-out overflow-hidden bg-white border"
                :class="section_visible == 4 ? 'h-fit lg:h-72':'h-0'">

                    <div class="lg:flex">

                        <div class="w-full">
                            <section class="p-5">
                                <h3 class="font-bold mb-5">Title 4 Form</h3>
                                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 my-5">
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">21. Payment Instructions</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">22. Account No.</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">23. Bank Name</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">24. Account Type</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                </div>
                            </section>
                        </div>

                        <div class="w-full border-t lg:border-t-0 lg:border-l">
                            <section class="p-5">
                                <h3 class="font-bold mb-5 h-4 hidden lg:block"></h3>
                                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 my-5">
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">25. Tax Regime</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">26. Payment Methods</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">27. Type of Currency</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">28. Are you a VAT withholding agent?</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                </div>
                            </section>
                        </div>

                    </div>
                </section>
            </section>

            <section>
                <div class="bg-white w-full h-10 border border-b-0 flex">
                    <h3 class="my-auto mr-auto ml-5 w-fit font-bold">Section 5</h3>
                    <h3 class="my-auto ml-auto mr-5 w-fit font-bold text-sm text-red-500">Incomplete 0/13</h3>
                    <svg class="w-6 h-6 text-gray-800 my-auto ml-auto mr-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                    :class="section_visible == 5? 'block':'hidden'"
                    x-on:click="section_visible = 0">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                    </svg>

                    <svg class="w-6 h-6 text-gray-800 my-auto ml-auto mr-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                    :class="section_visible == 5? 'hidden':'block'"
                    x-on:click="section_visible = 5">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                    </svg>
                </div>

                <section x-cloak class="transition-all delay-100 ease-in-out overflow-hidden bg-white border"
                :class="section_visible == 5 ? 'h-fit lg:h-[450px]':'h-0'">

                    <div class="lg:flex">

                        <div class="w-full">
                            <section class="p-5">
                                <h3 class="font-bold mb-5">Foreign Bank</h3>
                                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 my-5">
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">29. Beneficiary</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">30. Beneficiary Address</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">31. Bank Name</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">32. Bank Address</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">33. Account</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">34. BIC/SWIFT Code</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">35. IBAN</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                </div>
                            </section>
                        </div>

                        <div class="w-full border-t lg:border-t-0 lg:border-l">
                            <section class="p-5">
                                <h3 class="font-bold mb-5 h-4 hidden lg:block"></h3>
                                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 my-5">
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">36. ABA</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">37. Uses Intermediary Bank</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">38. Intermediary Bank</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">39. Intermediary Bank Address</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">40. BIC/SWIFT Code Intermediary Bank</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                    <div class="">
                                        <h3 class="text-gray-600 text-sm h-11">41. Discounts or benefits</h3>
                                        <input type="text" class="w-60 h-8 rounded-none border-gray-500">
                                    </div>
                                </div>
                            </section>
                        </div>

                    </div>
                </section>
            </section>

            <section class="flex">
                <button class="ml-auto block rounded-full border-blue-700 bg-blue-700 border-2 px-4 py-1 text-white hover:bg-blue-500"
                x-on:click="step=2">Next</button>
            </section>

        </section>
        {{-- END FORM 1--}}

        {{-- FORM 2 --}}
        <section x-cloak class="min-w-[300px] max-w-7xl h-fit mx-auto space-y-2.5"
        :class="step == 2 ? 'block':'hidden'">

            <section>
                <div class="bg-white w-full h-10 border border-b-0 flex">
                    <h3 class="my-auto mr-auto ml-5 w-fit font-bold">Section 6</h3>
                </div>

                <section class="transition-all delay-100 ease-in-out overflow-hidden bg-white border">

                    <div class="lg:flex">

                        <div class="w-full">
                            <section class="p-5">
                                <h3 class="font-bold mb-5">Information to be attached</h3>
                                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 my-5">
                                    <div class="">
                                        <input type="checkbox">
                                        <label class="text-gray-600 text-sm h-11">Presentation of services</label>
                                        {{-- <div class="flex">
                                            <button class="mr-auto block  border-blue-700 bg-white border-2 px-4 py-1 text-blue-700 hover:bg-blue-200">Upload File</button>
                                            <button class="mr-auto block  border-blue-700 bg-white border-2 px-4 py-1 text-blue-700 hover:bg-blue-200">Clean</button>
                                        </div>
                                        <label class="text-gray-600 text-sm h-11">File_Name.pdf</label> --}}
                                    </div>
                                    <div class="">
                                        <input type="checkbox">
                                        <label class="text-gray-600 text-sm h-11">Identification document of the legal representative</label>
                                    </div>
                                    <div class="">
                                        <input type="checkbox">
                                        <label class="text-gray-600 text-sm h-11">Legal documentation</label>
                                    </div>
                                    <div class="">
                                        <input type="checkbox">
                                        <label class="text-gray-600 text-sm h-11">Tax documentation</label>
                                    </div>
                                </div>
                            </section>
                        </div>

                        <div class="w-full border-t lg:border-t-0 lg:border-l">
                            <section class="p-5">
                                <h3 class="font-bold mb-5 h-4 hidden lg:block"></h3>
                                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 my-5">
                                    <div class="">
                                        <input type="checkbox">
                                        <label class="text-gray-600 text-sm h-11">Photocopy of blank invoice with cancelled seal</label>
                                    </div>
                                    <div class="">
                                        <input type="checkbox">
                                        <label class="text-gray-600 text-sm h-11">Certification of guilds</label>
                                    </div>
                                    <div class="">
                                        <input type="checkbox">
                                        <label class="text-gray-600 text-sm h-11">NVOCC</label>
                                    </div>
                                    <div class="">
                                        <input type="checkbox">
                                        <label class="text-gray-600 text-sm h-11">Contract Agreement</label>
                                    </div>
                                </div>
                            </section>
                        </div>

                    </div>
                </section>
            </section>

            <section class="flex">
                <button class="mr-auto block rounded-full border-blue-700 bg-white border-2 px-4 py-1 text-blue-700 hover:bg-blue-200"
                x-on:click="step=1">Back</button>
                <button class="ml-auto block rounded-full border-blue-700 bg-blue-700 border-2 px-4 py-1 text-white hover:bg-blue-500"
                x-on:click="step=3">Next</button>
            </section>

        </section>
        {{-- END FORM 2--}}

        {{-- FORM 3 --}}
        <section x-cloak class="min-w-[300px] max-w-7xl h-fit mx-auto space-y-2.5"
        :class="step == 3 ? 'block':'hidden'">

            <section>
                <div class="bg-white w-full h-10 border border-b-0 flex">
                    <h3 class="my-auto mr-auto ml-5 w-fit font-bold">Section 7</h3>

                </div>

                <section class="transition-all delay-100 ease-in-out overflow-hidden bg-white border">

                    <div class="lg:flex">

                        <div class="w-full">
                            <section class="p-5">
                                <h3 class="text-red-500 text-sm my-5 font-bold">I DECLARE: That all data entered in this form are truthful, reliable and demonstrable; likewise we accept the process of validation and investigation in the commercial, trade and credit bureaus without any objection.</h3>
                                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 my-1">
                                    <div>
                                        <label class="text-black text-sm font-bold h-11">Name and signature of legal representative</label>
                                        <div class="flex mr-auto w-fit space-x-2">
                                            <button class="border-blue-700 bg-white border-2 px-4 py-1 text-blue-700 hover:bg-blue-200">Upload File</button>
                                            <button class="border-blue-700 bg-white border-2 px-4 py-1 text-blue-700 hover:bg-blue-200">Clean</button>
                                        </div>
                                        <label class="text-gray-600 text-sm h-11">File_Name.pdf</label>

                                    </div>
                                    <div>
                                        <label class="text-black text-sm font-bold h-11">Stamp</label>
                                        <div class="flex mr-auto w-fit space-x-2">
                                            <button class="border-blue-700 bg-white border-2 px-4 py-1 text-blue-700 hover:bg-blue-200">Upload File</button>
                                            <button class="border-blue-700 bg-white border-2 px-4 py-1 text-blue-700 hover:bg-blue-200">Clean</button>
                                        </div>
                                        <label class="text-gray-600 text-sm h-11">File_Name.pdf</label>

                                    </div>

                                </div>
                            </section>
                        </div>
                    </div>
                </section>
            </section>

            <section class="flex">
                <button class="mr-auto block rounded-full border-blue-700 bg-white border-2 px-4 py-1 text-blue-700 hover:bg-blue-200"
                x-on:click="step=2">Back</button>
                <button class="ml-auto block rounded-full border-blue-700 bg-blue-700 border-2 px-4 py-1 text-white hover:bg-blue-500"
                >Send Form</button>
            </section>

        </section>
        {{-- END FORM 3 --}}

    </section>


@endsection