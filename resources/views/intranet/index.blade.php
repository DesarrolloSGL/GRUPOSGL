@extends('layouts.clean')
@section('content')
<section class="p-5 rounded-lg overflow-auto min-h-screen w-full bg-sky-200">
    @php
        $rows = 17;
        $cols = 51;
        // print_r($organization->where('coordinate', '3-26')->count());
    @endphp
    <table class='w-full'>
        {{-- {{$organization[0]->coordinate}} --}}
        @for ($a = 0; $a < $rows; $a++)
            <tr>
                @for ($b = 0; $b < $cols; $b++)
                    <td id="{{ $a + 1 }}-{{ $b + 1 }}" class='rounded-lg border border-gray-100'>
                        @if($organization->where('coordinate', $a.'-'.$b)->count() > 0)
                                @php
                                    $colab = $organization->where('coordinate', $a.'-'.$b)->first();
                                @endphp
                            <div class="modal bg-{{ $colab->color_1 }} text-{{ $colab->color_2 }} rounded-lg px-1 py-3 text-2xs cursor-pointer
                                    transition-all delay-75 w-20 h-20 text-center hover:bg-blue-300 hover:text-gray-500"
                                    data-id="{{ $colab->idorganization_table }}" data-modal-target="FilesModal"
                                    data-modal-toggle="FilesModal">
                                    {{ $colab->idorganization_table.'.'.$colab->position }}
                            </div>
                        @else
                            <div class="text-black rounded-lg px-1 py-3 text-2xs cursor-pointer
                                    transition-all delay-75 w-5 h-10 text-center">
                                    {{-- {{$a.'-'.$b}} --}}
                            </div>
                        @endif
                    </td>
                @endfor
            </tr>
        @endfor
    </table>

    <div id="FilesModal" tabindex="-1" aria-hidden="true"
        class="fixed  top-0 left-0 right-0 z-50 w-full px-4 py-2 overflow-x-hidden md:inset-0 h-[calc(100%-1rem)] backdrop-blur-sm hidden">
        <div class="relative w-full max-w-2xl mx-auto mt-[5%]">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg h-[50vh] overflow-y-auto">
                <!-- Modal header -->
                <div class="flex items-start justify-between px-4 py-2 rounded-t">
                    <div class="max-w-[90%]">
                        @role('super-admin')
                            <form action="/main-intranet-upload-file" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="flex items-center space-x-1">
                                    {{-- Upload Icon --}}
                                    <label for="main_intranet_upload_file_modal">
                                        <svg id="main_intranet_upload_svg_input"
                                            class="w-10 h-10 text-red-500 rounded-lg bg-red-100 p-1 transition-all delay-75 cursor-pointer hover:text-red-700 hover:bg-red-200"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M12 3c.3 0 .6.1.8.4l4 5a1 1 0 1 1-1.6 1.2L13 7v7a1 1 0 1 1-2 0V6.9L8.8 9.6a1 1 0 1 1-1.6-1.2l4-5c.2-.3.5-.4.8-.4ZM9 14v-1H5a2 2 0 0 0-2 2v4c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-4v1a3 3 0 1 1-6 0Zm8 2a1 1 0 1 0 0 2 1 1 0 1 0 0-2Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </label>
                                    <input name="file" id="main_intranet_upload_file_modal" type="file"
                                        accept=".pdf,.doc,.docx,.png,.jpeg,.jpg" hidden>

                                    {{-- File type --}}
                                    <select name="file_type" class="h-10 text-sm text-center border-gray-300 rounded-lg">
                                        <option value="0">Tipo de Archivo</option>
                                        <option value="1">Proceso ISO9001-2015</option>
                                        <option value="2">Anexos ISO9001-2015</option>
                                        <option value="3">Manuales ISO9001-2015</option>
                                        <option value="4">Flujograma de actividades</option>
                                    </select>

                                    {{-- File Name --}}
                                    <input name="name" type="text" class="rounded-lg border-gray-300 h-10">

                                    <input name="organization_id" id="main_intranet_organization_item_modal" type="text"
                                        hidden>
                                    {{-- Send File Icon --}}
                                    <button id="main_intranet_upload_file_button" type="button">
                                        <svg id="main_intranet_sumbit_svg_btn"
                                            class="w-10 h-10 text-blue-500 rounded-lg bg-blue-100 p-1 transition-all delay-75 cursor-pointer hover:text-blue-700 hover:bg-blue-200"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        @endrole
                    </div>
                    <button id="closeFilesModal" type="button"
                        class="text-black bg-sky-200 hover:bg-sky-400 hover:text-sky-900 rounded-lg text-sm w-10 h-10 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="FilesModal">
                        <svg class="w-3 h-3 text-sky-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form id="formGetFiles" class="p-5" action="/main-intranet-show-files" method="GET">
                    {{-- File type --}}
                    <select id="file_type" name="file_type" class="h-10 text-sm text-center border-gray-300 rounded-lg">
                        <option value="1">Proceso ISO9001-2015</option>
                        <option value="2">Anexos ISO9001-2015</option>
                        <option value="3">Manuales ISO9001-2015</option>
                        <option value="4">Flujograma de actividades</option>
                    </select>
                </form>
                <hr class="border-gray-300 w-11/12 mx-auto">
                <!-- Modal body -->
                <div id="modalBody" class="p-5 space-y-2">
                    <hr class="border border-gray-100 mt-1">
                </div>
            </div>
        </div>
    </div>


    <section>
        <div class="bg-gray-500 text-gray-100"></div>
        <div class="bg-gray-100 text-gray-500"></div>
        <div class="bg-green-500 text-green-100"></div>
        <div class="bg-green-100 text-green-500"></div>
        <div class="bg-red-500 text-red-100"></div>
        <div class="bg-red-100 text-red-500"></div>
        <div class="bg-blue-500 text-blue-100"></div>
        <div class="bg-blue-100 text-blue-500"></div>
        <div class="bg-purple-500 text-purple-100"></div>
        <div class="bg-purple-100 text-purple-500"></div>
        <div class="bg-yellow-500 text-yellow-100"></div>
        <div class="bg-yellow-100 text-yellow-500"></div>
    </section>
