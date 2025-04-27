// Auth Register


// Start Block
// Generate Zones depending on select
$('#home_cn_sender_city_select').change(function(){
    let city_id = this.value;
    let empty = true;

    $('#home_cn_sender_zone_select').html('');
    $.each(zones, function(index,zone){
        zone.city_id == city_id? $('#home_cn_sender_zone_select').append('<option value="'+zone.zone_id+'">'+zone.name+'</option>'):false;
        zone.city_id == city_id? empty = false:false;
    });

    empty ? $('#home_cn_sender_zone_select').append('<option value="-1">-</option>'):false;
});

$('#home_cn_destination_city_select').change(function(){
    let city_id = this.value;

    $('#home_cn_destination_zone_select').html('');
    $.each(zones, function(index,zone){
        zone.city_id == city_id? $('#home_cn_destination_zone_select').append('<option value="'+zone.zone_id+'">'+zone.name+'</option>'):false;
    });
});

// End Block

function countLetters(){
    let name = $('#addproduct_name').val();
    let description = $('#addproduct_description').val();

    $('#name_text_limit').html('<div>'+name.length+'/150</div>');
    $('#description_text_limit').html('<div>'+description.length+'/1500</div>');

    description = description.replace(/\n/g,'-n');

    $('#addproduct_description').next().val(description);
}

$('#register_btn').click(function(){
    let fields = [
        {'name':'name','validation':['alpha','blank']},
        {'name':'last_name','validation':['alpha','blank']},
        {'name':'email','validation':['@','blank']},
        {'name':'country','validation':['isSelect']},
        {'name':'password','validation':['password','blank']},
        {'name':'password_confirmation','validation':['same:password','blank']},
    ]

    let form = '#'+$(this).closest("form").attr('id');
    let $validator = Validation(form,fields);
    // $(form).submit();
    if(!$validator.fail){
        $(form).submit();
    }
});

$('#home_register_btn').click(function(){
    $('#home_register').slideDown();
    $('#home_login').fadeOut();
});

$('#profile_update_btn').click(function(){
    let fields = [
        {'name':'name','validation':['alpha','blank']},
        {'name':'last_name','validation':['alpha','blank']},
        {'name':'phone','validation':['number:8-10','blank']},
        {'name':'cui','validation':['number:9-13','blank']},
        {'name':'nit','validation':['number:5-11','blank']},
    ]


    let form = '#'+$(this).closest("form").attr('id');

    let $validator = Validation(form,fields);

    if(!$validator.fail){
        $(form).submit();
    }
});

$('#home_login_btn').click(function(){
    $('#home_login').slideDown();
    $('#home_register').fadeOut();
});

