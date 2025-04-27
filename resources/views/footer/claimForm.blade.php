
@extends('layouts.app')

@section('content')
    @if(!Session::has('form_success'))
        <section class="m-10 p-5 mx-auto w-11/12 bg-white rounded-xl shadow-lg md:w-6/12">
            <h3 class="text-4xl text-center mt-10 font-bold">Califica Nuestro Servicio</h3>
            <form id="claim_form_form" action="/claim-form" method="POST" autocomplete="off" enctype="multipart/form-data" >
                @csrf

                <h3 class="text-xl text-center mt-10 font-bold">Datos Generales</h3>
                <div class="w-full mx-auto py-10 border-b-2 rounded-lg justify-evenly space-x-1 md:flex lg:p-10">
                    <div class="">
                        <h3 class="text-sm">*Tipo de Reclamo:</h3>
                        <select name="claim_type" class="w-full rounded-lg p-2.5 text-sm">
                            <option value="0">Seleccione Una Opción</option>
                            <option value="1">Servicio al cliente</option>
                            <option value="2">Facturación</option>
                            <option value="3">Operaciones</option>
                            <option value="4">Asesor comercial</option>
                            <option value="5">Administrativo</option>
                            <option value="6">Mensajero</option>
                            <option value="7">Tramitador de puerto</option>
                            <option value="8">Piloto de camión</option>
                            <option value="9">General</option>
                        </select>
                    </div>

                    <div class="">
                        <h3 class="text-sm">*País:</h3>
                        <select name="country" class="w-full rounded-lg p-2.5 text-sm">
                            <option value="0">Seleccione Una Opción</option>
                            <option value="1">Guatemala</option>
                            <option value="2">El Salvador</option>
                            <option value="3">Honduras</option>
                            <option value="4">Costa Rica</option>
                            <option value="5">Panamá</option>
                            <option value="6">Nicaragua</option>
                            <option value="7">Belice</option>
                            <option value="8">R. Dominicana</option>
                            <option value="9">USA</option>
                            <option value="10">Chile</option>
                            <option value="11">Brasil</option>
                            <option value="12">Colombia</option>
                            <option value="13">Jamaica</option>
                        </select>
                    </div>
                </div>

                {{-- <h3 class="text-xl text-center mt-10 font-bold">Datos Personales</h3> --}}
                <div class="w-full mx-auto py-10 border-b-2 rounded-lg justify-evenly space-x-1 md:flex lg:p-10">
                    <div class="space-y-5">
                        <div>
                            <h3 class="text-sm">*Escriba el nombre y apellido del asesor que lo atendió</h3>
                            <input name="name" class="w-full rounded-lg" type="text">
                        </div>


                        <h3 class="text-sm">*Seleccione el tipo de servicio que ha adquirido:</h3>
                        <select name="service_type" class="w-full rounded-lg p-2.5 text-sm">
                            <option value="0">Seleccione Una Opción</option>
                            <option value="1">LCL</option>
                            <option value="2">FCL</option>
                            <option value="3">Terrestre</option>
                            <option value="4">Aduana</option>
                            <option value="5">Aéreo</option>
                            <option value="6">Courier</option>
                            <option value="7">Paquetería nacional</option>
                            <option value="8">Tramites aduanales</option>
                        </select>
                    </div>
                </div>

                <div class="border-b text-3xl mx-auto w-fit text-center p-5 md:p-10">
                    <h3 class="text-sm">Considera que su asesor cuenta con conocimientos básicos o profesionales:</h3>
                    <h3 class="text-sm"> Siendo la calificación mas baja 1 y la mas alta 5</h3>
                    <div class="flex mx-auto w-fit my-5">
                        <div>
                            <label for="claimFormConsultantRating_1">
                                <svg class="star w-10 h-10 text-yellow-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            </label>
                            <input id="claimFormConsultantRating_1" name="consultant_1" type="checkbox" hidden checked>
                        </div>
                        <div>
                            <label for="claimFormConsultantRating_2">
                                <svg class="star w-10 h-10 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            </label>
                            <input id="claimFormConsultantRating_2" name="consultant_2" type="checkbox" hidden>
                        </div>
                        <div>
                            <label for="claimFormConsultantRating_3">
                                <svg class="star w-10 h-10 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            </label>
                            <input id="claimFormConsultantRating_3" name="consultant_3" type="checkbox" hidden>
                        </div>
                        <div>
                            <label for="claimFormConsultantRating_4">
                                <svg class="star w-10 h-10 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            </label>
                            <input id="claimFormConsultantRating_4" name="consultant_4" type="checkbox" hidden>
                        </div>
                        <div>
                            <label for="claimFormConsultantRating_5">
                                <svg class="star w-10 h-10 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            </label>
                            <input id="claimFormConsultantRating_5" name="consultant_5" type="checkbox" hidden>
                        </div>
                    </div>
                </div>

                <div class="border-b text-3xl mx-auto w-fit text-center p-5 md:p-10">
                    <h3 class="text-sm">Los precios han sido los esperados:</h3>
                    <h3 class="text-sm"> Siendo la calificación mas baja 1 y la mas alta 5</h3>
                    <div class="flex mx-auto w-fit my-5">
                        <div>
                            <label for="claimFormPriceRating_1">
                                <svg class="star w-10 h-10 text-yellow-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            </label>
                            <input id="claimFormPriceRating_1" name="price_1" type="checkbox" hidden checked>
                        </div>
                        <div>
                            <label for="claimFormPriceRating_2">
                                <svg class="star w-10 h-10 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            </label>
                            <input id="claimFormPriceRating_2" name="price_2" type="checkbox" hidden>
                        </div>
                        <div>
                            <label for="claimFormPriceRating_3">
                                <svg class="star w-10 h-10 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            </label>
                            <input id="claimFormPriceRating_3" name="price_3" type="checkbox" hidden>
                        </div>
                        <div>
                            <label for="claimFormPriceRating_4">
                                <svg class="star w-10 h-10 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            </label>
                            <input id="claimFormPriceRating_4" name="price_4" type="checkbox" hidden>
                        </div>
                        <div>
                            <label for="claimFormPriceRating_5">
                                <svg class="star w-10 h-10 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            </label>
                            <input id="claimFormPriceRating_5" name="price_5" type="checkbox" hidden>
                        </div>
                    </div>
                </div>

                <div class="border-b text-3xl mx-auto w-fit text-center p-5 md:p-10">
                    <h3 class="text-sm">El seguimiento ha sido de su satisfacción:</h3>
                    <h3 class="text-sm"> Siendo la calificación mas baja 1 y la mas alta 5</h3>
                    <div class="flex mx-auto w-fit my-5">
                        <div>
                            <label for="claimFormFollowUpRating_1">
                                <svg class="star w-10 h-10 text-yellow-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            </label>
                            <input id="claimFormFollowUpRating_1" name="followUp_1" type="checkbox" hidden checked>
                        </div>
                        <div>
                            <label for="claimFormFollowUpRating_2">
                                <svg class="star w-10 h-10 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            </label>
                            <input id="claimFormFollowUpRating_2" name="followUp_2" type="checkbox" hidden>
                        </div>
                        <div>
                            <label for="claimFormFollowUpRating_3">
                                <svg class="star w-10 h-10 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            </label>
                            <input id="claimFormFollowUpRating_3" name="followUp_3" type="checkbox" hidden>
                        </div>
                        <div>
                            <label for="claimFormFollowUpRating_4">
                                <svg class="star w-10 h-10 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            </label>
                            <input id="claimFormFollowUpRating_4" name="followUp_4" type="checkbox" hidden>
                        </div>
                        <div>
                            <label for="claimFormFollowUpRating_5">
                                <svg class="star w-10 h-10 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            </label>
                            <input id="claimFormFollowUpRating_5" name="followUp_5" type="checkbox" hidden>
                        </div>
                    </div>
                </div>

                <div class="border-b text-3xl mx-auto w-fit text-center p-5 md:p-10">
                    <h3 class="text-sm">Las herramientas de comunicación y trazabilidad le han ayudado a tener control de su carga:</h3>
                    <h3 class="text-sm"> Siendo la calificación mas baja 1 y la mas alta 5</h3>
                    <div class="flex mx-auto w-fit my-5">
                        <div>
                            <label for="claimFormToolsRating_1">
                                <svg class="star w-10 h-10 text-yellow-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            </label>
                            <input id="claimFormToolsRating_1" name="tools_1" type="checkbox" hidden checked>
                        </div>
                        <div>
                            <label for="claimFormToolsRating_2">
                                <svg class="star w-10 h-10 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            </label>
                            <input id="claimFormToolsRating_2" name="tools_2" type="checkbox" hidden>
                        </div>
                        <div>
                            <label for="claimFormToolsRating_3">
                                <svg class="star w-10 h-10 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            </label>
                            <input id="claimFormToolsRating_3" name="tools_3" type="checkbox" hidden>
                        </div>
                        <div>
                            <label for="claimFormToolsRating_4">
                                <svg class="star w-10 h-10 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            </label>
                            <input id="claimFormToolsRating_4" name="tools_4" type="checkbox" hidden>
                        </div>
                        <div>
                            <label for="claimFormToolsRating_5">
                                <svg class="star w-10 h-10 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            </label>
                            <input id="claimFormToolsRating_5" name="tools_5" type="checkbox" hidden>
                        </div>
                    </div>
                </div>

                <div class="w-full mx-auto px-5 py-10 border-b-2 rounded-lg flex justify-evenly text-sm">
                    <div class="">
                        <h3 class="text-sm">Buzón de sugerencias</h3>
                        <textarea class="w-full" name="claim_description" cols="100"
                            rows="5" maxlength="2500">
                        </textarea>
                    </div>
                </div>

                <div class="w-full mx-auto py-10 border-b-2 rounded-lg justify-evenly space-x-1 md:flex lg:p-10">
                    <div class="space-y-5">
                        <div>
                            <h3 class="text-sm">*Email</h3>
                            <input name="client_email" class="w-full rounded-lg" type="text">
                        </div>
                    </div>
                </div>
                <x-honeypot />
                <div class="py-10 ml-auto w-fit">
                    <button id="claim_form_submit_btn" type="button" class="bg-[rgb(0,100,255)] text-white  ml-auto block px-3 py-2 rounded-xl text-lg">Enviar</button>
                    <h3 class="text-xs text-red-500 p-1"></h3>
                </div>
            </form>
        </section>
    @else
        <section class="my-10 p-10 mx-auto w-11/12 sm:w-7/12 md:w-6/12 lg:w-4/12  text-center">
            <img class="mx-auto max-w-[40px]" src="{{asset('images/main/logo.png')}}" alt="">
            <h3 class="font-bold text-xl">Tu formulario ha sido enviado exitosamente.</h3>
            <br><br>
            <div class="md:px-10">
                <h3>El equipo de Grupo SGL se pondrá en contacto contigo por medio de correo electrónico.</h3>
                <br>
                <h3 class="bg-[rgb(0,200,255)] text-sm text-white px-3 py-2 rounded-lg">La satisfacción de nuestros clientes es lo más importante.</h3>
            </div>
        </section>
    @endif
@endsection
@push('child-scripts')
<script>
    $('#claim_form_submit_btn').click(function(){
        let fields = [
            {'name':'claim_type','validation':['isSelect']},
            {'name':'country','validation':['isSelect']},
            {'name':'name','validation':['blank']},
            {'name':'client_email','validation':['blank']},
            {'name':'service_type','validation':['isSelect']},
        ]

        let form = '#'+$(this).closest("form").attr('id');
        let validator = Validation(form,fields);

        $('#claim_form_submit_btn').next().html('');
        if(!validator.fail){
            $(form).submit();
        }else{
            $('#claim_form_submit_btn').next().html('Revisa los campos en rojo');
        }
    });


</script>
@endpush

{{-- https://docs.google.com/forms/d/e/1FAIpQLSdSXrPruJtuOLO_eVa0yt3qqGey07FLy74GRaYEb8I-mg0nUQ/viewform?usp=pp_url --}}