</section>
@endsection

@push('child-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
    <script>
        //Variables
        const types = [];
        const user_role = {{ Js::from($user_role) }};

        //Eventos
        $(document).on("click", ".modal", function() {
            // $('#FilesModal').removeClass('hidden');
            $('#main_intranet_organization_item_modal').val($(this).data('id'));
            restartColor();
            getFiles($(this).data('id'));
        });

        $(document).on("click", ".showFile", function() {
            $('#fileAction' + $(this).parent().attr('id')).attr('method', 'GET');
            $('#fileAction' + $(this).parent().attr('id')).attr('action', '/main-intranet-show-file');
            $('#fileAction' + $(this).parent().attr('id')).ajaxSubmit({
                success: function(res, status, xhr, form) {
                    var a = document.createElement('a');
                    a.href = res;
                    a.target = '_blank';
                    document.body.appendChild(a);
                    a.click();
                    asyncCall();
                }
            });
        });

        $(document).on("click", ".deleteFile", function() {
            $('#fileAction' + $(this).parent().attr('id')).attr('method', 'POST');
            $('#fileAction' + $(this).parent().attr('id')).attr('action', '/main-intranet-delete-file');
            // $('#fileAction' + $(this).parent().attr('id')).submit();
            $('#fileAction' + $(this).parent().attr('id')).ajaxSubmit({
                success: function(res, status, xhr, form) {
                    restartColor();
                    getFiles(0);
                }
            });
        });

        $(document).on("change", "#file_type", function() {
            getFiles(0);
        });

        function restartColor(){
            $('#main_intranet_upload_svg_input').removeClass('text-green-500');
            $('#main_intranet_upload_svg_input').removeClass('bg-green-100');
            $('#main_intranet_sumbit_svg_btn').removeClass('text-green-500');
            $('#main_intranet_sumbit_svg_btn').removeClass('bg-green-100');

            $('#main_intranet_upload_svg_input').addClass('text-red-500');
            $('#main_intranet_upload_svg_input').addClass('bg-red-100');
            $('#main_intranet_upload_svg_input').addClass('hover:text-red-700');
            $('#main_intranet_upload_svg_input').addClass('hover:bg-red-200');


            $('#main_intranet_sumbit_svg_btn').addClass('text-blue-500');
            $('#main_intranet_sumbit_svg_btn').addClass('bg-blue-100');
            $('#main_intranet_sumbit_svg_btn').addClass('hover:text-blue-700');
            $('#main_intranet_sumbit_svg_btn').addClass('hover:bg-blue-200');

        }

        $('#main_intranet_upload_file_modal').change(function() {
            $('#main_intranet_upload_svg_input').removeClass('text-red-500');
            $('#main_intranet_upload_svg_input').removeClass('bg-red-100');
            $('#main_intranet_upload_svg_input').removeClass('hover:text-red-700');
            $('#main_intranet_upload_svg_input').removeClass('hover:bg-red-200');
            $('#main_intranet_upload_svg_input').addClass('text-green-500');
            $('#main_intranet_upload_svg_input').addClass('bg-green-100');
        });

        $('#main_intranet_upload_file_button').click(function() {
            let form = $(this).closest("form");
            let id = $('#main_intranet_organization_item_modal').val();
            form.ajaxSubmit({
                success: function(res, status, xhr, form) {
                    $('#main_intranet_sumbit_svg_btn').removeClass('text-blue-500');
                    $('#main_intranet_sumbit_svg_btn').removeClass('bg-blue-100');
                    $('#main_intranet_sumbit_svg_btn').removeClass('hover:text-blue-700');
                    $('#main_intranet_sumbit_svg_btn').removeClass('hover:bg-blue-200');
                    $('#main_intranet_sumbit_svg_btn').addClass('text-green-500');
                    $('#main_intranet_sumbit_svg_btn').addClass('bg-green-100');
                    getFiles(id);
                },
                error: function(res, status, xhr, form) {

                }
            });
        });

        //Funciones
        function getFiles(id) {
            $('#modalBody').empty();

            let html =
            '<div class="loading">'+
                '<svg aria-hidden="true" class="w-14 h-14 mx-auto text-gray-200 animate-spin fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">'+
                    '<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>'+
                    '<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>'+
                '</svg>'+
            '</div>';

            $('#modalBody').html(html);
            if (id != 0) {
                $('#formGetFiles').append('<input type="hidden" name="id_organization" value="' + id + '">');
            }
            $('#formGetFiles').ajaxSubmit({
                success: function(res, status, xhr, form) {
                    $('.loading').remove();

                    res.forEach(element => {
                        $('#modalBody').append(getFilesHtml(element.name,element.idintranet_files));
                    });

                    restartColor();
                },
                error: function(res, status, xhr, form) {
                }
            });
        }

        function getFilesHtml(_name, _file_id){
            let html =
            `<div class="flex items-center">
                <h3 class="overflow-x-auto whitespace-nowrap max-w-[70%]">
                    ${_name}
                </h3>
                <form id="fileAction${_file_id}">
                    @csrf
                    <input type="hidden" name="id_file" value="${_file_id}">
                </form>
                <div id="${_file_id}" class="ml-auto flex space-x-3">
                    <svg class="showFile w-10 h-10 text-sky-500 rounded-lg bg-sky-100 p-1 transition-all delay-75 cursor-pointer hover:text-sky-700 hover:bg-sky-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M5 7.8C6.7 6.3 9.2 5 12 5s5.3 1.3 7 2.8a12.7 12.7 0 0 1 2.7 3.2c.2.2.3.6.3 1s-.1.8-.3 1a2 2 0 0 1-.6 1 12.7 12.7 0 0 1-9.1 5c-2.8 0-5.3-1.3-7-2.8A12.7 12.7 0 0 1 2.3 13c-.2-.2-.3-.6-.3-1s.1-.8.3-1c.1-.4.3-.7.6-1 .5-.7 1.2-1.5 2.1-2.2Zm7 7.2a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd"/>
                    </svg>`;

                    if(user_role == 'SuperAdmin'){
                        html +=
                            `<svg class="deleteFile w-10 h-10 text-red-500 rounded-lg bg-red-100 p-1 transition-all delay-75 cursor-pointer hover:text-red-700 hover:bg-red-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M8.6 2.6A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4c0-.5.2-1 .6-1.4ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                            </svg>`;
                    }
                html +=
                `</div>
            </div>`;

            return html;
        }

        async function asyncCall(_res) {
            console.log('calling');
            const result = await resolveAfter2Seconds();
            $('#intranet_delete_file_form').ajaxSubmit({
                success: function(res, status, xhr, form) {}
            });
        }

        function resolveAfter2Seconds() {
            return new Promise((resolve) => {
                setTimeout(() => {
                    resolve('resolved');
                }, 2000);
            });
        }
    </script>
@endpush