function Validation(_form,_fields,_name_id){
    let error_messages = [];
    let fail;

    _name_id == null ? _name_id = '':false;
    // Fields Foerch Validation
    $.each(_fields, function(index,field){

        let field_value = $(_form + ' input[name=' + field.name + _name_id +']').val();
        $.each(field.validation, function(index,validation){
            // Regex Validations
            if(!validation.indexOf('blank')){
                field_value == "" ? error_messages[field.name] = ('No puedes dejar este campo vacio.'):false;
            }else if (!validation.indexOf('alpha')){
                !(/^[A-zÀ-ú\s]+$/).test(field_value) ? error_messages[field.name] = 'El campo '+field.name+' solo admite letras.':false;
            }else if (!validation.indexOf('number')){
                let range = validation.split(':')[1];
                if(range){
                    let min  = range.split('-')[0];
                    let max = range.split('-')[1];
                    if(max){
                        let regex = new RegExp("^[0-9]{"+min+","+max+"}$");
                        !regex.test(field_value) ? error_messages[field.name] = ('El campo '+field.name+' solo admite numeros con ('+min+'-'+max+') digitos.'):false;
                    }else{
                        let regex = new RegExp("^[0-9]{"+min+",}$");
                        !regex.test(field_value) ? error_messages[field.name] = ('El campo '+field.name+' solo admite numeros.'):false;
                    }

                }else{
                    !(/^[0-9]$/).test(field_value) ? error_messages[field.name] = ('El campo '+field.name+' solo admite numeros.'):false;
                }

            }else if (!validation.indexOf('magnitude')){
                let range = validation.split(':')[1];

                let min  = parseInt(range.split('-')[0]);
                let max = parseInt(range.split('-')[1]);
                let value = parseInt(field_value);
                (value > max || value < min) ? error_messages[field.name] = ('El campo '+field.name+' solo admite numeros con ('+min+'-'+max+') digitos.'):false;

            }else if (!validation.indexOf('@')){
                !(/^\w.+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/).test(field_value) ? error_messages[field.name] = ('Coloca un email valido.'):false;
            }else if (!validation.indexOf('password')){
                !(/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*,.]).{6,}$/).test(field_value) ? error_messages[field.name] = ('La contraseña debe tener al menos 6 caracteres, una letra minúscula, una letra mayúscula, un número y un carácter especial #?!@$%^&*,.'):false;
            }else if (!validation.indexOf('same')){
                let comparison_field  = validation.split(':')[1];
                let field_comparison_value = $(_form + ' input[name=' + comparison_field + _name_id +']').val();
                field_value != field_comparison_value  ? error_messages[field.name] = ('Los campos '+field.name+' y '+comparison_field+' no son iguales.'):false;
            }else if (!validation.indexOf('date')){
                if(field_value != null){
                    let comparisson = validation.split(':')[1];
                    let date1 = new Date();
                    date1.setHours(0,0,0,0);
                        let list_date = field_value.split('-');
                        let date2 = new Date(list_date[1]+'-'+list_date[2]+'-'+list_date[0]);
                        date2.setHours(0,0,0,0);

                    if(comparisson == '='){
                        date1 == date2 ? error_messages[field.name] = ('Ingresar una fecha valida'):false;
                    }else if(comparisson == '>'){
                        date2 > date1 ? true:error_messages[field.name] = ('Ingresar una fecha valida');
                    }
                    else if(comparisson == '<'){
                        date2 < date1 ? true:error_messages[field.name] = ('Ingresar una fecha valida');
                    }
                    else if(comparisson == '<='){
                        date2 <= date1 ? true:error_messages[field.name] = ('Ingresar una fecha valida');
                    }
                    else if(comparisson == '>='){
                        date2 >= date1  ? true:error_messages[field.name] = ('Ingresar una fecha valida');
                    }
                }
            }else if (!validation.indexOf('isFile')){
                $(_form + ' input[name=' + field.name + _name_id +']')[0].files.length == 0? error_messages[field.name] = ('Debes cargar un archivo.'):false;
            }else if (!validation.indexOf('isSelect')){
                field_value = $('select[name='+field.name+']').val();
                field_value == 0? error_messages[field.name] = {msg:'Debes Seleccionar una opción.',type:'select'}:false;
                // field_value == 0? error_messages[field.name.type] = 'select':false;
            }

        });
    });


    //Clear Messages
    $.each(_fields, function(index,field){
        if(field.validation == 'isSelect'){
            $('select[name=' + field.name + _name_id +']').hasClass('border-red-600')? $('select[name=' + field.name + _name_id +']').removeClass('border-red-600'):false;
            $('select[name=' + field.name + _name_id +']').next().is("h3") ? $('select[name=' + field.name + _name_id +']').next().remove():false;
            $('select[name=' + field.name + _name_id +']').hasClass('bg-red-100')? $('select[name=' + field.name + _name_id +']').removeClass('bg-red-100'):false;
            $('select[name=' + field.name + _name_id +']').hasClass('placeholder-red-900')? $('select[name=' + field.name + _name_id +']').removeClass('placeholder-red-900'):false;
            $(_form + ' input[name=' + field.name + _name_id +']').hasClass('bg-red-100')? $(_form + ' input[name=' + field.name + _name_id +']').removeClass('bg-red-100'):false;
            $(_form + ' input[name=' + field.name + _name_id +']').hasClass('placeholder-red-900')? $(_form + ' input[name=' + field.name + _name_id +']').removeClass('placeholder-red-900'):false;
        }else{
            $(_form + ' input[name=' + field.name + _name_id +']').hasClass('border-red-600')? $(_form + ' input[name=' + field.name + _name_id +']').removeClass('border-red-600'):false;
            $(_form + ' input[name=' + field.name + _name_id +']').next().is("h3") ? $(_form + ' input[name=' + field.name + _name_id +']').next().remove():false;
            $(_form + ' input[name=' + field.name + _name_id +']').hasClass('bg-red-100')? $(_form + ' input[name=' + field.name + _name_id +']').removeClass('bg-red-100'):false;
            $(_form + ' input[name=' + field.name + _name_id +']').hasClass('placeholder-red-900')? $(_form + ' input[name=' + field.name + _name_id +']').removeClass('placeholder-red-900'):false;
        }

    });

    //Show Messages

    $.each(Object.keys(error_messages), function(index,input_name){
        if(typeof error_messages[input_name] === 'object'){
            $('select[name=' + input_name + _name_id +']').hasClass('border-gray-100')? $('select[name=' + input_name + _name_id +']').removeClass('border-gray-100'):false;
            $('select[name=' + input_name + _name_id +']').hasClass('border-gray-200')? $('select[name=' + input_name + _name_id +']').removeClass('border-gray-200'):false;
            $('select[name=' + input_name + _name_id +']').hasClass('border-gray-300')? $('select[name=' + input_name + _name_id +']').removeClass('border-gray-300'):false;
            $('select[name=' + input_name + _name_id +']').addClass('border-red-600');
            $('select[name=' + input_name + _name_id +']').addClass('bg-red-100');
            $('select[name=' + input_name + _name_id +']').addClass('placeholder-red-900');
        }else{
            $(_form + ' input[name=' + input_name + _name_id +']').hasClass('border-gray-100')? $(_form + ' input[name=' + input_name + _name_id +']').removeClass('border-gray-100'):false;
            $(_form + ' input[name=' + input_name + _name_id +']').hasClass('border-gray-200')? $(_form + ' input[name=' + input_name + _name_id +']').removeClass('border-gray-200'):false;
            $(_form + ' input[name=' + input_name + _name_id +']').hasClass('border-gray-300')? $(_form + ' input[name=' + input_name + _name_id +']').removeClass('border-gray-300'):false;
            $(_form + ' input[name=' + input_name + _name_id +']').addClass('border-red-600');
            $(_form + ' input[name=' + input_name + _name_id +']').addClass('bg-red-100');
            $(_form + ' input[name=' + input_name + _name_id +']').addClass('placeholder-red-900');
            // $(_form + ' input[name=' + input_name + _name_id +']').after('<h3  class="validation-error text-xs text-red-500 p-1">'+error_messages[input_name]+'</h3>');
        }
    });


    Object.keys(error_messages).length > 0 ? fail = true:fail = false;

    return({'fail':fail,'error_messages':error_messages});
}

// Reloading animation
$('body').on('click','.wait', function(){
    LoadingAnimation(this);
});


function LoadingAnimation(_this){
    let html_loading =
        '<div style="width:'+$(_this).width()+'px">'+
            '<svg aria-hidden="true" class="w-5 h-5 mx-auto  animate-spin text-blue-700 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">'+
                '<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>'+
                '<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>'+
            '</svg>'+
        '</div>';

    // Disabled button after one click
    $(_this).prop('disabled', true);

    $(_this).html(html_loading);
}

function ErrorAnimation(_this){
    let html_error =
        '<div style="width:'+$(_this).width()+'px bg-red-700 flex items-center">'+
            '<svg class="w-6 h-6 text-red-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">'+
                '<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>'+
            '</svg>'+
            '<span class="text-xs mx-1">Error de Conexión</span>'+
        '</div>';

    // Disabled button after one click
    $(_this).prop('disabled', false);

    $(_this).html(html_error);
}


// Upload button
$('body').on('click','.upload', function(){
    const input_file  = $(this).nextAll('input').first().focus();
    input_file.click();
    const button = $(this);
    $(input_file).change(function(){
        const filename = (this).files[0].name;
        // this.value = "";
        button.next('h3') ? button.next('h3').html(''):false;
        button.after('<h3 class="text-xs font-bold">'+filename+'</h3>');
    });

});

// Rate Us
$('.star').click(function(){
    let star_rating = $(this).parent().next('input').attr('id').split('_')[1];
    let star_id = $(this).parent().next('input').attr('id').split('_')[0];
    let form = $(this).closest("form")[0];

    $("#"+form.id+" :input").each(function(){
        if(this.id.indexOf(star_id) == 0){
            $('label[for="'+this.id+'"]').children('svg').hasClass('text-yellow-500')?
            $('label[for="'+this.id+'"]').children('svg').addClass('text-gray-400'):
            false;

            $('label[for="'+this.id+'"]').children('svg').hasClass('text-yellow-500')?
            $('label[for="'+this.id+'"]').children('svg').removeClass('text-yellow-500'):
            false;
        }
    });


    $("#"+form.id+" :input").each(function(){
        if(this.id.indexOf(star_id) == 0){
            let inputs_id = this.id.split('_')[1];
            inputs_id <= star_rating?
            $('label[for="'+this.id+'"]').children('svg').hasClass('text-yellow-500')?true:
            $('label[for="'+this.id+'"]').children('svg').toggleClass('text-gray-400 text-yellow-500'):
            false;
        }
    });
});

// Show/Hide Password

$('.togglePasswordChk').click(function(){
    $('.togglePasswordField').attr('type') === 'password'?
    $('.togglePasswordField').attr('type','text') :
    $('.togglePasswordField').attr('type','password');
});


// Load Profile Data
$('body').on('click','.chk_profile_data',function(){
    let form = (this).closest("form");
    let checkbox = this;
    this.id ? point = this.id.split('_')[2]:point = null;
    $.each(Array.from(form.elements), function(index, input){
        // point ? name = input.name.split('_')[0]+'_'+point:name = input.name.split('_')[0];
        point ? name = input.name.split('_')[0]:name = input.name.split('_')[1];

        // console.log(name);
        // if(point ==  input.name.split('_')[1]){
            typeof user[name] === 'undefined' ? true:
            checkbox.checked ?
            input.value = user[name]:
            input.value = "";
        // }
    });
});



// Courier Nacional Select Location
// Start Block
const exampleArray = [];

let city_id = 0;
let zone_id = 0;

function arrayTransformation() {
    if(typeof zoning !== 'undefined'){
        zoning.forEach((array) => {
            city_id += 1;
            for (a = 1; a <= array.zonas; a++) {
                zone_id += 1;
                var exampleObject = {
                    name: array.departamento +' '+ array.municipio + " Zona " + a,
                    district_id:array.district_id,
                    city_id:city_id,
                    zone_id:zone_id,
                };
                exampleArray.push(exampleObject);
            }
            if(array.zonas == 0){
                var exampleObject = {
                    name:  array.municipio + ", " + array.departamento,
                    district_id:array.district_id,
                    city_id:"",
                    zone_id:0,
                };
                array.district_id < 23 ? exampleObject.city_id = city_id:exampleObject.city_id = 0;

                exampleArray.push(exampleObject);
            }
        });
    }
}

var origin = "";
var destination = "";

$(document).on("click", ".suggest-origin", function () {
    origin = $(this).text();

    $('#home_cn_origin_text').val(origin);
    $('.validation-error').addClass('border-gray-200');
    $('.validation-error').removeClass('placeholder-red-100');
    $('.validation-error').removeClass('bg-red-100');
    $('.validation-error').removeClass('border-red-600');

    $('#home_cn_origin_select').val($(this).attr('id').split('_')[1]);
    $('#home_cn_sender_city_select').val($(this).attr('id').split('_')[2]);
    $('#home_cn_sender_zone_select').val($(this).attr('id').split('_')[3]);

    // console.log('texto'+$(this).attr('id').split('_')[1]);

    hideSuggest("origin", origin);
});

$(document).on("click", ".suggest-destination", function () {
    destination = $(this).text();

    $('#home_cn_destination_text').val(destination);
    $('.validation-error').addClass('border-gray-200');
    $('.validation-error').removeClass('placeholder-red-100');
    $('.validation-error').removeClass('bg-red-100');
    $('.validation-error').removeClass('border-red-600');

    $('#home_cn_destination_select').val($(this).attr('id').split('_')[1]);
    $('#home_cn_destination_city_select').val($(this).attr('id').split('_')[2]);
    $('#home_cn_destination_zone_select').val($(this).attr('id').split('_')[3]);

    hideSuggest("destination", destination);
});

$(document).on("input", "#origin", function () {
    modalSuggest($(this).val(), "origin");
});

$(document).on("input", "#destination", function () {
    modalSuggest($(this).val(), "destination");
});

$(document).ready(function () {
    arrayTransformation();
});

function modalSuggest(text, id) {
    const filter = exampleArray.filter((item) =>
        item.name.toLowerCase().includes(text.toLowerCase())
    );
    const suggest = $("#suggest-" + id);
    suggest.empty();
    if (text.length==0) {
        suggest.hide();
        // initMap(null, null);
    } else {
        a = 0;
        filter.forEach((item) => {
            if (a <= 10) {
                suggest.append(
                    `<div id="homezoneid_${item.district_id}_${item.city_id}_${item.zone_id}" class="suggest-${id} p-2 cursor-pointer hover:bg-gray-100">${item.name}</div>`
                );
                a++;
            }
        });
        suggest.show();
    }
    if(filter.length === 0){
        suggest.append(
            `<div class="p-2 cursor-pointer hover:bg-transparent opacity-50 select-none">No hay resultados</div>`
        );
        $(document).on("click", function(event) {
            if (!$(event.target).closest("#suggest-" + id).length) {
                suggest.hide();
            }
        });
    }
}

function hideSuggest(id, text) {
    const suggest = $("#suggest-" + id);
    suggest.empty();
    suggest.hide();
    $("#" + id).val(text);
}

// $('body').on('click','#home_select_route_btn',function(){
//     $('#origin').val();
//     $('#destination').val();
// });


// End Block


// Key Validation
// Start Block
$('.key-only-number').keypress(function (e) {
    var charCode = (e.which) ? e.which : event.keyCode
    if (String.fromCharCode(charCode).match(/[^0-9]/g))
    return false;
});

$('.key-only-alpha').keypress(function (e) {
    var charCode = (e.which) ? e.which : event.keyCode
    if (String.fromCharCode(charCode).match(/[^a-zA-Z\s]+/))
    return false;
});
// End Block


// New Appointment Block
let topics = [
    {'department_id':'Contabilidad','topic':'Reembolso'},
    {'department_id':'Contabilidad','topic':'Facturación'},
    {'department_id':'Contabilidad','topic':'Disputa de Cargos'},
    {'department_id':'Contabilidad','topic':'Pagos'},
    {'department_id':'Operaciones','topic':'Cargas en abandono'},
    {'department_id':'Operaciones','topic':'Entrega de documentos'},
    {'department_id':'Comercial','topic':'Asesoría marítima'},
    {'department_id':'Comercial','topic':'Asesoría Áerea'},
    {'department_id':'Comercial','topic':'Asesoría Aduanera'},
    {'department_id':'Legal','topic':'Reclamos y disputas'},
]

$('#home_request_new_appointment_btn').click(function(){
    fields = [
        {'name':'name','validation':['blank']},
        {'name':'phone','validation':['blank']},
        {'name':'cui','validation':['blank']},
        {'name':'email','validation':['blank']},
        {'name':'department','validation':['isSelect']},
        {'name':'explanation','validation':['']},
        {'name':'topic','validation':['']},
        {'name':'BL','validation':['']},
    ]

    let form = '#'+$(this).closest("form").attr('id');

    // Conditional Validations
    $("input[name=explanation]").parent().css('display') == 'none'?fields[5].validation = ['']:fields[5].validation = ['blank'];
    $("#home_new_appointment_topic_select").css('display') == 'none'?fields[6].validation = ['']:fields[6].validation = ['isSelect'];
    $("input[name=BL]").parent().css('display') == 'none'?fields[7].validation = ['']:fields[7].validation = ['blank'];

    let validator = Validation(form,fields,'');

    if(!validator.fail){

        LoadingAnimation(this,'loading');
        // $('#home_request_new_appointment_form').submit();
        $('#home_request_new_appointment_form').ajaxSubmit({
            success: function(res, status, xhr, form) {
                $('#home_request_new_appointment_form').hide();
                $('#home_request_new_appointment_response').fadeIn('slow');
            }
        });
    }
});

$('#home_new_appointment_department_select').change(function(){
    let html = '<option value="0">Selecciona El Asunto</option>';
    let department = this.value;
    $.each(topics, function(index,topic){
        topic.department_id == department ? html+='<option value="'+topic.topic+'">'+topic.topic+'</option>':false;
    });
    $('#home_new_appointment_topic_select').html(html);

    department == 'Administrativo' || department == 'Marketing' || department == 'IT' ?
    $('#home_new_appointment_topic_select').hide():$('#home_new_appointment_topic_select').show();

    department == 'Administrativo' || department == 'Marketing' || department == 'IT' ?
    $('#home_new_appointment_topic_textarea_div').show():$('#home_new_appointment_topic_textarea_div').hide();

    department == 'Contabilidad' || department == 'Legal' || department == 'Operaciones' ?
    $('#home_new_appointment_BL_input_div').show():$('#home_new_appointment_BL_input_div').hide();
});

// New Appointment End Block